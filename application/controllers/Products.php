<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->model('item_model');
		$this->load->model('store_model');
		$this->load->model('user_auth_model');   
		$this->load->model('library_model');

    }

	public function index()
	{
	   $data['product_listing'] = $this->store_model->get_posted_items();

		$this->load->view('header',$data);
		$this->load->view('sidebar');
		$this->load->view('index');
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
	    $data['item_categories'] = $this->library_model->get_product_categories();

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
