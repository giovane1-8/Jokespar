<?php
    function conectarBanco(){
        $username = "root";
        $password = "privada123123";
        try {
        $PDO = new PDO('mysql:host=localhost:3307;dbname=db_jokespar', $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $PDO -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
        return $PDO;
    }
