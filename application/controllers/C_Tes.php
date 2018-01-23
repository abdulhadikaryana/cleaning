<?php
    // defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Tes extends CI_Controller {
    
        public function __construct(){
            parent ::__construct();
            
        }
        public function see()
        {
            $jenis[0]= 'foto';
            $jenis[2]= 'profpict';
            $jenis[3]= 'sks';
            $jenis[4]='drh';
            $seq=0;
            foreach ($jenis as $key ) {
                $datakonten=$this->M_Peserta->getkontenseniman('email3@domain.com',$jenis);
                $seq2=0;
                foreach ($datakonten as $result_array() => $keykonten) {
                    $kontenarray[$jenis][$seq2]=$keykonten['path'];
                    echo $kontenarray[$jenis][$seq2].'-->'.$keykonten['id'].'<br>';
                }
                $seq=$seq+1;
            }
        }
    
    }
    
    /* End of file Tes.php */
    /* Location: ./application/controllers/Tes.php */
    