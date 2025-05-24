<script>
$(document).ready(function () {
    let count = $("[name='count_variacao']").val();
    $('#btn-adicionar-variacao').click(function () {
        const novaLinha = `
            <div class="input-group mb-3 linha-variacao">
                <span class="input-group-text">Variação</span>
                <select name="variacao_estoque[${count}][variacao]" class="form-control" required>
                    <?php foreach ($variacao_produto as $key => $value): ?>
                        <option value="<?= $key ?>"><?= $value ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="input-group-text">Estoque</span>
                <input type="number" name="variacao_estoque[${count}][quantidade]" class="form-control" min="0" required>
                <button type="button" class="btn btn-danger btn-remover-variacao">Remover</button>
            </div>
        `;
        $('#container-variacoes').append(novaLinha);
        count++;
    });

    // Remover linha
    $(document).on('click', '.btn-remover-variacao', function () {
        $(this).closest('.linha-variacao').remove();
    });
});
</script>