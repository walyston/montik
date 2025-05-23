<?php
	if(!isset($produto)){
        //dados
        $id_produto = 0;
        $nome_produto = "";
        $valor_venda = "";
        $variacao = "";
        $estoque = 0;
	}else{
		$id_produto = $produto->id;
        $nome_produto = $produto->nome;
        $valor_venda = $produto->valor_venda;
        $variacao = $produto->variacao;
        $estoque = $produto->quantidade;
	}
?>

<div  class="container text-center">
    <div class="row">
        <div class="col-4">
            <?php 
            echo validation_errors();
            echo form_open('Produtos/addProduto', array('id'=>'form_produto'));

                echo form_hidden('id_produto',$id_produto);

                echo form_label('Nome do produto:');
                echo form_input(array(
                    'type'  => 'text',
                    'name'  => 'nome_produto',
                    'id'    => 'nome_produto',
                    'value' => $nome_produto,
                    'class' => 'form-control'
                ));

                echo form_label('Valor do produto:');
                echo form_input(array(
                    'type'  => 'number',
                    'name'  => 'valor_produto',
                    'id'    => 'valor_produto',
                    'value' => $valor_venda,
                    'class' => 'form-control'
                ));

                echo form_label('Selecione uma variação:');
                echo form_dropdown('variacao_produto', 
                                            $variacao_produto, 
                                            isset($variacao)?$variacao:'--', 
                                            array("class"=>'form-control','id'=>'variacao_produto')
                                        );
                
                echo form_label('Estoque:');
                echo form_input(array(
                    'type'  => 'number',
                    'name'  => 'quantidade',
                    'id'    => 'quantidade',
                    'value' => $estoque,
                    'class' => 'form-control'
                ));

                echo form_input(array(
                    'type'  => 'submit',
                    'name'  => 'submit',
                    'id'    => 'salvar_produto',
                    'value' => 'Salvar Produto',
                    'class' => 'btn btn-success'
                ));

            echo form_close();
            ?>
        </div>
    </div> 
</div>


