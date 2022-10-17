<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {	
   
   public function __construct(){
      parent::__construct();
      $this->load->database();
      $this->load->model('user_auth_model');
      $this->load->model('store_model');
      $this->load->model('library_model');

   }

	//load SC landing page
	public function index(){

		
		$this->user_auth_model->generate_url();
        $login_button = $this->user_auth_model->generate_url();
        $data['login_button'] = $login_button;

        $item_listing = $this->store_model->get_posted_items();
        $data['product_listing'] = $item_listing;
        $data['item_categories'] = $this->library_model->get_product_categories();
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


  function test(){
      $this->load->model('Image_processor_model');
      $this->Image_processor_model->crate_thumbs("");

      $this->Image_processor_model->crate_thumbs("6327316ccf721_p.jpg");
      $this->Image_processor_model->crate_thumbs("6327316ccf721_p1.jpg");
      $this->Image_processor_model->crate_thumbs("6327316ccf721_p2.jpg");
      $this->Image_processor_model->crate_thumbs("6327316ccf721_p3.jpg");
      $this->Image_processor_model->crate_thumbs("6327316ccf721_p4.jpg");
      $this->Image_processor_model->crate_thumbs("63280f199bcf4_p.jpg");
      $this->Image_processor_model->crate_thumbs("63280f199bcf4_p1.jpg");
      $this->Image_processor_model->crate_thumbs("63280f199bcf4_p2.jpg");
      $this->Image_processor_model->crate_thumbs("63280f199bcf4_p3.jpg");
      $this->Image_processor_model->crate_thumbs("632831a19bc9b_p.jpg");
      $this->Image_processor_model->crate_thumbs("632831a19bc9b_p1.jpg");
      $this->Image_processor_model->crate_thumbs("632831a19bc9b_p2.jpg");
      $this->Image_processor_model->crate_thumbs("632831a19bc9b_p3.jpg");
      $this->Image_processor_model->crate_thumbs("632856a45e628_p.jpg");
      $this->Image_processor_model->crate_thumbs("632856a45e628_p1.jpg");
      $this->Image_processor_model->crate_thumbs("632856a45e628_p2.jpg");
      $this->Image_processor_model->crate_thumbs("63290fa61c6ee_p.jpg");
      $this->Image_processor_model->crate_thumbs("63290fa61c6ee_p1.jpg");
      $this->Image_processor_model->crate_thumbs("63290fa61c6ee_p2.jpg");
      $this->Image_processor_model->crate_thumbs("632910769b3fe_p.jpg");
      $this->Image_processor_model->crate_thumbs("632910769b3fe_p1.jpg");
      $this->Image_processor_model->crate_thumbs("632910769b3fe_p2.jpg");
      $this->Image_processor_model->crate_thumbs("632910769b3fe_p3.jpg");
      $this->Image_processor_model->crate_thumbs("63291123bf965_p.jpg");
      $this->Image_processor_model->crate_thumbs("63291123bf965_p1.jpg");
      $this->Image_processor_model->crate_thumbs("632912c2884c0_p.jpg");
      $this->Image_processor_model->crate_thumbs("632912c2884c0_p1.jpg");
      $this->Image_processor_model->crate_thumbs("63291317ebb2b_p.jpg");
      $this->Image_processor_model->crate_thumbs("63291317ebb2b_p1.jpg");
      $this->Image_processor_model->crate_thumbs("63291317ebb2b_p2.jpg");
      $this->Image_processor_model->crate_thumbs("63291317ebb2b_p3.jpg");
      $this->Image_processor_model->crate_thumbs("6329132ec35f6_p.jpg");
      $this->Image_processor_model->crate_thumbs("6329132ec35f6_p1.jpg");
      $this->Image_processor_model->crate_thumbs("6329132ec35f6_p2.jpg");
      $this->Image_processor_model->crate_thumbs("6329132ec35f6_p3.jpg");
      $this->Image_processor_model->crate_thumbs("6329132ec35f6_p4.jpg");
      $this->Image_processor_model->crate_thumbs("632913decab22_p.jpg");
      $this->Image_processor_model->crate_thumbs("632913decab22_p1.jpg");
      $this->Image_processor_model->crate_thumbs("632913decab22_p2.jpg");
      $this->Image_processor_model->crate_thumbs("632913decab22_p3.jpg");
      $this->Image_processor_model->crate_thumbs("632d3dbe833a7_p.jpg");
      $this->Image_processor_model->crate_thumbs("632d3dbe833a7_p1.jpg");
      $this->Image_processor_model->crate_thumbs("632d3dbe833a7_p2.jpg");
      $this->Image_processor_model->crate_thumbs("632d3dbe833a7_p3.jpg");
      $this->Image_processor_model->crate_thumbs("634c0432767f1_p.jpg");
      $this->Image_processor_model->crate_thumbs("634c0432767f1_p1.jpg");
      $this->Image_processor_model->crate_thumbs("634c0432767f1_p2.jpg");
      $this->Image_processor_model->crate_thumbs("634c0432767f1_p3.jpg");
      $this->Image_processor_model->crate_thumbs("634c0432767f1_p4.jpg");
      $this->Image_processor_model->crate_thumbs("634c0432767f1_p5.jpg");



  }

}
