<?php

    include "conexao.php";

    $instrumento = $_POST["instrumento"];
    $id_instrumento = $_POST["id_instrumento"];
    $cod_modelo = $_POST["cod_modelo"];
    $cod_cor = $_POST["cod_cor"];
    
    $update = "UPDATE instrumento SET nome='$instrumento',
                                    cod_modelo='$cod_modelo', 
                                    cod_cor='$cod_cor'
                                    WHERE
                                    id_instrumento='$id_instrumento'";
    
    mysqli_query($conexao,$update)
        or die($update.mysqli_error($conexao));
  
    echo "1";

?>