<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->model('item_model');
		$this->load->model('store_model');
		$this->load->model('user_auth_model');        
    }

	public function index()
	{
	    $item_listing = $this->store_model->get_posted_items();
	    $data['product_listing'] = $item_listing;

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('index',$data);
		$this->load->view('footer');
	}
	public function category()
	{
		$this->load->view('category');
	}
	public function detail($uid)
	{
        $login_button = $this->user_auth_model->generate_url();
        $data['login_button'] = $login_button;
        $data['is_logged_in'] = $this->user_auth_model->is_logged_in();
            
		$res_detail = $this->item_model->get_detail($uid);
		$data["item_detail"] = $res_detail->result();

		$this->load->view('header',$data);
		if ($this->user_auth_model->is_logged_in()) {
			$this->load->view('sidebar');
		}else{
			$this->load->view('sidebar_out');
		}
		
		$this->load->view('item_detail');
		$this->load->view('footer');	

	}

 
}
