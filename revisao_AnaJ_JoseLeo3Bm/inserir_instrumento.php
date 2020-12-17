<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Instrumento</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>  
<?php 
    include "conexao.php";
    $instrumento = $_POST["instrumento"];
    $cor = $_POST["cor"];
    $modelo = $_POST["modelo"];
    $preco = $_POST["preco"];

    $insert = "INSERT INTO instrumento(
                                    nome,
                                    cod_cor,
                                    cod_modelo,
                                    preco
                                ) VALUES (
                                    '$instrumento',
                                    '$cor',
                                    '$modelo',
                                    '$preco'
                                )";
    mysqli_query($conexao, $insert)
     or die(mysqli_error($conexao));
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Instrumento cadastrado com sucesso!</strong>
    <a href="form_instrumento.php"> Clique para cadastrar outro instrumento</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
?>
<script src="bootstrap.min.js"></script>
</body>
</html>
