<?php
@session_start();
require_once "../config/conexao.php";
$email = $_POST['email'];
$senha = $_POST['senha'];
$consulta = $pdo->prepare("SELECT * from cadastros where email = :email and senha = :senha ");
$consulta->bindValue(":email", "$email");
$consulta->bindValue(":senha", "$senha");
$consulta->execute();

$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

$contagem_registros = @count($resultado);
//print_r($contagem_registros);
//print_r($resultado);
//exit();
if ($contagem_registros > 0) {

    $nivel = $resultado[0]['nivel'];

    $_SESSION['nivel_usuario'] = $resultado[0]['nivel'];
    $_SESSION['cpf_cadastro'] = $resultado[0]['cpf_cadastro'];
    $_SESSION['nome_usuario'] = $resultado[0]['nome'];

    if ($nivel == "Administrador") {
        echo "<script>window.location='painel/administrador/index.php'</script>";
    } elseif ($nivel == "Lojista") {
        echo "<script>window.location='painel/lojista/index.php'</script>";
    } elseif ($nivel == "Gerente") {
        echo "<script>window.location='painel/gerente/index.php'</script>";
    }
} else {
    echo "<script>alert('Informações de login inválidas')</script>";
    echo "<script>window.location='index.php'</script>";
}
?>