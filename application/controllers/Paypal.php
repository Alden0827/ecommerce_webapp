<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Paypal extends CI_Controller{ 
     
     function  __construct(){ 
        parent::__construct(); 
         
        // Load paypal library 
        $this->load->library('paypal_lib'); 
         
        // Load product model 
        // $this->load->model('product'); 
         
        // Load payment model 
        $this->load->model('payment'); 
     } 
      
    function success(){ 
        // Get the transaction data 
        // $paypalInfo = $this->input->get(); 
        $paypalInfo = $this->input->post(); 
        print('<pre>');
        print_r( $paypalInfo);
        print('</pre>');

        //CHECK IF PAYMENT IS COMPLETED OR NOT
        if ($paypalInfo['payment_status'] === 'Completed') {
            $payer_email = $paypalInfo['payer_email'];
            $payer_id = $paypalInfo['payer_id'];
            $payer_status = $paypalInfo['payer_status'];
            $first_name = $paypalInfo['first_name'];
            $last_name = $paypalInfo['last_name'];
            $address_name = $paypalInfo['address_name'];
            $address_street = $paypalInfo['address_street'];
            $address_city = $paypalInfo['address_city'];
            $address_state = $paypalInfo['address_state'];
            $address_country_code = $paypalInfo['address_country_code'];
            $address_zip = $paypalInfo['address_zip'];
            $residence_country = $paypalInfo['residence_country'];
            $txn_id = $paypalInfo['txn_id'];
            $mc_currency = $paypalInfo['mc_currency'];
            $mc_fee = $paypalInfo['mc_fee'];
            $mc_gross = $paypalInfo['mc_gross'];
            $protection_eligibility = $paypalInfo['protection_eligibility'];
            $payment_fee = $paypalInfo['payment_fee'];
            $payment_gross = $paypalInfo['payment_gross'];
            $payment_status = $paypalInfo['payment_status'];
            $payment_type = $paypalInfo['payment_type'];
            $handling_amount = $paypalInfo['handling_amount'];
            $shipping = $paypalInfo['shipping'];
            $order_id = $paypalInfo['item_name'];
            $item_number = $paypalInfo['item_number'];
            $quantity = $paypalInfo['quantity'];
            $txn_type = $paypalInfo['txn_type'];
            $payment_date = $paypalInfo['payment_date'];
            $receiver_id = $paypalInfo['receiver_id'];
            $notify_version = $paypalInfo['notify_version'];
            $custom = $paypalInfo['custom'];
            $verify_sign = $paypalInfo['verify_sign'];
        }




        // $productData = $paymentData = array(); 
        // if(!empty($paypalInfo['item_number']) && !empty($paypalInfo['tx']) && !empty($paypalInfo['amt']) && !empty($paypalInfo['cc']) && !empty($paypalInfo['st'])){ 
        //     $item_name = $paypalInfo['item_name']; 
        //     $item_number = $paypalInfo['item_number']; 
        //     $txn_id = $paypalInfo["tx"]; 
        //     $payment_amt = $paypalInfo["amt"]; 
        //     $currency_code = $paypalInfo["cc"]; 
        //     $status = $paypalInfo["st"]; 
        //     // print_r($paypalInfo);


        //     // // Get product info from the database 
        //     // $productData = $this->product->getRows($item_number); 
             
        //     // // Check if transaction data exists with the same TXN ID 
        //     // $paymentData = $this->payment->getPayment(array('txn_id' => $txn_id)); 
        // } 
         
        // Pass the transaction data to view 
        // $data['product'] = $productData; 
        // $data['payment'] = $paymentData; 
        // $this->load->view('paypal/success', $data); 

    } 
      
     function cancel(){ 
        // Load payment failed view 
        $this->load->view('paypal/cancel'); 
     } 
      
    function ipn(){ 
        // Retrieve transaction data from PayPal IPN POST 
        $paypalInfo = $this->input->post(); 
         
        if(!empty($paypalInfo)){ 
            // Validate and get the ipn response 
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo); 
 
            // Check whether the transaction is valid 
            if($ipnCheck){ 
                // Check whether the transaction data is exists 
                $prevPayment = $this->payment->getPayment(array('txn_id' => $paypalInfo["txn_id"])); 
                if(!$prevPayment){ 
                    // Insert the transaction data in the database 
                    $data['user_id']    = $paypalInfo["custom"]; 
                    $data['product_id']    = $paypalInfo["item_number"]; 
                    $data['txn_id']    = $paypalInfo["txn_id"]; 
                    $data['payment_gross']    = $paypalInfo["mc_gross"]; 
                    $data['currency_code']    = $paypalInfo["mc_currency"]; 
                    $data['payer_name']    = trim($paypalInfo["first_name"].' '.$paypalInfo["last_name"], ' '); 
                    $data['payer_email']    = $paypalInfo["payer_email"]; 
                    $data['status'] = $paypalInfo["payment_status"]; 
     
                    $this->payment->insertTransaction($data); 
                } 
            } 
        } 
    } 
}