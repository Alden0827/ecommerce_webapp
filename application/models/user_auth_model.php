<?php
class user_auth_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->model('google_login_model');
    }


    function generate_url() {
        include_once APPPATH . "libraries/vendor/autoload.php";

        $google_client = new Google_Client();

        $google_client->setClientId($this->config->item("google_client_id")); //Define your ClientID
        $google_client->setClientSecret($this->config->item("google_secret_id")); //Define your Client Secret Key
        $google_client->setRedirectUri($this->config->item("google_redirect_url")); //Define your Redirect Uri
        $google_client->addScope('email');

        $google_client->addScope('profile');

        if (isset($_GET["code"])) {
            $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

            if (!isset($token["error"])) {

                $google_client->setAccessToken($token['access_token']);
                $this->session->set_userdata('access_token', $token['access_token']);
                $google_service = new Google_Service_Oauth2($google_client);
                $data = $google_service->userinfo->get();
                $current_datetime = date('Y-m-d H:i:s');

                if ($this->google_login_model->Is_already_register($data['id'])) {
                    //update data
                    $user_data = array(
                        'first_name' => $data['given_name'],
                        'last_name' => $data['family_name'],
                        'email_address' => $data['email'],
                        'profile_picture' => $data['picture'],
                        'updated_at' => $current_datetime
                    );

                    $this->google_login_model->Update_user_data($user_data, $data['id']);
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

                    $this->google_login_model->Insert_user_data($user_data);
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

    function logout() {
        $this->session->unset_userdata('access_token');
        $this->session->unset_userdata('user_data');
        redirect(site_url());
        // redirect('https://accounts.google.com/logout');
    }

}
?>
