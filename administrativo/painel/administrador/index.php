<?php
@session_start();
require_once "../../../config/conexao.php";
require_once "../verificar.php";
$cpf_cadastro = $_SESSION['cpf_cadastro'];
$consulta = $pdo->query("SELECT * from cadastros where cpf_cadastro = '$cpf_cadastro'");
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
$nome_usuario = $resultado[0]['nome'];
$email_usuario = $resultado[0]['email'];
$senha_usuario = $resultado[0]['senha'];
$nivel_usuario = $resultado[0]['nivel'];
//MENUS
//$menu1 = 'home';
$menu1 = 'niveis';
if (@$_GET['pag'] == '') {
    $pag = $menu1;
} else {
    $pag = $_GET['pag'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css" media="screen"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/default.css" media="screen"/>
    <link href="../../../assets/img/administrativo/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../../assets/lib/DataTables/datatables.min.css"/>
    <title>
        <?php echo $nome_sistema ?>
    </title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light-shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="../../../assets/img/administrativo/Logo.png" width=" 35px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li>
                    <a class="nav-link " href="index.php?pag=<?php echo $menu1 ?>">Niveis</a>
                </li>

            </ul>
            <div class="d-flex mr-4">
                <img class="img-proifle rounded-circle mr-10" src="../../../assets/img/administrativo/Avatar.png" width="35px"
                     height="35px">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $nome_usuario; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalPerfil">Editar</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a style="cursor: pointer;" class="dropdown-item danger sair-login" data-bs-toggle="modal" data-bs-target="#modal-sair" >Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container ">
    <div class="p10">
        <?php
        require_once($pag . '.php');
        ?>
    </div>
</div>


<body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="../../../assets/lib/DataTables/datatables.min.js"></script>
</body>


</html>

<?php
require_once "../../../views/modal.php";
?>

<script type="text/javascript" src="../../../assets/js/inserir.js">
<script type="text/javascript" src="../../../assets/js/DataTables.js"></script>
