<?php

    // print_r($produtos);
		// $id_produto = $produto->id;
        // $nome_produto = $produto->nome;
        // $valor_venda = $produto->valor_venda;
        // $count_variacao = count($variacao_estoque);
?>

<div class="container">
  <div class="row g-3">
    <!-- Início do loop PHP -->
    <?php foreach ($produtos as $produto): ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card h-100 shadow-sm">
          <div class="card-body p-3">
            <h6 class="card-title mb-2"><?= $produto['nome'] ?></h6>
            <img src="https://png.pngtree.com/png-clipart/20231017/original/pngtree-example-document-illustrative-model-picture-image_13175920.png" class="card-img-top" alt="...">
             <h6 class="card-title mb-2">Valor R$<?= $produto['valor_venda'] ?></h6>
            <table class="table table-sm table-bordered mb-2">
              <thead class="table-light">
                <tr>
                  <th>Var</th>
                  <th>Qtd</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($produto['variacao_estoque'] as $variacao => $quantidade): ?>
                   
                  <tr>
                    <td><?= $variacao ?></td>
                    <td><?= $quantidade ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
                <div class="d-flex justify-content-between">
                <a href="<?= base_url('Produtos/' . $produto['id']) ?>" class="btn btn-outline-primary btn-sm">Editar</a>
                <a href="<?= base_url('Produtos/deletarProduto/' . $produto['id']) ?>" class="btn btn-outline-danger btn-sm">Excluir</a>
          </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <!-- Fim do loop PHP -->
  </div>
</div>
