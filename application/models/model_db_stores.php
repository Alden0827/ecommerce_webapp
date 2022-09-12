
<?php
Class model_db_stores extends CI_Model{

   public function __construct(){
      parent::__construct();
      $this->load->database();
   }
   
   public function read($index = -1){
      if ($index == -1){
         $query = $this->db->select('*')
                           ->from('stores')
                           ->where(array('id' => $index))
                           ->get();
         return $query->result();
    
     }else{
         $query = $this->db->select('*')
                           ->from('stores')
                           ->where(array('id' => $index))
                           ->get();
         return $query->result();
     }
      
  }

   public function delete($index){
       $this->db->delete('stores', array('id' => $index));
       return $this->db->affected_rows();
   }
   
   public function delete_range($indexes){
       $this->db->where_in('id', $indexes)->delete('stores');
       return $this->db->affected_rows();
   }
   
   public function truncate($index){
       $this->db->query('truncate table stores;');
       return $this->db->affected_rows();
   }

   public function insert($array_value)
   {
       $this->db->insert('stores', $array_value);
       return $this->db->affected_rows();
   }

   public function update($array_value,$array_condition)
   {
       $this->db->update('stores', $array_value,$array_condition);
       return $this->db->affected_rows();
   }
}