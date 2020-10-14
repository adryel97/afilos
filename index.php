<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/all.min.css">
    
    <title>Afilos</title>

    <script src="lib/jquery/jquery-3.5.1.min.js"></script>
    <script src="lib/popper/popper.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <!--- cabeçalho --->
    <header class="header bg-dark d-flex">
        <div class="text-white w-50">
            <i class="fas fa-bars fa-lg "></i>
        </div>
        <div class="text-white w-50 text-right">
            <span>SAIR </span> <i class="fas fa-sign-in-alt fa-lg ml-1"></i>
        </div>
    </header>
    <!--- menu --->
    <nav class="menu bg-gray-2 pt-2 pb-2">
        <figure class="d-flex justify-content-center align-items-center m-0 border-bottom pb-1">
            <img src="img/logo-afilos.png" width="50px">
        </figure>
        <div class="text-center mb-5 mt-5">
            <div>
                <i class="fas fa-user-circle fa-3x text-gray-5"></i>
            </div>
            <small class="text-gray-5">nome usuario</small>
        </div>
        <div class="d-flex flex-column mb-5 align-items-center justify-content-center pl-3 pr-3">
            <div class="p-1 text-center text-gray-5">
                <a href="#" class="text-decoration-none text-gray-5">
                    <div class="w-100 p-3 rounded bg-gray-1 text-center">
                        <i class="fas fa-home fa-lg"></i>
                    </div>
                    <small>dasboard</small>
                </a>
            </div>
        </div>
        <div class="d-flex flex-column mt-5 align-items-center justify-content-center pl-3 pr-3">
            <div class="p-1 text-center ">
                <a href="#" class="text-decoration-none text-gray-5">
                    <div class="w-100 p-3 rounded bg-gray-1 text-center">
                        <i class="fas fa-box-open fa-lg"></i>
                    </div>
                    <small>estoque</small>
                </a>
            </div>
        </div>
        <div class="d-flex flex-column mt-5 align-items-center justify-content-center pl-3 pr-3">
            <div class="p-1 text-center text-gray-5">
                <a href="#" class="text-decoration-none text-gray-5">
                    <div class="w-100 p-3 rounded bg-gray-1 text-center">
                    <i class="fas fa-dolly fa-lg"></i>
                    </div>
                    <small>entrada</small>
                </a>
            </div>
        </div>
        <div class="d-flex flex-column mt-5 align-items-center justify-content-center pl-3 pr-3">
            <div class="p-1 text-center text-gray-5">
                <a href="#" class="text-decoration-none text-gray-5">
                    <div class="w-100 p-3 rounded bg-gray-1 text-center">
                        <i class="fas fa-truck-loading fa-lg"></i>
                    </div>
                    <small>saída</small>
                </a>
            </div>
        </div>
    </nav>
    <!--- conteudo --->
    <main class="content">
        <div class="container-fluid">
            <h3>Conteudo</h3>
        </div>
    </main>
</body>
</html>