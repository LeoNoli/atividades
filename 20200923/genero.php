<?php
    include "conexao.php";

    $select = "SELECT genero.nome_cientifico, familia.nome FROM genero INNER JOIN familia ON genero.cod_familia = familia.id_familia";
    
    $resultado = mysqli_query($conexao,$select);

    echo '<table border="1" cellspacing="0">
            <tr><th colspan="2" style="text-align:left">GENERO</th></tr>
            <tr>
                <th>Nome Cientifico</th>
                <th>Familia</th>
            </tr>
    ';

    while($linha = mysqli_fetch_assoc($resultado)){
        echo '<tr>
                <td style="font-style:italic;">'.$linha["nome_cientifico"].'</td>
                <td>'.$linha["nome"].'</td>
            </tr>';
    }

    echo "</table>";

?>

