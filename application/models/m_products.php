
<?php
Class m_products extends CI_Model{
   public function __construct(){
      parent::__construct();
      $this->load->database();
   }
   
   public function get_posted_items(){
         return $this->db->select('*')
                         ->from('tbl_items')
                         ->where('is_posted', 1)
                         ->order_by('date_posted DESC')
                         ->get()->result();
   }

   public function get_items_by_store($store_id){
         return $this->db->select('*')
                         ->from('tbl_items')
                         ->where('store_id', $store_id)
                         ->get()->result();
   }

   public function get_detail($uid){
      return $this->db->select('*')->from('tbl_items')->where(array('upc' => $uid))->get();
   }

   public function item_add($data){
      $this->db->insert('tbl_items', $data);
      return $this->db->insert_id();
   }


}



