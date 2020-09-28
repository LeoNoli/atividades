<?php
    include "conexao.php";

    $select = "SELECT especie.nome, especie.nome_cientifico as nome_cientifico_especie, genero.nome_cientifico as nome_cientifico_genero, familia.nome_cientifico as nome_cientifico_familia FROM genero INNER JOIN familia ON genero.cod_familia = familia.id_familia INNER JOIN especie ON especie.cod_genero=genero.id_genero";
    
    $resultado = mysqli_query($conexao,$select); 

    echo '<table border="1" cellspacing="0">
            <tr><th colspan="4" style="text-align:left">ESPECIE</th></tr>
            <tr>
                <th>Nome</th>
                <th>Nome Cientifico</th>
                <th>Genero</th>
                <th>Familia</th>
            </tr>
    ';

    while($linha = mysqli_fetch_assoc($resultado)){
        echo '<tr>
                <td>'.$linha["nome"].'</td>
                <td style="font-style:italic;">'.$linha["nome_cientifico_especie"].'</td>
                <td style="font-style:italic;">'.$linha["nome_cientifico_genero"].'</td>
                <td style="font-style:italic;">'.$linha["nome_cientifico_familia"].'</td>
            </tr>'; 
    }

    echo "</table>";

?>

