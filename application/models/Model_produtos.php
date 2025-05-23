<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produtos  extends CI_Model {

    //databases
	private $database = "motik";

    //tabelas
    private $tb_produtos = "produtos";
    private $tb_pedidos = "pedidos";
    private $tb_estoque = "estoque";
	private $tb_cupons = "cupons";
    
    public function __construct(){
        parent::__construct();		
    }

    //insere novo produto
    public function insertProduto($dados){
        $db = $this->load->database($this->database, TRUE);
        $db->insert($this->tb_produtos, $dados);
        return $db->insert_id();
    }

    public function insertEstoque($dados){
        $db = $this->load->database($this->database, TRUE);
        $db->insert($this->tb_estoque, $dados);
        if($db->affected_rows() == '1'){
    		return true;
        }

    	return false;
    }

    //faz um update no produto
    public function update($id_colab,$dados){
    	$db = $this->load->database($this->database, TRUE);
    	$db->where('id', $id_colab);
    	$db->update($this->tb_produtos, $dados);
    	if($db->affected_rows() == '1'){
    		return true;
        }

    	return false;
    }

    //pega a instituição do id passado
	public function getProduto($id_produto){
		$db = $this->load->database($this->database, TRUE);
        $db->select($this->tb_produtos.'.id AS id,
                        '.$this->tb_produtos.'.nome AS nome,
                        '.$this->tb_produtos.'.valor_venda AS valor_venda,
                        '.$this->tb_estoque.'.variacao AS variacao,
                        '.$this->tb_estoque.'.quantidade AS quantidade');
		$db->where('id', $id_produto);
        $db->join($this->tb_estoque, $this->tb_produtos.'.id = '.$this->tb_estoque.'.id_produto', 'LEFT');
		$rs = $db->get($this->tb_produtos)->result();
		if(count($rs)==0){			
			return null;
		}
        $rs = $rs[0];
		return $rs;
	}
}