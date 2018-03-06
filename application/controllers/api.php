<?php

require(APPPATH.'/libraries/REST_Controller.php');
 
class Api extends REST_Controller{
    
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_Admin');
    }

    //API -  Fetch All Penetapan Data
    function penetapan_get(){

        $result = $this->M_Admin->penetapan_read();

        if($result){

            $this->response($result, 200); 

        } 

        else{

            $this->response("No record found", 404);

        }
    }

    function pencatatan_get(){
        $result = $this->M_Admin->pencatatan_read();

        if($result){

            $this->response($result, 200); 

        } 

        else{

            $this->response("No record found", 404);

        }
    }

}