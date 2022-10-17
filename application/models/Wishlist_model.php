<?php
Class Wishlist_model extends CI_Model{

   public function __construct(){
      parent::__construct();
      $this->load->database();
      $this->load->model('user_auth_model');
      $this->load->model('item_model');
   }

   public function remove($wl_id){
   		$this->db->delete('tbl_wishlist', array('wl_id' => $wl_id));
   		
   }

   public function add($data){
	   	$login_oauth_uid = $this->user_auth_model->get_user_id();
	   	$upc = $data['upc'];

	   	//check if exists
	   	$is_exists = $this->db->select('wl_id')
	   				->where(array('upc' => $upc,'login_oauth_uid' => $login_oauth_uid))
	   				->get('`tbl_wishlist`')->num_rows();

		//if not exists
		if ($is_exists == 0){
			return $this->db->insert('tbl_wishlist', $data);
		} else {
			return 0;
		}

   }

   public function fetch_all(){
   		$login_oauth_uid = $this->user_auth_model->get_user_id();

		return $this->db->select('`tbl_wishlist`.`wl_id`,`tbl_items`.`item_caption`,`tbl_items`.`item_desc`,`lib_item_category`.`category`,`tbl_items`.`unit_price`,`tbl_items`.`stock`,`tbl_items`.`is_bidding`,`tbl_items`.`discount`,`tbl_items`.`unit_price` - (`tbl_items`.`unit_price` * `tbl_items`.`discount`) AS discounted_price,`tbl_items`.`brand`,`tbl_items`.`upc`,`tbl_wishlist`.`login_oauth_uid`,`tbl_wishlist`.`date_added`')
			->from('`tbl_items`')
			->join('`tbl_wishlist`', '(`tbl_items`.`upc` = `tbl_wishlist`.`upc`)')
			->join('`lib_item_category`', '(`lib_item_category`.`cat_id` = `tbl_items`.`cat_id`)')
			->group_start()
			->where('`tbl_items`.`is_bidding`', 0)
			->where('`tbl_wishlist`.`login_oauth_uid`', $login_oauth_uid)
			->group_end()
			->get()->result();

			// SELECT
			//     `tbl_wishlist`.`wl_id`
			//     , `tbl_items`.`item_caption`
			//     , `tbl_items`.`item_desc`
			//     , `lib_item_category`.`category`
			//     , `tbl_items`.`unit_price`
			//     , `tbl_items`.`stock`
			//     , `tbl_items`.`is_bidding`
			//     , `tbl_items`.`discount`
			//     , `tbl_items`.`unit_price` - (`tbl_items`.`unit_price` * `tbl_items`.`discount`) AS discounted_price
			//     , `tbl_items`.`brand`
			//     , `tbl_items`.`upc`
			//     , `tbl_wishlist`.`login_oauth_uid`
			//     , `tbl_wishlist`.`date_added`
			// FROM
			//     `tbl_items`
			//     INNER JOIN `tbl_wishlist` 
			//         ON (`tbl_items`.`upc` = `tbl_wishlist`.`upc`)
			//     INNER JOIN `lib_item_category` 
			//         ON (`lib_item_category`.`cat_id` = `tbl_items`.`cat_id`)
			// WHERE (`tbl_items`.`is_bidding` = 0
			//     AND `tbl_wishlist`.`login_oauth_uid` ='104643403242055778893');

   }
}

?>