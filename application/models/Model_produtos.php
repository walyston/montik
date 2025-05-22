<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produtos  extends CI_Model {

    public function __construct(){
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
	}
}