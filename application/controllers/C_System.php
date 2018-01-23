<?php
	class c_System extends CI_Controller{
		public function __construct(){
			parent ::__construct();
			$this->client_logon = $this->session->userdata('logged');
		}

		public function auth(){
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$auth=$this->M_System->auth_peserta($username,$password);
			if ($auth->num_rows() > 0) {
				$sess_array = array('username' => $username, 'logged' => TRUE );
				$this->session->set_userdata('logged',$sess_array);
				$this->session->set_userdata($auth);
				// foreach ($auth->result() as $dordata ) {
					
				// }
				$data['peserta'] = $sess_array;
				redirect(site_url('C_Peserta/detail'),$data);
				
			} else {
				$data['message'] = 'username or password are invalid';
				$this->load->view('v_login',$data);
			}

				
			
		}
	}