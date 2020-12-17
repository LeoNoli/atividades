<?php 
    include "conf.php";

    cabecalho();
    include "conexao.php";
    $cod_instrumento = $_POST["cod_instrumento"];
    $cod_usuario = $_SESSION["usuario"];
    
    $insert = "INSERT INTO compra(
                                    cod_instrumento,
                                    cod_usuario
                                ) VALUES (
                                    '$cod_instrumento',
                                    '$cod_usuario'
                                )";
    mysqli_query($conexao, $insert)
     or die(mysqli_error($conexao));
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Instrumento comprado com sucesso!</strong>
    <a href="lista_compras.php"> Clique para comprar outro instrumento</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
?>
<script src="bootstrap.min.js"></script>
</body>
</html>
