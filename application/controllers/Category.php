<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller {	
   
   public function __construct(){
      parent::__construct();
      $this->load->database();
      $this->load->model('user_auth_model');
      $this->load->model('store_model');
      $this->load->model('library_model');

   }

	//load products by category
	public function s($category_id){
		$data['item_categories'] = $this->library_model->get_product_categories();
    $data['product_listing'] =  $this->store_model->get_posted_items_by_category($category_id);
    $data['category_name'] = $this->library_model->get_category_by_id($category_id);

    $this->load->view('header',$data);

    if ($this->user_auth_model->is_logged_in()){
        $this->load->view('sidebar');
    }else{
        $this->load->view('sidebar_out');
    }


    $this->load->view('category');
    $this->load->view('footer');
	}





}
