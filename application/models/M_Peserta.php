
<?php
	class M_Peserta extends CI_ModeL{
		//insert data pendaftar ke dalam database
		public function create($data){
			$result=$this->db->insert('peserta',$data);
			$emailinsert=$data['email'];
			
			$path = 'data/'.$data['nama'];
			if ($result) {
				//$query=$this->db->query("insert INTO portofolio (email,jenis,path) VALUES('$emailinsert','profpict', $path),('$emailinsert','sks', $path),('$emailinsert','drh', $path),('$emailinsert','video', $path)");
				return TRUE;
			} else {
				return FALSE;
			}
			
		}
		//get konten pendaftar
		public function getdetailseniman($email_seniman){
			// $detail = $this->db->query("SELECT * FROM `peserta`
			// 							left join portofolio
			// 							on peserta.email=portofolio.email
			// 							where peserta.email='$email_seniman'");
			$detail = $this->db->query("SELECT * from peserta where email='$email_seniman'");
			return $detail;
		}
		public function getkontenseniman($email,$jeniskonten){
			$konten = $this->db->query("SELECT * from konten where email= '$email' && jenis='$jeniskonten' ");
			return $konten;
		}
		public function getfoto($email_seniman){
			$foto = $this->db->query("SELECT * from foto where email= '$email_seniman' ");
			return $foto;
		}
		public function getvideo($email_seniman){
			$video = $this->db->query("SELECT * from video where email= '$email_seniman' ");
			return $video;
		}
		public function uploadkonten($konten){
			$inputkonten=$this->db->insert('konten', $konten);
			if ($inputkonten) {
				return TRUE;
			} else {
				return FALSE;
			}
			
		}
		public function updatesurat($konten){
			$email=$konten['email'];
			$jenis=$konten['jenis'];
			$path = $konten['path'];
			$query= $this->db->query ("UPDATE konten SET PATH = '$path', upload_time = current_timestamp where email = '$email' and jenis='$jenis'");
			if ($query) {
				return TRUE;
			} else {
				return FALSE;
			}
		}


		public function uploadfk($konten){
			$inputkonten=$this->db->insert('foto', $konten);
			if ($inputkonten) {
				return TRUE;
			} else {
				return FALSE;
			}
			
		}

		public function updatefk($konten){
			$email=$konten['email'];
			$sequence_foto=$konten['sequence_foto'];
			$path_foto = $konten['path_foto'];
			$query= $this->db->query ("UPDATE foto SET path_foto = '$path_foto', upload_foto = current_timestamp where email = '$email' and sequence_foto=$sequence_foto");
			if ($query) {
				return TRUE;
			} else {
				return FALSE;
			}
		}

		public function uploadvideo($konten){
			$inputkonten=$this->db->insert('video', $konten);
			if ($inputkonten) {
				return TRUE;
			} else {
				return FALSE;
			}
			
		}

		public function updatevideo($konten){
			$email=$konten['email'];
			$sequence_video=$konten['sequence_video'];
			$path_video = $konten['path_video'];
			$query= $this->db->query ("UPDATE video SET path_video = '$path_video', upload_video = current_timestamp where email = '$email' and sequence_video=$sequence_video");
			if ($query) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		public function directory(){
			$dir=$this->db->query("SELECT distinct username from peserta group by email");
			return $dir;
		}

		public function getprovinsi(){
			$query=$this->db->query("SELECT distinct provinsi from wilayah");
			return $query;
		}

		public function forgot($forgot){
			
			$email = $forgot['email'];
			$result = $this->db->query("SELECT password,nama_seniman FROM peserta WHERE email = '$email'");
			if($result){
				return $result;
			}else {
				return FALSE;
			}
		}
	}
