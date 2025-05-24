<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {    

    function __construct(){
        parent::__construct();
        $this->load->helper('url');

    } 

	public function montaTela($views, $data=NULL) {
        echo $this->load->view('includes/head', "", TRUE);
        // echo $this->load->view('includes/header', "", TRUE);
        foreach ($views as $i => $view) {
            echo $this->load->view($view, $data, TRUE);
        }
        echo $this->load->view('includes/scripts', "", TRUE);
        echo $this->load->view('includes/footer', "", TRUE);
        exit;      
    }

}