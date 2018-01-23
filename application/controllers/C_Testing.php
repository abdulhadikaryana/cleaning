<?php
	class c_Testing extends CI_Controller{
		public function __construct(){
			parent ::__construct();
			
		}

		public function seeresult(){
			$jeniskonten=array();
                $jeniskonten[0]='drh';
                $jeniskonten[1]='sks';
                $jeniskonten[2]='foto';
                $jeniskonten[3]='profpict';
                
                foreach ($jeniskonten as $key ) {
                    // echo $key;
                    // echo $nisn_siswa.'<br>';
                    $datakonten=$this->M_Peserta->getkontenseniman('email3@domain.com',$key);
                    // echo $datakonten.'<br>';
                    $seq=0;
                    foreach ($datakonten->result_array() as  $keykonten) {
                        $keykonten[$key]=$key;
                        $kontenarray[$key][$seq]=$keykonten['path'];
                        //echo $kontenarray[$key][$seq].'<br>';
                        
                        
                    }
                    echo $keykonten['profpict'].'<br>';
                }
                // echo $kontenarray['drh'][$keykonten['email']].'<br>';


		}
	}