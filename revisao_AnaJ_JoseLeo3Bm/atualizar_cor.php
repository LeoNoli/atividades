<?php

    include "conexao.php";

    $cor = $_POST["cor"];
    $id_cor = $_POST["id_cor"];

    $update = "UPDATE cor SET nome='$cor' WHERE
                            id_cor='$id_cor'";
    
    mysqli_query($conexao,$update)
        or die(mysqli_error($conexao));

    echo "1";

?>