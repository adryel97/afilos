<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?=url()?>/img/icone.png">
    <link rel="stylesheet" href="<?=url()?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=url()?>/css/app.css">
    <link rel="stylesheet" href="<?=url()?>/css/all.min.css">
    <link rel="stylesheet" href="<?=url()?>/node_modules/@sweetalert2/theme-bootstrap-4/bootstrap-4.min.css">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />

    <title>Afilos - <?= $title ?></title>

    <script src="<?=url()?>/lib/jquery/jquery-3.5.1.min.js"></script>
    <script src="<?=url()?>/lib/popper/popper.min.js"></script>
    <script src="<?=url()?>/js/all.min.js"></script>
    <script src="<?=url()?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=url()?>/lib/mask/jquery.mask.min.js"></script>
    <script src="<?=url()?>/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="<?=url()?>/lib/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=url()?>/lib/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>

</head>
<body class="">
    <!--- cabeçalho --->
    <header class="header bg-gray-1">
        <div class="container-fluid d-flex">
            <div class="text-primary w-50">
                <span class="btn__bar">
                    <i class="fas fa-bars fa-lg "></i>
                </span>
            </div>
            <div class="text-primary w-50 text-right">
                <span>SAIR </span> <i class="fas fa-sign-in-alt fa-lg ml-1"></i>
            </div>
        </div>
    </header>
    <!--- menu --->
    <nav class="menu bg-primary-gr pt-2 pb-2">
        <figure class="d-flex justify-content-center align-items-center m-0 border-bottom border-white pb-1">
            <img src="<?=url()?>/img/logoA-branco.png" width="60px" style="opacity: 0.5;">
        </figure>
        <div class="text-center mb-5 mt-5">
            <div>
                <i class="fas fa-user-circle fa-3x text-white"></i>
            </div>
            <small class="text-white">nome usuario</small>
        </div>
        <div style="height: 55vh; overflow-y: scroll;" id="scroll--menu">
            <div class="d-flex flex-column mb-5 align-items-center justify-content-center pl-3 pr-3">
                <div class="p-1 text-center text-white">
                    <a href="#" class="text-decoration-none text-white">
                        <div class="w-100 p-3 rounded  text-center">
                            <i class="fas fa-home fa-lg"></i>
                        </div>
                        <small>dasboard</small>
                    </a>
                </div>
            </div>
            <div class="d-flex flex-column mt-5 align-items-center justify-content-center pl-3 pr-3">
                <div class="p-1 text-center ">
                    <a href="<?= url('estoque') ?>" class="text-decoration-none text-white">
                        <div class="w-100 p-3 rounded  text-center">
                            <i class="fas fa-box-open fa-lg"></i>
                        </div>
                        <small>estoque</small>
                    </a>
                </div>
            </div>
            <div class="d-flex flex-column mt-5 align-items-center justify-content-center pl-3 pr-3">
                <div class="p-1 text-center text-white">
                    <a href="#" class="text-decoration-none text-white">
                        <div class="w-100 p-3 rounded  text-center">
                        <i class="fas fa-dolly fa-lg"></i>
                        </div>
                        <small>entrada</small>
                    </a>
                </div>
            </div>
            <div class="d-flex flex-column mt-5 align-items-center justify-content-center pl-3 pr-3">
                <div class="p-1 text-center text-white">
                    <a href="#" class="text-decoration-none text-white">
                        <div class="w-100 p-3 rounded  text-center">
                            <i class="fas fa-truck-loading fa-lg"></i>
                        </div>
                        <small>saída</small>
                    </a>
                </div>
            </div>
        </div>
    </nav>

      <!--- breadcrumb --->
    <div class="nav-bread">
    <?php 
            if ($this->section("breadcrumb")): 
                echo $this->section("breadcrumb");
            else:
        ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb rounded-0 pt-1 pb-1 bg-white">
                <li class="breadcrumb-item active" aria-current="page">dashboard</li>
            </ol>
        </nav>
        <?php
          endif;
        ?>
    </div>
    <!--- conteudo --->
    <main class="content">
        <div class="container-fluid">
            <?= $this->section("content");?>
        </div>
    </main>
    <script src="<?=url()?>/js/appMenu.js"></script>
    <script src="<?=url()?>/js/config.js"></script>
    <?= $this->section("js");?>
</body>
</html>