<?php
    require_once("../php/init.php");
    if(is_login()){
        header('Location: ../');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- ============= TITULO DA PAGINA ============= -->
    <title>Joke Spar - Cadastro</title>
    <link rel="shortcut Icon" href="components/img\icon.ico" type="image/x-png/">

    <!-- ============= METAS ============= -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

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
    <script language="javascript" type="text/javascript">
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
      alert("Inicie em outro navegador");
  else
      return request;
}

function cadastrar(){
    var nome = document.getElementById("nome").value;
    var email = document.getElementById("email").value;
    var senha = document.getElementById("password").value;
    var confirmaSenha = document.getElementById("confirmaSenha").value;
    var nickname = document.getElementById("nickname").value;
    var result = document.getElementById("mensagem");
    var xmlreq = CriaRequest();
    // Iniciar uma requisição
    xmlreq.open("GET", `../php/usuario/cadastro.php?nome=${ nome}&email=${email}&senha=${senha}&nickname=${nickname}&confirmaSenha=${confirmaSenha}`, true);

    // Atribui uma função para ser executada sempre que houver uma mudança de ado
    xmlreq.onreadystatechange = function(){
        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
        if (xmlreq.readyState == 4) {
            // Verifica se o arquivo foi encontrado com sucesso
            if (xmlreq.status == 200) {
                result.innerHTML = xmlreq.responseText;
                if(xmlreq.responseText.toLowerCase() == "cadastrado com sucesso"){
                    setTimeout(function(){ 
                        var xmlreq1 = CriaRequest();
                        xmlreq1.open("GET", `../php/usuario/logar.php?email=${email}&senha=${senha}}+"&blaginsblaris=0`, true);
                        xmlreq1.send(null);
                        window.location.href = "../";        
                    },1000);
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
<body>
        
    <!-- particles.js container -->
    <div id="particles-js"></div>
    <div style="margin-bottom: 85vh !important;">
   
    </div>
    <!-- ============= FORMULARIO ============= -->
    <div style="position: fixed;">
    
    </div>


    
    <div class="quadrado">
        <center>
    <div>
        <h1>
            <div class='container'>
                <div class='alerta' id="mensagem">

                </div>
            </div>
        </h1>
    </div>

            <div class="esquerda"></div>

            <div class="direita">
                <div class="container">
                    <h1>Cadastro</h1>
                    <input type="text" name="Nome" id="nome" placeholder="Nome" class="wow fadeIn col-sm-12" data-wow-delay="0.85s" id="name" required>
                    <input type="text" name="nickname" id="nickname" placeholder="Nickname" class="wow fadeIn col-sm-12" data-wow-delay="1.15s" id="password" required>
                    <input type="email" name="email" id="email" placeholder="Email" class="wow fadeIn col-sm-12" data-wow-delay="1.05s" id="email" required>
                    <input type="password" name="senha" id="password" placeholder="Senha" class="wow fadeIn col-sm-12" data-wow-delay="1.15s" id="password" required>
                    <input type="password" name="confirmaSenha" id="confirmaSenha" placeholder="Confirmar senha" class="wow fadeIn col-sm-12"
                        data-wow-delay="1.25s" id="confirmPassword" required>
                    <input type="submit" onclick="cadastrar()" class="wow bounceIn" data-wow-delay="1.35s" value="CADASTRAR">
                    <p class="wow flipInX" data-wow-delay="1.40s">Ja tem uma conta?<a href="../"> Clique Aqui</a></p>
                </div>
            </div>
        </center>
    </div>
    <!-- ============= FIM FORMULARIO ============= -->

    <!-- ============= SCRIPTS ============= -->
    <script src="//cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
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
    <script></script>
    <!-- ============= FIM SCRIPTS ============= -->
</body>

</html>