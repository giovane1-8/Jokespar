<meta charset="utf-8">
<?php
if (!empty($_GET)) {
    require_once("../init.php");
    $PDO = conectarBanco();
    header('charset=UTF-8');
    $nome =  trim($_GET["nome"]);
    $email = trim($_GET["email"]);
    $senha = trim($_GET["senha"]);
    $nickname = trim($_GET["nickname"]);
    $confimaSenha = trim($_GET["confirmaSenha"]);
    $id_cor = 1;
    $return;
    if ($senha !== $confimaSenha){
        $return = "Senhas não coincidem";
    }elseif ((empty($nome)) || (empty($email)) || (empty($senha)) || (empty($confimaSenha)) || (empty($nickname))) {
        $return = "Insira todos os dados!";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $return = "Insira um email valido";
    }
    else{
        $a = true;
        $query = $PDO->prepare("SELECT nm_email FROM tb_usuario WHERE nm_email = :email");
        $query->bindParam(':email', $email);
        $query->execute();
        $linha = $query -> fetchAll(PDO::FETCH_ASSOC);
        if(count($linha) > 0){
            $return = "Seu email ja esta em uso";
            $a = false;
        }else{
            $senha = base64_encode($senha);
            $query = $PDO->prepare("SELECT nm_nickname FROM tb_usuario WHERE nm_nickname = :nickname");
            $query->bindParam(':nickname', $nickname);
            $query->execute();
            $linha = $query -> fetchAll(PDO::FETCH_ASSOC);
            if(count($linha) > 0){
                $return = "Este nickname já esta em uso";
                $a = false;
            }else{
                if($a){
                    if ($stmt = $PDO->prepare("INSERT INTO tb_usuario (nm_usuario,nm_email,nm_senha,nm_nickname,id_cor)VALUES(?, ?, ?, ?, ?)")) {
                        $stmt->bindParam(1,$nome);
                        $stmt->bindParam(2,$email);
                        $stmt->bindParam(3,$senha);
                        $stmt->bindParam(4,$nickname);
                        $stmt->bindParam(5,$id_cor);
                        $stmt->execute();
                        $return = "Cadastrado com sucesso";
                    }else{
                        $return = "ERRO NO CADASTRO";
                    }
                }
            }
        }
    }
    echo $return;
}