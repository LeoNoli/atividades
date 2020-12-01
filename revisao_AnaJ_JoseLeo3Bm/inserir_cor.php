<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cor</title>
</head>
<body> 
<?php 
    include "conexao.php";
    
    
    $cor = $_POST["cor"];
    $insert = "INSERT INTO cor(
                                    nome
                                ) VALUES (
                                    '$cor'
                                )";
    mysqli_query($conexao, $insert)
     or die(mysqli_error($conexao));
     echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
     <strong>Cor cadastrada com sucesso!</strong>
     <a href="form_cor.php"> Clique para cadastrar outra cor</a>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>';
 ?>
 
 </body>
 </html>