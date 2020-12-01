<?php

    include "conexao.php";

    $modelo = $_POST["modelo"];
    $id_modelo = $_POST["id_modelo"];
   

    $update = "UPDATE modelo SET nome='$modelo' WHERE
                            id_modelo='$id_modelo'";
    
    mysqli_query($conexao,$update)
        or die(mysqli_error($conexao));

    echo "1";

?>