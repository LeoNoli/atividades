<?php 
    header("Content-Type: application/json");
    include "conexao.php";
    session_start();
    
    $select = "SELECT id_usuario, nome, email FROM usuario";

    if(isset($_GET["id"])){
        $select.=" WHERE id_usuario = '".$_GET['id']."'";
    }
    else if($_SESSION["permissao"]=="2"){
        $select.=" WHERE id_usuario = '".$_SESSION['usuario']."'";
    }

    $res = mysqli_query($conexao, $select) or die(mysqli_error($conexao));
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>