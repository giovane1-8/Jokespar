<?php
    include_once("../../../php/init.php");
    if(!is_login()){
        header("location: ../../");
    };
    $idBuild = $_GET["gdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugis"];
?>
<?php if(!empty($idBuild)):?>
    <?php
    $PDO = conectarBanco();
    #CAptura build 
    $stmt = $PDO->prepare("SELECT * FROM tb_paladins WHERE id_paladins = ".$idBuild);                                
    $stmt->execute();
    $builds = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $build = $builds[0];

    #captura passiva/talento
    $stmt1 = $PDO->prepare("SELECT * FROM tb_passiva WHERE tb_passiva.id_passiva = ".$build['id_passiva_personagem']);                                
    $stmt1->execute();
    $passivas = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    $passiva = $passivas[0];

    #captura personagem
    $stmt2 = $PDO->prepare("SELECT * FROM tb_personagem_paladins WHERE tb_personagem_paladins.id_personagem = ".$passiva['id_personagem']);                                
    $stmt2->execute();
    $personagens = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    $personagem = $personagens[0];

    #captura criador da build
    $stmt3 = $PDO->prepare("SELECT * FROM tb_usuario, tb_paladins WHERE tb_paladins.id_usuario = tb_usuario.id_usuario AND tb_paladins.id_paladins = ".$idBuild);                                
    $stmt3->execute();
    $usuarios = $stmt3->fetchAll(PDO::FETCH_ASSOC);
    $usuario = $usuarios[0];

    #captura data
    $stmt4 = $PDO->prepare("SELECT * FROM tb_data_postagem, tb_paladins WHERE tb_paladins.id_data = tb_data_postagem.id_data AND tb_paladins.id_paladins = ".$idBuild);                                
    $stmt4->execute();
    $datas = $stmt4->fetchAll(PDO::FETCH_ASSOC);
    list ($ano, $mes, $dia) = explode('-', $datas[0]['dt_postagem']);
    
    #captura cartas
    $stmt5 = $PDO->prepare("SELECT * FROM tb_cartas_paladins, tb_baralho, tb_paladins WHERE tb_cartas_paladins.id_carta = tb_baralho.id_carta AND tb_paladins.id_paladins = tb_baralho.id_paladins AND tb_baralho.id_paladins =  :IDPALADINS");      
    $stmt5->bindParam(":IDPALADINS",$idBuild);
    $stmt5->execute();
    $cartas = $stmt5->fetchAll(PDO::FETCH_ASSOC);

    #captura itens
    $stmt6 = $PDO->prepare("SELECT * FROM tb_itens_paladins, tb_itens_build_paladins, tb_paladins WHERE tb_paladins.id_paladins = tb_itens_build_paladins.id_paladins AND tb_itens_build_paladins.id_item = tb_itens_paladins.id_item AND tb_itens_build_paladins.id_paladins = :idpaladins");      
    $stmt6->bindParam(":idpaladins",$idBuild);
    $stmt6->execute();
    $itens = $stmt6->fetchAll(PDO::FETCH_ASSOC);
    ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- ============= TITULO DA PAGINA ============= -->
    <title>Joke Spar - Rank Up - Paladins</title>
    <link rel="shortcut Icon" href="components/img\icon.ico" type="image/x-png/">

    <!-- ============= METAS ============= -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- ============= CSS ============= -->
    <link rel="stylesheet" href="../components/css/style.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../components/css/animate.css">

    <style>
        #conteudo {
            margin-top: 350px;
        }
    </style>
</head>

<body id="rankup">
    <!-- ========================= NAVBAR ========================= -->
    <header>
        <a href="../" class="logo scrollSuave">RANK UP</a>

        <input type="checkbox" id="control-nav" />
        <label for="control-nav" class="control-nav"></label>
        <label for="control-nav" class="control-nav-close"></label>

        <nav>
            <ul>
                <li><a href="../../" class="scrollSuave">Home</a></li>
                <li><a href="index.php" class="scrollSuave">Todas as builds</a></li>
                <li><a href="novaBuild.php" class="scrollSuave">Nova Build</a></li>
            </ul>
        </nav>
    </header>
    <!-- ========================= FIM NAVBAR ========================= -->

    <!-- ========================= CONTEUDO ========================= -->
    <div class="container">
        <section id="conteudo" style="min-height: 100vh;">

            <center>
                <!-- Logo do Jogo -->
                <img class="logo-jogo" src="data:image/jpg;base64,<?php echo base64_encode($personagem["foto_capa_personagem"])?>" style="border-radius: 100%;">
            </center>

            <div class="builds">
                <div class="container">
                    <center>
                        <h1 style="color: #fff"><img src='<?php switch ($build["id_categoria_build"]) {case 1: echo "components/img/tanque.jpg";break;case 2:echo "components/img/suporte.jpg";break;case 3:echo "components/img/dano.jpg";break;case 4:echo "components/img/flanco.jpg";break;} ?>' height='45px' width='45px'> <?php echo $build["nm_titulo"] ?></h1>
                        <p style="color: #979797;">Criado por <i style='color: #008cff'><?php echo $usuario["nm_nickname"] ?></i>, postado em <i style='color: #008cff'><?php echo $dia."/".$mes."/".$ano ?></i></p>

                        <h1>Talento e Cartas</h1>
                        <div class="selecionados">
                            <!-- ====== TALENTO E CARTAS ====== -->
                            <div class="card-deck">
                                <img src="data:image/jpg;base64,<?php echo base64_encode($passiva["foto"]); ?>" alt="" style="border-radius: 100%;">
                                <?php
                                    for ($i=0; $i < count($cartas); $i++) { 
                                        echo "<div><img data-toggle='popover' title='".$cartas[$i]['nm_carta']."' data-content='".$cartas[$i]['ds_carta']."' src='data:image/jpg;base64,".base64_encode($cartas[$i]["foto"])."' alt='atualize pagina'><p style='color: #a1a1a1; margin-top: -5px;'>".$cartas[$i]["cd_pontos"]."</p></div>";
                                    }
                                ?>
                            </div>
                            <!-- ====== FIM TALENTO E CARTAS ====== -->
                        </div>

                        <h1>Itens</h1>
                        <div class="selecionados">
                            <!-- ====== ITENS ====== -->
                            <div class="card-deck">
                                <?php
                                    for ($i=0; $i < count($itens); $i++) { 
                                        echo "<img data-toggle='popover' title='".$itens[$i]['nm_item']."' data-content='".$itens[$i]['ds_item']."' src='data:image/jpg;base64,".base64_encode($itens[$i]["foto"])."' alt='recarregue a pagina'>";
                                    }
                                ?>
                            </div>
                            <!-- ====== FIM ITENS ====== -->
                        </div>
                    </center>
                </div>
            </div>
            
        </section>
    </div>
    <!-- ========================= FIM CONTEUDO ========================= -->

    <!-- ========================= FOOTER ========================= -->
    <section id="footer">
        <footer>
            <div class="container">
                <center>
                    <a target="_blank" href="https://www.facebook.com/JokeSparOficial"><i
                            class="fab fa-facebook-f fa-lg"></i></a>
                    <a target="_blank" href="https://www.instagram.com/jokesparoficial/"><i
                            class="fab fa-instagram fa-lg"></i></a>
                    <a target="_blank" href="https://twitter.com/jokesparoficial"><i
                            class="fab fa-twitter fa-lg"></i></a>
                    <a target="_blank" href="https://discord.gg/J9mpjj"><i class="fab fa-discord fa-lg"></i></a>
                    <hr>
                    <div class="empresas">
                        <a target="_blank" href="https://www.riotgames.com/pt-br">
                            <img src="components/img/riot-games-logo.png" height="25" width="55">
                        </a>
                        <a target="_blank" href="https://www.hirezstudios.com">
                            <img src="components/img/hirez-logo.png" height="25" width="60">
                        </a>
                        <a target="_blank" href="https://www.bhvr.com">
                            <img src="components/img/behaviour-logo.png" height="25" width="50">
                        </a>
                    </div>

                    <p>&copy 2020 - Todos os diretos reservados</p>
                </center>
            </div>
        </footer>
    </section>
    <!-- ========================= FIM FOOTER ========================= -->

    <!-- ============= SCRIPTS ============= -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>
        var $doc = $('html, body');
        $('.scrollSuave').click(function () {
            $doc.animate({
                scrollTop: $($.attr(this, 'href')).offset().top
            }, 600);
            return false;
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="../components/js/main.js"></script>
    <script>
    $('[data-toggle="popover"]').mouseenter(function(){
        $(this).popover('show')
    });
    $('[data-toggle="popover"]').mouseout(function(){
        $(this).popover('hide')
    });
    </script>
    <!-- ============= FIM SCRIPTS ============= -->
</body>

</html>
    <?php else: ?>
        <script>window.history.back()</script>
    <?php endif ?>