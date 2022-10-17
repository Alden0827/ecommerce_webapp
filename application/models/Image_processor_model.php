<?php
Class Image_processor_model extends CI_Model{

   public function __construct(){
      parent::__construct();
   }

   public function crate_thumbs($filename){
      // if(!is_dir(site_url("uploads/items/$upc"))) mkdir("uploads/items/$upc", 0777, TRUE);
      // if(!is_dir(site_url("uploads/items/$upc/thumbs"))) mkdir("uploads/items/$upc/thumbs", 0777, TRUE);

      $source_path = FCPATH."uploads/items/$filename";
      $target_path = FCPATH."uploads/items/thumbs/";
      print("$source_path <br>");
      $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          'create_thumb' => TRUE,
          'thumb_marker' => '_thumb',
          'width' => 150,
          'height' => 150
      );
      $this->load->library('image_lib');
      $this->image_lib->clear();
      $this->image_lib->initialize($config_manip);
      if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
      }
      
   }
}

?>