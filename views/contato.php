<?php


require_once "../config/conexao.php";

$dadosForm = $_POST; 

//$dados = json_encode($dadosForm);


$nome = $dadosForm['name'];
$email = $dadosForm['email'];
$senha = $dadosForm['senha'];
$cpf = $dadosForm['cpf'];
$data = new DateTime();
$dataFormatada = $data->format('Y-m-d');
$nome_establecimento = $dadosForm['nome_estabelecimento'];
$piso = $dadosForm['piso'];
$contato = $dadosForm['contato'];
$departamento = $dadosForm['departamento'];
$descricao_estab = $dadosForm['descricao'];
$texto = $dadosForm['solicitacao'];


$inserirSolicitacao = $pdo->prepare("INSERT INTO solicitacoes (nome_solicitante, email_solicitante, senha, data, texto, nome_estabelecimento, descricao_estab, contato_estabelecimento, piso, departamento, cpf_cadastro, status) VALUES ( :nome, :email, :senha, :data , :texto , :nome_estab, :desc_estab ,:contato_estab, :piso, :departamento, :cpf_cadastro, 'PENDENTE' )");
$inserirSolicitacao->bindParam(':nome', $nome);
$inserirSolicitacao->bindParam(':email', $email);
$inserirSolicitacao->bindParam(':senha', $senha);
$inserirSolicitacao->bindParam(':data', $dataFormatada);
$inserirSolicitacao->bindParam(':texto', $texto);
$inserirSolicitacao->bindParam(':nome_estab', $nome_establecimento);
$inserirSolicitacao->bindParam(':desc_estab', $descricao_estab);
$inserirSolicitacao->bindParam(':contato_estab', $contato);
$inserirSolicitacao->bindParam(':piso', $piso);
$inserirSolicitacao->bindParam(':departamento', $departamento);
$inserirSolicitacao->bindParam(':cpf_cadastro', $cpf);


if ($inserirSolicitacao->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
