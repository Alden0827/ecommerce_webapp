<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
	// public function index()
	// {
	// 	// $this->load->model('model_users');
	// 	// $res = $this->model_users->read();
	// 	// $data['dataset'] = $res;
	
	// 	// print_r($res);
	// 	// $this->load->view('constantv');
	// 	$this->load->view('header.php',$data);
	// 	$this->load->view('index');



	// }


    public function __construct() {
        parent::__construct();
        $this->load->model('google_login_model');
    }

    function index() {
        include_once APPPATH . "libraries/vendor/autoload.php";

        $google_client = new Google_Client();



        $google_client->setClientId('214666749439-69v4ja5gjgjsiasanivhe646a60v0nqr.apps.googleusercontent.com'); //Define your ClientID
        $google_client->setClientSecret('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'); //Define your Client Secret Key
        $google_client->setRedirectUri('http://localhost/ci2'); //Define your Redirect Uri
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
                $this->session->set_userdata('user_data', $user_data);
            }
        }
        $login_button = '';
        if (!$this->session->userdata('access_token')) {
            $login_button = '<a href="' . $google_client->createAuthUrl() . '"  class="btn btn-outline-success" role="button"> SIGN-IN</a>';
            $data['login_button'] = $login_button;
            $this->load->view('header', $data);
            $this->load->view('index', $data);
        }
        else {
            $this->load->view('header');
            $this->load->view('index');
            // $this->load->view('google_login');
        }
    }

    function logout() {
        $this->session->unset_userdata('access_token');
        $this->session->unset_userdata('user_data');
        // redirect(site_url());
        redirect('https://accounts.google.com/logout');
    }

}
// <a href="" class="btn btn-outline-success" role="button">SIGN-IN</a>