<?php
require_once "../../../config/conexao.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["aceitar"])) {
        $id_solicitacao = $_POST["aceitar"];
        // Consulte a solicitação a ser aceita
        $consulta = $pdo->prepare("SELECT * FROM solicitacoes WHERE id_solicitacao = :id_solicitacao");
        $consulta->bindParam(':id_solicitacao', $id_solicitacao);
        $consulta->execute();
        $solicitacao = $consulta->fetch(PDO::FETCH_ASSOC);
        if ($solicitacao) {
            // Inserir os dados na tabela de cadastros com o nível "lojista"
            $nome = $solicitacao['nome_solicitante'];
            $email = $solicitacao['email_solicitante'];
            $senha = $solicitacao['senha']; 
            $cpf = $solicitacao['cpf_cadastro'];
            $data = new DateTime();
            $dataFormatada = $data->format('Y-m-d');
            $nivel = "Lojista"; 
            
            // Inserir os dados na tabela de cadastros
            $inserirSolicitante = $pdo->prepare("INSERT INTO cadastros (cpf_cadastro, nome, email, senha, nivel, data_cadastro) VALUES (:cpf, :nome, :email, :senha, :nivel, :data)");
            $inserirSolicitante->bindParam(':nome', $nome);
            $inserirSolicitante->bindParam(':cpf', $cpf);
            $inserirSolicitante->bindParam(':data', $dataFormatada);
            $inserirSolicitante->bindParam(':email', $email);
            $inserirSolicitante->bindParam(':senha', $senha);
            $inserirSolicitante->bindParam(':nivel', $nivel);
            $inserirSolicitante->execute();
            // BUSCA O ID DE QUEM SOLICITOU NA TABELA CADASTROS
            $buscarSolicitanteID = $pdo->prepare("SELECT cpf_cadastro as id FROM cadastros where email = :email");
            $buscarSolicitanteID->bindParam(':email', $email);
            $buscarSolicitanteID->execute();
            $id_solicitante = $buscarSolicitanteID->fetch(PDO::FETCH_ASSOC);

            $descricao = $solicitacao['descricao_estab'];
            $nome_estabelecimento = $solicitacao['nome_estabelecimento'];
            $contato_estabelecimento = $solicitacao['contato_estabelecimento'];
            $piso = $solicitacao['piso'];
            $departamento = $solicitacao['departamento'];
            $contato = $solicitacao['contato_estabelecimento'];

            $inserir = $pdo->prepare("INSERT INTO lojas (cpf_cadastro, nome_estabelecimento, departamento, piso, contato, descricao) VALUES (:id, :nome, :departamento, :piso, :contato, :descricao)");
            $inserir->bindParam(':id', $id_solicitante['id']);
            $inserir->bindParam(':nome', $nome_estabelecimento);
            $inserir->bindParam(':departamento', $departamento);
            $inserir->bindParam(':piso', $piso);
            $inserir->bindParam(':contato', $contato);
            $inserir->bindParam(':descricao', $descricao);
            $inserir->execute();

            $atualizar = $pdo->prepare("UPDATE solicitacoes SET status  = 'APROVADA' WHERE id_solicitacao = :id_solicitacao");
            $atualizar->bindParam(':id_solicitacao', $id_solicitacao);
            $atualizar->execute();
            // Redirecione de volta à página de solicitações
            header("Location: http://localhost/System_mall/administrativo/painel/gerente/index.php?pag=Solicitacoes");
            exit;
        }
    } elseif (isset($_POST["recusar"])) {
        $id_solicitacao = $_POST["recusar"];
        // Remova a solicitação recusada da tabela de solicitacoes
        $atualizar = $pdo->prepare("UPDATE solicitacoes SET status  = 'REJEITADA' WHERE id_solicitacao = :id_solicitacao");
        $atualizar->bindParam(':id_solicitacao', $id_solicitacao);
        $atualizar->execute();
        // Redirecione de volta à página de solicitações
        header("Location: http://localhost/System_mall/administrativo/painel/gerente/index.php?pag=Solicitacoes");
        exit;
    }
}
?>
