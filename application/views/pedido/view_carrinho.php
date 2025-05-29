<div class="container mt-5">
  <h3 class="mb-4">Carrinho de Compras</h3>

  <table class="table table-bordered align-middle">
    <thead class="table-light">
      <tr>
        <th>Produto</th>
        <th class="text-center">Quantidade</th>
        <th class="text-end">Valor Unitário</th>
        <th class="text-end">Subtotal</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($carrinho as $item): ?>
        <?php 
          $subtotal = $item['quantidade'] * $item['preco'];
          $total_geral += $subtotal;
        ?>
        <tr>
          <td><?= $item['nome'] ?></td>
          <td class="text-center"><?= $item['quantidade'] ?></td>
          <td class="text-end">R$<?= number_format($item['preco'], 2, ',', '.') ?></td>
          <td class="text-end">R$<?= number_format($subtotal, 2, ',', '.') ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <div class="row justify-content-end">
    <div class="col-md-5">
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between">
            <span>Cupom</span>
            <?php echo form_input(array(
                    'type'  => 'text',
                    'name'  => "cupom",
                    'style' => 'width: auto;',
                    'class' => 'form-control form-control-sm',
                    'min'   => 0,
                )); ?>
                <button type="button" class="btn btn-outline-primary btn-sm">Aplicar</button>
            <span>- R$<?= ($cupom!=0?number_format($cupom, 2, ',', '.'):' ---') ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span>Frete</span>
                <?php echo form_input(array(
                    'type'  => 'text',
                    'name'  => "frete",
                    'style' => 'width: auto;',
                    'class' => 'form-control form-control-sm',
                    'min'   => 0,
                )); ?>
                <button type="button" class="btn btn-outline-primary btn-sm">Calcular</button>
                <span>R$<?= ($frete!=0?number_format($frete, 2, ',', '.'):' ---') ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between fw-bold">
            <span>Total</span>
            <span>
                R$<?= number_format($total_geral - $cupom + $frete, 2, ',', '.') ?>
            </span>
            </li>
        </ul>

      <button class="btn btn-success w-100 mt-3">Finalizar Compra</button>
    </div>
  </div>
</div>