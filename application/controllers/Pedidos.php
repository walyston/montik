<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends MY_Controller { 

    public function __construct(){
		parent::__construct();	

		$this->load->model('Model_produtos'); 
		$this->load->model('Model_pedidos');
		$this->load->helper('form');
    	$this->load->library('form_validation'); 
	}


    public function addCarrinho($id_produto){
       if(isset($this->session->get_userdata()['carrinho']) && key_exists($id_produto, $this->session->get_userdata()['carrinho'])){
            $this->session->get_userdata()['carrinho'][$id_produto]++;
       }else{
        $produtos = $this->session->get_userdata()['carrinho'];
        $produtos[$id_produto] = $produtos[$id_produto] ? ($produtos[$id_produto]+1) : 1;
        $this->session->set_userdata('carrinho',$produtos);
       }
       redirect('Home');
    }

    public function getCarrinho(){
        $data['carrinho'] = array();
        $data['cupom'] = 0;
        $data['frete'] = 0;
        $data['total_geral'] = 0;

        if(!empty($this->session->get_userdata()['carrinho'])){
            $produtos_sessao = $this->session->get_userdata()['carrinho'];
            $produtos = $this->Model_pedidos->getProdutosCarrinho(array_keys($produtos_sessao));
            
            foreach ($produtos as $key => $value) {
                $data['carrinho'][]=array(
                    'id_produto'    => $value->id,
                    'nome'          => $value->nome,
                    'preco'         => $value->valor_venda,
                    'quantidade'    => $produtos_sessao[$value->id],
                );
            }
        }

        $views[] = "Pedido/View_Carrinho";
		$this->montaTela($views, $data);
    }

    public function delCarrinho(){
        $this->session->unset_userdata('carrinho');
    }

    public function delProdutoCarrinho($id_produto){

        $produtos = $this->session->get_userdata()['carrinho'];
        if ($produtos[$id_produto] > 1){
            
            $produtos[$id_produto] -=1;
        }else{
            unset($produtos[$id_produto]);
        }
        $this->session->set_userdata('carrinho',$produtos);
        redirect('Carrinho');
    }

}