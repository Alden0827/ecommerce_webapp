<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
class Item_listing extends CI_Controller {	

	//load SC landing page
	public function index(){

		$this->load->model('m_products');
		$this->load->model('user_auth_model');

		$data['items'] = $this->m_products->get_items_by_store($this->user_auth_model->get_user_id());

		$this->load->view('header_sc');
		$this->load->view('sidebar_sc');
		$this->load->view('item_listing',$data);
		$this->load->view('footer_sc');
	}

	public function products_add(){

		$this->load->model('m_library');

		$data['new_upc'] = uniqid();
		$data['res_product_category'] = $this->m_library->get_product_categories();

		$this->load->helper(array('form', 'url'));
		$this->load->view('header_sc');
		$this->load->view('sidebar_sc');
		$this->load->view('sc_products_editor',$data);
		$this->load->view('footer_sc');		
	}

	public function products_save(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('m_products');
		$this->load->model('user_auth_model');

		$form_data = $this->input->post();
		// print_r($_FILES['product_photos']['name']);

		//rectify data
		unset($form_data['is_discount']);	//remove 
		unset($form_data['submit']);	//remove 

		$form_data['status_id'] = isset($form_data['status_id'])?1:0;
		$form_data['discount'] = $form_data['discount'] / 100;
		$form_data['status_change_date'] = date('Y-m-d h:i:s', time());
		$form_data['store_id'] = $this->user_auth_model->get_user_id();
		$inserted_id = $this->m_products->item_add($form_data);
		print_r($form_data);
		//upload photoes
		if ($inserted_id > 0) {
			$data = [];

			$count = count($_FILES['product_photos']['name']);
			print($count);
			for($i=0;$i<$count;$i++){
				if(!empty($_FILES['product_photos']['name'][$i])){
					print('1');
		          $_FILES['file']['name'] = $_FILES['product_photos']['name'][$i];
		          $_FILES['file']['type'] = $_FILES['product_photos']['type'][$i];
		          $_FILES['file']['tmp_name'] = $_FILES['product_photos']['tmp_name'][$i];
		          $_FILES['file']['error'] = $_FILES['product_photos']['error'][$i];
		          $_FILES['file']['size'] = $_FILES['product_photos']['size'][$i];

		          $config['upload_path'] = 'uploads/'; 
		          $config['allowed_types'] = 'jpg|jpeg|png|gif';
		          $config['max_size'] = '500000';
		          // $config['file_name'] = $_FILES['product_photos']['name'][$i];
		          $config['file_name'] = $form_data['upc'].'_p';
		          print($form_data['upc'].'-'.($i+1).'<br>');
		          $this->load->library('upload',$config); 
		          if($this->upload->do_upload('file')){
		            	$uploadData = $this->upload->data();
		            	$filename = $uploadData['file_name'];
		            	$data['totalFiles'][] = $filename;
		          }	          
				}
			}


			redirect(site_url('item_listing'));
		}
		
        // $this->form_validation->set_rules('name', 'Imie', 'required|min_length[5]|max_length[25]|required|alpha'); 
        // $this->form_validation->set_rules('surname', 'Nazwisko', 'required|min_length[5]|max_length[25]|required|alpha'); 
        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
        // $this->form_validation->set_rules('number', 'Numer telefonu', 'required|alpha_numeric|max_length[10]'); 
        // $this->form_validation->set_rules('brand', 'Marka', 'required|alpha'); 
        // $this->form_validation->set_rules('model', 'Model', 'required|alpha'); 
        // $this->form_validation->set_rules('year', 'Rok produkcji', 'required|alpha_numeric|max_length[5]'); 
        // $this->form_validation->set_rules('km', 'Ilosc KM', 'required|alpha_numeric|max_length[5]'); 
        // $this->form_validation->set_rules('licenceseplate', 'Tablica rejestracyjna', 'required|max_length[15]'); 
        // $this->form_validation->set_rules('description', 'Opis', 'required|max_length[300]'); 
        // $this->form_validation->set_rules('city', 'Miasto', 'required|max_length[30]'); 

	    // if ($this->form_validation->run() == FALSE){
	    //    echo "Ops!";
	    // }
	    // else {
	    // 	print_r($data);
	    //  	// $this->your_model->save($data);           
	    // }



		
	}




}
