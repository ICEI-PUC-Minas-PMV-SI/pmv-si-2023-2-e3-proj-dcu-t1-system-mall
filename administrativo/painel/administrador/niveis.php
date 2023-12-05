<?php
require_once "../../../config/conexao.php";
//require_once "verificar.php";
$pagina = 'Cadastros';
?>
<div class="col-md-12 my-3">
    <a class="btn btn-dark btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#modalNovoAcesso">Novo Acesso</a>
</div>

<div class="tabela bg-light rounded" style="padding: 15px">
    <table id="myTable" class="table table-hover my-4" style="width:100%">
        <thead>
        <tr>
            <th style="width: 280.809px;"><span>Nome</span></th>
            <th style="width: 285.243px;"><span>Nível</span></th>
            <th style="width: 300px;"><span>Email</span></th>
            <th style="width: 84.878px;"
            ">Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $consulta = $pdo->query("SELECT * from  cadastros order by cpf_cadastro desc");
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        for ($contador = 0; $contador < count($resultado); $contador++) {
            foreach ($resultado[$contador] as $key => $value) {
            } ?>
            <tr>
                <td><?php echo $resultado[$contador]['nome'] ?></td>
                <td><?php echo $resultado[$contador]['nivel'] ?></td>
                <td><?php echo $resultado[$contador]['email'] ?></td>
                <td style="display: flex;" class="text-center td-edit">
                    <div class="d-flex gap10">
                        <a class="btn btn-warning btn-xs editar-usuario" role="button" data-bs-toggle="modal"
                           data-bs-target="#modal-editar-Perfil"
                           data-id-cadastro="<?php echo $resultado[$contador]['cpf_cadastro'] ?>">
                            <i style="color: white" class="bi bi-pencil-square"></i>
                        </a>
                        <a class="btn btn-danger btn-xs excluir-usuario"
                           role="button"
                           data-bs-toggle="modal"
                           data-bs-target="#modal-excluir-user"
                           data-id-cadastro="<?php echo $resultado[$contador]['cpf_cadastro'] ?>"
                           data-nome-usuario="<?php echo $resultado[$contador]['nome'] ?>">
                            <i style="color: white" class="bi bi-trash"></i>
                        </a>

                        <div class="modal" tabindex="-1" role="dialog" id="modal-excluir-user">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Excluir usuário</h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Você realmente deseja excluir o
                                            usuário <?php echo $resultado[$contador]['nome'] ?> ? </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary remover-usuario">Sim</button>
                                        <button type="button" class="btn btn-secondary" id="btn-nao"
                                                data-dismiss="modal">Não
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script type="text/javascript">
	$(document).ready(function () {
		$('#example').DataTable({
			"ordering": false
		});
	});
</script>

<script>
	$(document).ready(function () {
		$('#form-novoUser').submit(function (e) {
			e.preventDefault(); // Impede o envio padrão do formulário

			let nome = $('input[name="nome-novo-usuario"]').val();
			let email = $('input[name="email-novo-usuario"]').val();
			let CPF = $('input[name="cpf-novo-usuario"]').val();
			let nivel = $('select[name="nivel-novo-usuario"]').val(); // Use 'select' em vez de 'input'
			let senha = $('input[name="senha-novo-usuario"]').val();

			$.ajax({
				type: 'POST',
				url: '../AJAX/novo_user.php',
				data: {
					nome: nome,
					email: email,
					cpf: CPF,
					nivel: nivel,
					senha: senha
				},
				success: function (response) {
					// Manipule a resposta do servidor, se necessário
					console.log(response);

					// Feche o modal
					$('#modalNovoAcesso').modal('hide');

					// Limpe os campos do formulário
					$('#form-novoUser')[0].reset();

					location.reload();
				},
				error: function (error) {
					// Manipule erros, se houver
					console.error(error);
				}
			});
		});
		$('.editar-usuario').click(function () {
			let idCadastro = $(this).data('id-cadastro');
			$.ajax({
				type: 'POST',
				url: '../AJAX/pegar-user.php', // Crie um arquivo PHP para buscar os detalhes do usuário
				data: {id: idCadastro},
				success: function (response) {
					// Preencha o modal com os detalhes do usuário
					let usuario = JSON.parse(response);
					$('#modal-editar-Perfil input[name="id-usuario-editar"]').val(usuario.cpf_cadastro);
					$('#modal-editar-Perfil input[name="nome-usuario-editar"]').val(usuario.nome);
					$('#modal-editar-Perfil input[name="email-usuario-editar"]').val(usuario.email);
					$('#modal-editar-Perfil input[name="senha-usuario-editar"]').val(usuario.senha);
					$('#modal-editar-Perfil select[name="nivel-novo-usuario-editar"]').val(usuario.nivel);
				},
				error: function (error) {
					console.error(error);
				}
			});
		});


		$('.excluir-usuario').click(function () {
			let idCadastro = $(this).data('id-cadastro');
			let nomeUsuario = $(this).data('nome-usuario');

			// Preencha o modal com o nome do usuário
			$('#modal-excluir-user p').text('Você realmente deseja excluir o usuário ' + nomeUsuario + '?');

			$('.remover-usuario').data('id-cadastro', idCadastro); // Atualize o botão "Sim" com o ID correto

			// Abra o modal de exclusão
			$('#modal-excluir-user').modal('show');
		});

		$('#btn-nao').click(function () {
			$('#modal-excluir-user').modal('hide');
		});


		$('.remover-usuario').click(function () {
			let idCadastro = $(this).data('id-cadastro');
			$.ajax({
				type: 'POST',
				url: '../AJAX/remover-user.php', // Crie um arquivo PHP para buscar os detalhes do usuário
				data: {id: idCadastro},
				success: function (response) {
					// Preencha o modal com os detalhes do usuário
					alert(response);
					location.reload();
				},
				error: function (error) {
					console.error(error);
				}
			});
		});

		$('#form-edit-perfil').submit(function (e) {
			e.preventDefault();

			// Obtenha os valores dos inputs do formulário
			let idUsuario = $('input[name="id-usuario-editar"]').val();
			let nome = $('input[name="nome-usuario-editar"]').val();
			let email = $('input[name="email-usuario-editar"]').val();
			let senha = $('input[name="senha-usuario-editar"]').val();
			let nivel = $('select[name="nivel-novo-usuario-editar"]').val();

			$.ajax({
				type: 'POST',
				url: '../AJAX/editar-user.php', // Arquivo PHP para editar o usuário no banco de dados
				data: {
					id: idUsuario,
					nome: nome,
					email: email,
					senha: senha,
					nivel: nivel
				},
				success: function (response) {
					// Manipule a resposta do servidor, se necessário
					console.log(response);

					// Feche o modal após a edição ser concluída
					$('#modal-editar-Perfil').modal('hide');

					location.reload();
					alert('Cadastro atualizado com sucesso');

				},
				error: function (error) {
					// Manipule erros, se houver
					console.error(error);
				}
			});
		});


	});
</script>

