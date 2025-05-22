<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends MY_Controller { 

    public function __construct(){
		parent::__construct();	
        //Carrega Model
		$this->load->model('Model_produtos'); 
		$this->load->model('Model_Pedidos'); 
	}

	public function Home(){
		//$this->Model_crm->getCRMsPorPeriodo(143);
		$this->load->view('produtos');
	}

}