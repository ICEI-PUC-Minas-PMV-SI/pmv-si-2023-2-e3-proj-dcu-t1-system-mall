<?php
require_once "../../../config/conexao.php";
$pagina = 'Cadastros';
?>
<div class="d-flex justify-content-center">
    <h2>Solicitações</h2>
</div>

<div class="box-solicitacao">

    <?php
    $consulta = $pdo->query("SELECT * from  solicitacoes WHERE status = 'PENDENTE' order by id_solicitacao asc");
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    if (empty($resultado)) {
        echo "<p>Não existem solicitações pendentes.</p>";
    } else {
        for ($contador = 0;
             $contador < count($resultado);
             $contador++) {
            foreach ($resultado[$contador] as $key => $value) {
            } ?>
            <div class="solicitacao">

                <div>
                    <div class="infos" style="border: 1px solid;border-radius: 8px 8px 0px 0px;">

                        <div class="inf-primarias-solicit" style="padding-right: 40px;
                                                              padding-left: 40px;">
                            <div class="infos-solicit">
                                <h5 style="margin: 0">Nome solicitante: </h5>
                                <div> <?php echo $resultado[$contador]['nome_solicitante'] ?></div>
                            </div>
                            <div class="infos-solicit">
                                <h5 style="margin: 0">Email solicitante: </h5>
                                <div> <?php echo $resultado[$contador]['email_solicitante'] ?></div>
                            </div>
                        </div>

                        <div class="inf-primarias-solicit" style="padding-right: 40px;
                                                              padding-left: 40px;
                                                              border-left: 1px solid;
                                                              border-right: 1px solid;">

                            <div class="infos-solicit">
                                <h5 style="margin: 0">Nome estabelecimento: </h5>
                                <div> <?php echo $resultado[$contador]['nome_estabelecimento'] ?></div>
                            </div>

                            <div class="infos-solicit">
                                <h5 style="margin: 0">Departamento estabelecimento: </h5>
                                <div> <?php echo $resultado[$contador]['departamento'] ?></div>
                            </div>

                        </div>

                        <div class="inf-primarias-solicit" style="padding-right: 40px;
                                                              padding-left: 40px;">

                            <div class="infos-solicit">
                                <h5 style="margin: 0">Contato estabelecimento: </h5>
                                <div> <?php echo $resultado[$contador]['contato_estabelecimento'] ?></div>
                            </div>

                            <div class="infos-solicit">
                                <h5 style="margin: 0">Piso do estabecimento : </h5>
                                <div> <?php echo $resultado[$contador]['piso'] ?></div>
                            </div>

                        </div>
                    </div>

                    <div class="textos-solicit" style="border-right: 1px solid #000000;
                                                   border-bottom: 1px solid #000000;
                                                   border-left: 1px solid #000000;
                                                   padding: 20px">
                        <div class="div-texto">
                            <div class="texto">
                                <h5 style="margin: 0">Descrição:</h5>
                                <div><?php echo $resultado[$contador]['descricao_estab'] ?></div>
                            </div>
                        </div>

                        <div class="div-texto">
                            <div class="texto">
                                <h5 style="margin: 0">Solicitação:</h5>
                                <div><?php echo $resultado[$contador]['texto'] ?></div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="d-flex gap10 justify-content-center" style="border-right: 1px double #000000;
                                                                    border-bottom: 1px double #000000;
                                                                    border-left: 1px double #000000;
                                                                    border-radius: 0px 0px 8px 8px;
                                                                    padding: 20px">
                    <form method="post">
                        <button class="btn btn-success aceitar"
                                data-solicitacao-id="<?php echo $resultado[$contador]['id_solicitacao']; ?>"
                                data-bs-toggle="modal"
                                data-bs-target="#modal-confirmacao">Aprovar
                        </button>
                        <button class="btn btn-danger rejeitar"
                                data-solicitacao-id="<?php echo $resultado[$contador]['id_solicitacao']; ?>">Recusar
                        </button>


                    </form>
                </div>

            </div>
            <?php
        }
    }
    ?></div>

<!-- Modal de Confirmação -->
<div class="modal" tabindex="-1" role="dialog" id="modal-confirmacao">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tem certeza de que deseja prosseguir?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-confirmar">Confirmar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('#example').DataTable({
			"ordering": false
		});
	});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	$(document).ready(function () {
		$('.aceitar').click(function (event) {
			event.preventDefault();
			var solicitacaoId = $(this).data('solicitacao-id');

			// Mostrar o modal de confirmação
			$('#modal-confirmacao .modal-title').text('Aprovar');
			$('#modal-confirmacao .modal-body').html('Tem certeza de que deseja aprovar esta solicitação?');

			// Configurar a ação do botão de confirmação dentro do modal
			$('#btn-confirmar').on('click', function () {
				// Fechar o modal de confirmação
				$('#modal-confirmacao').modal('hide');

				// Realizar a ação de aceitar (pode ser um AJAX)
				realizarAcao('aceitar', solicitacaoId);
			});

			// Mostrar o modal de confirmação
			$('#modal-confirmacao').modal('show');

			// Adicione o evento para fechar o modal quando clicar no "x" no header
			$('#modal-confirmacao .close').on('click', function () {
				$('#modal-confirmacao').modal('hide');
			});

			// Adicione o evento para fechar o modal quando clicar no botão "Cancelar"
			$('#modal-confirmacao .btn-secondary').on('click', function () {
				$('#modal-confirmacao').modal('hide');
			});
		});

		$('.rejeitar').click(function (event) {
			event.preventDefault();
			var solicitacaoId = $(this).data('solicitacao-id');

			// Mostrar o modal de confirmação
			$('#modal-confirmacao .modal-title').text('Recusar');
			$('#modal-confirmacao .modal-body').html('Tem certeza de que deseja recusar esta solicitação?');

			// Configurar a ação do botão de confirmação dentro do modal
			$('#btn-confirmar').on('click', function () {
				// Fechar o modal de confirmação
				$('#modal-confirmacao').modal('hide');

				// Realizar a ação de recusar (pode ser um AJAX)
				realizarAcao('recusar', solicitacaoId);
			});

			// Mostrar o modal de confirmação
			$('#modal-confirmacao').modal('show');

			// Adicione o evento para fechar o modal quando clicar no "x" no header
			$('#modal-confirmacao .close').on('click', function () {
				$('#modal-confirmacao').modal('hide');
			});

			// Adicione o evento para fechar o modal quando clicar no botão "Cancelar"
			$('#modal-confirmacao .btn-secondary').on('click', function () {
				$('#modal-confirmacao').modal('hide');
			});
		});

		function realizarAcao(acao, solicitacaoId) {
			if (acao === "aceitar") {
				$.ajax({
					type: "POST",
					url: "../AJAX/processar_solicitacoes.php", // Substitua pelo URL correto do seu arquivo de processamento
					data: {aceitar: solicitacaoId},
					success: function () {
						// Manipule a resposta do servidor (por exemplo, atualize a interface do usuário)
						alert('Solicitação aceita com sucesso');

						// Recarregue a página após o sucesso
						location.reload();
					}
				});
			} else if (acao === "recusar") {
				$.ajax({
					type: "POST",
					url: "../AJAX/processar_solicitacoes.php", // Substitua pelo URL correto do seu arquivo de processamento
					data: {recusar: solicitacaoId},
					success: function () {
						// Manipule a resposta do servidor (por exemplo, atualize a interface do usuário)
						alert('Solicitação recusada com sucesso');

						// Recarregue a página após o sucesso
						location.reload();
					}
				});
			}

			// Recarregue a página após a ação
			location.reload();
		}
	});


</script>


