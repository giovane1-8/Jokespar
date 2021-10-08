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
    <title>Joke Spar - Setup Area</title>
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

    <!-- WOW.JS  -->
    <script src="https://wowjs.uk/dist/wow.min.js"></script>
    <script>
        new WOW().init();

    </script>
</head>

<body id="setuparea">
    <form action="resultado.php" method="GET">
    <!-- ========================= PARTE UM ========================= -->
    <section id="parteum">
        <div class="jumbotron">
            <center>
                <h1>Ótima escolha</h1>
                <h2>Agora escolha a pegada para seu mouse:</h2>
                <p style="color: #757575">caso ainda tenha duvidas sobre sua pegada, <a href="#!"
                        style="color: #6149a2;">clique aqui</a> e va direto a um artigo sobre</p>
                <div class="card-deck">

                    <input type="radio" id="palmgrip" value='1' name="pegada" required>
                    <label for="palmgrip" class="wow fadeIn" data-wow-delay="0.2s">
                        <span style="background-image: url(components/img/Palm.png)"></span>
                        <h3>palm grip</h3>
                    </label>

                    <input type="radio" id="clawgrip" value='2' name="pegada" required>
                    <label for="clawgrip" class="wow fadeIn" data-wow-delay="0.3s">
                        <span style="background-image: url(components/img/claw.png)"></span>
                        <h3>claw grip</h3>
                    </label>

                    <input type="radio" id="fingertip" value='3' name="pegada" required>
                    <label for="fingertip" class="wow fadeIn" data-wow-delay="0.4s">
                        <span style="background-image: url(components/img/tip.png)"></span>
                        <h3>fingertip</h3>
                    </label>

                </div>
            </center>
        </div>
    </section>
    <!-- ========================= FIM PARTE UM ========================= -->

     <!-- ========================= PARTE DOIS ========================= -->
     <section id="partedois">
        <div class="jumbotron">
            <center>
                <h2>Deseja um mouse com software de apoio?</h2>
            <div class="card-deck" style='margin-top: 15px'>
                <input type="radio" id="sim" value='1' name="software" required>
                <label for="sim" class="wow fadeIn" data-wow-delay="0.2s">
                    <span style='border: 0;'><h3>Sim</h3></span>
                </label>

                <input type="radio" id="nao" value='0' name="software" required>
                <label for="nao" class="wow fadeIn" data-wow-delay="0.2s">
                    <span style='border: 0;'><h3>Não</h3></span>
                </label>

                <input type="radio" id="indiferente" value='2' name="software" required>
                <label for="indiferente" class="wow fadeIn" data-wow-delay="0.2s">
                    <span style='border: 0;'><h3>Indiferente</h3></span>
                </label>

            </div>
            </center>
        </div>
    </section>
    <!-- ========================= FIM PARTE DOIS ========================= -->

    <!-- ========================= PARTE TRES ========================= -->
    <section id="partetres">
        <div class="jumbotron">
            <center>
                <h2 class="wow fadeIn" data-wow-delay="0.5s">Estipule um preço médio que deseja pagar:</h2>
                <input class="wow fadeIn" data-wow-delay="0.7s" type="number" placeholder="Preço em reais" name="valorMouse" id="valorMouse" required>
                <br><input type="submit" value="pesquisar" class="btn btn-danger">
            </center>
        </div>
    </section>
    <!-- ========================= FIM PARTE TRES ========================= -->

</form>
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

    <script src="components/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <!-- ============= FIM SCRIPTS ============= -->
</body>

</html>