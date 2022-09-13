<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller {
	public function index()
	{
		$this->load->model('model_users');
		$res = $this->model_users->read();
		$data['dataset'] = $res;
		$this->load->view('category',$data);
	}
	public function category()
	{
		// $this->load->model('model_users');
		// $res = $this->model_users->read();
		// $data['dataset'] = $res;

		$this->load->view('category');
	}
	public function detail($uid)
	{
		$this->load->model('m_products');

		// $item_id = $this->m_products->get_id_by_uid($uid)->result()[0]->item_id;
		$res_detail = $this->m_products->get_detail($uid);

		 // print_r($res_detail->result());

		$data["item_detail"] = $res_detail->result();

		$this->load->view('header');
		$this->load->view('item_detail',$data);

	}


}
