<?php

require_once "../../../config/conexao.php";

$nome = $_POST['nome-usuario'];
$email = $_POST['email-usuario'];
$senha = $_POST['senha-usuario'];
$id = $_POST['id-usuario'];


$consulta = $pdo->query("SELECT * from cadastros where cpf_cadastro = '$id'");
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
$contagem_registros = @count($resultado);

$query = $pdo->prepare("UPDATE cadastros SET nome = :nome, email = :email, senha = :senha WHERE cpf_cadastro = '$id'");
$query->bindValue(":email", "$email");
$query->bindValue(":senha", "$senha");
$query->bindValue(":nome", "$nome");
$query->execute();

echo 'Salvo com Sucesso';



?>