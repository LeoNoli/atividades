<?php
session_start();

    if(!empty($_POST)){
        include "conexao.php";
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $sql = "SELECT id_usuario, permissao, email FROM usuario
                    WHERE email='$email' AND senha='$senha'";
        
        $res = mysqli_query($conexao,$sql)
                    or die(mysqli_error($conexao));

        if(mysqli_num_rows($res)=="1"){

            $l = mysqli_fetch_assoc($res);
            $_SESSION["usuario"]=$l["id_usuario"];
            $_SESSION["permissao"]=$l["permissao"];
            $_SESSION["email"]=$l["email"];
            header("location: index.php");
        }
        else{
            header("location: index.php?erro=1");
           
        }
    }
?>