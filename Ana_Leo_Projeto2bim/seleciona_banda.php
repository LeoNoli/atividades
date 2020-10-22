<?php 
    header("Content-Type: application/json");
    include "conexao.php";
    $genero= $_POST["genero"];
    
    $select="SELECT nome, id_banda FROM banda WHERE cod_genero = '$genero'";
    
        
    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>
