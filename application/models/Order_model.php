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

		return $this->db->select('`master_checkout_charge_perc`,`sale_ex_tax_perc`,SUM(`is_invalid`) AS is_invalid,SUM(`sub_total`) AS cart_sub_total,SUM(`master_checkout_charge`) AS total_master_checkout_charge,SUM(`sales_ex_tax`) AS total_sales_ex_tax,SUM(`sub_total`) + SUM(`sales_ex_tax`) AS total_amount')
		->from('(SELECT

				      `configuration`.master_checkout_charge_perc
				    , `configuration`.sale_ex_tax_perc
				    , CASE WHEN `tbl_carts`.`qnt` > `tbl_items`.stock THEN 1 ELSE 0 END AS \'is_invalid\'
				    , `tbl_items`.`discount` AS discount
				    , (`tbl_items`.`unit_price` + (`tbl_items`.`unit_price` * `tbl_items`.`discount`)) * `tbl_carts`.`qnt` AS sub_total
				    , ((`tbl_items`.`unit_price` + (`tbl_items`.`unit_price` * `tbl_items`.`discount`)) * `tbl_carts`.`qnt`) * `configuration`.master_checkout_charge_perc AS master_checkout_charge
				    , ((`tbl_items`.`unit_price` + (`tbl_items`.`unit_price` * `tbl_items`.`discount`)) * `tbl_carts`.`qnt`) * `configuration`.sale_ex_tax_perc AS sales_ex_tax
				FROM
				    `tbl_carts`
				    INNER JOIN `tbl_items` 
					ON (`tbl_carts`.`upc` = `tbl_items`.`upc`)
				    INNER JOIN configuration
					ON (`configuration`.ID = 1)
				WHERE (`tbl_carts`.`cart_id` IN ('.implode(',', $data).'))) AS A')
		->group_by(array('`master_checkout_charge_perc`', '`sale_ex_tax_perc`'))
		->get();




// SELECT      `master_checkout_charge_perc`
// 	 , `sale_ex_tax_perc`
// 	 , SUM(`is_invalid`) AS is_invalid
// 	 , SUM(`sub_total`) AS cart_sub_total
// 	 , SUM(`master_checkout_charge`) AS total_master_checkout_charge
// 	 , SUM(`sales_ex_tax`) AS total_sales_ex_tax
// 	 , SUM(`sub_total`) + SUM(`sales_ex_tax`) AS total_amount
	
// 	FROM (
// 		SELECT

// 		      `configuration`.master_checkout_charge_perc
// 		    , `configuration`.sale_ex_tax_perc
// 		    , CASE WHEN `tbl_carts`.`qnt` > `tbl_items`.stock THEN 1 ELSE 0 END AS 'is_invalid'
// 		    , `tbl_items`.`discount` AS discount
// 		    , (`tbl_items`.`unit_price` + (`tbl_items`.`unit_price` * `tbl_items`.`discount`)) * `tbl_carts`.`qnt` AS sub_total
// 		    , ((`tbl_items`.`unit_price` + (`tbl_items`.`unit_price` * `tbl_items`.`discount`)) * `tbl_carts`.`qnt`) * `configuration`.master_checkout_charge_perc AS master_checkout_charge
// 		    , ((`tbl_items`.`unit_price` + (`tbl_items`.`unit_price` * `tbl_items`.`discount`)) * `tbl_carts`.`qnt`) * `configuration`.sale_ex_tax_perc AS sales_ex_tax
// 		FROM
// 		    `tbl_carts`
// 		    INNER JOIN `tbl_items` 
// 			ON (`tbl_carts`.`upc` = `tbl_items`.`upc`)
// 		    INNER JOIN configuration
// 			ON (`configuration`.ID = 1)
// 		WHERE (`tbl_carts`.`cart_id` IN (1,2,3,4,5))
// 	) AS A
	
// 	GROUP BY `master_checkout_charge_perc`, `sale_ex_tax_perc`;



   }

   public function place_order($data){
   		
	    /*MODEL VALIDATION*/
	    //1. CREATE TRANS
	    //2	   Check if stock is still available per items
	    //3.   INSERT ORDER DETAILS (EXCEPT PAYMENT_ID)
	    //4.   UPDATE CART AS ORDERED (fill order_id)
	    //5.   SUBTRACT QTY FROM ITEMS

		/
	    //Check if stock is still available per items
		$this->db->trans_start();	
	    $ordered_items = $this->get_ordered_items($data->csv_cart_items);
	    if ($ordered_items->result()[0]->is_invalid == 0) {

	    	// INSERT ORDER DETAILS (EXCEPT PAYMENT_ID)
			$this->db->insert('`tbl_orders`', $data);

// array('`shipment_id`' => 'shipment_id', '`date_posted`' => 'date_posted', '`date_due`' => 'date_due', '`cancelled`' => 'cancelled', '`ex_tax_rate`' => 'ex_tax_rate', '`master_charge_rate`' => 'master_charge_rate', '`ex_tax_fee`' => 'ex_tax_fee', '`master_charge_fee`' => 'master_charge_fee', '`shipment_fee`' => 'shipment_fee', '`Note`' => 'Note')
			
	    }else{
	    	echo "invalid";
	    }
		 $this->db->trans_rollback();
		 // $this->db->trans_complete();

	    
	   }

}

?>