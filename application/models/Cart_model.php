<?php
Class Cart_model extends CI_Model{

   public function __construct(){
      parent::__construct();
      $this->load->database();
      $this->load->model('user_auth_model');
      $this->load->model('item_model');
   }

   public function delete($cart_id){
   	$this->db->delete('tbl_carts', array('cart_id' => $cart_id));
   }

   public function updateqty($cart_id,$cart_item_qty){

   	//get available stock
   	$upc = $this->db->select('upc')->where(array('cart_id' => $cart_id))->get('tbl_carts')->row()->upc;
   	$available_stock = $this->item_model->get_available_stock($upc);

   	if ($cart_item_qty > $available_stock) {
				return $this->db->update('tbl_carts', array('qnt' => $available_stock), array('cart_id' => $cart_id)) ;   		
   	}else{
				return $this->db->update('tbl_carts', array('qnt' => $cart_item_qty), array('cart_id' => $cart_id)) ;   		
		}

   }

   public function add($data){
   	$login_oauth_uid = $this->user_auth_model->get_user_id();
   	$upc = $data['upc'];

   	//check if exists
   	$cart_stock = $this->db->get_where('tbl_carts', array('upc' => $upc,'login_oauth_uid' => $login_oauth_uid, 'order_id' => 0));
   	$available_stock = $this->item_model->get_available_stock($upc);

		//if not exists
		if ($cart_stock->num_rows() == 0){
   		$this->db->insert('tbl_carts', $data);
		}else{
			$cart_item_qty = $cart_stock->row()->qnt;
			if ($cart_item_qty < $available_stock) {
				$this->db->where('upc', $upc)
							->where('login_oauth_uid', $login_oauth_uid)
							->set('qnt', $cart_item_qty+1)
							->update('tbl_carts');				
			}
		}

		$res = $this->db->select('cart_id')->where(array('upc' => $upc,'login_oauth_uid' => $login_oauth_uid))->get('tbl_carts');
		return $res->row()->cart_id;
   }

   public function get_cart_entries($data){
   		// print($data);
   		return $this->db->select('
   			 `tbl_carts`.`qnt`
   			,`tbl_items`.stock
   			,CASE WHEN `tbl_carts`.`qnt` > `tbl_items`.stock THEN 1 ELSE 0 END AS \'is_valid\'
   			,`tbl_items`.`item_caption`
   			,`tbl_items`.`item_desc`
   			,`tbl_carts`.`upc`
   			,`tbl_items`.`unit_price`
   			,`tbl_courier`.`courier_fee`
   			,`tbl_items`.`unit_price` + (`tbl_items`.`unit_price` * `tbl_items`.`discount`) AS discounted_unit_price
   			,`tbl_courier`.`courier_fee` + (`tbl_items`.`unit_price` + (`tbl_items`.`unit_price` * `tbl_items`.`discount`)) * `tbl_carts`.`qnt` AS sub_total'
   			)
			->from('`tbl_carts`')
			->join('`tbl_items`', '(`tbl_carts`.`upc` = `tbl_items`.`upc`)')
			->join('`tbl_courier`', '(`tbl_courier`.`id`  = `tbl_items`.`courier_id`)')
			->group_start()
			->where_in('`tbl_carts`.`cart_id`',$data)
			->group_end()
			->order_by('`tbl_carts`.`cart_id` ASC')
			->get()->result();

			 // SELECT
			 //       `tbl_carts`.`qnt`
			 //     , `tbl_items`.stock
			 //     , CASE WHEN `tbl_carts`.`qnt` > `tbl_items`.stock THEN 1 ELSE 0 END AS 'is_valid'
			 //     , `tbl_items`.`item_caption`
			 //     , `tbl_items`.`item_desc`
			 //     , `tbl_carts`.`upc`
			 //     , `tbl_items`.`unit_price`
			 //     , `tbl_courier`.`courier_fee`
			 //     , `tbl_items`.`unit_price` + (`tbl_items`.`unit_price` * `tbl_items`.`discount`) AS discounted_unit_price
			 //     , `tbl_courier`.`courier_fee` + (`tbl_items`.`unit_price` + (`tbl_items`.`unit_price` * `tbl_items`.`discount`)) * `tbl_carts`.`qnt` AS sub_total
			 // FROM
			 //     `tbl_carts`
			 //     INNER JOIN `tbl_items` 
			 //         ON (`tbl_carts`.`upc` = `tbl_items`.`upc`)
			 //     INNER JOIN `tbl_courier` 
			 //         ON (`tbl_courier`.`id`  = `tbl_items`.`courier_id`)
			 // WHERE (`tbl_carts`.`cart_id` IN (1,2,3,4,5))
			 // ORDER BY `tbl_carts`.`cart_id` ASC;
   }

   public function get($cart_id){
		$result = $this->db->select('`tbl_items`.`upc`,`tbl_items`.`item_caption`')
		->from('`tbl_items`')
		->join('`tbl_carts`', '(`tbl_items`.`upc` = `tbl_carts`.`upc`)')
		->group_start()
		->where('`tbl_carts`.`cart_id`', $cart_id)
		->group_end()
		->get()->result_array();
		return $result;
   }

   public function getall(){


  		return $this->db->select('`tbl_carts`.cart_id,`tbl_items`.`stock`,`tbl_carts`.`upc`,`tbl_items`.`brand`,`tbl_items`.item_caption,`tbl_items`.item_desc,`tbl_items`.discount,`tbl_items`.unit_price,`tbl_carts`.`qnt`,(`tbl_items`.unit_price) * (1-`tbl_items`.discount) AS discounted_unit_price,(`tbl_carts`.`qnt` * `tbl_items`.unit_price) * (1-`tbl_items`.discount) AS total')
		->from('`tbl_items`')
		->join('`tbl_carts`', '(`tbl_items`.`upc` = `tbl_carts`.`upc`)')
		->group_start()
		->where(array('`tbl_carts`.`login_oauth_uid`' => $this->user_auth_model->get_user_id(),'`tbl_carts`.order_id' => 0))
		->group_end()
		->get()->result();



  		// return $this->db->select('`tbl_carts`.cart_id,`tbl_carts`.`upc`,`tbl_items`.`brand`,`tbl_items`.item_caption,`tbl_items`.item_desc,`tbl_items`.discount,`tbl_items`.unit_price,`tbl_carts`.`qnt`,(`tbl_items`.unit_price) * (1-`tbl_items`.discount) AS discounted_unit_price,(`tbl_carts`.`qnt` * `tbl_items`.unit_price) * (1-`tbl_items`.discount) AS total')
				// 	->from('`tbl_items`')
				// 	->join('`tbl_carts`', '(`tbl_items`.`upc` = `tbl_carts`.`upc`)')
				// 	->where(array('`tbl_carts`.`login_oauth_uid`' => $this->user_auth_model->get_user_id(),'`tbl_carts`.order_id' => 0))
				// 	->get()->result();


		// SELECT
		//       `tbl_carts`.cart_id
		//     , `tbl_carts`.`upc`
		//     , `tbl_items`.`brand`
		//     , `tbl_items`.item_caption
		//     , `tbl_items`.item_desc
		//     , `tbl_items`.discount
		//     , `tbl_items`.unit_price
		//     , `tbl_carts`.`qnt`
		//     , (`tbl_items`.unit_price) * (1-`tbl_items`.discount) AS discounted_unit_price
		//     , (`tbl_carts`.`qnt` * `tbl_items`.unit_price) * (1-`tbl_items`.discount) AS total
		// FROM
		//     `tbl_items`
		//     INNER JOIN `tbl_carts` 
		//         ON (`tbl_items`.`upc` = `tbl_carts`.`upc`)
		// WHERE (`tbl_carts`.`login_oauth_uid` = '104643403242055778893');

   }
}

?>