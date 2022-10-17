<?php
class Credircard extends CI_Controller {

    public function __construct() {
       parent::__construct();
      
       $this->load->model('user_auth_model');
       $this->load->helper('credit_card');
       $this->load->model('Creditcard_model');
    }

    //display cc editor
    public function add($data){

    }

    public function save($data){
    	//todo: validate data first

    	$this->Creditcard_model->add($data);
    }

    public function remove($id){
      return $this->Creditcard_model->delete($id);

    }

    //VALIDATES CREDIT CARD
	public function validate($cc_id){
		$cc_info = $this->Creditcard_model->fetch_fetch($cc_id);
		if (!card_expiry_valid($cc_info[0]->exp_month,$cc_info[0]->exp_year)){
			$this->session->set_flashdata('err_msg', 'Creditcard is no longer valid!');
			return false;
		}else{
			return true;
		}

	}


}

