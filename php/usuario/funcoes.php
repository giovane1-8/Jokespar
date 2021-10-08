<?php
    #VERIFICA SE ESTA LOGA RETORNADO TRUE OU FALSE
    function is_login(){ 
        if (!isset($_SESSION['login']['logged_in']) || $_SESSION['login']['logged_in'] !== true)
    {
        return false;
    }
    return true;
    }
    #CAPTURA TODOS OS USUARIOS DO BANCO DE DADOS
    function getAllUsers(){
        $PDO = conectarBanco();
        return $query = $PDO->query("SELECT * FROM tb_usuario");
    }
