<?php
    include_once("../../php/init.php");
    if(!is_login()){
        header('Location: ../../');
    }
?>
<?php if(!empty($_GET)):?>
<?php 
    $pegada = $_GET['pegada'];
    $software = $_GET['software'];
    $valormouse = $_GET['valorMouse'];
    $queryS = " ";
    switch($software){
        case 1:
            $queryS = "AND software_apoio = 1";
        break;
        case 0:
            $queryS = "AND software_apoio = 0";
        break;
    }

    $PDO = conectarBanco();
    $sql = "SELECT * FROM tb_mouse WHERE id_pegada = :PEGADA AND cd_preco < :preco ".$queryS;
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(":PEGADA",$pegada);
    $stmt->bindParam(":preco",$valormouse);
    $stmt->execute();
    $mouses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $mouse = $mouses[0];
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
    <!-- ========================= RESULTADO ========================= -->
    <section id="resultado">
        <div class="jumbotron">
            <center>
                <h1>Segundo as suas escolhas</h1>
                <h2>Este é o mouse perfeito para você!</h2>
                <div class="retangulo">
                    <img src="data:image/jpg;base64,<?php echo base64_encode($mouse['foto'])?>" style='margin-right: 20px'>
                    <h1><?php echo $mouse['nm_mouse'];?></h1><br>
                </div>
            </center>
        </div>
    </section>
    <!-- ========================= FIM RESULTADO ========================= -->

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
    <?php else:?>
    <?php endif;?>