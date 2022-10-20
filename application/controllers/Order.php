<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends CI_Controller {

    public function __construct() {
       parent::__construct();
       
       $this->load->model('user_auth_model');
       $this->load->model('library_model');
       $this->load->model('shipment_model');
       $this->load->model('cart_model');
       $this->load->model('settings_model');
       $this->load->model('order_model');

       $this->load->helper('url');
       $this->load->helper('form');
       
    }

    public function index(){
        $this->user_auth_model->login_required();
    }

    public function checkout(){
        $this->user_auth_model->login_required();
        $data['item_categories'] = $this->library_model->get_product_categories();

        #IF CHECKOUT LOADS FROM CART PAGE
        if($this->input->post('submit') != NULL ){
            $chkout_items = $this->input->post();

            $data['shipment_info'] = $this->shipment_model->fetch_default()[0];

            //get checked-out items
            $selected_items = $chkout_items['cart_id'];
            $data['cart_entries'] = $this->cart_model->get_cart_entries($selected_items);
            $data['csv_cart_items'] = implode(',',$selected_items);
            
            //get total
            $sub_total = 0;
            $shipping_total = 0;
            foreach ($data['cart_entries'] as $item) {
               $sub_total += $item->sub_total;
               $shipping_total+=$item->courier_fee;
            }
            
            //summary
            $charges = $this->settings_model->get_tax_rate();
            $ex_tax_rate = $charges[0]->sale_ex_tax_perc;  
            $ex_tax_charge = ($sub_total * $ex_tax_rate);    
            $total_amount =  $sub_total + $ex_tax_charge + $shipping_total;
            $data['totals'] = (object) array(
                              'sub_total' =>  number_format( $sub_total,2), 
                              'shipment_cost' => number_format( $shipping_total,2), 
                              'ex_tax_charge' => number_format( $ex_tax_charge,2), 
                              'ex_tax_rate' => number_format( $ex_tax_rate*100,2) . '%', 
                              'total_amount' => number_format( $total_amount,2)
                            );

            $this->load->view('header',$data);
            $this->load->view('sidebar');
            $this->load->view('invoice');
            $this->load->view('footer');
         } else {
            #IF CHECKOUT LOADS FROM MY PURCHASES PAGE
            #INDER CONSTRUCTION
            $this->load->view('header',$data);
            $this->load->view('sidebar');
            $this->load->view('invoice');
            $this->load->view('footer');

         }
    }

    //PLACE ORDER
    public function place_order(){
        $this->user_auth_model->login_required();
        if ($this->input->post('place_order')!=NULL) {
            $data = $this->input->post();
            $data['csv_cart_items'] = explode(',', $data['csv_cart_items']);
            $res = $this->order_model->place_order((object)$data);
            print($res);   
        }
    }

    //LOAD LIST OF ORDERS
    public function list($value=''){
        
    }


}

