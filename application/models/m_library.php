<?php
Class m_library extends CI_Model{

   public function __construct(){
      parent::__construct();
      $this->load->database();
   }

   public function get_product_categories(){
      return $this->db->get('lib_item_category');
   }
}

?>