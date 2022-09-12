
<?php
Class model_users extends CI_Model{

   public function __construct(){
      parent::__construct();
      $this->load->database();
   }
   
   public function login($index){
       $this->db->delete('users', array('id' => $index));
       return $this->db->affected_rows();
   }

}