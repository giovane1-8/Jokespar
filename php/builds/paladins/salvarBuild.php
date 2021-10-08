<?php
include_once('../../init.php');
if(count(array_filter($_POST)) == 7){
    $pontosCarta = array_filter($_POST["cartaPonto"]);
    $contagemPC = $pontosCarta[0] + $pontosCarta[1] + $pontosCarta[2] + $pontosCarta[3] + $pontosCarta[4];
    if ($contagemPC == 15) {
        $item = array_filter($_POST["item"]);
        if(count($item) == 4){
            $dataHoje = date('Y')."-".date('m')."-".date('d');
            $titulo = trim($_POST['tituloBuild']);
            $categoria = trim($_POST['funcao']);
            $talento = trim($_POST['talento']);
            $idJogo = 1;
            $carta = array_filter($_POST["carta"]);
            $item = array_filter($_POST["item"]);
            $PDO = conectarBanco();
            $query = $PDO->prepare("SELECT id_data FROM tb_data_postagem WHERE dt_postagem = :dataHoje");
            $query->bindParam(":dataHoje",$dataHoje);
            $query->execute();
            $idDataHoje = $query->fetchAll(PDO::FETCH_ASSOC);

            if($idDataHoje == null){
                $data = $PDO->prepare("INSERT INTO tb_data_postagem (dt_postagem)VALUES(?)"); 
                $data->bindParam(1,$dataHoje);
                $data->execute();
                $query = $PDO->prepare("SELECT id_data FROM tb_data_postagem WHERE dt_postagem = :dataHoje");
                $query->bindParam(":dataHoje",$dataHoje);
                $query->execute();
                $idDataHoje = $query->fetchAll(PDO::FETCH_ASSOC);
            }


            #CRIA A BUILD NA TABELA TB_PALADINS
            $stmt = $PDO->prepare("INSERT INTO tb_paladins (id_usuario,id_jogo,id_passiva_personagem,id_categoria_build,id_data,nm_titulo)VALUES(?, ?, ?, ?, ?, ?)");
            $stmt->bindParam(1,$_SESSION['login']['user_id']);
            $stmt->bindParam(2,$idJogo);
            $stmt->bindParam(3,$talento);
            $stmt->bindParam(4,$categoria);
            $stmt->bindParam(5,$idDataHoje[0]["id_data"]);
            $stmt->bindParam(6,$titulo);
            if(!$stmt->execute()){
                echo "<script>alert('Erro ao salvar build');window.location.href='../../../areas/rankup/paladins/novaBuild.php'</script>";
            }else{
                #PEGA O ID DA BUILD QUE FOI FEITA
                $query1 = $PDO->prepare("SELECT id_paladins FROM tb_paladins, tb_data_postagem WHERE tb_data_postagem.dt_postagem = :dataPostagem AND tb_data_postagem.id_data = tb_paladins.id_data AND tb_paladins.id_usuario = :idUser AND tb_paladins.nm_titulo = :titulo");
                $query1->bindParam(":dataPostagem",$dataHoje);
                $query1->bindParam(":idUser",$_SESSION['login']['user_id']);
                $query1->bindParam(":titulo",$titulo);
                $query1->execute();
                $id = $query1->fetchAll(PDO::FETCH_ASSOC);


                #insere as cartas
                if((!empty($carta[0])) || (!empty($carta[1])) || (!empty($carta[2])) || (!empty($carta[3])) || (!empty($carta[4]))){
                    for ($i=0; $i < 5; $i++) {
                        $stmt1 = $PDO->prepare("INSERT INTO tb_baralho(id_paladins,id_carta,cd_pontos)VALUES(?,?,?)");
                        $stmt1->bindParam(1,$id[0]["id_paladins"]);
                        $stmt1->bindParam(2,$carta[$i]);
                        $stmt1->bindParam(3,$pontosCarta[$i]);
                        $stmt1 -> execute();
                    }
                }else{
                    $DELETEbuild = $PDO->prepare("DELETE FROM tb_paladins WHERE id_paladins = :idpaladins");
                    $DELETEbuild->bindParam(":idpaladins",$id[0]["id_paladins"]);
                    $DELETEbuild -> execute();
                }
                #insere os itens
                if((!empty($item[0])) || (!empty($item[1])) || (!empty($item[2])) || (!empty($item[3]))){
                    for ($i=0; $i < 4; $i++) {
                        $stmt2 = $PDO->prepare("INSERT INTO tb_itens_build_paladins (id_item,id_paladins)VALUES(?,?)");
                        $stmt2->bindParam(1,$item[$i]);
                        $stmt2->bindParam(2,$id[0]["id_paladins"]);
                        $stmt2 -> execute();
                    }
                }else{
                    $DELETEbuild = $PDO->prepare("DELETE FROM tb_paladins WHERE id_paladins = :idpaladins");
                    $DELETEbuild->bindParam(":idpaladins",$id[0]["id_paladins"]);
                    $DELETEbuild -> execute();
                }
                header("Location: ../../../areas/rankup/paladins/");
                }
        }else{
            echo "<meta charset ='utf-8'> <script>alert('selecione 4 itens'); window.location.href='../../../areas/rankup/paladins/novaBuild.php';</script>";
        }
    }else{
        echo "<meta charset ='utf-8'> <script>alert('adicione 15 pontos entre as cartas'); window.location.href='../../../areas/rankup/paladins/novaBuild.php';</script>";
    }
}else{
    echo "<meta charset ='utf-8'> <script>alert('Voçê não selecionou todos os dados.'); window.location.href='../../../areas/rankup/paladins/novaBuild.php';</script>";
}
?>