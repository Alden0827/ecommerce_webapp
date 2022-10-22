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
            $shipment_info = $this->shipment_model->fetch_default()[0];
            $data['shipment_info'] = $shipment_info;

            //get checked-out items
            $selected_items = $chkout_items['cart_id'];
            $data['cart_entries'] = $this->cart_model->get_cart_entries($selected_items);
            $csv_cart_items = implode(',',$selected_items);
            $data['csv_cart_items'] = $csv_cart_items;
            
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

            $data['action_container'] = "
                <div class=\"row no-print\" id=\"place_order_controller\">
                  <input type=\"hidden\" name=\"\" id=\"csv_cart_items\" value=\" $csv_cart_items\">
                  <input type=\"hidden\" name=\"\" id=\"shipment_id\" value=\"$shipment_info->id;\">
                  <div class=\" \">
                    &nbsp;&nbsp;&nbsp;<button class=\"btn btn-success pull-right\" id=\"btn_place_order\"><i class=\"fa fa-credit-card\"></i> PLACE ORDER</button>
                  </div>
                </div>
            ";


            $this->load->view('header',$data);
            $this->load->view('sidebar');
            $this->load->view('invoice');
            $this->load->view('footer');
             $this->load->view('js/place_order');

         } else {
            #IF CHECKOUT LOADS FROM MY PURCHASES PAGE
            #INDER CONSTRUCTION
            $order_id = $this->input->post()['order_id'];
            $order_info = (object) $this->order_model->get_order_by_id($order_id)[0];
            $data['shipment_info'] = $this->shipment_model->fetch_by_id($order_info->shipment_id)[0];
            $data['cart_entries'] = $this->order_model->get_order_detail($order_id);

            // print('<pre>');
            // print_r($data['cart_entries']);
            // print('</pre>');


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

            $data['csv_cart_items'] = "";

            // print('place order clicked!');

             $data['action_container'] = "
                       <div class=\"row no-print \" id=\"post_payment_container\">
                        <div class=\" \">
                          <button class=\"btn btn-default\" onclick=\"window.print();\"><i class=\"fa fa-print\"></i> Print</button>
                          <button 
                            class=\"btn btn-success pull-right\" 
                            data-toggle=\"modal\" 
                            data-target=\".payment_modal\"
                            data-backdrop=\"static\" 
                            data-keyboard=\"false\"
                            >
                            <i class=\"fa fa-credit-card\" id=\"submit_payment\"></i> Submit Payment
                          </button>
                          <button class=\"btn btn-primary pull-right\" style=\"margin-right: 5px;\" id=\"gen_pdf\"><i class=\"fa fa-download\"></i> Generate PDF</button>
                        </div>
                      </div>


                          <!-- Payment modal -->
                            <div class='modal fade payment_modal' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
                              <div class='modal-dialog modal-lg' style='max-width: 80% !important;'>
                                <div class='modal-content'>
                                  
                                      <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabel'>PAYMENT OPTION</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                          <span aria-hidden='true'>&times;</span>
                                        </button>
                                      </div>
                                      <div class='modal-body'>
                                         <div class='payment-cards'>
                                           <h2 class='header'>
                                              SELECT PAYMENT OPTIONS
                                           </h2>
                                           <div class='card-services'>


                                              <div class='card-content card-content-2'>
                                                 <div class='fab fa-cc-amex'></div>
                                                 <h3>
                                                    American Express
                                                 </h3>
                                                 <p>
                                                    Don't Leave Home Without Them
                                                 </p>
                                                 <a href='#' id='mop' pid='3'>Pay with<br>AmEx</a>
                                              </div>

                                              <div class='card-content card-content-2'>
                                                 <div class='fab fa-cc-discover'></div>
                                                 <h3>
                                                    Discover
                                                 </h3>
                                                 <p>
                                                    It pays to Discover
                                                 </p>
                                                 <a href='#' id='mop' pid='4'>Pay with<br>Discord</a>
                                              </div>

                                              <div class='card-content card-content-2'>
                                                 <div class='fab fa-cc-visa'></div>
                                                 <h3>
                                                    Visa
                                                 </h3>
                                                 <p>
                                                    Trust, Security, Acceptance, and Inclusion.
                                                 </p>
                                                 <a href='#' id='mop' pid='1'>Pay with<br>Visa</a>
                                              </div>
                                              <div class='card-content card-content-2'>
                                                 <div class='fab fa-cc-mastercard'></div>
                                                 <h3>
                                                    Mastercard
                                                 </h3>
                                                 <p>
                                                    There are some things money can't buy. For everything else there's Mastercard.
                                                 </p>
                                                 <a href='#' id='mop' pid='2'>Pay with<br>Mastercard</a>
                                              </div>
                                              <div class='card-content card-content-2'>
                                                 <div class='fab fa-cc-paypal'></div>
                                                 <h3>
                                                    PAYPAL
                                                 </h3>
                                                 <p>
                                                    We put people at the center of everything we do.
                                                 </p>
                                                 <a href='#' id='mop' pid='0'>Pay with<br>Paypal</a>
                                              </div>
                                           </div>
                                        </div>


                                      </div>
                                      <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                                      </div>

                                </div>
                              </div>
                            </div> <!-- payment modal -->


             ";

            $this->load->view('header',$data);
            $this->load->view('sidebar');
            $this->load->view('invoice');
            $this->load->view('footer');
            $this->load->view('js/order_payment');


           
          
         }
    }

    //PLACE ORDER
    public function place_order(){
        $this->user_auth_model->login_required();
        if ($this->input->post('place_order')!=NULL) {
            $data = $this->input->post();
            $data['csv_cart_items'] = explode(',', $data['csv_cart_items']);
            return $this->order_model->place_order((object)$data);

        }
    }

    //LOAD LIST OF ORDERS
    public function list(){
        $this->user_auth_model->login_required();
        $login_oauth_uid = $this->user_auth_model->get_user_id();
        $data['item_categories'] = $this->library_model->get_product_categories();
        $data['order_listing'] = $this->order_model->get_order_listing($login_oauth_uid);
        // print_r($data['order_listing']->result());
        // print_r($this->db->last_query());
        $this->load->view('header',$data);
        $this->load->view('sidebar');
        $this->load->view('order_listing');
        $this->load->view('footer');
    }

    //PAYMENT
    public function payment(){
       $this->user_auth_model->login_required();
       $data = $this->input->post();

       print_r($data);
    }

}



