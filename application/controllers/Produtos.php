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
			$estoque = $this->Model_produtos->getEstoque($id_produto);
			$data['produto'] = $produto;
			foreach($estoque as $key => $value){;
				$data['variacao_estoque'][] = array(
					'variacao' => $value->variacao,
					'quantidade' => $value->quantidade
				);
			}
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
		
		$produto = $this->Model_produtos->getTodosProdutos();
		$data = array();
		foreach($produto as $key => $value){
		
			if(isset($data['produtos'][$value->id])){
				$data['produtos'][$value->id]['variacao_estoque'][$value->variacao] = $value->quantidade;
				// $data['produtos'][$value->id]['variacao_estoque']['quantidade'][] = $value->quantidade;
			}else{
				$data['produtos'][$value->id]['id'] = $value->id;
				$data['produtos'][$value->id]['nome'] = $value->nome;
				$data['produtos'][$value->id]['valor_venda'] = $value->valor_venda;
				$data['produtos'][$value->id]['variacao_estoque'][$value->variacao] = $value->quantidade;
			}
		}
		$views[] = "produto/view_todos_produtos";
		$this->montaTela($views, $data);
	}

	public function addProduto(){

		$this->load->helper('form');
    	$this->load->library('form_validation');

    	$this->form_validation->set_rules('nome', 'Nome do produto:', 'required');
    	$dados['produto']['nome'] = $this->input->post('nome_produto');
    	$dados['produto']['valor_venda'] = $this->input->post('valor_produto');
		$dados['variacao_estoque'] = $this->input->post('variacao_estoque');

		//Produto novo
		if($this->input->post('id_produto')==0){
    		$id_produto = $this->Model_produtos->insertProduto($dados['produto']);
			$this->autalizaEstoque($id_produto,$dados['variacao_estoque']);
		
		//Atualizar produto
		}else{
			$dados['id'] = (int)$this->input->post('id_produto');
            $id_produto = (int)$dados['id'];

            //update nos dados do produto
            $this->Model_produtos->updateProduto($id_produto,$dados['produto']);
			$this->autalizaEstoque($id_produto,$dados['variacao_estoque']);
		}

		redirect('Home');
	}

	public function deletarProduto($id_produto = NULL){
		$this->Model_produtos->deletaEstoque($id_produto);
		$this->Model_produtos->deletaProduto($id_produto);
		redirect('Home');
	}

	private function autalizaEstoque($id_produto, $estoque){

		$this->Model_produtos->deletaEstoque((int)$id_produto);
		foreach($estoque as $dados){
			$dados['id_produto'] = (int)$id_produto;
			$this->Model_produtos->insereEstoque($dados);
		}
	}

}