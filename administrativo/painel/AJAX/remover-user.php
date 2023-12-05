<?php
require_once "../../../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];

    $query = $pdo->prepare("DELETE FROM cadastros WHERE cpf_cadastro = :id");
    $query->bindValue(":id", $id);
    $query->execute();

    echo 'Removido com sucesso';
} else {
    echo 'Erro ao processar a solicitação';
}
?>
