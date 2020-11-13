<?php 
    header("Content-Type: application/json");
    include "conexao.php";

    $select="SELECT id_instrumento, nome FROM instrumento";

    $res = mysqli_query($conexao, $select) or die(mysqli_error($conexao));
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>
