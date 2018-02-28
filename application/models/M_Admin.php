
<?php
	
	
	class M_Admin extends CI_Model {
		function __construct() {
			parent::__construct();
		}
		// Count all record of table "contact_info" in database.
		public function getcountpeserta() {
			//return $this->db->count_all("pencatatanprimary");
			return $this->db->where('Status','accepted')->from("pencatatanprimary")->count_all_results();
		}

		public function getcountpenetapan() {
			//return $this->db->count_all("pencatatanprimary");
			return $this->db->where('status','accepted')->from("penetapanprimary")->count_all_results();
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

		public function getpenetapan($limit, $id) {
			// $this->db->limit($limit);
			//$this->db->where('id', $id);
			// $query = $this->db->get("peserta");
			$query=$this->db->query("SELECT * FROM penetapanprimary where status = 'accepted' ORDER BY ProvTetap ASC limit $id,$limit ");
			
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

		public function get_objektetap_detail($id){
			$query = $this->db->query("SELECT *
				from penetapanprimary where ID = '$id'");
			return $query;
		}

		public function getkota($provinsi){
			$kota = $this->db->query("SELECT * from wilayah WHERE PROVINSI = '$provinsi'");
			return $kota;
		}
		
		public function edit($id,$opk_edit,$deskripsi,$kota_edit){
			$query = $this->db->query("UPDATE pencatatanprimary set OPK = '$opk_edit', Kota = '$kota_edit', Deskripsi = '$deskripsi' where ID='$id'");
		}

		public function edit_tetap($id,$opk_edit,$deskripsi,$kota_edit){
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
			$query = $this->db->query(" SELECT COUNT(ID) from pencatatanprimary where Kota IS NOT NULL AND  KOTA !='' and OPK!='' and OPK IS NOT NULL and Status = 'accepted'");
			
			return $query;
		}
		public function gettotalkota(){
			$query = $this->db->query(" SELECT COUNT(ID) from pencatatanprimary where Kota IS NOT NULL and Kota !='' and Status = 'accepted' ");
			
			return $query;
		}
		public function gettotalopk(){
			$query = $this->db->query(" SELECT COUNT(ID) from pencatatanprimary where OPK IS NOT NULL and OPK !='' and Status = 'accepted' ");
			
			return $query;
		}
		public function getcountduplikat(){
			$query = $this->db->query(" SELECT Name FROM pencatatanprimary where Status = 'accepted' GROUP BY Name HAVING COUNT(Name) >1 ");
			
			return $query->num_rows();
		}
		public function getProvinsi(){
			return $this->db->query("SELECT DISTINCT PROVINSI from wilayah ORDER BY PROVINSI ASC");
		}
		public function getduplikat(){
			$query = $this->db->query("SELECT ID,pencatatanprimary.Name,Provinsi,Deskripsi,DOMAIN,CategoryCatat,Status,Kota,OPK,sumber_data
										FROM pencatatanprimary 
										INNER JOIN(
										SELECT Name
										FROM pencatatanprimary where Status='accepted'
										GROUP BY Name
										HAVING COUNT(ID) >1
										)temp ON pencatatanprimary.Name= temp.Name
										ORDER BY pencatatanprimary.Name  ASC");
			 
			if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
			$data[] = $row;
			}

			return $data;
			}
			return false;
		}

		public function search($keyword,$provinsi){
			return $this->db->query("SELECT * from '$keyword' where Name = '$keyword'");
		}
	}