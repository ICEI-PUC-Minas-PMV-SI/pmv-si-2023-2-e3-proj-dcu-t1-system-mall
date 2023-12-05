<?php
// Inclua a conexão com o banco de dados
require_once "../../../config/conexao.php";
$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$nivel = $_POST['nivel'];
$senha = $_POST['senha'];

$data = new DateTime();
$dataFormatada = $data->format('Y-m-d');

$inserirUser = $pdo->prepare("INSERT INTO cadastros (nome, email, senha, nivel, cpf_cadastro, data_cadastro) VALUES (:nome, :email, :senha, :nivel, :cpf, :data)");
$inserirUser->bindParam(':nome', $nome);
$inserirUser->bindParam(':email', $email);
$inserirUser->bindParam(':cpf', $cpf);
$inserirUser->bindParam(':data', $dataFormatada);
$inserirUser->bindParam(':senha', $senha);
$inserirUser->bindParam(':nivel', $nivel);
$inserirUser->execute();
return $inserirUser;
?>
