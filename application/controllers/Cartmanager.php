<?php
class Cartmanager extends CI_Controller {

    public function __construct() {
       parent::__construct();
       
       $this->load->model('m_cart');
       $this->load->model('user_auth_model');
    }

    public function items(){
        
    }

    public function add(){
        // $data = array(
        //         'upc'     => '63280f199bcf4',
        //         'qnt'   => 1,
        //         ';'    => '2022-09-31 00:00:00',
        //         'login_oauth_uid'         => '104643403242055778893'
        // );
        $data = $this->input->post();
        $data['login_oauth_uid'] = $this->user_auth_model->get_user_id();
        $data['date_added'] = date('Y-m-d h:i:s', time());
        $data['qnt'] = 1;
        $new_id = $this->m_cart->add($data);
        if ($new_id > 0) {
            print_r($this->m_cart->get($new_id));
        }
    }

    public function delete(){

    }


}

