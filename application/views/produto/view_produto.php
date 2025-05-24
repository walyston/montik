<?php
	if(!isset($produto)){
        //dados
        $id_produto = 0;
        $nome_produto = "";
        $valor_venda = "";
        $variacao_estoque = array();
        $count_variacao = 0;
	}else{
		$id_produto = $produto->id;
        $nome_produto = $produto->nome;
        $valor_venda = $produto->valor_venda;
        $count_variacao = count($variacao_estoque);
	}
?>

<div  class="container text-center">
    <div class="row">
        <?php 
            echo validation_errors();
            echo form_open('Produtos/addProduto', array('id'=>'form_produto'));
        ?>
        <div class="col-6">
            <?php 
                echo form_hidden(
                    array(
                        'id_produto' => $id_produto,
                        'count_variacao' => $count_variacao,
                    )
                );


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
                    'step'  => 0.01,
                    'value' => $valor_venda,
                    'class' => 'form-control'
                ));
            ?>
        </div>

        <div class="col-6">
            <?php echo form_label('Adicionar variações e estoque:'); ?>

            <div id="container-variacoes">
                <?php foreach($variacao_estoque as $key => $value):?>
                <div class="input-group mb-3 linha-variacao">
                    <span class="input-group-text">Variação</span>
                    <?php 
                        echo form_dropdown("variacao_estoque[{$key}][variacao]", 
                            $variacao_produto, 
                            isset($value['variacao']) ? $value['variacao'] : '', 
                            array("class"=>'form-control', 'required' => 'required')
                        ); 
                    ?>
                    <span class="input-group-text">Estoque</span>
                    <?php echo form_input(array(
                        'type'  => 'number',
                        'name'  => "variacao_estoque[{$key}][quantidade]",
                        'value' => isset($value['quantidade']) ? $value['quantidade'] : '',
                        'class' => 'form-control',
                        'min'   => 0,
                        'required' => 'required'
                    )); ?>
                    <button type="button" class="btn btn-danger btn-remover-variacao">Remover</button>
                </div>
                <?php endforeach;?>
            </div>

            <button type="button" class="btn btn-secondary mt-2" id="btn-adicionar-variacao">Adicionar</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-6">
            <?php echo form_input(array(
                        'type'  => 'submit',
                        'name'  => 'submit',
                        'id'    => 'salvar_produto',
                        'value' => 'Salvar Produto',
                        'class' => 'btn btn-success'
                    ));?>
        </div>
            
    </div>
    <?php 
    echo form_close(); 
    ?>
</div>
