<?php

    include "conexao.php";
    session_start();

    $nome = $_POST["nome"];
    $id_usuario = $_SESSION["usuario"];
    $email_cadastro = $_POST["email_cadastro"];
    $senha_cadastro = $_POST["senha_cadastro"];


    $update = "UPDATE usuario SET nome='$nome',
                                email='$email_cadastro'
                                WHERE
                                id_usuario='$id_usuario'";
    
    mysqli_query($conexao,$update)
        or die(mysqli_error($conexao));
    
    $update = "UPDATE usuario SET email='$email_cadastro' ";

    if($senha_cadastro!=""){
        $update.="              , senha='$senha_cadastro'";               
    }

    $update .=" WHERE
                    id_usuario='$id_usuario'"; 

    mysqli_query($conexao,$update)
        or die(mysqli_error($conexao).$update);

    echo "1";

?>