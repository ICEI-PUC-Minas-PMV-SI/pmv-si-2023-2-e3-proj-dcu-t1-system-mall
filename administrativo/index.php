<?php
//include_once "views/head.php"
require_once "../config/conexao.php";
require_once "../config/config.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../assets/css/default.css" media="screen" />
    <link href="../assets/img/administrativo/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <title><?php echo $nome_sistema ?></title>
</head>

<body>
    <section class="background-radial-gradient overflow-hidden">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5 item-login">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        System Mall<br />
                        <span style="color: #1fff93">Your Manager</span><br>
                    </h1>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form method="post" action="autenticar.php">
                                <div class="mt-4 form-outline ">
                                    <input name="email" type="email" id="form3Example3" class="form-control" placeholder="Email*" required autofocus />
                                </div>
                                <div class="mt-5 form-outline mb-2">
                                    <input name="senha" type="password" id="form3Example4" class="form-control" placeholder="Senha*" required />
                                </div>
                                <div class="mt-5 d-flex align-items-center justify-content-center" style="gap: 10px">
                                    <a href="../index.php" class="btn btn-primary btn-block
                                    btn-voltar">Voltar</a>
                                    <button type="submit" class="btn btn-primary btn-block btn-login">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>    
</body>
</html>