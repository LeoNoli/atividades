<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuario</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body> 
<?php 
   
    include "conexao.php";
    $email = $_POST["email_cadastro"];
    $senha = $_POST["senha_cadastro"];
    $nome = $_POST["nome"];
   
        $insert = "INSERT INTO usuario(
                                       email,
                                       senha,
                                       nome,
                                       permissao                                 
                                    ) VALUES (
                                        '$email',
                                        '$senha',
                                        '$nome',
                                        '2'
                                    )";
        mysqli_query($conexao, $insert)
        or die(mysqli_error($conexao));
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Usuario cadastrado com sucesso!</strong>
    <a href="form_usuario.php"> Clique para cadastrar outro usuario</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
?>
<script src="bootstrap.min.js"></script>
</body>
</html>