<?php 
    header("Content-Type: application/json");
    include "conexao.php";
    // Select pra verificar nas familias
    // Precisamos do nome da familia do nome cientifico selecionado

    $select="SELECT musica.id_musica as id_da_musica, musica.nome as nome_musica, banda.nome as nome_banda FROM musica INNER JOIN banda 
    WHERE musica.cod_banda = banda.id_banda";

    $res = mysqli_query($con, $select) or die(mysqli_error($con));
    while($linha=mysqli_fetch_assoc($res)){
        $resultado[]= $linha;
    }
    echo json_encode($resultado);
?>
