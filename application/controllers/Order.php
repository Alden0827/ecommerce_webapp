<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends CI_Controller {

    public function __construct() {
       parent::__construct();
       $this->load->model('cart_model');
       $this->load->model('user_auth_model');
       $this->load->helper('url');
       $this->load->helper('form');
    }

    public function index(){
        $this->user_auth_model->login_required();
    }

    public function checkout(){
        $this->user_auth_model->login_required();
         if($this->input->post('submit') != NULL ){

            // $data['cart_items'] = $this->cart_model->getall();
            $selected_items = $this->input->post();
            // print('<pre>');
            print_r($selected_items);
            // print('</pre>');

            
            $this->load->view('header');
            $this->load->view('sidebar');
            $this->load->view('checkout');
            $this->load->view('footer');





         }

        

    }
}

