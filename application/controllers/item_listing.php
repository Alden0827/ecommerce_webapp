<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
class Item_listing extends CI_Controller {	
    public function __construct(){
        parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->load->model('store_model');
		$this->load->model('item_model');
		$this->load->model('user_auth_model');        
		$this->load->model('library_model');
		$this->load->model('Image_processor_model');


    }
	//load SC landing page
	public function index(){
		$this->user_auth_model->login_required();
		$data['items'] = $this->store_model->get_items_by_store($this->user_auth_model->get_user_id());

		$this->load->view('header_sc');
		$this->load->view('sidebar_sc');
		$this->load->view('item_listing',$data);
		$this->load->view('footer_sc');
	}

	public function products_add(){
		$this->user_auth_model->login_required();
		$data['new_upc'] = uniqid();
		$data['res_product_category'] = $this->library_model->get_product_categories();

		$this->load->helper(array('form', 'url'));
		$this->load->view('header_sc');
		$this->load->view('sidebar_sc');
		$this->load->view('sc_products_editor',$data);
		$this->load->view('footer_sc');		
	}

	public function products_save(){
		$this->user_auth_model->login_required();
		

		$form_data = $this->input->post();

		//rectify data
		unset($form_data['is_discount']);	//remove 
		unset($form_data['submit']);	//remove 

		$form_data['status_id'] = isset($form_data['status_id'])?1:0;
		$form_data['discount'] = $form_data['discount'] / 100;
		$form_data['status_change_date'] = date('Y-m-d h:i:s', time());
		$form_data['store_id'] = $this->user_auth_model->get_user_id();
		$affected_rows = $this->item_model->item_add($form_data);
		$upc = $form_data['upc'];
	
		if ($affected_rows > 0) {
			$data = [];
			$count = count($_FILES['product_photos']['name']);
			
			for($i=0;$i<$count;$i++){

				if(!empty($_FILES['product_photos']['name'][$i])){
					
		          $_FILES['file']['name'] = $_FILES['product_photos']['name'][$i];
		          $_FILES['file']['type'] = $_FILES['product_photos']['type'][$i];
		          $_FILES['file']['tmp_name'] = $_FILES['product_photos']['tmp_name'][$i];
		          $_FILES['file']['error'] = $_FILES['product_photos']['error'][$i];
		          $_FILES['file']['size'] = $_FILES['product_photos']['size'][$i];

		          $config['upload_path'] = 'uploads/items/'; 
		          $config['allowed_types'] = 'jpg|jpeg|png|gif';
		          $config['max_size'] = '5000000';
		          // $config['file_name'] = $_FILES['product_photos']['name'][$i];
		          $config['file_name'] = $form_data['upc'].'_p';
		          
		          $this->load->library('upload',$config); 
		          if($this->upload->do_upload('file')){
		          		// print($form_data['upc'].'--'.($i+1).'<br>');
		            	$uploadData = $this->upload->data();
		            	$filename = $uploadData['file_name'];
		            	$data['totalFiles'][] = $filename;
						// create thumbs
						$this->Image_processor_model->crate_thumbs($filename);
						// print($filename)	;	            	
		          }else{

		          	 echo $this->upload->display_errors();
		          }          
				}


			}
			// redirect(site_url('item_listing'));
		}
	}




}
