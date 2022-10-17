<?php
Class library_model extends CI_Model{

   public function __construct(){
      parent::__construct();
      $this->load->database();
   }

   public function get_product_categories(){
      return $this->db->get('lib_item_category');
   }

   public function get_category_by_id($cat_id){
   	  return $this->db->select('category')
						->where(array('cat_id' => $cat_id))
						->get('`lib_item_category`')->result()[0]->category;
   }
}

?>