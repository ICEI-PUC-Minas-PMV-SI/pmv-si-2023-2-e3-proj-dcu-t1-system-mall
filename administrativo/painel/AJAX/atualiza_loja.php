<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'system_mall';
date_default_timezone_set('America/Sao_Paulo');
try {
    $pdo = new PDO("mysql:dbname=$banco; host=$servidor;charset=utf8", "$usuario", "$senha");
} catch (Exception $e) {
    echo '<b>Não foi possivel conectar com o banco de dados</b><br>' . $e;
}


if (isset($_POST['alterar'])) {
    @$nomeLojaPost = $_POST['nome'];
    @$pisoLojaPost = $_POST['piso'];
    @$departamentoLojaPost = $_POST['departamento'];
    @$contatoLojaPost = $_POST['contato'];
    @$descricaoLojaPost = $_POST['descricao'];
    @$id_usuario_atual = $_POST['alterar'];
    if (isset($_FILES['arquivo-foto']) && $_FILES['arquivo-foto']['error'] === UPLOAD_ERR_OK) {
        $imagem_binaria = file_get_contents($_FILES['arquivo-foto']['tmp_name']);
        // Aqui você pode atualizar a tabela 'lojas' com os novos dados, incluindo a imagem no formato LONGBLOB
        $updateQuery = $pdo->prepare("UPDATE lojas SET nome_estabelecimento = :nome, piso = :piso, departamento = :departamento, contato = :contato, descricao = :descricao, foto_loja = :imagem WHERE cpf_cadastro = :id_usuario");
        $updateQuery->bindParam(':nome', $nomeLojaPost);
        $updateQuery->bindParam(':piso', $pisoLojaPost);
        $updateQuery->bindParam(':departamento', $departamentoLojaPost);
        $updateQuery->bindParam(':contato', $contatoLojaPost);
        $updateQuery->bindParam(':descricao', $descricaoLojaPost);
        $updateQuery->bindParam(':imagem', $imagem_binaria, PDO::PARAM_LOB);
        $updateQuery->bindParam(':id_usuario', $id_usuario_atual);
        $updateQuery->execute();
    } else {
        // Aqui você pode atualizar a tabela 'lojas' com os novos dados, sem incluir a imagem
        $updateQuery = $pdo->prepare("UPDATE lojas SET nome_estabelecimento = :nome, piso = :piso, departamento = :departamento, contato = :contato, descricao = :descricao WHERE cpf_cadastro = :id_usuario");
        $updateQuery->bindParam(':nome', $nomeLojaPost);
        $updateQuery->bindParam(':piso', $pisoLojaPost);
        $updateQuery->bindParam(':departamento', $departamentoLojaPost);
        $updateQuery->bindParam(':contato', $contatoLojaPost);
        $updateQuery->bindParam(':descricao', $descricaoLojaPost);
        $updateQuery->bindParam(':id_usuario', $id_usuario_atual);
        $updateQuery->execute();
    }
}
