<?php
class Stores extends CI_Controller {

    public function __construct() {
       parent::__construct();
       $this->load->model('user_auth_model');
       $this->load->model('library_model');
    }

    public function index(){

        $this->user_auth_model->login_required();

    
        $data['item_categories'] = $this->library_model->get_product_categories();

        $this->load->view('header');
        $this->load->view('sidebar',$data);
        $this->load->view('stores');
        $this->load->view('footer');
    }


}

