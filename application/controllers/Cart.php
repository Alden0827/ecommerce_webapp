<?php
class Cart extends CI_Controller {

    public function __construct() {
       parent::__construct();
       
       $this->load->model('m_cart');
       $this->load->model('user_auth_model');
    }

    public function index(){
        $data['cart_items'] = $this->m_cart->getall();
        $this->load->view('header');
        $this->load->view('sidebar',$data);
        $this->load->view('cart');
        $this->load->view('footer');
    }

    public function add(){
        $data = $this->input->post();
        $data['login_oauth_uid'] = $this->user_auth_model->get_user_id();
        $data['date_added'] = date('Y-m-d h:i:s', time());
        $data['qnt'] = 1;
        $new_id = $this->m_cart->add($data);
        if ($new_id > 0) {
            print_r(json_encode($this->m_cart->get($new_id)[0]));
        }
    }

    public function delete(){

    }


}

