<?php
if (!empty($_GET)) {
    require_once("../init.php");
    header('Content-type: text/html; charset=UTF-8');
    $PDO = conectarBanco();
    $nome = trim($_GET['nome']);
    $email = trim($_GET['email']);
    $senha = trim($_GET['senha']);
    $confimaSenha = trim($_GET['confirmaSenha']);
    $nickname = trim($_GET['nickname']);
    $id_cor = 1;
    $return = 'Nenhum dado foi alterado';
    function alterarDados($sql,$novoValor,$id){
        $PDO = conectarBanco();
        $alterar = $PDO -> prepare($sql);
         if($alterar->execute(array(':id'   => $id,':novoValor' => $novoValor))){
            $return = "Seus dados foram alterados";
         }else{
            $return = "Nenhum dado foi alterado";
         };
        return $return;
    }
    if ((empty($nome)) || (empty($email)) || (empty($senha)) || (empty($nickname))) {
        $return = "Não pode conter dados em branco";
    }
    else{
        if($_SESSION["login"]["user_senha"] !== $senha){
            if ($senha !== $confimaSenha){
                $return = "Senhas não coincidem";
                $return .= $senha."    ".$confimaSenha;
            }else{
                $return = alterarDados("UPDATE tb_usuario SET nm_senha = :novoValor WHERE id_usuario = :id",base64_encode($senha),$_SESSION['login']['user_id']);
                $_SESSION["login"]["user_senha"] = $senha;
            }
        }
        if($email !== $_SESSION['login']['user_email']){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $return = "Insira um email valido";
            }else{
                $query = $PDO->prepare("SELECT nm_email FROM tb_usuario WHERE nm_email = :email");
                $query->bindParam(':email', $email);
                $query->execute();
                $linha = $query -> fetchAll(PDO::FETCH_ASSOC);
                if(count($linha) > 0){
                    $return = "Seu email ja esta em uso";
                }else {
                    $return = alterarDados("UPDATE tb_usuario SET nm_email = :novoValor WHERE id_usuario = :id",$email,$_SESSION['login']['user_id']);
                    $_SESSION['login']['user_email'] = $email;
                }
            }
        }
        if($nome !== $_SESSION['login']['user_name']){
            $return = alterarDados("UPDATE tb_usuario SET nm_usuario = :novoValor WHERE id_usuario = :id",$nome,$_SESSION['login']['user_id']);
            $_SESSION['login']['user_name'] = $nome;
        }
        if($nickname !== $_SESSION['login']['user_nickname']){
            $query = $PDO->prepare("SELECT nm_nickname FROM tb_usuario WHERE nm_nickname = :nickname");
            $query->bindParam(':nickname', $nickname);
            $query->execute();
            $linha = $query -> fetchAll(PDO::FETCH_ASSOC);
            if(count($linha) > 0){
                $return = "Este nickname já esta em uso";
            }else{
                $return = alterarDados("UPDATE tb_usuario SET nm_nickname = :novoValor WHERE id_usuario = :id",$nickname,$_SESSION['login']['user_id']);
                $_SESSION['login']['user_nickname'] = $nickname;
            }
        }
    }
    echo $return;
}