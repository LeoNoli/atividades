<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Modelo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body> 
<?php 
   
    include "conexao.php";
    $modelo = $_POST["modelo"];
   
        $insert = "INSERT INTO modelo(
                                       nome                                   
                                    ) VALUES (
                                        '$modelo'
                                    )";
        mysqli_query($conexao, $insert)
        or die(mysqli_error($conexao));
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Modelo inserida com sucesso!</strong>
    <a href="form_modelo.php"> Clique para cadastrar outro modelo</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
?>
<script src="bootstrap.min.js"></script>
</body>
</html>