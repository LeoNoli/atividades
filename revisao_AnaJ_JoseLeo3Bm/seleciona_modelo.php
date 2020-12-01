<?php 
    header("Content-Type: application/json");
    include "conexao.php";
    //$instrumento= $_POST["instrumento"];
    //$cor= $_POST["cor"];
    
    //$select="SELECT nome, id_modelo FROM modelo WHERE cod_cor = '$cor'";
    $select = "SELECT nome, id_modelo FROM modelo";
        
    $res = mysqli_query($conexao, $select) or die(mysqli_error($conexao));
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>
