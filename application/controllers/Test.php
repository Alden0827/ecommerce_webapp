<?php
class Test extends CI_Controller {

    public function index(){
    	  $this->load->model('library_model');
    	$data['item_categories'] = $this->library_model->get_product_categories();
		$this->load->view('header',$data);
        $this->load->view('sidebar');
        $this->load->view('test');
        $this->load->view('footer');

    }
    public function server_details(){
    	print('<pre>');
    	print_r($_SERVER);
    	print('</pre>');
    }

    private function print_json(){
    	return json_encode(array('result' => 'success','order_id' => 1));	
    	// echo json_encode(array('status' => 'success','message'=> 'success message'));

    }

    public function returnjson() {
    	$result = $this->print_json();
		// header('Content-Type: application/json');
        echo $result;
        // echo "string";
    	
    }


}

