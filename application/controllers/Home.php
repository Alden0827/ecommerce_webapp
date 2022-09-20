<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {	

	//load SC landing page
	public function index(){

		$this->load->model('user_auth_model');
		$this->user_auth_model->generate_url();
        $login_button = $this->user_auth_model->generate_url();
        $data['login_button'] = $login_button;

        $this->load->model('m_products');
        $item_listing = $this->m_products->get_posted_items();
        // print_r($item_listing);
        $data['product_listing'] = $item_listing;



        $this->load->view('header', $data);

        if ($this->user_auth_model->is_logged_in()){
            $this->load->view('sidebar');
        }else{
            $this->load->view('sidebar_out');

        }

        
        $this->load->view('index');
        $this->load->view('footer');

		
	}

    function logout() {
        $this->session->unset_userdata('access_token');
        $this->session->unset_userdata('user_data');
        redirect(site_url());
        // redirect('https://accounts.google.com/logout');
    }



}
