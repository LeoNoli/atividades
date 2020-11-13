<?php 
    header("Content-Type: application/json");
    include "conexao.php";
    $instrumento= $_POST["instrumento"];
    
    $select="SELECT nome, id_cor FROM cor WHERE cod_instrumento = '$instrumento'";
    
        
    $res = mysqli_query($conexao, $select) or die(mysqli_error($conexao));
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>
