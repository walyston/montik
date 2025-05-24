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

    public function insereEstoque($dados){
        $db = $this->load->database($this->database, TRUE);
        $db->insert($this->tb_estoque, $dados);
        if($db->affected_rows() > '0'){
            return true;
        }
        return false;
    }


    public function deletaProduto($id_produto){
        $db = $this->load->database($this->database, TRUE);
        $db->where("id", $id_produto);
        $db->delete($this->tb_produtos);

        if($db->affected_rows() > '0'){
            return true;
        }
        return false;
    }

    public function deletaEstoque($id_produto){
        $db = $this->load->database($this->database, TRUE);
        $db->where("id_produto", $id_produto);
        $db->delete($this->tb_estoque);

        if($db->affected_rows() > '0'){
            return true;
        }
        return false;
    }

    //faz um update no produto
    public function updateProduto($id_produto,$dados){
    	$db = $this->load->database($this->database, TRUE);
    	$db->where('id', $id_produto);
    	$db->update($this->tb_produtos, $dados);
    	if($db->affected_rows() == '1'){
    		return true;
        }

    	return false;
    }

    //faz um update no estoque
    public function updateEstoque($dados){

        $db = $this->load->database($this->database, TRUE);
        $db->where('id_produto', $dados['id_produto']);
        $db->insert($this->tb_estoque, $dados);
        if($db->affected_rows() > '0'){
            return true;
        }
        return false;

    }

    //pega o produto especifico
	public function getProduto($id_produto){
		$db = $this->load->database($this->database, TRUE);
		$db->where('id', $id_produto);
		$rs = $db->get($this->tb_produtos)->result();
		if(count($rs)==0){			
			return null;
		}
        $rs = $rs[0];
		return $rs;
	}

    public function getTodosProdutos(){
		$db = $this->load->database($this->database, TRUE);
        $db->join($this->tb_estoque, $this->tb_produtos.'.id = '.$this->tb_estoque.'.id_produto', 'LEFT');
        // $db->group_by($this->tb_produtos.'.id');
		$rs = $db->get($this->tb_produtos)->result();
		if(count($rs)==0){			
			return null;
		}
		return $rs;
	}

    public function getEstoque($id_produto){
		$db = $this->load->database($this->database, TRUE);
		$db->where('id_produto', $id_produto);
		$rs = $db->get($this->tb_estoque)->result();
		if(count($rs)==0){			
			return null;
		}
		return $rs;
	}
}