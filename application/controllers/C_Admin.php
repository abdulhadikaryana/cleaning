<?php
	class C_Admin extends CI_Controller{
		public static $order_element;
		public static $orderby;
		public function __construct(){
			parent::__construct();
			$this->load->model('M_Admin');
			$this->load->library('pagination');
			// self::$order_element="ASC";
			// self::$orderby="ID";
			
		}
		public function index(){
			// $order = $this->order_element;
			// $orderby = $this->orderby;
			$this->admin();
		}
		function tes(){
			if ($this->session->has_userdata('orderby')) {
					$this->session->set_userdata('orderby','ID');
				}else{
					$this->session->set_userdata('orderby','Provinsi');
				} 
			echo $this->order_element;
		}
		public function admin(){
					
				// if (empty($this->input->post("columnName"))) {
				// 	$order_db = "ASC";
				// 	$orderby = "ID";
				// } else {
				// 	$order_db = $this->input->post("sort");
				// 	$orderby = $this->input->post("columnName");
				// }
				
				// $data['order']= $order_db;
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
				$data['objek'] = $this->M_Admin->getallpeserta($config["per_page"], $offset);
				// echo $this->session->userdata('orderby');
				// echo self::$order_element;
				
				
				$str_links = $this->pagination->create_links();
				$data["links"] = explode('&nbsp;',$str_links );
				$data['page'] = $page==0? 1:$page;

				// View data according to array.
				$this->load->view('navigation');
				$this->load->view("v_admin", $data);
			
		}

		public function tetap(){
				$data['count']=$this->getcountpenetapan();
				$config = array();
				$config["base_url"] = base_url() . "C_Admin/tetap";
				$total_row = $this->M_Admin->getcountpenetapan();
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
				$data['objek'] = $this->M_Admin->getpenetapan($config["per_page"], $offset);
				// echo $this->session->userdata('orderby');
				// echo self::$order_element;
				
				
				$str_links = $this->pagination->create_links();
				$data["links"] = explode('&nbsp;',$str_links );
				$data['page'] = $page==0? 1:$page;

				// View data according to array.
				$this->load->view('navigation');
				$this->load->view("v_tetap", $data);
			
		}

		public function duplikat(){
			$data['duplikat']=$this->M_Admin->getduplikat();
			$data['count']= count($data['duplikat']);
			$this->load->view('navigation');
			$this->load->view('v_duplikat', $data);
		}

		
		public function detail(){
			$id=$this->uri->segment(3);
			$page = $this->uri->segment(4);
			$data_objek['objek_detail'] = $this->M_Admin->get_objek_detail($id);
			foreach ($data_objek['objek_detail'] ->result_array() as $key ) {
				$data_objek['provinsi'] = $key['Provinsi'];
				$data_objek['Nama'] = $key['Name'];
				$data_objek['Deskripsi'] = $key['Deskripsi'];
				$data_objek['tahun'] = $key['TahunCatat'];
				$data_objek['domain'] = $key['DOMAIN'];
				$data_objek['kategori'] = $key['CategoryCatat'];
				$data_objek['OPK'] = $key['OPK'];
				$data_objek['kota'] = $key['Kota'];
				$data_objek['id'] = $key['ID'];
				 
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

		public function detailtetap(){
			$id=$this->uri->segment(3);
			$page = $this->uri->segment(4);
			$data_objek['objek_detail'] = $this->M_Admin->get_objektetap_detail($id);
			foreach ($data_objek['objek_detail'] ->result_array() as $key ) {
				$data_objek['provinsi'] = $key['Provinsi'];
				$data_objek['Nama'] = $key['Name'];
				$data_objek['Deskripsi'] = $key['Deskripsi'];
				$data_objek['tahun'] = $key['TahunCatat'];
				$data_objek['domain'] = $key['DOMAIN'];
				$data_objek['kategori'] = $key['CategoryCatat'];
				$data_objek['OPK'] = $key['OPK'];
				$data_objek['kota'] = $key['Kota'];
				$data_objek['id'] = $key['ID'];
				 
			}
			$data_objek['kosong'] = $this->M_Admin->getkota($data_objek['provinsi']);
			$breadcrumb = array(
								   "Home" => "/krocomumet",
								   "List" => base_url().'C_Admin/tetap/'.$page,   
								   $data_objek['Nama'] => ""
								);
                $data_objek['breadcrumb'] = $breadcrumb;
 
			$this->load->view('detail', $data_objek);

		}

		public function search(){
			$kategori = $this->input->post("kategori");
			$keyword = $this->input->post("keyword");
			$search_data = $this->M_Admin->search($keyword,$kategori);
			
		}

		public function detailduplikat(){
			$id=$this->uri->segment(3);
			$page = $this->uri->segment(4);
			$data_objek['objek_detail'] = $this->M_Admin->get_objek_detail($id);
			foreach ($data_objek['objek_detail'] ->result_array() as $key ) {
				$data_objek['provinsi'] = $key['Provinsi'];
				$data_objek['Nama'] = $key['Name'];
				$data_objek['Deskripsi'] = $key['Deskripsi'];
				$data_objek['tahun'] = $key['TahunCatat'];
				$data_objek['domain'] = $key['DOMAIN'];
				$data_objek['kategori'] = $key['CategoryCatat'];
				$data_objek['OPK'] = $key['OPK'];
				$data_objek['kota'] = $key['Kota'];
				$data_objek['id'] = $key['ID'];
				 
			}
			$data_objek['kosong'] = $this->M_Admin->getkota($data_objek['provinsi']);
			$breadcrumb = array(
								   "Home" => "/krocomumet",
								   "List" => base_url().'C_Admin/duplikat/',   
								   $data_objek['Nama'] => ""
								);
                $data_objek['breadcrumb'] = $breadcrumb;
 
			$this->load->view('detail', $data_objek);

		}

		public function del(){
			$url = $this->uri->segment(2);
			$id = $this->uri->segment(3);
			$page = $this->uri->segment(4);
			if (is_null($page)) {
				$page = '';
			} 
			
			$this->M_Admin->softdelete($id);
			redirect(base_url().'C_Admin/'.$url.'/'.$page,'refresh');
		}

		public function editProvinsi(){
			$check_kota="<select id="."\"provinsi_name\"" ." name="."\"provinsi_name\"".">";
			
			$provinsi=$this->M_Admin->getProvinsi();
			foreach ($provinsi->result_array() as $key) {
				$check_kota=$check_kota."<option  value=".$key['PROVINSI'].">".$key['PROVINSI']."</option>";
			}
			$check_kota=$check_kota."</select>";
			echo $check_kota;
			// return $check_kota;
		}

		public function editKota(){
			$kota_list='';
			$provinsi = $this->input->post('provinsi');
			$kota_content = $this->M_Admin->getkota($provinsi);
			foreach ($kota_content as $key) {
				$kota_list=$kota_list."<input type=\"checkbox\" value=\"".$key['wilayah']."name=\"Kota[]\">";
			}
			echo $provinsi;
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
			$deskripsi = addslashes($deskripsi);	
			$this->M_Admin->edit($id,$opk_edit,$deskripsi,$kota_edit);
			redirect(base_url().'C_Admin/detail/'.$id,'refresh');
			
		}

		public function edittetap(){
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
			$deskripsi = addslashes($deskripsi);	
			$this->M_Admin->edit_tetap($id,$opk_edit,$deskripsi,$kota_edit);
			redirect(base_url().'C_Admin/detail/'.$id,'refresh');
			
		}
		public function sort(){
			$this->session->set_userdata('orderby','ID');
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
			return $countpeserta;
		}

		public function getcountpenetapan(){
			$countpeserta = $this->M_Admin->getcountpenetapan();
			return $countpeserta;
		}
		public function rekap(){
			$query='';
			$data['total'] = $this->getcount();
			$data['total_full'] = $this->M_Admin->gettotalfull();
			foreach ($data['total_full'] ->result_array() as $key ) {
				$data['total_full']=$key['COUNT(ID)'];
				 
			}
			$data['total_kota'] = $this->M_Admin->gettotalkota();
			foreach ($data['total_kota'] ->result_array() as $key ) {
				$data['total_kota']=$key['COUNT(ID)']; 
			}

			$data['total_opk'] = $this->M_Admin->gettotalopk();
			foreach ($data['total_opk'] ->result_array() as $key ) {
				$data['total_opk']=$key['COUNT(ID)']; 
			}
			$data['duplikat']= $this->M_Admin->getcountduplikat();
			
			$this->load->view('navigation');
			$this->load->view('v_rekap', $data);
		}


		function upload(){
			$this->load->view('navigation');
			$this->load->view('v_upload');
		}
		
		public function uploadfile(){
			
		}

		

	}