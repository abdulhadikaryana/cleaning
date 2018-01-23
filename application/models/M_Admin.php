
<?php
	
	
	class M_Admin extends CI_Model {
		function __construct() {
			parent::__construct();
		}
		// Count all record of table "contact_info" in database.
		public function getcountpeserta() {
			return $this->db->count_all("pencatatanprimary");
		}

		// Fetch data according to per_page limit.
		public function getallpeserta($limit, $id,$order,$orderby) {
			// $this->db->limit($limit);
			//$this->db->where('id', $id);
			// $query = $this->db->get("peserta");
			$query=$this->db->query("SELECT * FROM pencatatanprimary where DelCatatPrim = 'accepted' ORDER BY ".$orderby." ". $order." limit $id,$limit ");
			
			if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
			$data[] = $row;
			}

			return $data;
			}
			return false;
		}

		public function get_objek_detail($id){
			$query = $this->db->query("SELECT IdCatatPrim, TahunCatat, NamePrim, Ocupation, Identification, DomainCatat, CategoryCatat, Kota, OPK 
				from pencatatanprimary where IdCatatPrim = '$id'");
			return $query;
		}

		public function getkota($provinsi){
			$kota = $this->db->query("SELECT * from wilayah WHERE PROVINSI = '$provinsi'");
			return $kota;
		}
		

		public function getstatusprofpict($email){
			$query = $this->db->query("SELECT EXISTS (SELECT email from konten where email = '$email' and JENIS = 'profpict')");
			foreach ($query->result_array() as $key ) {
				return $key["EXISTS (SELECT email from konten where email = '$email' and JENIS = 'profpict')"];
			}
		}

		public function getstatussks($email){
			$query = $this->db->query("SELECT EXISTS (SELECT email from konten where email = '$email' and JENIS = 'sks')");
			foreach ($query->result_array() as $key ) {
				return $key["EXISTS (SELECT email from konten where email = '$email' and JENIS = 'sks')"];
			}
		}

		public function getstatussr($email){
			$query = $this->db->query("SELECT EXISTS (SELECT email from konten where email = '$email' and JENIS = 'sr')");
			foreach ($query->result_array() as $key ) {
				return $key["EXISTS (SELECT email from konten where email = '$email' and JENIS = 'sr')"];
			}
		}

		public function getstatusdrh($email){
			$query = $this->db->query("SELECT EXISTS (SELECT email from konten where email = '$email' and JENIS = 'drh')");
			foreach ($query->result_array() as $key ) {
				return $key["EXISTS (SELECT email from konten where email = '$email' and JENIS = 'drh')"];
			}
		}

		public function getstatusfk($email){
			$query = $this->db->query("SELECT EXISTS (SELECT email from foto where email = '$email' )");
			foreach ($query->result_array() as $key ) {
				return $key["EXISTS (SELECT email from foto where email = '$email' )"];
			}
		}

		public function getstatusktp($email){
			$query = $this->db->query("SELECT EXISTS (SELECT email from konten where email = '$email' and JENIS = 'ktp')");
			foreach ($query->result_array() as $key ) {
				return $key["EXISTS (SELECT email from konten where email = '$email' and JENIS = 'ktp')"];
			}
		}

		public function getstatusessai($email){
			$query = $this->db->query("SELECT EXISTS (SELECT email from konten where email = '$email' and JENIS = 'essai')");
			foreach ($query->result_array() as $key ) {
				return $key["EXISTS (SELECT email from konten where email = '$email' and JENIS = 'essai')"];
			}
		}

		public function getstatusvideo($email){
			$query = $this->db->query("SELECT EXISTS (SELECT email from video where email = '$email' )");
			foreach ($query->result_array() as $key ) {
				return $key["EXISTS (SELECT email from video where email = '$email' )"];
			}
		}

		public function getcountbyregion(){
			$region=$this->db->query("SELECT region,COUNT(region) FROM peserta GROUP BY region");
			return $region;
		}

		public function getdirbyregion($regions){
			$region = $this->db->query("SELECT distinct region from peserta where region like '%$regions%'");
			return $region;
			$this->db->save_queries = false;
		}

		public function getdirdownloadbyregion($regiondir){
			$name = $this->db->query("SELECT nama_seniman from peserta where region = '$regiondir'");
			return $name;
			$this->db->save_queries = false;
		}

		public function getdirdownload($email){
			$query=$this->db->query("SELECT nama_seniman FROM peserta WHERE email = '$email'");
			return $query;
		}

		public function getdirdownloadall(){
			$query=$this->db->query("SELECT nama_seniman FROM peserta ");
			return $query;
		}

		public function searchpeserta($nama){
			$query = $this->db->query("SELECT * FROM peserta WHERE nama_seniman like '%$nama%' ");
			if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
			$data[] = $row;
			}

			return $data;
			}
			return NULL;
		}
	}