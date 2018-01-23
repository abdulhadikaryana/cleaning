<?php
	class Peserta extends CI_Controller{
		public $kontenarray = array();
        public $piagam=array();
        public $fk=array();
        public $video=array();
		public function __construct(){
			parent::__construct();
		}
		public function landing(){
			$config['center'] = '-6.225025, 106.802974';
			$config['zoom'] = '18';
			$this->googlemaps->initialize($config);

			$marker = array();
			$marker['position'] = '-6.225025, 106.802974';
			$this->googlemaps->add_marker($marker);
			$data['map'] = $this->googlemaps->create_map();


			//$this->load->view('view_file', $data);
			//$this->load->view('template/header');
			$this->load->view('v_Landing', $data);
		
		}
		public function createpeserta(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nama', 'Nama', 'required|myAlpha',array(
                'required'      => 'Nama harus diisi.',
                'alpha_numeric'	=>'Format Nama tidak sesuai, hanya boleh menggunakan huruf'
                
        	));
        	$this->form_validation->set_rules('email', 'Email', 'required|valid_email',array(
                'required'      => 'Email harus diisi.',
                'valid_email'	=>'Format email tidak sesuai'
                
        	));
        	$this->form_validation->set_rules('no_telpon', 'Nomor Telpon', 'required|numeric',array(
                'required'      => 'Nomor Telpon harus diisi.',
                'numeric'	=>'Format no telpon tidak sesuai, hanya boleh menggunakan angka'
                
        	));
        	
        	$this->form_validation->set_rules('password', 'Password', 'required');
        	if ($this->form_validation->run() == FALSE) {
        		$message1=$this->session->set_flashdata('message',validation_errors());
				$message2=$this->session->set_flashdata('status', 'danger');
        		// $this->landing();
        		redirect(base_url().'#daftar','refresh');
				
        	} else {
        		$data = array();
				$data['nama_seniman'] = $this->input->post('nama');
				$data['nama_seniman']= $this->security->xss_clean($data['nama_seniman']);
				$data['password'] = $this->input->post('password');
				$data['no_telpon'] = $this->input->post('no_telpon');
				$data['email'] = $this->input->post('email');
				$data['jenis_seni'] = $this->input->post('jenis_seni');
				$data['region']=$this->input->post('chk');
				$data['alamat']=$this->input->post('alamat');
				$data['kota']=$this->input->post('kota');
				$data['provinsi']=$this->input->post('provinsi');
				
				//insert data to database
				$result=$this->M_Peserta->create($data);
				if ($result) {
					$message1=$this->session->set_flashdata('message','Pendaftaran Anda Berhasil,Silakan Login untuk melengkapi kelengkapan lainnya');
					$message2=$this->session->set_flashdata('status', 'success');
					$this->email_confirm($data['email']);
					mkdir('data/'.$data['nama_seniman'],0775);
				} else {
					$message1=$this->session->set_flashdata('message','Email Yang Anda Masukan Sudah Terdaftar');
					$message2=$this->session->set_flashdata('status', 'danger');
				}
				//redirect to landing page with a message
				redirect(base_url().'#daftar','refresh');
        	}
		}

		function email_confirm($alamat_email){
			$this->load->library('email');
			
			$this->email->from('senimanmengajar.kemdikbud@gmail.com', 'Panitia Seniman Mengajar');
			$this->email->to($alamat_email);
			$this->email->set_newline("\r\n");
			$this->email->subject("Selamat Anda Telah Berhasil Mendaftar");
			$this->email->message("Selamat Anda telah berhasil mendaftar untuk jadi calon peserta Seniman Mengajar Gelombang 2. Silakan login dengan menggunakan email dan Password yang telah Anda daftarkan untuk melengkapi persyaratan selanjut nya.Setelah Anda login Anda di harapkan untuk mengupload :
				1. Surat Keterangan Sehat
				2. foto karya Anda
				3. video karya Anda
				4. Motivation Letter yang berisi maksimal 300 kata
				5. hasil scan KTP
				");
			$this->email->send();
			//$this->email->send();
			// if ($this->email->send()) {
			// 	return TRUE;
			// } else {
			// 	return FALSE;
			// }
		}
		public function login(){
			$this->load->view('template/header');
			$this->load->view('v_login');
		}

		function forgot(){
			$this->load->view('template/header');
			$this->load->view('forgotpassword');
		}

		function forgotpassword(){
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email',array(
                'required'      => 'Email harus diisi.',
                'valid_email'	=>'Format email tidak sesuai'
                
        	));
        	if ($this->form_validation->run() == FALSE) {
        		$message1=$this->session->set_flashdata('message',validation_errors());
				$message2=$this->session->set_flashdata('status', 'danger');
				redirect(base_url().'Peserta/forgot','refresh');
        	} else {
        		echo "tes";
	    		$forgot['email'] = $this->input->post('email');
				$result=$this->M_Peserta->forgot($forgot);
				if ($result->num_rows() !== 0) {
					foreach ($result->result_array() as $key ) {
						echo $password= $key['password'];
						echo $nama=$key['nama_seniman'];
					}

					$config['mailtype'] = 'text';
					$this->email->from('senimanmengajar.kemdikbud@gmail.com', 'Panitia Seniman Mengajar');
					$this->email->to($forgot['email']);
					$this->email->set_newline("\r\n");
					$this->email->subject("Password Recovery ");
					$this->email->message("Salam ".$nama.
						". Berikut adalah Password Anda : ".$password);
					//$this->email->send();
					//$this->email->send();
					if ($this->email->send()) {
						$message1=$this->session->set_flashdata('message','Password telah dikirimkan ke email anda');
						$message2=$this->session->set_flashdata('status', 'success');
						redirect(base_url().'Peserta/login','refresh');
					} else {
						$message1=$this->session->set_flashdata('message','email gagal dikirim, silakan coba kembali');
						$message2=$this->session->set_flashdata('status', 'danger');
						redirect(base_url().'Peserta/forgot','refresh');
					}


				} else {
					//echo "tes";
					$message1=$this->session->set_flashdata('message','Data yang dimasukan tidak sesuai');
						$message2=$this->session->set_flashdata('status', 'danger');
					redirect(base_url().'Peserta/forgot','refresh');
				}
        	}
		}

		public function auth(){
			// $data_peserta = array();
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email',array(
                'required'      => 'Email harus diisi.',
                'valid_email'	=>'Format email tidak sesuai'
                
        	));

            $this->form_validation->set_rules('password', 'Password', 'required|alpha_numeric',array(
            	'required'=> 'Password tidak boleh kosong',
            	'alpha_numeric' =>'format password tidak sesuai'
            ));
            
            if ($this->form_validation->run() == FALSE) {
            	// $this->login();
            	$message1=$this->session->set_flashdata('message',validation_errors());
				$message2=$this->session->set_flashdata('status', 'danger');
            	redirect(base_url().'Peserta/login','refresh');
            } else {
            	$email=$this->input->post('email');
				// $email= $this->security->xss_clean($email);
				$password=$this->input->post('password');
				// $password=$this->security->($password);
				$auth=$this->M_System->auth_peserta($email,$password);
				if ($auth->num_rows() > 0) {
					$sess_array = array('email' => $email, 'logged' => TRUE );
					$this->session->set_userdata('logged',$sess_array);
					foreach ($auth->result_array() as $key ) {
						$this->session->set_userdata('email', $key['email']);
					}
					redirect(base_url().'Peserta/detail','refresh');
				} else {
					$this->session->set_flashdata('message', 'Data yang dimasukan tidak sesuai');
					$this->login();
				}
            }
            
		}
		public function logout(){
			$this->session->sess_destroy();
			redirect(base_url(),'refresh');
		}

		public function detail(){
			/*------------------------------------------------------------------------------*/
			/*memeriksa apakah user sudha memiliki session untuk melihat page ini 	  		*/
			/*jika user tidak memiliki session maka akan dilaihkan ke page login 	  		*/
			/*jika user memiliki session maka user akan masuk ke dalam page detail seniman 	*/
			/*------------------------------------------------------------------------------*/
			if ($this->session->userdata('logged')['logged'] ) {
				
                //inisialisasi konten
                $kontenarray['profpict']=NULL;                
                $kontenarray['sks']=NULL;
                $kontenarray['ktp']=NULL;
                $kontenarray['fk']=NULL;
                $kontenarray['video']=NULL;
                $kontenarray['essai']=NULL;
                $kontenarray['drh']=NULL;

                //query yang dilakukan terhadap tabel konten dan tabel seniman yang dilakukan melalui model getdetailseniman dan getkontenseniman
                $email_peserta=$this->session->userdata('email');
                $data=$this->M_Peserta->getdetailseniman($email_peserta);
                //$jeniskonten='fk';
                //$datakonten=$this->M_Peserta->getkontenseniman($email_seniman,$jeniskonten);

                /*-------------memasukan data seniman dan data konten yang didapat dari query ke dalam session data-----------*/

                //memasukan data seniman ke dalam session
                foreach ($data->result_array() as $key) {
                    $this->session->set_userdata('email', $key['email']);
                    $this->session->set_userdata('nama_seniman', $key['nama_seniman']);
                    $this->session->set_userdata('alamat', $key['alamat']);
                    $this->session->set_userdata('kota', $key['kota']);
                    $this->session->set_userdata('provinsi', $key['provinsi']);      
                    $this->session->set_userdata('no_telpon', $key['no_telpon']);
                    $this->session->set_userdata('region', $key['region']);
                    $this->session->set_userdata('jenis_seni', $key['jenis_seni']);
                    $this->session->set_userdata('password', $key['password']);

                }


                //memasukan data surat seniman ke dalam session
                $jeniskonten=array();
                $jeniskonten[0]='profpict';                
                $jeniskonten[1]='sks';                
                $jeniskonten[2]='essai'	;
                $jeniskonten[3]='ktp'	;
                $jeniskonten[4]='drh';
	            
	            foreach ($jeniskonten as $key ) {
	            	//echo $key."<br>";
	            	// echo $email_seniman.'<br>';
	                $datakonten=$this->M_Peserta->getkontenseniman($email_peserta,$key);
	                // echo $datakonten.'<br>';
	                foreach ($datakonten->result_array() as  $keykonten) {
	                	$kontenarray[$key]=$keykonten['path'];
	                	 //echo $kontenarray;
	                    //$kontenarray[$key][$keykonten['SEQUENCE']]=$keykonten['PATH'];
	                    // /echo $kontenarray[$key][$keykonten['SEQUENCE']].'<br>';
	                    
	                }
	                
	            }

	            $fkkey = $this->M_Peserta->getfoto($email_peserta);
	            foreach ($fkkey->result_array() as $keyfk ) {
	            	$fk[$keyfk['sequence_foto']]['path_foto'] = $keyfk['path_foto'];
	            }
	            $fk['row']=$fkkey->num_rows() ;
	            $kontenarray['fk']=$fk;


	            $videokey = $this->M_Peserta->getvideo($email_peserta);
	            foreach ($videokey->result_array() as $keyvideo ) {
	            	$video[$keyvideo['sequence_video']]['path_video'] = $keyvideo['path_video'];
	            }
	            $video['row']=$videokey->num_rows() ;
	            $kontenarray['video']=$video;

                $this->load->view('detail', $kontenarray);
                    //$this->loadform($kontenarray);
            } else {
                redirect(base_url().'Peserta/login','refresh');
            }	 	 	
		}

		public function uploadkonten($konten){
			// $konten['email'] = $this->session->userdata('email');
			// $konten['jenis'] = $this->input->post('jenis');

			$pathdirectory='data/'.$this->session->userdata('nama_seniman');
			$namaupload=trim($this->session->userdata('nama_seniman'));
			$config['file_name'] =  $namaupload.'_'. $konten;
	        $config['upload_path'] = $pathdirectory;
	        $config['allowed_types'] = 'pdf|jpg|doc|docx';
	        $config['overwrite'] = TRUE;
	        $config['remove_spaces']=FALSE;

	        $this->upload->initialize($config);
	        if ($this->upload->do_upload()){
	            	$data_file = $this->upload->data();
	            	$file_ext = $data_file['file_ext'];
	            	$pathdir=$config['upload_path'].'/'.$config['file_name'].$file_ext;
	            	return $pathdir;
	  
	        } else{
	   
	        	return NULL;
	    	}
		}

		public function uploadvideo($konten){
			// $konten['email'] = $this->session->userdata('email');
			// $konten['jenis'] = $this->input->post('jenis');

			$pathdirectory='data/'.$this->session->userdata('nama_seniman');
			$namaupload=trim($this->session->userdata('nama_seniman'));
			$config['file_name'] =  $namaupload.'_'. $konten;
	        $config['upload_path'] = $pathdirectory;
	        $config['allowed_types'] = 'mp4|avi|mkv';
	        $config['overwrite'] = TRUE;
	        $config['remove_spaces']=FALSE;

	        $this->upload->initialize($config);
	        if ($this->upload->do_upload()){
	            	$data_file = $this->upload->data();
	            	$file_ext = $data_file['file_ext'];
	            	$pathdir=$config['upload_path'].'/'.$config['file_name'].$file_ext;
	            	return $pathdir;
	  
	        } else{
	   
	        	return NULL;
	    	}
		}

		function addsurat(){
			$konten['email'] = $this->session->userdata('email');
			$konten['jenis'] = $this->input->post('jenis');
			$konten['path']=$this->uploadkonten($konten['jenis']);
			//$konten['upload_time']=date("d-m-Y H:i:s");
			if (NULL !== $konten['path']) {
			
				if (NULL == $this->input->post('update')) {
					$result=$this->M_Peserta->uploadkonten($konten);
	            
					if ($result) {
						$message1=$this->session->set_flashdata('message','Upload Berhasil');
						$message2=$this->session->set_flashdata('status', 'success');
						redirect(base_url().'Peserta/detail','refresh');
					} else {
						$message1=$this->session->set_flashdata('message','Gagal Mengakses Database');
						$message2=$this->session->set_flashdata('status', 'danger');

						redirect(base_url().'Peserta/detail','refresh');
					}
				} else{
					$result = $this->M_Peserta->updatesurat($konten);
					if ($result) {
						$message1=$this->session->set_flashdata('message','Upload Berhasil');
						$message2=$this->session->set_flashdata('status', 'success');
						redirect(base_url().'Peserta/detail','refresh');
					} else {
						$message1=$this->session->set_flashdata('message','Gagal Mengakses Database');
						$message2=$this->session->set_flashdata('status', 'danger');

						redirect(base_url().'Peserta/detail','refresh');
					}
				}	
			} else {
				$message1=$this->session->set_flashdata('message','Upload Gagal'.$this->upload->display_errors('<p>', '</p>'));
				$message2=$this->session->set_flashdata('status', 'danger'); 
	        	redirect(base_url().'Peserta/detail','refresh');
			}
		}

		function addfk(){
			$konten['email'] = $this->session->userdata('email');
			$name = "fk-".$this->input->post('fkrow');
			$konten['path_foto']=$this->uploadkonten($name);
			$konten['sequence_foto'] = $this->input->post('fkrow');
			
			if (NULL !== $konten['path_foto']) {
					// $data_file = $this->upload->data();
	    //         	$file_ext = $data_file['file_ext'];
	            	// $konten['path']=$config['upload_path'].'/'.$config['file_name'].$file_ext;
				if (NULL == $this->input->post('update')) {
					$result=$this->M_Peserta->uploadfk($konten);
	            
					if ($result) {
						$message1=$this->session->set_flashdata('message','Upload Berhasil');
						$message2=$this->session->set_flashdata('status', 'success');
						redirect(base_url().'Peserta/detail','refresh');
					} else {
						$message1=$this->session->set_flashdata('message','Gagal Mengakses Database');
						$message2=$this->session->set_flashdata('status', 'danger');

						redirect(base_url().'Peserta/detail','refresh');
					}
				} else{
					$result=$this->M_Peserta->updatefk($konten);
					if ($result) {
						$message1=$this->session->set_flashdata('message','Upload Berhasil');
						$message2=$this->session->set_flashdata('status', 'success');
						redirect(base_url().'Peserta/detail','refresh');
					} else {
						$message1=$this->session->set_flashdata('message','Gagal Mengakses Database');
						$message2=$this->session->set_flashdata('status', 'danger');

						redirect(base_url().'Peserta/detail','refresh');
					}
				}
				
				
			} else {
				$message1=$this->session->set_flashdata('message','Upload Gagal '.$this->upload->display_errors('<p>', '</p>'));
				$message2=$this->session->set_flashdata('status', 'danger'); 
	        	redirect(base_url().'Peserta/detail','refresh');
			}
			
		}

		function addvideo(){
			$konten['email'] = $this->session->userdata('email');
			$name = "video-".$this->input->post('videorow');
			$konten['path_video']=$this->uploadvideo($name);
			$konten['sequence_video'] = $this->input->post('videorow');
			
			if (NULL !== $konten['path_video']) {
					// $data_file = $this->upload->data();
	    //         	$file_ext = $data_file['file_ext'];
	            	// $konten['path']=$config['upload_path'].'/'.$config['file_name'].$file_ext;
				if (NULL == $this->input->post('update')) {
					$result=$this->M_Peserta->uploadvideo($konten);
	            
					if ($result) {
						$message1=$this->session->set_flashdata('message','Upload Berhasil');
						$message2=$this->session->set_flashdata('status', 'success');
						redirect(base_url().'Peserta/detail','refresh');
					} else {
						$message1=$this->session->set_flashdata('message','Gagal Mengakses Database');
						$message2=$this->session->set_flashdata('status', 'danger');

						redirect(base_url().'Peserta/detail','refresh');
					}
				} else{
					$result=$this->M_Peserta->updatevideo($konten);
					if ($result) {
						$message1=$this->session->set_flashdata('message','Upload Berhasil');
						$message2=$this->session->set_flashdata('status', 'success');
						redirect(base_url().'Peserta/detail','refresh');
					} else {
						$message1=$this->session->set_flashdata('message','Gagal Mengakses Database');
						$message2=$this->session->set_flashdata('status', 'danger');

						redirect(base_url().'Peserta/detail','refresh');
					}
				}
				
				
			} else {
				$message1=$this->session->set_flashdata('message','Upload Gagal '.$this->upload->display_errors('<p>', '</p>'));
				$message2=$this->session->set_flashdata('status', 'danger'); 
	        	redirect(base_url().'Peserta/detail','refresh');
			}
			
		}
	}