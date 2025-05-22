<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {    

    function __construct(){
        parent::__construct();
    } 

	public function montaTela($views, $data=NULL) {
        //Carrega Model 'Portal'
        // $this->load->model('Model_menu');
        // $this->load->helper('Tela');
        // $data['dadosMenu'] = $this->Model_menu->getMenu($this->session->userdata('setor_colaborador'),$this->session->userdata('cargo_colaborador'));   
        // echo $this->load->view('includes/head', "", TRUE);
        // echo $this->load->view('includes/header', "", TRUE);
        // echo $this->load->view('includes/modal', $data, TRUE);
        // echo $this->load->view('includes/sidebar', $data, TRUE);
        // foreach ($views as $i => $view) {
        //     echo $this->load->view($view, $data, TRUE);
        // }
        // echo $this->load->view('includes/footer', "", TRUE);
        exit;      
    }

}