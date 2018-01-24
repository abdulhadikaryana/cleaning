<?php
	class C_Admin extends CI_Controller{
		public static $order_element;
		public static $orderby;
		public function __construct(){
			parent::__construct();
			$this->load->model('M_Admin');
			$this->load->library('pagination');
			// self::$order_element="ASC";
			// self::$orderby="IdCatatPrim";
			
		}
		public function index(){
			// $order = $this->order_element;
			// $orderby = $this->orderby;
			$this->admin();
		}
		function tes(){
			if ($this->session->has_userdata('orderby')) {
					$this->session->set_userdata('orderby','IdCatatPrim');
				}else{
					$this->session->set_userdata('orderby','Ocupation');
				} 
			echo $this->order_element;
		}
		public function admin(){
					
				if (empty($this->input->post("columnName"))) {
					$order_db = "ASC";
					$orderby = "IdCatatPrim";
				} else {
					$order_db = $this->input->post("sort");
					$orderby = $this->input->post("columnName");
				}
				
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
				$data['objek'] = $this->M_Admin->getallpeserta($config["per_page"], $offset,$order_db,$orderby);
				// echo $this->session->userdata('orderby');
				// echo self::$order_element;
				
				
				$str_links = $this->pagination->create_links();
				$data["links"] = explode('&nbsp;',$str_links );
				$data['page'] = $page==0? 1:$page;

				// View data according to array.
				$this->load->view('navigation');
				$this->load->view("v_admin", $data);
			
		}

		public function detail(){
			$id=$this->uri->segment(3);
			$page = $this->uri->segment(4);
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
			$breadcrumb = array(
								   "Home" => "/krocomumet",
								   "List" => base_url().'C_Admin/admin/'.$page,   
								   $data_objek['Nama'] => ""
								);
                $data_objek['breadcrumb'] = $breadcrumb;
 
			$this->load->view('detail', $data_objek);

		}

		public function del(){
			$id = $this->uri->segment(3);
			$page = $this->uri->segment(4);
			$this->M_Admin->softdelete($id);
			redirect(base_url().'C_Admin/admin/'.$page,'refresh');
		}

		public function edit(){
			$opk_edit='';
			$kota_edit='';
			$id=$this->input->post('id');
			$kota = $this->input->post('kota');
			$opk = $this->input->post('OPK');
			if (is_null($opk)) {
				$opk = NULL;
				
			} else {
				$iterasi = count($opk);
				for ($i=0; $i < $iterasi ; $i++) { 
					$opk_edit = $opk[$i].", ".$opk_edit;
				}
			}
			if (is_null($kota)) {
				$kota = NULL;
				
			} else {
				$iterasi = count($kota);
				for ($i=0; $i < $iterasi ; $i++) { 
					$kota_edit = $kota[$i].", ".$kota_edit;
				}
				echo $kota_edit;
			}
			$deskripsi = $this->input->post('deskripsi');
			$this->M_Admin->edit($id,$opk_edit,$deskripsi,$kota_edit);
			redirect(base_url().'C_Admin/detail/'.$id,'refresh');
			
		}
		public function sort(){
			$this->session->set_userdata('orderby','IdCatatPrim');
			$order = $this->uri->segment(3);
			if ($order=="ASC") {
				self::$order_element= "DESC";
				$this->admin();
			} else { 
				self::$order_element = "ASC";
				$this->admin();
			}
			
		}

		

		public function getcount(){
			$countpeserta = $this->M_Admin->getcountpeserta();
			// foreach ($countpeserta as $key ) {
			// 	$count = 
			// }
			return $countpeserta;
		}

		public function rekap(){
			$query='';
			$data['total'] = $this->getcount();
			$data['total_full'] = $this->M_Admin->gettotalfull();
			foreach ($data['total_full'] ->result_array() as $key ) {
				$data['total_full']=$key['COUNT(IdCatatPrim)'];
				 
			}
			$data['total_kota'] = $this->M_Admin->gettotalkota();
			foreach ($data['total_kota'] ->result_array() as $key ) {
				$data['total_kota']=$key['COUNT(IdCatatPrim)']; 
			}

			$data['total_opk'] = $this->M_Admin->gettotalopk();
			foreach ($data['total_opk'] ->result_array() as $key ) {
				$data['total_opk']=$key['COUNT(IdCatatPrim)']; 
			}
			$data['duplikat']= $this->M_Admin->getcountduplikat();
			
			$this->load->view('navigation');
			$this->load->view('v_rekap', $data);
		}

		

		

	}