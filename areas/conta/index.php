<?php
    include_once("../../php/init.php");
    if(!is_login()){
        header('Location: ../../php/index.php');
    }
?>
<!DOCTYPE html>
<html>

<head>
    <!-- ============= TITULO DA PAGINA ============= -->
    <title>Joke Spar - Home</title>
    <link rel="shortcut Icon" href="components/img\icon.ico" type="image/x-png/">

    <!-- ============= METAS ============= -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="robots" content="index,follow"> <!-- Permitindo mecanismos de Busca -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Organizando as escalas -->

    <!-- ========== Sobre o Site ========== -->
    <meta name="keywords"
        content="joke spar, joke, spar, games, jogos, paladins, dbd, dead by daylight, league of legends, parceiros, stream, jogos de computador, brasileirão, palmeiras, site, etec, desenvolvedores, twitch, stream, streamers" />
    <meta name="description" content="TESTANDO DESCRIÇÃO DA JOKE SPAR" />

    <!-- ========== OG ========== -->
    <meta property="og:locale" content="pt_BR">
    <meta property="og:title" content=""> <!-- Titulo -->
    <meta property="og:site_name" content="Joke Spar"> <!-- Nome do Site -->
    <meta property="og:description"
        content="Joke Spar é o lugar onde vai te dar todo o suporte para ser um gamer de verdade">

    <!-- ========== Descrição ========== -->
    <!-- Imagem -->
    <meta property="og:image" content="components/img/jokespar/controlePS4.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="800"> <!--  PIXELS -->
    <meta property="og:image:height" content="600"> <!--  PIXELS -->
    <!-- Possivel de ser enviado no Facebook -->
    <meta property="fb:admins" content="werockcontent" />
    <!-- Possivel de ser enviado no Twitter -->
    <meta name="twitter:card" content="summary">

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
              return request;
        }
        
        function trocarDados(){
            var nome = document.getElementById('nome').value;
            var email = document.getElementById('email').value;
            var nickname = document.getElementById('nickname').value;
            var senha = document.getElementById('senha').value;
            var confirmaSenha = document.getElementById('confirmaSenha').value;
            var result = document.getElementById('mensagem');
            var xmlreq = CriaRequest();
            // Iniciar uma requisição
            xmlreq.open("GET", `../../php/usuario/alterarDados.php?nome=${nome}&email=${email}&nickname=${nickname}&senha=+${senha}+&confirmaSenha=+${confirmaSenha}`, true);
            // Atribui uma função para ser executada sempre que houver uma mudança de ado
            xmlreq.onreadystatechange = function(){
                // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                if (xmlreq.readyState == 4) {
                    // Verifica se o arquivo foi encontrado com sucesso
                    if (xmlreq.status == 200) {
                        result.innerHTML = xmlreq.responseText;
                        if(xmlreq.responseText == "Seus dados foram alterados"){
                            setTimeout(function(){
                                document.location.reload(true);
                            },900)
                        }
                    }else{
                        result.innerHTML = "Erro: " + xmlreq.statusText;
                    }
                }
            };
            xmlreq.send(null);
        }
        </script>
</head>

<body id="conta" ng-app="App">
    <div id="preload" class="preload"></div>

    <!-- ========================= NAVBAR LATERAL ========================= -->
    <header id="lateral">
        <div class="conteudo">
            <div class="usuario">
                <center>
                <?php if(!empty($_SESSION['login']['user_foto'])): ?>
                    <img src="data:image/jpg;base64,<?php echo base64_encode($_SESSION['login']['user_foto']); ?>" height="100" width="100">
                <?php else: ?>
                    <img src="../../components/img/jokespar/perfil-padrao.png" type="file" height="100" width="100">
                <?php endif; ?>
                    <h3><?php echo $_SESSION['login']['user_nickname']; ?></h3>
                </center>
            </div>

            <div class="svg-pc">
                <div style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                        style="height: 100%; width: 100%;">
                        <path d="M0.00,49.98 C149.99,150.00 271.49,-49.98 500.00,49.98 L500.00,0.00 L0.00,0.00 Z"
                            style="stroke: none; fill: #272727;"></path>
                    </svg>
                </div>
            </div>

            <nav>
                <ul>
                    <li class="active"><a href="" class="scrollSuave">Conta</a></li>
                    <li><a href="../../" class="scrollSuave">Tela Inicial</a></li>
                    <li><a href="../../php/usuario/deslogar.php" class="scrollSuave" style="color: red;">Sair</a></li>
                </ul>
            </nav>
            <div ng-view></div>
        </div>
    </header>
    <!-- ========================= NAVBAR LATERAL ========================= -->
    <!-- ========================= NAVBAR MOBILE ========================= -->
    <header id="mobile">
        <div class="mobile">
            <input type="checkbox" id="control-nav" class='hidden'/>
            <label for="control-nav" class="control-nav"></label>
            <label for="control-nav" class="control-nav-close"></label>

            <nav>
                <div class="usuario">
                    <center>
                        <img src="components/img/parceirosPAPPEN.jpg" height="100" width="100">
                        <h3><?php echo $_SESSION['login']['user_nickname']; ?></h3>
                    </center>
                </div>
                <div class="svg-pc">
                    <div style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                            style="height: 100%; width: 100%;">
                            <path d="M0.00,49.98 C149.99,150.00 271.49,-49.98 500.00,49.98 L500.00,0.00 L0.00,0.00 Z"
                                style="stroke: none; fill: #272727;"></path>
                        </svg>
                    </div>
                </div>

                <ul>
                    <li class="active"><a href="" class="scrollSuave">Conta</a></li>
                    <li><a href="pessoal.html" class="scrollSuave">Informações pessoais</a></li>
                    <li><a href="historico.html" class="scrollSuave">Historico</a></li>
                    <li><a href="../../index.html" class="scrollSuave">Tela Inicial</a></li>
                    <li><a href="#!" class="scrollSuave" style="color: red;">Sair</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- ========================= NAVBAR MOBILE ========================= -->

    <!-- ============ CONFIGURAÇÕES DE USUARIO ============ -->
    <section class="formulario">
        <div class="container config">
            <div id="mensagem">

            </div>
            <h1>Configurações de usuario</h1>
            <div class="form-group">
                <label for="nome">Nome</label><br>
                <input type="text" id="nome" value="<?php echo $_SESSION['login']['user_name'] ?>">
            </div>
            <div class="form-group">
                <label for="nickname">Nickname</label><br>
                <input type="text" id="nickname" value="<?php echo $_SESSION['login']['user_nickname'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label><br>
                <input type="email" id="email" value="<?php echo $_SESSION['login']['user_email'] ?>">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label><br>
                <input type="text" id="senha" value="<?php echo $_SESSION['login']['user_senha'] ?>">
            </div>
            <div class="form-group">
                <label for="senha">Confirmar nova senha</label><br>
                <input type="text" id="confirmaSenha" value='<?php echo $_SESSION['login']['user_senha'] ?>'>
            </div>
            <div class="form-group">
            <label for="senha">Upar nova foto</label><br>
                <input type="file" accept="image/png, image/jpeg">
            </div>
            <input type="submit" onclick="trocarDados()" value="Salvar">
        </div>
    </section>
    <!-- ============ FIM CONFIGURAÇÕES DE USUARIO ============ -->

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
    <script src="components/js/app.js"></script>
    <script src="components/js/main.js"></script>
    <!-- ============= FIM SCRIPTS ============= -->
</body>

</html>