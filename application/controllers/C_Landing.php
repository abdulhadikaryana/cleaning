<?php

class C_Landing extends CI_Controller {
	
	function index() {
		$config['center'] = '-6.225025, 106.802974';
		$config['zoom'] = '18';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = '-6.225025, 106.802974';
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
		$data['provinsi']=$this->M_Peserta->getprovinsi();

		//$this->load->view('view_file', $data);
		//$this->load->view('template/header');
		$this->load->view('v_Landing2', $data);
		
	}

}
	
?>