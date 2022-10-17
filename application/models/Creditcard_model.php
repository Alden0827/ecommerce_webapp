
<?php
Class Creditcard_model extends CI_Model{

   public function __construct(){
      parent::__construct();
      $this->load->database();
      $this->load->model('user_auth_model');

   }

   public function delete($id){
   	   $this->db->delete('`tbl_cc_info`', array('id' => $id));
   	   return $this->db->affected_rows();
   }
   public function add($data){
   	   $data['login_oauth_uid'] = $this->user_auth_model->get_user_id();
   	   $this->db->insert('`tbl_cc_info`', $data);
   	   return $this->db->insert_id();
   }
   public function fetch_default(){
   		$login_oauth_uid = $this->user_auth_model->get_user_id();
   		$this->db->get_where('`tbl_cc_info`', array('`login_oauth_uid`' => $login_oauth_uid,'`default`' => 1));
   }
   public function fetch_all(){
         $login_oauth_uid = $this->user_auth_model->get_user_id();
         $this->db->get_where('`tbl_cc_info`', array('`login_oauth_uid`' => $login_oauth_uid));
   }
   public function fetch($cc_id){
         $login_oauth_uid = $this->user_auth_model->get_user_id();
         $this->db->get_where('`tbl_cc_info`', array('`login_oauth_uid`' => $login_oauth_uid, '`id`' => $cc_id))->result();
   }



}

?>

