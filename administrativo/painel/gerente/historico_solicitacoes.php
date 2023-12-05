<?php
require_once "../../../config/conexao.php";
$pagina = 'Cadastros';
?>
<div class="d-flex justify-content-center">
    <h2>Histórico de solicitações</h2>
</div>

<div class="box-solicitacao">

    <?php
    $consulta = $pdo->query("SELECT * FROM solicitacoes WHERE status != 'PENDENTE' ORDER BY data desc");
    
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    for ($contador = 0;
         $contador < count($resultado);
         $contador++) {
        foreach ($resultado[$contador] as $key => $value) {
        }
        $status = $resultado[$contador]['status'];
        // Define o texto e a classe CSS com base no status
        if ($status === 'APROVADA') {
            $statusText = 'Aprovada';
            $statusClass = 'aprovada';
        } elseif ($status === 'REJEITADA') {
            $statusText = 'Negada';
            $statusClass = 'negada';
        } else {
            $statusText = 'Status desconhecido';
            $statusClass = 'desconhecido';
        }
        ?>
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
                <div class="caixa-inferior">
                    <h5>Solicitação:</h5>
                    <h5 class="<?php echo $statusClass; ?>"><?php echo
                        $statusText; ?></h5>
                </div>
                <div class="caixa-inferior" style="margin-bottom: 0.5rem;">
                    <h5 style="margin: 0">Data da solicitação:</h5>
                    <div style="font-weight: bold"><?php echo date("d/m/Y", strtotime($resultado[$contador]['data'])) ?></div>
                </div>

            </div>

        </div>
    <?php } ?>
</div>

