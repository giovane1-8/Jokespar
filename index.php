<?php
    include_once("php/init.php");
?>
<!DOCTYPE html>
<html>

<head>
    <!-- ============= TITULO DA PAGINA ============= -->
    <title>Joke Spar</title>
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
        
        function logar(){
            var email = document.getElementById("email").value;
            var senha = document.getElementById("senha").value;
            var result = document.getElementById("mensagem");
            var xmlreq = CriaRequest();
            // Iniciar uma requisição
            xmlreq.open("GET", "php/usuario/logar.php?email="+email+"&senha="+senha+"&blaginsblaris=1", true);
            // Atribui uma função para ser executada sempre que houver uma mudança de ado
            xmlreq.onreadystatechange = function(){
                // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                if (xmlreq.readyState == 4) {
                    // Verifica se o arquivo foi encontrado com sucesso
                    if (xmlreq.status == 200) {
                        result.innerHTML = "<div class='msg wow fadeInLeft'id='mensagensLogin'><p>"+xmlreq.responseText+"</p></div>";
                        if(xmlreq.responseText == "Você esta logado"){
                            setTimeout(function(){
                                window.location.href = "./";
                            },1000)
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

<body id="jokespar">
    <header>
        <a href="#inicio" class="logo scrollSuave">Joke Spar</a>

        <input type="checkbox" id="control-nav" />
        <label for="control-nav" class="control-nav"></label>
        <label for="control-nav" class="control-nav-close"></label>

        <nav>
            <ul>
                <li><a href="#inicio" class="ativar scrollSuave">Inicio</a></li>
                <li><a href="#sobre" class="scrollSuave">Sobre</a></li>
                <li><a href="#servicos" class="scrollSuave">Serviços</a></li>
                <li><a href="#parceiros" class="scrollSuave">Parceiros</a></li>
                <li><a href="#faq" class="scrollSuave">Faq</a></li>
                <!-------------------- AREA DE LOGIN-------------------->
               
                            
                <!-------------------- AREA DE LOGIN FIM-------------------->
                <?php if(!is_login()): ?>
                <li>
                    <div class="dropdown">
                        <button class="btn btn-secondary" type="button" id="dropdownMenu2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="components/img/jokespar/perfil-padrao.png" height="30" width="30">

                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <div class="form-group">
                                <label for="email">Email ou Nickname</label><br>
                                <input name="email" type="email" id="email">
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha</label><br>
                                <input name="senha" type="password" id="senha">
                            </div>
                            <input type="submit" onclick="logar()" value="Logar">
                            <script>
                            document.getElementById('senha').addEventListener('keypress', function(e){
                                if(e.which == 13){
                                    logar();
                                }
                            }, false);</script>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="cadastroUsuario/">Novo por aqui? Cadastre-se</a>
                            <a class="dropdown-item" href="#">Esqueci minha senha</a>
                        </div>
                    </div>
                </li>


                <?php else: ?>
                <li>
                    <div class="dropdown">
                        <button class="btn btn-secondary" type="button" id="dropdownMenu2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <?php if(!empty($_SESSION['login']['user_foto'])): ?>
                                <img src="data:image/jpg;base64,<?php echo base64_encode($_SESSION['login']['user_foto']); ?>" height="30" width="30">
                            <?php else:?>
                                <img src="components/img/jokespar/perfil-padrao.png" height="30" width="30">
                            <?php endif;?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <a href="areas/conta/">Configurações</a><br>
                            <a href="php/usuario/deslogar.php" style="color: red;">Sair</a>
                        </div>
                    </div>
                </li>
                <?php endif; ?>


            </ul>
        </nav>
    </header>
    <div class="container"  id='mensagem'>
        
    </div> 

    
    <!-- ========================= INICIO ========================= -->
    <section id="inicio">
        <div class="container">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="conteudo">
                            <h1 class="wow fadeInDown" data-wow-delay="1s">Seja bem vindo a 
                                <h1 class="wow fadeInDown" data-wow-delay="1.5s">Joke Spar!</h1>
                            </h1>
                            <hr class="wow flipInX" data-wow-delay="2s">
                            <h2 class="wow fadeIn" data-wow-delay="2.2s">Aqui tem tudo o que você precisa para ir ao proximo nivel!</h2>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <center>
                            <img src="components/img/jokespar/logo.png" class="wow fadeInRight" data-wow-delay="1s">
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= FIM INICIO ========================= -->

    <!-- ========================= SOBRE ========================= -->
    <!-- <section id="sobre">
        <div class="divUm">
            <div class="divDois">
                <img src="components/img/jokespar/controlePS4.png">
            </div>
        </div>

        <div class="container">
            <h1 class="wow fadeIn" data-wow-delay="0.25s">SOBRE</h1>
            <p class="wow fadeIn" data-wow-delay="0.5s">A Joke Spar funciona como uma ponte que liga todos o gamers que
                possuem o mesmo objetivo, formar uma equipe e até mesmo competir profissionalmente., concorrendo a
                sorteio mensais e divulgação de sua equipe dentro da plataforma, além de sempre te deixar atualizado de
                todos os torneios e campeonatos que se encaixam melhor ao perfil de sua equipe.
                Com toda certeza para ter um desempenho de nível profissional você irá precisar de um bom suporte e
                sugestões especializadas sobre combinações de itens e equipamentos, que estão extremamente presentes no
                game, mas nem sempre da forma correta, e isso você encontra de forma gratuita aqui em nossa plataforma.
                Achou que tinha acabado? A Joke Spar oferece para você as melhores opções e preços do mercado para você
                que sonha em montar um Setup seja ele Gamer ou não.</p>
        </div>
    </section> -->
    <!-- ========================= FIM SOBRE ========================= -->

    <!-- ========================= SERVIÇOS ========================= -->
    <section id="servicos">

        <div class="container">
            <div class="card-deck">

                <!-- === RANK UP === -->
                <div class="card wow fadeIn" data-wow-delay="0.5s">
                    <img src="components/img/jokespar/servicoRankUp.png" class="card-img-top" alt="IMAGEM">
                    <div class="card-body">
                        <h5 class="card-title">RANK UP</h5>
                        <p class="card-text">Aqui você pode escolher as melhores combinações de itens ou
                            equipamentos para seu personagem em um determinado jogo.
                        </p>
                            <?php if(!is_login()): ?>
                            <button type="button" class="btn btn-outline-info disabled">acessar</button>
                            <?php else: ?>
                            <a href="areas/rankup/">
                                <button type="button" class="btn btn-outline-info">Acessar</button>
                            </a>
                            <?php endif; ?>
                        
                        <div class="textLog">
                            <?php if(!is_login()): ?>
                            <p>Faça login para ter acesso a esta area!</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- === FIM RANK UP === -->

                <!-- === SETUP AREA === -->
                <div class="card wow fadeIn" data-wow-delay="0.9s">
                    <img src="components/img/jokespar/servicoSetupArea.jpg" class="card-img-top" alt="IMAGEM">
                    <div class="card-body">
                        <h5 class="card-title">SETUP AREA</h5>
                        <p class="card-text">Com certeza você já pensou em decorar ou comprar os melhores equipamentos
                            com preços acessíveis para o seu “Setup” seja ele gamer ou não.
                        </p>
                            <?php if(!is_login()): ?>
                                <button type="button" class="btn btn-outline-info disabled">acessar</button>
                            <?php else:?>
                                <a href="areas/setuparea/">
                                    <button type="button" class="btn btn-outline-info">Acessar</button>
                                </a>
                            <?php endif; ?>
                        <div class="textLog">
                            <?php if(!is_login()): ?>
                                <p>Faça login para ter acesso a esta area!</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- === FIM SETUP AREA === -->

            </div>
        </div>
    </section>
    <!-- ========================= FIM SERVIÇOS ========================= -->
    
    <!-- ========================= CADASTRO ========================= -->
    <?php if(!is_login()): ?>
    <section id="cadastro">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-12 col-lg-6">
                </div>
                <div class="col-sm-12 col-lg-6">
                    <center>
                        <h1>CRIE SUA CONTA GRATIS</h1>
                        <h4>ACESSO EXCLUSIVO</h4>
                        <a href="cadastroUsuario/"><input type="submit" value="CRIE AGORA"></a>
                    </center>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- ========================= FIM CADASTRO ========================= -->

    <!-- ========================= JOGOS SUPORTE ========================= -->
    <section id="jogosSuporte">
        <div class="container">
            <h1>JOGOS QUE DAMOS SUPORTE</h1>
            <div class="card-deck">

                <!-- === DEAD BY DAYLIGHT === -->
                <div class="card wow fadeIn">
                    <video autoplay loop muted class="card-img-top">
                        <source src="components/videos/deadbydaylight.mp4" type="video/mp4">
                    </video>
                    <div class="card-body">
                        <p>Dead by Daylight</p>
                    </div>
                </div>
                <!-- === FIM DEAD BY DAYLIGHT === -->

                <!-- === LEAGUE OF LEGENDS === -->
                <div class="card wow fadeIn">
                    <video autoplay loop muted class="card-img-top">
                        <source src="components/videos/leagueoflegends.mp4" type="video/mp4">
                    </video>
                    <div class="card-body">
                        <p>League of Legends</p>
                    </div>
                </div>
                <!-- === FIM LEAGUE OF LEGENDS === -->

                <!-- === PALADINS === -->
                <div class="card wow fadeIn">
                    <video autoplay loop muted class="card-img-top">
                        <source src="components/videos/paladins.mp4" type="video/mp4">
                    </video>
                    <div class="card-body">
                        <p>Paladins</p>
                    </div>
                </div>
                <!-- === FIM PALADINS === -->

            </div>
        </div>
    </section>
    <!-- ========================= FIM JOGOS SUPORTE ========================= -->

    <!-- ========================= PARCEIROS ========================= -->
    <section id="parceiros">
        <div class="container">
            <h1>PARCEIROS</h1>

            <!-- ========================= TAIS OLIVEIRA ========================= -->
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4" style="max-width: 400px;">
                        <img src="components/img/jokespar/parceirosTAIS.jpg" class="card-img">
                        <div class="social-media">
                            <a target="_blank" href=""><i class="fab fa-twitch fa-lg"></i></a>
                            <a target="_blank" href=""><i class="fab fa-discord fa-lg"></i></a>
                            <a target="_blank" href=""><i class="fab fa-instagram fa-lg"></i></a>
                            <a target="_blank" href=""><i class="fab fa-twitter fa-lg"></i></a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Tais Oliveira</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>

                            <!-- ============ CLIPES ============ -->
                            <div class="card-group">

                                <!-- ============ CLIPE 01 ============ -->
                                <div class="card">
                                    <video autoplay loop muted class="card-img-top">
                                        <source src="components/videos/taisCLIPE01.mp4" type="video/mp4">
                                    </video>
                                </div>
                                <!-- ============ FIM CLIPE 01 ============ -->

                                <!-- ============ CLIPE 02 ============ -->
                                <div class="card">
                                    <div class="imagem-video">
                                        <video autoplay loop muted class="card-img-top">
                                            <source src="components/videos/taisCLIPE02.mp4" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                                <!-- ============ FIM CLIPE 02 ============ -->

                            </div>
                            <!-- ============ FIM CLIPES ============ -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- ========================= FIM TAIS OLIVEIRA ========================= -->
            <hr>
            <!-- ========================= PAPPEN ========================= -->
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4" style="max-width: 400px;">
                        <img src="components/img/jokespar/parceirosPAPPEN.jpg" class="card-img">
                        <div class="social-media">
                            <a target="_blank" href=""><i class="fab fa-twitch fa-lg"></i></a>
                            <a target="_blank" href=""><i class="fab fa-discord fa-lg"></i></a>
                            <a target="_blank" href=""><i class="fab fa-instagram fa-lg"></i></a>
                            <a target="_blank" href=""><i class="fab fa-twitter fa-lg"></i></a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Pappen</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>

                            <!-- ============ CLIPES ============ -->
                            <div class="card-group">

                                <!-- ============ CLIPE 01 ============ -->
                                <div class="card">
                                    <video autoplay loop muted class="card-img-top">
                                        <source src="components/videos/pappenCLIPE01.mp4" type="video/mp4">
                                    </video>
                                </div>
                                <!-- ============ FIM CLIPE 01 ============ -->

                                <!-- ============ CLIPE 02 ============ -->
                                <div class="card">
                                    <div class="imagem-video">
                                        <video autoplay loop muted class="card-img-top">
                                            <source src="components/videos/pappenCLIPE02.mp4" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                                <!-- ============ FIM CLIPE 02 ============ -->

                            </div>
                            <!-- ============ FIM CLIPES ============ -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- ========================= FIM PAPPEN ========================= -->
            <hr>
            <!-- ========================= YUMILLE ========================= -->
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4" style="max-width: 400px;">
                        <img src="components/img/jokespar/parceirosYUMILLE.jpg" class="card-img">
                        <div class="social-media">
                            <a target="_blank" href="https://twitch.com/yumille"><i class="fab fa-twitch fa-lg"></i></a>
                            <a target="_blank" href="https://www.youtube.com/channel/UClHO3kBoy0CLObWgYhNY2OA"><i
                                    class="fab fa-youtube fa-lg"></i></a>
                            <a target="_blank" href="https://discordapp.com/invite/vuMBXaS"><i
                                    class="fab fa-discord fa-lg"></i></a>
                            <a target="_blank" href="https://instagram.com/milleouriques"><i
                                    class="fab fa-instagram fa-lg"></i></a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Yumille</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <!-- ============ CLIPES ============ -->
                            <div class="card-group">

                                <!-- ============ CLIPE 01 ============ -->
                                <div class="card">
                                    <video autoplay loop muted class="card-img-top">
                                        <source src="components/videos/yumilleCLIPE01.mp4" type="video/mp4">
                                    </video>
                                </div>
                                <!-- ============ FIM CLIPE 01 ============ -->

                                <!-- ============ CLIPE 02 ============ -->
                                <div class="card">
                                    <div class="imagem-video">
                                        <video autoplay loop muted class="card-img-top">
                                            <source src="components/videos/yumilleCLIPE02.mp4" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                                <!-- ============ FIM CLIPE 02 ============ -->

                            </div>
                            <!-- ============ FIM CLIPES ============ -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- ========================= FIM YUMILLE ========================= -->
            <hr>
            <!-- ========================= BINARUSH ========================= -->
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4" style="max-width: 400px;">
                        <img src="components/img/jokespar/parceirosBINARUSH.jpg" class="card-img">
                        <div class="social-media">
                            <a target="_blank" href="https://twitch.tv/binarush">
                                <i class="fab fa-twitch fa-lg"></i></a>
                            <a target="_blank" href="https://discord.gg/nazHzMn"><i
                                    class="fab fa-discord fa-lg"></i></a>
                            <a target="_blank" href="https://instagram.com/binarush"><i
                                    class="fab fa-instagram fa-lg"></i></a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Binarush</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                            <!-- ============ CLIPES ============ -->
                            <div class="card-group">

                                <!-- ============ CLIPE 01 ============ -->
                                <div class="card">
                                    <video autoplay loop muted class="card-img-top">
                                        <source src="components/videos/binarushCLIPE01.mp4" type="video/mp4">
                                    </video>
                                </div>
                                <!-- ============ FIM CLIPE 01 ============ -->

                                <!-- ============ CLIPE 02 ============ -->
                                <div class="card">
                                    <div class="imagem-video">
                                        <video autoplay muted class="card-img-top">
                                            <source src="components/videos/binarushCLIPE02.mp4" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                                <!-- ============ FIM CLIPE 02 ============ -->

                            </div>
                            <!-- ============ FIM CLIPES ============ -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- ========================= FIM BINARUSH ========================= -->

            <div class="jumbotron">
                <center>
                    <h1>Deseja se tornar um parceiro?</h1>
                    <h4>Entre em contato pelo nosso email</h4>
                    <a href="mailto:contato@jokespar.com.br">contato@jokespar.com.br</a>
                </center>
            </div>
        </div>
    </section>
    <!-- ========================= FIM PARCEIROS ========================= -->

    <!-- ========================= FAQ ========================= -->
    <section id="faq">
        <div class="container" id="accordionExample">
            <h1>Perguntas Frequentes</h1>

            <!-- ========== PERGUNTA 01 ========== -->
            <div class="accordion">
                <div class="card">
                    <div class="card-header" id="perguntaUm" data-toggle="collapse" data-target="#colapsoUm">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" aria-controls="colapsoUm">
                                <div class="titulo">
                                    <h1>01.</h1>
                                    <h1>Como funciona a Rank Up?</h1>
                                    <i class="fas fa-chevron-down fa-1x"></i>
                                </div>
                            </button>
                        </h2>
                    </div>
                    <div id="colapsoUm" class="collapse" aria-labelledby="perguntaUm" data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Nós estamos em progresso de atualizações mensalmente para acrescentar novos personagens e conteúdos.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========== FIM PERGUNTA 01 ========== -->

            <!-- ========== PERGUNTA 02 ========== -->
            <div class="accordion">
                <div class="card">
                    <div class="card-header" id="perguntaDois" data-toggle="collapse" data-target="#colapsoDois">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" aria-controls="colapsoDois">
                                <div class="titulo">
                                    <h1>02.</h1>
                                    <h1>Como funciona a Setup Area ?</h1>
                                    <div class="seta">
                                        <i class="fas fa-chevron-down fa-1x"></i>
                                    </div>
                                </div>
                            </button>
                        </h2>
                    </div>
                    <div id="colapsoDois" class="collapse" aria-labelledby="perguntaDois"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Nós estamos em progresso de atualizações para acrescentar novos conteúdos.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========== FIM PERGUNTA 02 ========== -->

            <!-- ========== PERGUNTA 03 ========== -->
            <div class="accordion">
                <div class="card">
                    <div class="card-header" id="perguntaTres" data-toggle="collapse" data-target="#colapsoTres">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" aria-controls="colapsoTres">
                                <div class="titulo">
                                    <h1>03.</h1>
                                    <h1>Quais jogos estamos dando suporte atualmente ?</h1>
                                    <div class="seta">
                                        <i class="fas fa-chevron-down fa-1x"></i>
                                    </div>
                                </div>
                            </button>
                        </h2>
                    </div>
                    <div id="colapsoTres" class="collapse" aria-labelledby="perguntaTres"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <p>
                                Atualmente estamos dando suporte para o Paladins, pensando em atualizações mensamente para o mesmo e outros jogos.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========== FIM PERGUNTA 03 ========== -->

            <div class="recado">
                <p>Se ainda tiver qualquer dúvida, pode falar com a gente no email <a
                        href="mailto:contato@jokespar.com.br">contato@jokespar.com.br</a></p>
            </div>

        </div>
    </section>
    <!-- ========================= FIM FAQ ========================= -->


    <!-- ========================= BUTTOM TOP ========================= -->
    <!-- <div id="button-top">
        <a href="#inicio" class="scrollSuave"><i class="fas fa-chevron-circle-up fa-3x"></i></a>
    </div> -->
    <!-- ========================= FIM BUTTOM TOP ========================= -->

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
                            <img src="components/img/jokespar/riot-games-logo.png" height="25" width="55">
                        </a>
                        <a target="_blank" href="https://www.hirezstudios.com">
                            <img src="components/img/jokespar/hirez-logo.png" height="25" width="60">
                        </a>
                        <a target="_blank" href="https://www.bhvr.com">
                            <img src="components/img/jokespar/behaviour-logo.png" height="25" width="50">
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