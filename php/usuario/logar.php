<?php
    if (!empty($_GET)) {
        include_once("../init.php");
        $PDO = conectarBanco();
        // resgata variáveis do formulário
        $email = $_GET['email'];
        $senha = $_GET['senha'];
        $password = base64_encode($senha);
        $chave = $_GET['blaginsblaris'];
        if (empty($email) || empty($password)){
            $mensagem = "Coloque o E-mail e senha!";
        }else{
                $sql = "SELECT * FROM tb_usuario WHERE (nm_email = :email OR nm_nickname = :email) AND nm_senha = :password";
                $stmt = $PDO->prepare($sql);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->execute();
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (count($users) <= 0){
                    #acontece se o usuario colocou email e senha errado
                    $mensagem = "E-mail ou senha incorretos";
                }else{
                // pega o primeiro usuário
                    $user = $users[0];
                    $_SESSION['login']['logged_in'] = true;
                    $_SESSION['login']['user_id'] = $user['id_usuario'];
                    $_SESSION['login']['user_name'] = $user['nm_usuario'];
                    $_SESSION['login']['user_email'] = $user['nm_email'];
                    $_SESSION['login']['user_nickname'] = $user['nm_nickname'];
                    $_SESSION['login']['user_senha'] = base64_decode($user['nm_senha']);
                    $_SESSION['login']['user_foto'] = $user['foto'];
                    $stmt = $PDO->query("SELECT nm_cor FROM tb_cor_usuario WHERE id_cor = ".$user['id_cor']);
                    $cor = $stmt ->fetchAll(PDO::FETCH_ASSOC);
                    $_SESSION['login']['user_cor'] = $cor[0]["nm_cor"];


                    $mensagem = "Você esta logado";
                }
        }
        if($chave == 1){
            echo $mensagem;
        }
    }