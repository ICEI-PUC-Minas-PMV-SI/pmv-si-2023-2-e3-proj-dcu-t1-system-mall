<!-- Modal -->
<div class="modal fade" id="modalPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Dados</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-perfil" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome-usuario" placeholder="Nome"
                               value="<?php echo $nome_usuario ?>">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email-usuario" placeholder="Email"
                               id="email-modal" value="<?php echo $email_usuario ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Senha</label>
                        <input type="text" class="form-control" name="senha-usuario" placeholder="Senha"
                               value="<?php echo $senha_usuario ?>">
                    </div>
                    <small>
                        <div id="mensagem-perfil" align="center"></div>
                    </small>

                    <input style="display: none" hidden="hidden" class="form-control" name="id-usuario"
                           value="<?php echo $cpf_cadastro ?>">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-perfil">
                        Fechar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php



?>

<!-- Modal -->
<div class="modal fade" id="modal-editar-Perfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Dados</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-edit-perfil" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nome</label>
                        <input required type="text" class="form-control" name="nome-usuario-editar" placeholder="Nome"
                               value="">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input required type="email" class="form-control" name="email-usuario-editar" placeholder="Email"
                               id="email-modal-editar" value="">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nivel</label>
                        <select required class="form-select" name="nivel-novo-usuario-editar" required>
                            <option selected disabled value="">Escolha um</option>
                            <option name="lojista">Lojista</option>
                            <option name="gerente">Gerente</option>
                            <option name="administrador">Administrador</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Senha</label>
                        <input required type="text" class="form-control" name="senha-usuario-editar" placeholder="Senha"
                               value="">
                    </div>
                    <small>
                        <div id="mensagem-perfil-editado" align="center"></div>
                    </small>

                    <input style="display: none" hidden="hidden" class="form-control" name="id-usuario-editar"
                           value="">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-perfil-editar">
                        Fechar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalNovoAcesso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-novoUser" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome-novo-usuario" required placeholder="Nome">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email-novo-usuario" required placeholder="Email" id="email-modal-novo-user">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">CPF</label>
                        <input type="number" class="form-control" name="cpf-novo-usuario" required placeholder="CPF" id="cp-modal-novo-user">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nivel</label>
                        <select class="form-select" name="nivel-novo-usuario" required>
                            <option selected disabled value="">Escolha um</option>
                            <option name="gerente">Gerente</option>
                            <option name="administrador">Administrador</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="senha-novo-usuario" required placeholder="Senha">
                    </div>
                    <small>
                        <div id="mensagem-perfil"></div>
                    </small>

                </div>
                <div class="modal-footer">
                    <button type="submit" id="novo-user" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-novo-user">
                        Fechar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="modal-sair">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir usuário</h5>
            </div>
            <div class="modal-body">
                <p>Você realmente deseja sair do sistema</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary sair-sistema">Sim</button>
                <button type="button" class="btn btn-secondary" id="btn-nao-sair"
                        data-dismiss="modal">Não
                </button>
            </div>
        </div>
    </div>
</div>




<script>
	// Quando o botão "Sim" do modal for clicado
	$('.sair-sistema').click(function () {
		// Redirecionar para o link especificado
		window.location.href = '../../../config/logout.php';
	});
	$('#btn-nao-sair').click(function () {
		$('#modal-sair').modal('hide');
	});

</script>