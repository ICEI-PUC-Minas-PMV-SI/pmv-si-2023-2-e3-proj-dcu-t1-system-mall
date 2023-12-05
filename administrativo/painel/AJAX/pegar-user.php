<?php
require_once "../../../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $consulta = $pdo->prepare("SELECT * FROM cadastros WHERE cpf_cadastro = :id");
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

    echo json_encode($usuario);
} else {
    echo json_encode(array()); // Retorna um JSON vazio se o ID não estiver definido
}
?>
