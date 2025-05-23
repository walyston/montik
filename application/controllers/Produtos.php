<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends MY_Controller { 

    public function __construct(){
		parent::__construct();	

		$this->load->model('Model_produtos'); 
		// $this->load->model('Model_Pedidos');
		$this->load->helper('form');
    	$this->load->library('form_validation'); 
	}

	public function index($id_produto = NULL){
        if( $id_produto == NULL ){
            redirect('Home');
        }
		//carrega dados do produto
        if($id_produto != 0){
			$produto = $this->Model_produtos->getProduto($id_produto);
			$data['produto'] = $produto;
		}
		$data['variacao_produto'] = array(
			'A'=>'A',
			'B'=>'B',
			'C'=>'C',
			'D'=>'D');

		$views[] = "Produto/View_Produto";
		$this->montaTela($views, $data);
	}

	public function Home(){
		//$this->Model_crm->getCRMsPorPeriodo(143);
		$this->load->view('produto/view_produto');
	}

	public function addProduto(){

		$this->load->helper('form');
    	$this->load->library('form_validation');

    	$this->form_validation->set_rules('nome', 'Nome do produto:', 'required');
    	$dados['produto']['nome'] = $this->input->post('nome_produto');
    	$dados['produto']['valor_venda'] = $this->input->post('valor_produto');
		$dados['estoque']['quantidade'] = $this->input->post('quantidade');
		$dados['estoque']['variacao'] = $this->input->post('variacao_produto');

		if($this->input->post('id_produto')==0){ //Produto novo
    		$dados['estoque']['id_produto'] = $id_produto = $this->Model_produtos->insertProduto($dados['produto']);
			$this->Model_produtos->insertEstoque($dados['estoque']);
		}else{
			$dados['id'] = $this->input->post('id_instituicao');
            $id_produto = $dados['id'];
            //print_r($this->input->post());

            //update nos dados do produto
            $this->Model_instituicao->update($id_inst,$dados);
		}

		// redirect('Home');
	}

}