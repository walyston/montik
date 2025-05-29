<!DOCTYPE html>
<style>
    .background{
        background-color: #b9b9b9;
    }
    .m-t {
        margin-top: 20px;
    }
    </style>

</style>
<html lang="en">
    <head>  
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>
      <!-- Sidebar -->
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Menu</button>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td class="align-middle"><a href="<?= base_url('Home') ?>">Home</a></td>
                    </tr>
                    <tr>
                        <td class="align-middle"><a href="<?= base_url('Produtos/0') ?>">Novo Produto</a></td>
                    </tr>
                    <tr>
                        <td class="align-middle"><a href="<?= base_url('Carrinho') ?>"><?= (count((isset($this->session->get_userdata()['carrinho'])?$this->session->get_userdata()['carrinho']:array()))>0 ? "Carrinho (".count($this->session->get_userdata()['carrinho']).")":"Carrinho");?></a></td>
                    </tr>
                </tbody>
            </table>       
        </div>
    </div>
    <body class="background m-t">
        <section id="container">
            <div id="row-content" class="content">
                <br>