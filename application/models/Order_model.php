<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Order_model extends CI_Model{

   public function __construct(){
      parent::__construct();
      $this->load->database();
      $this->load->model('user_auth_model');
      $this->load->model('cart_model');
   }

   public function get_ordered_items($data){

		return $this->db->select('`master_checkout_charge_perc`,`sale_ex_tax_perc`,SUM(`is_invalid`) AS is_invalid,SUM(`sub_total`) AS cart_sub_total,SUM(`courier_fee`) AS total_courier_charge,SUM(`master_checkout_charge`) AS total_master_checkout_charge,SUM(`sales_ex_tax`) AS total_sales_ex_tax,SUM(`sub_total`) + SUM(`sales_ex_tax`) + SUM(`master_checkout_charge`) AS total_amount')
			->from('(SELECT

			 		      `configuration`.master_checkout_charge_perc
			 		    , `configuration`.sale_ex_tax_perc
			 		    , CASE WHEN `tbl_carts`.`qnt` > `tbl_items`.stock THEN 1 ELSE 0 END AS \'is_invalid\'
			 		    ,  `tbl_items`.`discount` AS discount
			 		    ,  `tbl_courier`.`courier_fee`
			 		    , (`tbl_items`.`unit_price` + (`tbl_items`.`unit_price` * `tbl_items`.`discount`)) * `tbl_carts`.`qnt` AS sub_total
			 		    , ((`tbl_items`.`unit_price` + (`tbl_items`.`unit_price` * `tbl_items`.`discount`)) * `tbl_carts`.`qnt`) * `configuration`.master_checkout_charge_perc AS master_checkout_charge
			 		    , ((`tbl_items`.`unit_price` + (`tbl_items`.`unit_price` * `tbl_items`.`discount`)) * `tbl_carts`.`qnt`) * `configuration`.sale_ex_tax_perc AS sales_ex_tax
			 		FROM
			 		    `tbl_carts`
			 		    INNER JOIN `tbl_items` 
			 			ON (`tbl_carts`.`upc` = `tbl_items`.`upc`)
			 		    INNER JOIN configuration
			 			ON (`configuration`.ID = 1)
			 		    INNER JOIN `tbl_courier`
			 			ON (`tbl_courier`.`id` = `tbl_items`.`courier_id`)
			 		WHERE (`tbl_carts`.`cart_id` IN ('.implode(',', $data).'))) AS A')
			->group_by(array('`master_checkout_charge_perc`', '`sale_ex_tax_perc`'))
			->get();

			 // SELECT      `master_checkout_charge_perc`
			 // 	 , `sale_ex_tax_perc`
			 // 	 , SUM(`is_invalid`) AS is_invalid
			 // 	 , SUM(`sub_total`) AS cart_sub_total
			 // 	 , SUM(`courier_fee`) AS total_courier_charge
			 // 	 , SUM(`master_checkout_charge`) AS total_master_checkout_charge
			 // 	 , SUM(`sales_ex_tax`) AS total_sales_ex_tax
			 // 	 , SUM(`sub_total`) + SUM(`sales_ex_tax`) + SUM(`master_checkout_charge`) AS total_amount
			 // 	FROM (
			 // 		SELECT
			 // 		      `configuration`.master_checkout_charge_perc
			 // 		    , `configuration`.sale_ex_tax_perc
			 // 		    , CASE WHEN `tbl_carts`.`qnt` > `tbl_items`.stock THEN 1 ELSE 0 END AS 'is_invalid'
			 // 		    ,  `tbl_items`.`discount` AS discount
			 // 		    ,  `tbl_courier`.`courier_fee`
			 // 		    , (`tbl_items`.`unit_price` + (`tbl_items`.`unit_price` * `tbl_items`.`discount`)) * `tbl_carts`.`qnt` AS sub_total
			 // 		    , ((`tbl_items`.`unit_price` + (`tbl_items`.`unit_price` * `tbl_items`.`discount`)) * `tbl_carts`.`qnt`) * `configuration`.master_checkout_charge_perc AS master_checkout_charge
			 // 		    , ((`tbl_items`.`unit_price` + (`tbl_items`.`unit_price` * `tbl_items`.`discount`)) * `tbl_carts`.`qnt`) * `configuration`.sale_ex_tax_perc AS sales_ex_tax
			 // 		FROM
			 // 		    `tbl_carts`
			 // 		    INNER JOIN `tbl_items` 
			 // 			ON (`tbl_carts`.`upc` = `tbl_items`.`upc`)
			 // 		    INNER JOIN configuration
			 // 			ON (`configuration`.ID = 1)
			 // 		    INNER JOIN `tbl_courier`
			 // 			ON (`tbl_courier`.`id` = `tbl_items`.`courier_id`)
			 // 		WHERE (`tbl_carts`.`cart_id` IN (1,2,3,4,5))
			 // 	) AS A
			 // 	GROUP BY `master_checkout_charge_perc`, `sale_ex_tax_perc`;

   }

   public function place_order($data){
   			
		try {

		    //Check if stock is still available per items
			$this->db->trans_start();	
	   		$order_data = $this->get_ordered_items($data->csv_cart_items);
	   		$order_data = ((object) $order_data)->result()[0];
	   		$cur_date = date('Y-m-d h-i-s');



		    if ($order_data->is_invalid == 0) {
				$tbl_order_data = 	array(		'shipment_id' 			=> $data->shipment_id, 
												'date_posted' 		=> $cur_date, 
												'date_due' 			=> date('Y-m-d H:i:s', strtotime('+1 day')), 
												'ex_tax_rate' 		=> $order_data->sale_ex_tax_perc, 
												'master_charge_rate' 	=> $order_data->master_checkout_charge_perc, 
												'ex_tax_fee' 			=> $order_data->total_sales_ex_tax, 
												'master_charge_fee' 	=> $order_data->total_master_checkout_charge, 
												'shipment_fee' 		=> $order_data->total_courier_charge, 
												'Note' 				=> $data->message);
				

		    	// INSERT ORDER DETAILS (EXCEPT PAYMENT_ID)
				$this->db->insert('`tbl_orders`', $tbl_order_data);
				$order_id = $this->db->insert_id();
				if ($order_id > 0) {
					
					// UPDATE CART AS ORDERED (fill order_id)
					$this->db->where_in('`cart_id`', $data->csv_cart_items)
					->set('`order_id`', $order_id)
					->update('`tbl_carts`');
					
					// SUBTRACT QTY FROM ITEMS
					$this->db->query('
					UPDATE `tbl_carts`  , `tbl_items` 
					 	INNER JOIN `tbl_carts` t1 ON (`tbl_items`.`upc` = t1.`upc`)
					SET `tbl_items`.`stock` = `tbl_items`.`stock` - t1.`qnt`
					WHERE (t1.`order_id` = ? );
					',[$order_id]);
				}

		    }else{
		    	print('cust-error: One of the items you want to buy is out of stock! Please go to cart and review your items.');
		    	$this->db->trans_rollback();
		    }
			 $this->db->trans_complete();
			 // $this->db->trans_rollback();
			 print('cust-msg: Success')	;			
		} catch (Exception $e) {
			$this->db->trans_rollback();
			print('cust-error: Unidentified error occured!');
		}	//try	

	} 


}

?>