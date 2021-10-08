<?php
    include_once("../../../php/init.php");
    if(!is_login()){
        header("location: ../../");
    };
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
                <li><a href="novaBuild.php" class="scrollSuave">Nova Build</a></li>
            </ul>
        </nav>
    </header>
    <!-- ========================= FIM NAVBAR ========================= -->
    
    <!-- ========================= BANNER ========================= -->
    <section id="banner" style="background: url(components/img/bgpaladins.jpg)"></section>
    <!-- ========================= FIM BANNER ========================= -->

    <!-- ========================= CONTEUDO ========================= -->
    <div class="container">
        <section id="conteudo">
            <center>
                <!-- Logo do Jogo -->
                <img class="logo-jogo" src="components/img/logopaladins.png">
            </center>
    
            <div class="builds">
                <div class="container">
                    <center>
                        <h1 style="color: #fff">ULTIMAS BUILDS</h1>
                        <input type="text">
                    </center>
                        <!-- Foto do Personagem -->
                        <?php
                            $PDO = conectarBanco();
                            $sql = $PDO->query("SELECT * FROM tb_paladins");
                            while ($linha = $sql -> fetch(PDO::FETCH_OBJ)) {
                                $stmt = $PDO->prepare("SELECT foto_capa_personagem FROM tb_personagem_paladins, tb_passiva WHERE tb_passiva.id_passiva = ".$linha ->id_passiva_personagem." AND tb_passiva.id_personagem = tb_personagem_paladins.id_personagem");                                
                                $stmt->execute();
                                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                echo "<a href='build.php?gdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugisgdilsgfisudghisughdigsdiusidgusifugsifugiusgfusufigsifgiusgufguisgfugsfigiusgfugis=".$linha -> id_paladins."'><div class='retangulo' style='margin-top: 5px'>
                                    <img src='data:image/jpg;base64,".base64_encode($users[0]["foto_capa_personagem"])."' alt=''>
                                    <div class='infos'>
                                        <h1>".$linha -> nm_titulo."</h1>";
                                        $stmt1 = $PDO->prepare("SELECT tb_usuario.nm_nickname FROM tb_usuario, tb_paladins WHERE tb_usuario.id_usuario = ".$linha->id_usuario);                                    
                                        $stmt1->execute();
                                        $users1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);


                                        $stmt2 = $PDO->prepare("SELECT dt_postagem FROM tb_data_postagem,tb_paladins WHERE tb_paladins.id_data = ".$linha ->id_data." AND tb_paladins.id_data = tb_data_postagem.id_data");                                    
                                        $stmt2->execute();
                                        $users2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                                        list ($ano, $mes, $dia) = explode('-', $users2[0]['dt_postagem']);
                                        echo" <p style='color: #979797;'>Criado por <i style='color: #008cff'>".$users1[0]["nm_nickname"]."</i>, postado em <i style='color: #008cff'>".$dia."/".$mes."/".$ano."</i></p>
                                    </div>
                                </div></a>";
                            }
                        ?>
                        
                    
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
    <!-- ============= FIM SCRIPTS ============= -->
</body>

</html>