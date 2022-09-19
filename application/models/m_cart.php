<?php
Class m_cart extends CI_Model{

   public function __construct(){
      parent::__construct();
      $this->load->database();
   }

   public function add($data){
      $this->db->insert('tbl_carts', $data);
      return $this->db->insert_id();
   }

   public function get($cart_id){
		return $this->db->select('`tbl_carts`.`cart_id`,`tbl_carts`.`upc`,`tbl_carts`.`qnt`,`tbl_carts`.`date_added`')
		->from('`tbl_items`')
		->join('`tbl_carts`', '(`tbl_items`.`upc` = `tbl_carts`.`upc`)')
		->group_start()
		->where('`tbl_carts`.`cart_id`', $cart_id)
		->group_end()
		->get()->result();

   	/*
		SELECT
		    `tbl_carts`.`cart_id`
		    , `tbl_carts`.`upc`
		    , `tbl_carts`.`qnt`
		    , `tbl_carts`.`date_added`
		FROM
		    `db_cidatabase`.`tbl_items`
		    INNER JOIN `db_cidatabase`.`tbl_carts` 
		        ON (`tbl_items`.`upc` = `tbl_carts`.`upc`)
		WHERE (`tbl_carts`.`cart_id` =3);
   	*/


   	  
   }
}

?>