<?php
    include_once("../../php/init.php");
    if(!is_login()){
        header('Location: ../../');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- ============= TITULO DA PAGINA ============= -->
    <title>Joke Spar - Rank Up</title>
    <link rel="shortcut Icon" href="components/img\icon.ico" type="image/x-png/">

    <!-- ============= METAS ============= -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- ============= CSS ============= -->
    <link rel="stylesheet" href="components/css/style.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="components/css/animate.css">
</head>

<body id="rankup">
    <!-- ========================= NAVBAR ========================= -->
    <header>
        <a href="#inicio" class="logo scrollSuave">RANK UP</a>

        <input type="checkbox" id="control-nav" />
        <label for="control-nav" class="control-nav"></label>
        <label for="control-nav" class="control-nav-close"></label>

        <nav>
            <ul>
                <li><a href="../../" class="scrollSuave">Home</a></li>
                <li><a href="#inicio" class="scrollSuave">Jogos</a></li>
                <li><a href="#sobre" class="scrollSuave">Sobre</a></li>
                <li><a href="#testemunhas" class="scrollSuave">Testemunhas</a></li>
            </ul>
        </nav>
    </header>
    <!-- ========================= FIM NAVBAR ========================= -->
    
    <!-- ========================= JOGOS ========================= -->
    <section id="inicio">
        <div class="jumbotron">
            <h1>ESCOLHA UM JOGO</h1>
            <div class="card-deck">
                <!--<div class="card">
                    <a href="dead-by-daylight/">
                        <img src="components/img/logoDBD.png" id="dbd" height="150">
                    </a>
                </div>
                <div class="card">
                    <a href="league-of-legends/">
                        <img src="components/img/logoLOL.png" height="150">
                    </a>
                </div>-->
                <div class="card">
                    <a href="paladins/">
                        <img src="components/img/logoPALADINS.png" height="150">
                    </a>
                </div>
            </div>
        </div>
        <video autoplay loop poster="nome-do-video.jpg" class="bg_video" muted>
            <source src="components/video/bg.mp4" type="video/mp4">
        </video>
    </section>
    <!-- ========================= FIM JOGOS ========================= -->

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
    <script src="components/js/main.js"></script>
    <!-- ============= FIM SCRIPTS ============= -->
</body>

</html>