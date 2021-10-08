<?php
    if(!empty($_GET)){
        include_once('../../init.php');
        $idCampeao = $_GET['id'];
        $PDO = conectarBanco();
            $query = $PDO -> prepare('SELECT * FROM tb_passiva WHERE id_personagem = :id');
            $query -> bindParam(':id', $idCampeao);
            $query->execute();
            $itens = $query ->  fetchAll(PDO::FETCH_ASSOC);
            for ($i=0; $i < count($itens); $i++) { 
                $itens[$i]['foto'] =  base64_encode($itens[$i]['foto']);
            }
            echo json_encode($itens);
    }