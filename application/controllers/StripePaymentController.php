<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class StripePaymentController extends CI_Controller {
    
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
       $this->load->model('library_model');
    }
    
    public function index()
    {
        $data['item_categories'] = $this->library_model->get_product_categories();
        $this->load->view('header');
        $this->load->view('sidebar',$data);
        $this->load->view('stripe');
        $this->load->view('footer');
    }
    
    public function handlePayment()
    {
        require_once('application/libraries/stripe-php/init.php');
    
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
     
        \Stripe\Charge::create ([
                "amount" => 100 * 120,
                "currency" => "usd",
                "source" => $this->input->post('stripeToken'),
                "description" => "Dummy stripe payment." 
        ]);
            
        $this->session->set_flashdata('success', 'Payment has been successful.');
             
        // redirect('/make-stripe-payment', 'refresh');
        print('payment successful!');
    }
}