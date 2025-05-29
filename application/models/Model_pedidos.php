<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pedidos  extends CI_Model {
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

    public function getProdutosCarrinho($id_produtos = array()){
        $db = $this->load->database($this->database, TRUE);
        $db->where_in('id', $id_produtos);
        $rs = $db->get($this->tb_produtos)->result();
		if(count($rs)==0){			
			return null;
		}
		return $rs;
    }
}