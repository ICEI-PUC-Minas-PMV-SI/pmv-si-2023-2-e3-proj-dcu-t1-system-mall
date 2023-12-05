<?php
require_once "../../../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nivel = $_POST['nivel'];

    $query = $pdo->prepare("UPDATE cadastros SET nome = :nome, email = :email, senha = :senha, nivel = :nivel WHERE cpf_cadastro = :id");
    $query->bindValue(":id", $id);
    $query->bindValue(":nome", $nome);
    $query->bindValue(":email", $email);
    $query->bindValue(":senha", $senha);
    $query->bindValue(":nivel", $nivel);
    $query->execute();

    echo 'Atualizado com sucesso';
} else {
    echo 'Erro ao processar a solicitação';
}
?>
