
<?php
Class m_products extends CI_Model{
   public function __construct(){
      parent::__construct();
      $this->load->database();
   }
   
   public function get_posted_items(){
         return $this->db->select('*')
                         ->from('tbl_items')
                         ->where('status_id', 1) //posted
                         ->order_by('status_change_date DESC')
                         ->get()->result();
   }

   public function get_items_by_store($store_id){
         //not store_id = google_login_auth_uid
         return $this->db->select('`tbl_items`.*,`lib_item_category`.`category`')
                           ->from('`tbl_items`')
                           ->join('`lib_item_category`', '(`tbl_items`.`cat_id` = `lib_item_category`.`cat_id`)')
                           ->join('`store_info`', '(`store_info`.`store_id` = `tbl_items`.`store_id`)')
                           ->group_start()
                           ->where('`store_info`.`store_id`', $store_id)
                           ->group_end()
                           ->get();
   }

   public function get_detail($uid){
      return $this->db->select('*')->from('tbl_items')->where(array('upc' => $uid))->get();
   }

   public function item_add($data){
      $this->db->insert('tbl_items', $data);
      return $this->db->insert_id();
   }


}



