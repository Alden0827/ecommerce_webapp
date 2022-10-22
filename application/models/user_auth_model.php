<?php
class user_auth_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    private function Is_already_register($id) {
        $this->db->where('login_oauth_uid', $id);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }
    public function login_required(){
        if (!$this->is_logged_in()) redirect(site_url('logout'));
    }
    private function Update_user_data($data, $id) {
        $this->db->where('login_oauth_uid', $id);
        $this->db->update('users', $data);
    }
    private function Insert_user_data($data) {
        $this->db->insert('users', $data);
    }
    function get_user_id(){
        return $this->session->userdata('user_data')['id'];
    }
    function is_logged_in(){
        return isset($this->session->userdata('user_data')['id']);
    }
    function generate_url() {
        include_once APPPATH . "libraries/vendor/autoload.php";

        $google_client = new Google_Client();

        $google_client->setClientId($this->config->item("google_client_id")); //Define your ClientID
        $google_client->setClientSecret($this->config->item("google_secret_id")); //Define your Client Secret Key
        $google_client->setRedirectUri($this->config->item("google_redirect_url")); //Define your Redirect Uri
        $google_client->addScope('email');
        // $google_client->display('popup');
        $google_client->addScope('profile');

        if (isset($_GET["code"])) {
            $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

            if (!isset($token["error"])) {

                $google_client->setAccessToken($token['access_token']);
                $this->session->set_userdata('access_token', $token['access_token']);
                $google_service = new Google_Service_Oauth2($google_client);
                $data = $google_service->userinfo->get();
                $current_datetime = date('Y-m-d H:i:s');

                if ($this->Is_already_register($data['id'])) {
                    //update data
                    $user_data = array(
                        'first_name' => $data['given_name'],
                        'last_name' => $data['family_name'],
                        'email_address' => $data['email'],
                        'profile_picture' => $data['picture'],
                        'updated_at' => $current_datetime
                    );

                    $this->Update_user_data($user_data, $data['id']);
                }
                else {
                    //insert data
                    $user_data = array(
                        'login_oauth_uid' => $data['id'],
                        'first_name' => $data['given_name'],
                        'last_name' => $data['family_name'],
                        'email_address' => $data['email'],
                        'profile_picture' => $data['picture'],
                        'created_at' => $current_datetime
                    );

                    $this->Insert_user_data($user_data);
                }
                if (!isset($user_data['id'])){
                    $user_data['id'] = $data['id'];
                }
                $this->session->set_userdata('user_data', $user_data);
            }
        }
        $login_button = '';


        if (!$this->session->userdata('access_token')) {
        	return '<a href="' . $google_client->createAuthUrl() . '"  class="btn btn-outline-success" role="button"> SIGN-IN</a>';
        }
    }


}
?>
