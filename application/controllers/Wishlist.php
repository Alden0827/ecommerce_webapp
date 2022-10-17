<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wishlist extends CI_Controller {

    public function __construct() {
       parent::__construct();
       $this->load->model('user_auth_model');
       $this->load->model('library_model');
       $this->load->model('Wishlist_model');
    }

    public function index(){    	
        $this->user_auth_model->login_required();

    	$data['item_categories'] = $this->library_model->get_product_categories();
    	$data['wishlist_items']  = $this->Wishlist_model->fetch_all();

	    $this->load->view('header',$data);
	    $this->load->view('sidebar');
	    $this->load->view('wishlist');
	    $this->load->view('footer');
    }

    public function add(){
        $this->user_auth_model->login_required();
        $data = $this->input->post();
        $data['login_oauth_uid'] = $this->user_auth_model->get_user_id();
        $data['date_added'] = date('Y-m-d h:i:s', time());
        $new_id = $this->Wishlist_model->add($data);
        return $new_id;

    }
    public function remove(){
        $this->user_auth_model->login_required();
        $data = $this->input->post();
        $wl_id = $data['wl_id'];
    	$this->Wishlist_model->remove($wl_id);

    }

}

