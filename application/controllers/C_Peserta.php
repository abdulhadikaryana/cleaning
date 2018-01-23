<?php
	class C_Peserta extends CI_Controller{
		public function __construct(){
			parent::__construct();
		}
		public function tes(){
			
			echo "tes";
		}
		public function createpeserta2(){
			// $this->form_validation->set_rules('nama', 'Nama', 'required|alpha',array(
   //              'required'      => 'Nama harus diisi.',
   //              'alpha'	=>'Format Nama tidak sesuai, hanya boleh menggunakan huruf'
                
   //      	));
   //      	$this->form_validation->set_rules('email', 'Email', 'required|valid_email',array(
   //              'required'      => 'Email harus diisi.',
   //              'valid_email'	=>'Format email tidak sesuai'
                
   //      	));
   //      	$this->form_validation->set_rules('no_telpon', 'Nomor Telpon', 'required|is_natural',array(
   //              'required'      => 'Nomor Telpon harus diisi.',
   //              'is_natural'	=>'Format no telpon tidak sesuai, hanya boleh menggunakan angka'
                
   //      	));
   //      	$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric',array(
   //              'required'      => 'Nomor Telpon harus diisi.',
   //              'alpha_numeric'	=>'Format username tidak sesuai, hanya boleh menggunakan huruf dan angka'
                
   //      	));
   //      	if ($this->form_validation->run() == FALSE) {
   //      		redirect(base_url().'#daftar','refresh');
   //      	} else {
        		$data = array();
				$data['nama_seniman'] = $this->input->post('nama');
				$data['username'] = $this->input->post('username');
				$data['password'] = $this->input->post('password');
				$data['no_telpon'] = $this->input->post('no_telpon');
				$data['email'] = $this->input->post('email');
				$data['jenis_seni'] = $this->input->post('jenis_seni');
				$data['region']=$this->input->post('chk');
				echo $data['nama_seniman'];
				
				//insert data to database
				$result=$this->M_Peserta->create($data);
				if ($result) {
					$message1=$this->session->set_flashdata('message','Pendaftaran Anda Berhasil');
					$message2=$this->session->set_flashdata('status', 'success');
					mkdir('data/'.$data['username'],0775);
				} else {
					$message1=$this->session->set_flashdata('message','Email Yang Anda Masukan Sudah Terdaftar');
					$message2=$this->session->set_flashdata('status', 'danger');
				}
				//redirect to landing page with a message
				//redirect(base_url().'#daftar','refresh');
        	//}
        	
			// $data = array();
			// $data['nama_seniman'] = $this->input->post('nama');
			// $data['username'] = $this->input->post('username');
			// $data['password'] = $this->input->post('password');
			// $data['no_telpon'] = $this->input->post('no_telpon');
			// $data['email'] = $this->input->post('email');
			// $data['jenis_seni'] = $this->input->post('jenis_seni');
			// $data['region']=$this->input->post('chk');
			
			// //insert data to database
			// $result=$this->M_Peserta->create($data);
			// if ($result) {
			// 	$message1=$this->session->set_flashdata('message','Pendaftaran Anda Berhasil');
			// 	$message2=$this->session->set_flashdata('status', 'success');
			// 	mkdir('data/'.$data['username'],0775);
			// } else {
			// 	$message1=$this->session->set_flashdata('message','Email Yang Anda Masukan Sudah Terdaftar');
			// 	$message2=$this->session->set_flashdata('status', 'danger');
			// }
			// //redirect to landing page with a message
			// redirect(base_url().'#daftar','refresh');

		}
		function upload() {
			$data = array();
			//$id_siswa = $this->session->userdata('id_siswa');
			$this->m_Peserta->id_peserta = $id_peserta;
			$jenis = $this->input->post('jenis');
			if ($jenis != 'youtube'){
				$config['file_name'] =  $id_siswa.'_'. $jenis.'_'.$time_upload;
	            $config['upload_path'] = './assets/'.$data['nama_seniman'];
	            $config['allowed_types'] = 'pdf|jpg|png';
	            $this->upload->initialize($config);
	            if ($this->upload->do_upload())
	            {
	            	$data_file = $this->upload->data();
	            	$file_ext = $data_file['file_ext'];
	            	$this->Konten->jenis = $jenis;
	            	$this->Konten->url = $id_siswa.'_'.$jenis.''.$file_ext; 
	            }
				
			} else {
				$this->Konten->jenis = 'youtube';
				$this->Konten->url = $this->input->post('link');	
	        }
	        $this->m_Peserta->save(); 
	        redirect('c_Peserta/detail');
		}
		public function detail(){
			// $email_seniman=$this->session->userdata($peserta['email']);
			// foreach ($auth->result() as $rowdata ) {
			// 	$data=$this->M_Peserta->getdetailseniman($rowdata->email);
			// }
			if ($this->session->userdata('logged')['logged'] ) {
				$kontenarray = array();
				//inisialisasi konten array
				$kontenarray['profpict']=NULL;
				$kontenarray['foto']=NULL;
				$kontenarray['drh']=NULL;
				$kontenarray['sks']=NULL;
				$kontenarray['video']=NULL;




			 	$email_seniman=$this->session->userdata('email');
				$data=$this->M_Peserta->getdetailseniman($email_seniman);
				$datakonten=$this->M_Peserta->getkontenseniman($email_seniman);
				foreach ($data->result_array() as $key) {
					$this->session->set_userdata('username', $key['username']);
					$this->session->set_userdata('nama_seniman', $key['nama_seniman']);
					$this->session->set_userdata('no_telpon', $key['no_telpon']);
					$this->session->set_userdata('region', $key['region']);
					$this->session->set_userdata('jenis_seni', $key['jenis_seni']);
						// $this->session->set_userdata('jenis',$key['jenis']);
						// $this->session->set_userdata('path',$key['path']);
				}

				foreach ($datakonten->result_array() as $keykonten ) {
					if ($keykonten['jenis']=='profpict') {
						// $this->session->set_userdata('profpict',$keykonten['path']);
						$kontenarray['profpict']=$keykonten['path'];
						//echo $kontenarray['profpict'].'<br>';
						//echo $keykonten['path'].'<br>';
					}
					if ($keykonten['jenis']=='foto') {
					// $this->session->set_userdata('foto',$keykonten['path']);
					$kontenarray['foto']=$keykonten['path'];
					//echo $kontenarray['foto'].'<br>'; 
					//echo $keykonten['path'].'<br>';
					}
					if ($keykonten['jenis']=='sks') {
						// $this->session->set_userdata('sks',$keykonten['path']);
						$kontenarray['sks']=$keykonten['path'];
						//echo $kontenarray['sks'];
						//echo $keykonten['path'].'<br>';
					}
					if ($keykonten['jenis']=='drh') {
						// $this->session->set_userdata('drh',$keykonten['path']);
						// echo $keykonten['jenis'].'<br>'; 
						$kontenarray['drh']=$keykonten['path'];
						//echo $kontenarray['drh'];
						//echo $keykonten['path'].'<br>';
					}
					if ($keykonten['jenis']=='video') {
						// $this->session->set_userdata('video',$keykonten['path']);
						// echo $keykonten['jenis'].'<br>'; 
						$kontenarray['video']=$keykonten['path'];
						//echo $kontenarray['video'];
						//echo $keykonten['path'].'<br>';
					}
				}
					  $this->load->view('forms', $kontenarray);
					//$this->loadform($kontenarray);
			} else {
		 		$this->load->view('v_login');
		 	}
			 	 	
			
		}
		public function loadform($kontenarray){
			$this->load->view('forms', $kontenarray);
		}
		public function login(){
			$this->load->view('template/header');
			$this->load->view('v_login');
		}

		public function auth(){
			// $data_peserta = array();
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$auth=$this->M_System->auth_peserta($username,$password);
			if ($auth->num_rows() > 0) {
				$sess_array = array('username' => $username, 'logged' => TRUE );
				$this->session->set_userdata('logged',$sess_array);
				foreach ($auth->result_array() as $key ) {
					$this->session->set_userdata('email', $key['email']);
				}
				
				// $this->session->set_userdata($auth);
				
				//$data['peserta'] = $sess_array;
				// $this->detail();
				redirect(base_url().'C_Peserta/detail','refresh');
				//$this->detail();
			} else {
				$this->session->set_flashdata('message', 'Username atau Password Salah');
				// $data['message'] = 'Username atau Password Salah';
				redirect(base_url().'C_Peserta/login','refresh');
				//$this->detail();
			}
		}

		public function logout(){
			// $this->session->unset_userdata('logged');
			//session_destroy();
			$this->session->sess_destroy();
			$this->load->view('v_login');
		}

		public function update (){
			$this->load->view('v_update');
		}

		public function updatekonten(){
			$konten['email'] = $this->session->userdata('email');
			$konten['jenis'] = $this->input->post('jenis');

			$pathdirectory='data/'.$this->session->userdata('username');
			// echo $konten['jenis'];

			$config['file_name'] =  $this->session->userdata('username').'_'. $konten['jenis'];
	        $config['upload_path'] = $pathdirectory;
	        $config['allowed_types'] = 'pdf|jpg|png|doc|docx|mkv|mov|mp4|avi';
	        $config['overwrite'] = TRUE;

	        $this->upload->initialize($config);
	        if ($this->upload->do_upload()){
	            	$data_file = $this->upload->data();
	            	$file_ext = $data_file['file_ext'];
	            	$konten['path']=$config['upload_path'].'/'.$config['file_name'].$file_ext;
	            	//$this->Konten->jenis = $jenis;	
	            $result=$this->M_Peserta->uploadkonten($konten);
	            // echo $result;
				if ($result) {
					$message1=$this->session->set_flashdata('message','Upload Berhasil');
					$message2=$this->session->set_flashdata('status', 'success');
					redirect(base_url().'C_Peserta/detail','refresh');
				} else {
					$message1=$this->session->set_flashdata('message','Gagal Mengakses Database');
					$message2=$this->session->set_flashdata('status', 'danger');
					redirect(base_url().'C_Peserta/detail','refresh');
				} 
	        } else{
	        	$message1=$this->session->set_flashdata('message','Upload Gagal');
				$message2=$this->session->set_flashdata('status', 'danger'); 
	        	redirect(base_url().'C_Peserta/detail','refresh');
	    	}



			// $result=$this->M_Peserta->uploadkonten($konten);
			// if ($result) {
			// 	$message1=$this->session->set_flashdata('message','Upload Berhasil');
			// 	$message2=$this->session->set_flashdata('status', 'success');
			// } else {
			// 	$message1=$this->session->set_flashdata('message','Upload Gagal, Silakan Upload Kembali');
			// 	$message2=$this->session->set_flashdata('status', 'danger');
			// }
		}

		public function cretaedirectory(){
			$dirmake = $this->M_Peserta->directory();
			foreach ($dirmake->result_array() as $key) {
				mkdir('data/'.$key['username'],0775);
			}
		}

		public function seeresult(){
			$email_seniman='email3@domain.com';
			$jenis[0]= 'foto';
            $jenis[2]= 'profpict';
            $jenis[3]= 'sks';
            $jenis[4]='drh';
            $seq=0;
            foreach ($jenis as $key ) {
                $datakonten=$this->M_Peserta->getkontenseniman($email_seniman,$jenis);
                $seq2=0;
                foreach ($datakonten as $result_array() => $keykonten) {
                    $kontenarray[$jenis][$seq2]=$keykonten['path'];
                    echo $kontenarray[$jenis][$seq2].'-->'.$keykonten['id'].'<br>';
                }
                $seq=$seq+1;
            }
		}
	}