<?php

	/**
	* 
	*/
	class m_Authentification extends CI_Model
	{
		
		public function __construct(argument)
		{
			$this->load->database();
		}

		//model otentifikasi untuk admin
		public function auth_admin($username,$password){
			$data = $this->db->query("select * from admin where username='$username' and password='$password'");
			if($data->num_rows>0){
				return TRUE;
			}else{
				return FALSE;
			}
		}
		
		//model otentifikasi untuk peserta
		public function auth_peserta($username,$password){
			$data = $this->db->query("select * from peserta where username ='$username' and password='$password'");
			if($data->num_rows>0){
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}

