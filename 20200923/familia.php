<?php
    include "conexao.php";

    $select = "SELECT * FROM familia";

    $resultado = mysqli_query($conexao,$select);

    echo '<table border="1" cellspacing="0">
            <tr><th colspan="2" style="text-align:left">FAMILIA</th></tr>
            <tr>
                <td>Nome</td>
                <td>Nome Cientifico</td>
            </tr>
    ';

    while($linha = mysqli_fetch_assoc($resultado)){
        echo '<tr>
                <td>'.$linha["nome"].'</td>
                <td style="font-style:italic;">'.$linha["nome_cientifico"].'</td>
            </tr>';
    }

    echo "</table>";
?>



