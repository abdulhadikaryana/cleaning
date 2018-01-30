
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
		public function getallpeserta($limit, $id) {
			// $this->db->limit($limit);
			//$this->db->where('id', $id);
			// $query = $this->db->get("peserta");
			$query=$this->db->query("SELECT * FROM pencatatanprimary where Status = 'accepted' ORDER BY Provinsi ASC limit $id,$limit ");
			
			if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
			$data[] = $row;
			}

			return $data;
			}
			return false;
		}

		public function get_objek_detail($id){
			$query = $this->db->query("SELECT ID, TahunCatat, Name, Deskripsi, Provinsi, DOMAIN, CategoryCatat, Kota, OPK 
				from pencatatanprimary where ID = '$id'");
			return $query;
		}

		public function getkota($provinsi){
			$kota = $this->db->query("SELECT * from wilayah WHERE PROVINSI = '$provinsi'");
			return $kota;
		}
		
		public function edit($id,$opk_edit,$deskripsi,$kota_edit){
			$query = $this->db->query("UPDATE pencatatanprimary set OPK = '$opk_edit', Kota = '$kota_edit', Deskripsi = '$deskripsi' where ID='$id'");
		}

		public function softdelete($id){
			$query = $this->db->query("UPDATE pencatatanprimary set Status='deleted' where ID='$id'");
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

		public function gettotalfull(){
			$query = $this->db->query(" SELECT COUNT(ID) from pencatatanprimary where Kota IS NOT NULL AND OPK IS NOT NULL");
			
			return $query;
		}
		public function gettotalkota(){
			$query = $this->db->query(" SELECT COUNT(ID) from pencatatanprimary where Kota IS NOT NULL ");
			
			return $query;
		}
		public function gettotalopk(){
			$query = $this->db->query(" SELECT COUNT(ID) from pencatatanprimary where OPK IS NOT NULL ");
			
			return $query;
		}
		public function getcountduplikat(){
			$query = $this->db->query(" SELECT Name FROM pencatatanprimary GROUP BY Name HAVING COUNT(Name) >1 ");
			
			return $query->num_rows();
		}
		public function getProvinsi(){
			return $this->db->query("SELECT DISTINCT PROVINSI from wilayah ORDER BY PROVINSI ASC");
		}
		public function getduplikat(){
			$query = $this->db->query("SELECT  a.ID, a.TahunCatat,a.DOMAIN,a.CategoryCatat, a.Name, a.Provinsi, a.Kota, a.OPK, a.Deskripsi 
				FROM pencatatanprimary a INNER JOIN pencatatanprimary b ON a.Name = b.Name
				WHERE a.ID <> b.ID ORDER by Name ASC");
			 
			if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
			$data[] = $row;
			}

			return $data;
			}
			return false;
		}
	}