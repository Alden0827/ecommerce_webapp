<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
class Seller_center extends CI_Controller {
	public function index()
	{
		$this->load->view('header_sc');
		$this->load->view('sidebar_sc');
		$this->load->view('seller_center');
		$this->load->view('footer_sc');
	}
}
