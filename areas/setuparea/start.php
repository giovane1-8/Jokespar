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

    <!-- ========================= START ========================= -->
    <section id="start">
        <div class="jumbotron">
            <center>
                <h1 class="wow fadeInLeft" data-wow-delay="0.5s">Para começarmos</h1>
                <h2 class="wow fadeInLeft" data-wow-delay="0.8s">Você irá escolher o que está procurando!</h2>
                <a href="escolha.php" class="wow fadeIn" data-wow-delay="1s"><img src="components/img/seta.png" width="80px" height="50px"></a>
            </center>
        </div>
    </section>
    <!-- ========================= FIM START ========================= -->

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