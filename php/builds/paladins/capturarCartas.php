<?php
    if(!empty($_GET)){
        include_once('../../init.php');
        $idCampeao = $_GET['id'];
        $PDO = conectarBanco();
        $query = $PDO -> prepare('SELECT * FROM tb_cartas_paladins WHERE id_personagem = :id');
        $query -> bindParam(':id', $idCampeao);
        $query->execute();
        $personagens = $query ->  fetchAll(PDO::FETCH_ASSOC);
        for ($i=0; $i < count($personagens); $i++) { 
            $personagens[$i]['foto'] =  base64_encode($personagens[$i]['foto']);
        }
        echo json_encode($personagens);
    }