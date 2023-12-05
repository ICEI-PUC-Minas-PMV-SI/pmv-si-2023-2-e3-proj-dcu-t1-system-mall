<?php
// Substitua o ID do usuário atual pelo valor correto
$id_usuario_atual = $_SESSION['cpf_cadastro']; // Suponha que você esteja usando a sessão para armazenar o ID do usuário

$consulta = $pdo->prepare("SELECT * FROM lojas WHERE cpf_cadastro = :id_usuario");
$consulta->bindParam(':id_usuario', $id_usuario_atual);
$consulta->execute();

$dados_loja = $consulta->fetch(PDO::FETCH_ASSOC);

$nomeLoja = $dados_loja['nome_estabelecimento'];
$pisoLoja = $dados_loja['piso'];
$departamentoLoja = $dados_loja['departamento'];
$contatoLoja = $dados_loja['contato'];
$descricaoLoja = $dados_loja['descricao'];
$acao = "Editar";

$imagemBinaria = $dados_loja['foto_loja'];

if ($imagemBinaria) {
    $imagemCodificada = base64_encode($imagemBinaria);
    $imagemTipo = 'image/jpeg'; // Defina o tipo de imagem corretamente

    $imagemDataUrl = "data:$imagemTipo;base64,$imagemCodificada";
} else {
    $imagemDataUrl = 'https://via.placeholder.com/200x200.png?text=Sem+imagem';
}

?>

<form class="row g-3" method="post" id="lojaForm">

    <div class="img-loja">
        <img src="<?php echo $imagemDataUrl; ?>" alt="Imagem de perfil" class="rounded-circle foto" width="200px" height="200px">
        <label class="arquivo-foto" for="arquivo-foto">Arquivo foto</label>
        <input type="file" id="arquivo-foto" name="arquivo-foto" accept="image/png, image/jpeg, image/jpg" multiple/>
    </div>

    <div class="col-md-6">
        <label class="form-label" style="margin: 0;">Nome</label>
        <input type="text" class="form-control" name="nome" placeholder="Nome do estabelecimento"
               value="<?php echo $nomeLoja; ?>">
    </div>
    <div class="col-md-6">
        <label class "form-label">Piso</label>
        <input type="number" class="form-control" name="piso" placeholder="Piso" value="<?php echo $pisoLoja; ?>">
    </div>
    <div class="col-md-6">
        <label class="form-label">Departamento</label>
        <input type="text" class="form-control" name="departamento" placeholder="Departamento"
               value="<?php echo $departamentoLoja; ?>">
    </div>
    <div class="col-md-6">
        <label class="form-label">Número para contato</label>
        <input type="number" class="form-control" name="contato" placeholder="Número para contato"
               value="<?php echo $contatoLoja; ?>">
    </div>
    <div class="col-12">
        <label class="form-label">Descrição</label>
        <textarea rows="10" class="form-control" name="descricao"
                  placeholder="Descreva seu estabelecimento"><?php echo $descricaoLoja; ?></textarea>
    </div>

    <div class="col-12">
        <button id="botao-alterar" data-id-user="<?= $id_usuario_atual ?>" type="submit" class="btn btn-primary ">Salvar</button>
    </div>
</form>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#botao-alterar').click(function (event) {
            event.preventDefault(); // Evita a recarga da página


            let formData = new FormData();
            let fileInput = $('#arquivo-foto')[0];
            formData.append('arquivo-foto', fileInput.files[0]); //

            // Coletando os valores dos campos de entrada
            let nome = $('input[name="nome"]').val();
            let piso = $('input[name="piso"]').val();
            let departamento = $('input[name="departamento"]').val();
            let contato = $('input[name="contato"]').val();
            let descricao = $('textarea[name="descricao"]').val();
            let userId = $(this).data('id-user');


            formData.append('alterar', userId);
            formData.append('nome', nome);
            formData.append('piso', piso);
            formData.append('departamento', departamento);
            formData.append('contato', contato);
            formData.append('descricao', descricao);

            // Enviando os dados para o PHP via AJAX
            $.ajax({
                type: "POST",
                url: "../AJAX/atualiza_loja.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function () {
                    alert('Atualização feita com sucesso');

                    location.reload();
                }
            });
        });
    });
</script>
