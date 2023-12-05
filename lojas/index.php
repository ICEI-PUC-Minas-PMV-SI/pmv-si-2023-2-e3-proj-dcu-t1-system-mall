<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Trade Mall</title>
    <link href="../assets/img/institucional/favicon.png" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
          rel="stylesheet">

    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/main.css" rel="stylesheet">
</head>

<body>


<header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="../index.php" class="logo d-flex align-items-center">
            <img src="../assets/img/institucional/logo.png" alt="" style="border-radius: 10px">
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="../index.php">HOME</a></li>
                <li><a href="../administrativo/index.php">LOGIN</a></li>
            </ul>
        </nav>


        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header>


<main id="main">
    <?php
    //    $LOJAS = array(
    //        (object)[
    //            'name' => 'Adidas',
    //            'imgPath' => 'adidas.jpg',
    //            'piso' => '3',
    //            'department' => 'Roupas e vestimentos',
    //            'desc' => 'Na loja oficial da adidas Brasil, você vai encontrar tênis, roupas esportivas e material esportivo criados com tecnologaa e design.'
    //        ],
    //        (object)[
    //            'name' => 'Centauro',
    //            'imgPath' => 'centauro.png',
    //            'piso' => '3',
    //            'department' => 'Roupas e materiais esportivos',
    //            'desc' => 'Loja de tênis, roupas fitness, aparelhos de academia e material esportivo nos menores preços para comprar online até 10x!'
    //        ],
    //        (object)[
    //            'name' => 'Hugo Boss',
    //            'imgPath' => 'hugoboss.jpg',
    //            'piso' => '3',
    //            'department' => 'Roupas e vestimentos',
    //            'desc' => 'Compre roupas masculinas na loja online da HUGO BOSS. Aqui, você adquire um visual impecável, seja ele formal ou casual.'
    //        ],
    //        (object)[
    //            'name' => 'Nike',
    //            'imgPath' => 'nike.jpg',
    //            'department' => 'Calçados esportivos',
    //            'piso' => '3',
    //            'desc' => 'Produtos, coleções, serviços e experiências únicas para te inspirar. Da Nike para você. Para atletas.'
    //        ],
    //        (object)[
    //            'name' => 'Prada',
    //            'imgPath' => 'prada.png',
    //            'department' => 'Moda de luxo',
    //            'piso' => '3',
    //            'desc' => 'Navegue na loja PRADA Brasil e compre roupas, sapatos e acessórios femininos e masculinos. Visite agora para descobrir as novidades da coleção PRADA.'
    //        ],
    //        (object)[
    //            'name' => 'The North Face',
    //            'imgPath' => 'thenorthface.jpg',
    //            'department' => 'Roupas e vestimentos',
    //            'piso' => '3',
    //            'desc' => 'The North Face Roupas e Roupas e Equipamentos Para Neve, Montanha ou Cidade | A Marca Preferida dos Alpinistas, Escaladores e Snowboarders.'
    //        ],
    //    );


    require_once "../config/conexao.php";
    $consulta = $pdo->prepare("SELECT * from lojas");
    $consulta->execute();
    $dados_loja = $consulta->fetchAll(PDO::FETCH_ASSOC);


    ?>

    <section id="cinema" class="cinema sections-bg">
        <div class="container" data-aos="fade-Äup">

            <div class="section-header">
                <h2>Lojas</h2>
                <p>Qualidade e diversidade como nunca visto!</p>
            </div>

            <div class="cinema-isotope"
                 data-cinema-filter="*"
                 data-cinema-layout="masonry"
                 data-cinema-sort="original-order"
                 data-aos="fade-up"
                 data-aos-delay="100">
                <div class="row gy-4 cinema-container">
                    <?php foreach ($dados_loja as $index => $LOJA) :

                        $nomeLoja = $LOJA['nome_estabelecimento'];
                        $pisoLoja = $LOJA['piso'];
                        $departamentoLoja = $LOJA['departamento'];
                        $contatoLoja = $LOJA['contato'];
                        $descricaoLoja = $LOJA['descricao'];

                        $imagemBinaria = $LOJA['foto_loja'];

                        if ($imagemBinaria) {
                            $imagemCodificada = base64_encode($imagemBinaria);
                            $imagemTipo = 'image/jpeg';
                            $imagemDataUrl = "data:$imagemTipo;base64,$imagemCodificada";
                        } else {
                            $imagemDataUrl = 'https://via.placeholder.com/200x200.png?text=Sem+imagem';
                        } ?>
                        <div class="col-xl-4 col-md-6 cinema-item filter-app"
                             data-bs-toggle="modal"
                             data-bs-target="#ModalLoja<?= $index ?>">
                            <div class="cinema-wrap">
                                <div style="display: flex; justify-content: center; background-color: #fff;">
                                    <a class="store-item">
                                        <img data-bs-toggle="modal" data-bs-target="#ModalLoja<?= $index ?>"
                                             src="<?= $imagemDataUrl ?>"
                                             class="img-fluid" style="max-width: 300px; height: 200px; cursor: pointer"
                                             alt="">
                                    </a>
                                </div>
                                <div class="cinema-info">
                                    <h4>
                                        <a href="#"
                                           title="More Details"
                                           data-bs-toggle="modal"
                                           data-bs-target="#ModalLoja<?= $index ?>">
                                            <?= $nomeLoja ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


        </div>
    </section>
</main>

<footer id="footer" class="footer">
    <div class="container">
        <div class="row gy-4">
            <div class="d-flex flex-column align-items-center justify-content-center" style="gap: 30px">

                <div class="d-flex footer-info flex-column align-items-center justify-content-center">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span>TradeMall</span>
                    </a>
                    <p style="padding:0; margin: 0">A diversidade de encontrar tudo em um só lugar!</p>
                </div>

                <div class="d-flex flex-row justify-content-center align-items-center" style="gap: 20px">
                    <div style="text-align: center!important;"
                         class="d-flex flex-column align-items-center justify-content-center footer-contact text-center text-md-start">
                        <h4 style="padding: 0; margin: 0">Endereço:</h4>
                        <p style="padding:0; margin: 0">Raja Gabaglia 3008, Belo Horizonte</p>
                    </div>


                    <div style="text-align: center!important;"
                         class="d-flex flex-column align-items-center justify-content-center footer-contact text-center text-md-start">
                        <strong>Telefone:</strong>(37) 99707-8087<br>
                    </div>

                    <div style="text-align: center!important;"
                         class="d-flex flex-column align-items-center justify-content-center footer-contact text-center text-md-start">
                        <strong>Email:</strong>contato@systemmall.com.br<br>
                    </div>

                </div>

                <div class="container d-flex align-items-center justify-content-center">
                    <div class="copyright">
                        &copy; Copyright <strong><span>SystemMall</span></strong>. Todos os direitos reservados
                    </div>
                </div>
            </div>


        </div>
    </div>

</footer>

<?php foreach ($dados_loja as $index => $LOJA) :
    $nomeLoja = $LOJA['nome_estabelecimento'];
    $pisoLoja = $LOJA['piso'];
    $departamentoLoja = $LOJA['departamento'];
    $contatoLoja = $LOJA['contato'];
    $descricaoLoja = $LOJA['descricao'];
    $imagemBinaria = $LOJA['foto_loja'];

    if ($imagemBinaria) {
        $imagemCodificada = base64_encode($imagemBinaria);
        $imagemTipo = 'image/jpeg';
        $imagemDataUrl = "data:$imagemTipo;base64,$imagemCodificada";
    } else {
        $imagemDataUrl = 'https://via.placeholder.com/200x200.png?text=Sem+imagem';
    }
    ?>

    <div class="modal fade" id="ModalLoja<?= $index ?>" tabindex="-1" role="dialog"
         aria-labelledby="ModalLojaLabel<?= $index ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLojaLabel<?= $index ?>"><?= $nomeLoja ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?= $imagemDataUrl ?>"
                                 class="img-fluid" alt="">
                        </div>
                        <div class="col-md-6">
                            <p><strong>Departamento:</strong> <?= $departamentoLoja ?></p>
                            <p><strong>Piso:</strong> <?= $pisoLoja ?></p>
                            <p><?= $descricaoLoja ?></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<script src="../assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>