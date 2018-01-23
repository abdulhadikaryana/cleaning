<?php 
	class M_System extends CI_Model{
		public function __construct(){
			$table = 'peserta';
			parent::__construct();
		} 
		public function auth_peserta($email,$password){
			$data = $this->db->query("SELECT email FROM peserta WHERE email='$email' and password='$password'");
			// foreach ($auth->result() as $row)
			// 	{
			// 	        echo $this->encrypt->decode($row->password)."<br>";
				        
			// 	}
			// if($data->num_rows()>0){
				return $data;
			// }else{
			// 	return $data;
			// }
		}

	}