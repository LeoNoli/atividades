<?php 
    header("Content-Type: application/json");
    include "conexao.php";

    $select="SELECT instrumento.nome AS instrumento, cor.nome AS nome_cor, modelo.nome AS nome_modelo, instrumento.id_instrumento AS id_instrumento
    FROM instrumento
    INNER JOIN cor ON instrumento.cod_cor = cor.id_cor
    INNER JOIN modelo ON instrumento.cod_modelo = modelo.id_modelo";
        if(isset($_GET["id"])){
            $id_instrumento = $_GET["id"];
            $select = "SELECT * FROM instrumento WHERE id_instrumento='$id_instrumento' ORDER BY nome";
        }
        
    

    $res = mysqli_query($conexao, $select) or die(mysqli_error($conexao));
    while($linha=mysqli_fetch_assoc($res)){
        $res2[]= $linha;
    }
    echo json_encode($res2);
?>
