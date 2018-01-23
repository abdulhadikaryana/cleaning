<?php
	class C_Admin extends CI_Controller{
		public $order_element="ASC";
		public $orderby = "IdCatatPrim";
		public function __construct(){
			parent::__construct();
			$this->load->model('M_Admin');
			$this->load->library('pagination');
			
		}
		public function index(){
			$order = $this->order_element;
			$orderby = "IdCatatPrim";
			$this->admin($order,$orderby);
		}
		function tes(){
			echo $this->order_element;
		}
		public function admin($order,$orderby){
				$order_db = $order;
				$ordercategory = $orderby; 
				$data['order']= $order_db;
				$data['count']=$this->getcount();
				$config = array();
				$config["base_url"] = base_url() . "C_Admin/admin";
				$total_row = $this->M_Admin->getcountpeserta();
				$config["total_rows"] = $total_row;
				$config["per_page"] = 20;
				$config['use_page_numbers'] = TRUE;
				$config['num_links'] = $total_row;
				$config['first_tag_open'] = $config['last_tag_open'] = $config['next_tag_open'] = $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        		$config['first_tag_close'] = $config['last_tag_close'] = $config['next_tag_close'] = $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
         
        		$config['cur_tag_open'] = '<li class="active"><span><b>';
       			$config['cur_tag_close'] = '</b></span></li>';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';

				$this->pagination->initialize($config);
				// if($this->uri->segment(3)){
				// 	$page = ($this->uri->segment(3)) ;
				// }else{
				// 	$page = 1;
				// }
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        		$offset = $page == 0 ? 0 : ($page - 1) * $config["per_page"];
				$data['objek'] = $this->M_Admin->getallpeserta($config["per_page"], $offset,$order_db,$ordercategory);
				echo $ordercategory;
				echo $order;
				
				
				$str_links = $this->pagination->create_links();
				$data["links"] = explode('&nbsp;',$str_links );
				$data['page'] = $page==0? 1:$page;

				// View data according to array.
				$this->load->view('navigation');
				$this->load->view("v_admin", $data);
			
		}

		public function detail(){
			$id=$this->uri->segment(3);
			$data_objek['objek_detail'] = $this->M_Admin->get_objek_detail($id);
			foreach ($data_objek['objek_detail'] ->result_array() as $key ) {
				$data_objek['provinsi'] = $key['Ocupation'];
				$data_objek['Nama'] = $key['NamePrim'];
				$data_objek['Deskripsi'] = $key['Identification'];
				$data_objek['tahun'] = $key['TahunCatat'];
				$data_objek['domain'] = $key['DomainCatat'];
				$data_objek['kategori'] = $key['CategoryCatat'];
				$data_objek['OPK'] = $key['OPK'];
				$data_objek['kota'] = $key['Kota'];
				$data_objek['id'] = $key['IdCatatPrim'];
				 
			}
			$data_objek['kosong'] = $this->M_Admin->getkota($data_objek['provinsi']);
			$this->load->view('detail', $data_objek);

		}

		public function edit(){
			// $opk_edit='';
			// $id=$this->input->post('id');
			// $kota = $this->input->post('kota');
			// $opk = $this->input->post('OPK');
			// if (is_null($opk)) {
			// 	$opk = NULL;
			// } else {
			// 	$iterasi = count($opk);
			// 	for ($i=0; $i < $iterasi ; $i++) { 
			// 		$opk_edit = $opk[$i].", ".$opk_edit;
			// 	}
			// }
			$deskripsi = $this->input->post('deskripsi');
			echo $deskripsi;
		}
		public function sort(){
			$orderby = "Ocupation";
			$order = $this->uri->segment(3);
			if ($order=="ASC") {
				$order = "DESC";
				$this->admin($order,$orderby);
			} else { 
				$order = "ASC";
				$this->admin($order,$orderby);
			}
			
		}

		public function searchpeserta(){
			$nama= $this->input->post('nama');
			$data['peserta']= $this->M_Admin->searchpeserta($nama);
			if ($data['peserta'] !== NULL) {

				foreach ($data['peserta'] as $key ) {
					$data['profpict'][$key->email]= $this->M_Admin->getstatusprofpict($key->email);
					$data['sks'][$key->email]= $this->M_Admin->getstatussks($key->email);
					$data['drh'][$key->email]= $this->M_Admin->getstatusdrh($key->email);
					$data['essai'][$key->email]= $this->M_Admin->getstatusessai($key->email);
					$data['fk'][$key->email]= $this->M_Admin->getstatusfk($key->email);
					$data['ktp'][$key->email]= $this->M_Admin->getstatusktp($key->email);
					$data['video'][$key->email]= $this->M_Admin->getstatusvideo($key->email);
				}
				$this->load->view('navigation');
				$this->load->view("v_search", $data);
			} else {
				$message1=$this->session->set_flashdata('message','Nama Tidak Ditemukan');
				$message2=$this->session->set_flashdata('status', 'danger');
				redirect(base_url().'C_Admin/admin','refresh');
			}
		}

		public function info(){
			echo phpinfo();
		}

		

		public function getcount(){
			$countpeserta = $this->M_Admin->getcountpeserta();
			// foreach ($countpeserta as $key ) {
			// 	$count = 
			// }
			return $countpeserta;
		}

		

		

	}