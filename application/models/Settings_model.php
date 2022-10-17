<?php
Class Settings_model extends CI_Model{

   public function __construct(){
      parent::__construct();
      $this->load->database();
   }

   public function get_tax_rate(){
   	   return $this->db->get('`configuration`', 1)->result();
   }


}

?>