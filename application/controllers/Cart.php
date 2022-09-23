<?php
class Cart extends CI_Controller {

    public function __construct() {
       parent::__construct();
       $this->load->model('cart_model');
       $this->load->model('user_auth_model');
    }

    public function index(){

        $this->user_auth_model->login_required();

        $data['cart_items'] = $this->cart_model->getall();
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
        $new_id = $this->cart_model->add($data);
        if ($new_id > 0) {
            print_r(json_encode($this->cart_model->get($new_id)[0]));
        }
    }

    public function delete(){

    }


}

