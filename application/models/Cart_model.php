<?php
Class cart_model extends CI_Model{

   public function __construct(){
      parent::__construct();
      $this->load->database();
      $this->load->model('user_auth_model');
      $this->load->model('item_model');
   }

   public function add($data){
   	$login_oauth_uid = $this->user_auth_model->get_user_id();
   	$upc = $data['upc'];
   	//check if exists
   	$cart_stock = $this->db->get_where('tbl_carts', array('upc' => $upc,'login_oauth_uid' => $login_oauth_uid));
   	$available_stock = $this->item_model->get_available_stock($upc);

		//if exists
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
   	// return  $this->db->get_where('tbl_carts', array('login_oauth_uid' => $this->user_auth_model->get_user_id()))->result();

		return $this->db->select('`tbl_carts`.cart_id,`tbl_items`.`stock`,`tbl_carts`.`upc`,`tbl_items`.`brand`,`tbl_items`.item_caption,`tbl_items`.item_desc,`tbl_items`.discount,`tbl_items`.unit_price,`tbl_carts`.`qnt`,(`tbl_items`.unit_price) * (1-`tbl_items`.discount) AS discounted_unit_price,(`tbl_carts`.`qnt` * `tbl_items`.unit_price) * (1-`tbl_items`.discount) AS total')
		->from('`tbl_items`')
		->join('`tbl_carts`', '(`tbl_items`.`upc` = `tbl_carts`.`upc`)')
		->group_start()
		->where('`tbl_carts`.`login_oauth_uid`',  $this->user_auth_model->get_user_id())
		->group_end()
		->get()->result();

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