
<?php
Class item_model extends CI_Model{
   public function __construct(){
      parent::__construct();
      $this->load->database();
   }
   
   public function get_detail($uid){
      return $this->db->select('*')->from('tbl_items')->where(array('upc' => $uid))->get();
   }

   public function item_add($data){
      $this->db->insert('tbl_items', $data);
      return $this->db->affected_rows(); // $this->db->insert_id();
   }

   public function get_available_stock($upc){
      $stock = $this->db->select('stock')->where(array('upc' => $upc))->get('tbl_items');
      return $stock->row()->stock;
   }

}



