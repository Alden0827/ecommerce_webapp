<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller {
	public function index()
	{
		$this->load->model('model_users');
		$res = $this->model_users->read();
		$data['dataset'] = $res;

		$this->load->view('category',$data);
	}
}
