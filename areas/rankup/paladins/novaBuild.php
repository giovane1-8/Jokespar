<?php
    include_once("../../../php/init.php");
    if(!is_login()){
        header("location: ../../../");
    };
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- ============= TITULO DA PAGINA ============= -->
    <title>Joke Spar - Rank Up - Paladins - Nova Build</title>
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
    <script>
        
        function CriaRequest() {
          try{
            request = new XMLHttpRequest(); 
          }catch (IEAtual){
              try{
                request = new ActiveXObject("Msxml2.XMLHTTP");       
              }catch(IEAntigo){
                try{
                  request = new ActiveXObject("Microsoft.XMLHTTP");          
                }catch(falha){
                      request = false;
                  }
                }
          }
          if (!request) 
              alert("Seu Navegador não suporta Ajax!");
          else
              request.responseType = 'json';
              return request;
        }
        
        function puxarDadosPersonagem(idCampeao){
            var result = document.getElementById("cartas");
            result.innerHTML = "";
            xmlreq = new XMLHttpRequest();      
            xmlreq.responseType = 'json';
            // Iniciar uma requisição
            xmlreq.open("GET", "../../../php/builds/paladins/capturarCartas.php?id="+idCampeao, true);
            // Atribui uma função para ser executada sempre que houver uma mudança de ado
            xmlreq.onreadystatechange = function(){
                // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                if (xmlreq.readyState == 4) {
                    // Verifica se o arquivo foi encontrado com sucesso
                    if (xmlreq.status == 200) {
                        carta = xmlreq.response;
                        for (var i = 0; i < carta.length; i++) {
                            result.innerHTML += "<input type='checkbox' name='carta[]' id='"+carta[i].nm_carta+"' value='"+carta[i].id_carta+"'><label for='"+carta[i].nm_carta+"'><span data-toggle='popover' title='"+carta[i].nm_carta+"' data-content='"+carta[i].ds_carta+"' class='paladins' style='background: url(data:image/jpg;base64,"+carta[i].foto+"); border-radius: 0%; width: 200px; height:200px; margin: 0;background-repeat:no-repeat; margin: 1px;'></span></label>"
                        }
                    }else{
                        result.innerHTML = "Erro: " + xmlreq.statusText;
                    }
                }
                jaé()
            };
            xmlreq.send(null);
            setTimeout(function(){
                puxarPassivas(idCampeao);
            },600)
        }


        function puxarPassivas(id_campeao){
            var sla = document.getElementById("passivas");
            sla.innerHTML = "";
            xmlreq = new XMLHttpRequest();
            xmlreq.responseType = 'json';
            // Iniciar uma requisição
            xmlreq.open("GET", "../../../php/builds/paladins/capturarPassivas.php?id="+id_campeao, true);
            // Atribui uma função para ser executada sempre que houver uma mudança de ado
            xmlreq.onreadystatechange = function(){
                // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                if (xmlreq.readyState == 4) {
                    // Verifica se o arquivo foi encontrado com sucesso
                    if (xmlreq.status == 200) {
                        talento = xmlreq.response;
                        for (var i = 0; i < talento.length; i++) {
                            sla.innerHTML += "<input type='radio' name='talento' id='"+talento[i].nm_passiva+"' value='"+talento[i].id_passiva+"'><label for='"+talento[i].nm_passiva+"'><span style='background-image: url(data:image/jpg;base64,"+talento[i].foto+") ; width: 160px; height: 160px; '></span></label>"
                        }
                    }else{
                        sla.innerHTML = "Erro: " + xmlreq.statusText;
                    }
                }
            };
            xmlreq.send(null);
        }



        </script>
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
                <li><a href="./" class="scrollSuave">Todas as Builds</a></li>
            </ul>
        </nav>
    </header>
    <!-- ========================= FIM NAVBAR ========================= -->

    <!-- ========================= NOVA BUILD ========================= -->
    <form action="../../../php/builds/paladins/salvarBuild.php" method="POST">
    <section id="nova-build">
        <div class="container">

            <div class="titulo">
                <h1>Digite o titulo da sua build</h1>
                <input type="text" name="tituloBuild"placeholder="Nova Build">
            </div>

            <div class="personagem">
                <h1>Escolha o personagem</h1>
                <!-- <input type="text" placeholder="Nome do campeão">
                <br> -->
                <div>
                    <?php
                        $PDO = conectarBanco();
                        $query = $PDO -> query("SELECT * FROM tb_personagem_paladins");
                        while($personagem = $query -> fetch(PDO::FETCH_OBJ)){
                            echo "<input type='radio' value='".$personagem -> id_personagem."' name='personagem' id='".$personagem -> nm_personagem."'>
                                  <label onclick='puxarDadosPersonagem(".$personagem -> id_personagem.")' for='".$personagem -> nm_personagem."'><span style='background-image: url(data:image/jpg;base64,".base64_encode($personagem -> foto_capa_personagem)."); border-radius: 0; width: 150px; height: 150px; background-size: cover; margin-top: 5px;'></span></label>";
                        }
                    ?>
                </div>    
            </div>

            <div class="funcao-personagem">
                <h1>Escolha a função do personagem</h1>

                <input type="radio" id="flanco" name="funcao" value='4'>
                <label for="flanco"><span style="background-image: url(components/img/flanco.jpg);"></span></label>

                <input  id="dano" type="radio" name="funcao" value='3'>
                <label for="dano"><span style="background-image: url(components/img/dano.jpg);"></span></label>

                <input id="tanque" type="radio" value='1' name="funcao">
                <label for="tanque"><span style="background-image: url(components/img/tanque.jpg);"></span></label>

                <input id="suporte" type="radio" value='2' name="funcao">
                <label for="suporte"><span style="background-image: url(components/img/suporte.jpg);"></span></label>
            </div>

            <div class="feiticos">
                <h1>Escolha o talento do personagem escolhido</h1>
                <div id="passivas">
                    <!-- PASSIVAS PARA SELECIONAR -->
                </div>
            </div>

            <div class="itens">
                <h1>Agora escolha as cartas que fazem parte do deck</h1>
                <h2>Max 5 cartas</h2>
                <div class="quadrado">
                        <center>
                            <input type="number" min="1" max="5" name='cartaPonto[]'  class='d-none' id="cartaPonto1" value="1" required>
                            <img id='cartaC1' style=''>
                            <input type="number" min="1" max="5" name='cartaPonto[]' class='d-none' id="cartaPonto2" value="1" required>
                            <img id='cartaC2' style=''>
                            <input type="number" min="1" max="5" name='cartaPonto[]' class='d-none' id="cartaPonto3" value="1" required>
                            <img id='cartaC3' style=''>
                            <input type="number" min="1" max="5" name='cartaPonto[]' class='d-none' id="cartaPonto4" value="1" required>
                            <img id='cartaC4' style=''>
                            <input type="number" min="1" max="5" name='cartaPonto[]' class='d-none' id="cartaPonto5" value="1" required>
                            <img id='cartaC5' style=''>
                        </center>
                    <div class="itens-jogo">
                        <div id="cartas" class="card-deck">
                            <!-- CARTAS PARA SEREM SELECIONADAS -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="itens">
                <h1>Por ultimo, escolha os itens para comprar ao longo da partida</h1>
                <h2>Max 4 itens</h2>
                <div class="quadrado">

                    <div class="itens-selecionados">
                        <div class="card-deck">                            
                            <!-- ITENS SELECIONADOS -->
                        </div>
                    </div>

                    <div class="itens-jogo">
                        <div class="card-deck">                            
                            <!-- ITENS PARA SEREM SELECIONADAS -->
                            <?php
                                $PDO = conectarBanco();
                                $query = $PDO -> query("SELECT * FROM tb_itens_paladins");
                                while($item = $query -> fetch(PDO::FETCH_OBJ)){
                                    echo "
                                    <input type='checkbox' name='item[]' value='".$item -> id_item."' id='".$item -> nm_item."'>
                                    <label for='".$item -> nm_item."'><span data-toggle='popover' title='".$item -> nm_item."' data-content='".$item -> ds_item."' class='item' style='background-image: url(data:image/jpg;base64,".base64_encode($item -> foto)."); border-radius: 0%; margin: 5px'></span></label>";
                                }

                            ?>
                        </div>
                    </div>

                </div>
            </div>

            <center>
                <input type="submit" value="Enviar">
            </center>
        </div>
    </section>
    </form>
    <!-- ========================= FIM NOVA BUILD ========================= -->

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
    var foto = ' ';
    var contagemPontos = 5;
    var g =0;
    function jaé(){

        $('input[type="checkbox"]').prop("checked", false);
        setTimeout(() => {
        $('input[type="checkbox"]').prop("checked", false);
        },500);
        for (var a = 0; a <= 5; a++) {
            $('#cartaC'+a).removeAttr('style');
            $("#cartaPonto"+a).addClass("d-none").removeAttr('readonly').val(1);
        }
        var i =1;
        var funcaocarta = $("span[class='paladins']").click( function(){
            if(i <= 5){
                var foto = $(this).css('background');
                $('#cartaC'+i).css('background', foto).css('width', 160).css('height', 160);
                $("#cartaPonto"+i).removeClass('d-none');
                i = i+1;
            }else{
                $('input[type="checkbox"]').prop("checked", false);
                setTimeout(() => {
                    $('input[type="checkbox"]').prop("checked", false);
                },500);
                i =1;
                contagemPontos = 5;
                for (var a = 0; a <= 5; a++) {
                    $('#cartaC'+a).removeAttr('style');
                    $("#cartaPonto"+a).addClass("d-none").removeAttr('readonly').val(1);
                }
            }
        });
        $('span[data-toggle="popover"]').mouseenter(function(){
            $(this).popover('show')
        });
        $('span[data-toggle="popover"]').mouseout(function(){
            $(this).popover('hide')
        });
    }
    $("input[type='number']").click(function(){
        var pontos1 = parseInt(document.getElementById("cartaPonto1").value);
        var pontos2 = parseInt(document.getElementById("cartaPonto2").value);
        var pontos3 = parseInt(document.getElementById("cartaPonto3").value);
        var pontos4 = parseInt(document.getElementById("cartaPonto4").value);
        var pontos5 = parseInt(document.getElementById("cartaPonto5").value);
        totalP = pontos1 + pontos2 + pontos3 + pontos4 + pontos5;
        if(totalP == 15){
            $("input[type='number']").attr('readonly', 'false')
            alert("você ja atribuiu todos os pontos")
        }
    })
    $('span[data-toggle="popover"]').mouseenter(function(){
        $(this).popover('show')
    });
    $('span[data-toggle="popover"]').mouseout(function(){
        $(this).popover('hide')
    });
    $("span[class='item']").click( function(){
            if(g <= 3){
                g = g + 1;
            }else{
                $("input[name='item[]']").prop("checked", false);
                setTimeout(() => {
                    $("input[name='item[]']").prop("checked", false);
                });
                g = 0;
            }
        });
        
        
        
    </script>
    <!-- ============= FIM SCRIPTS ============= -->
</body>

</html>