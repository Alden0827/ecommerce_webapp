
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
                         ->get();

   }
   // public function get_id_by_uid($uid){
   //    $item_id = $this->db->select('*')
   //             ->from('tbl_items')
   //             ->where('uid', '5ea4cfaa-f7dc-4a15-9acf-c9757192ebb1')
   //             ->get();
   
   //    return $item_id;
   // }
   public function get_detail($uid){

         $res_product = $this->db->select('*')->from('tbl_items')->where(array('uid' => $uid))->get();
         // $res_images = $this->db->select('*')->from('images')->where(array('item_id' => $item_id))->get();
         // $res_default = $this->db->select('*')->from('images')->where(array('item_id' => 0))->get();
        
         // if ($res_images->num_rows() > 0) {
         //    $res_images = $res_images->result_array()[0];
         //    $res_product['images'] = $res_images;
         // }else{
         //    $res_default = $res_default->result_array()[0];
         //    $res_product['images'] = $res_default;
         // }

       return $res_product;
        
   }



}



