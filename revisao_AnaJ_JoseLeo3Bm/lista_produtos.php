<?php
    
    include "conf.php";

    cabecalho();



echo "
    <h3>Escolha e Compre</h3>
    <div id='msg'></div>
    <table>
        <tr>
            <th>Instrumento</th>
            <th>Modelo</th>
            <th>Cor</th>
            <th>Preço</th>
            <th>Ação</th>
        </tr>";


$select="SELECT preco, instrumento.nome AS instrumento, cor.nome AS nome_cor, modelo.nome AS nome_modelo, instrumento.id_instrumento AS id_instrumento
FROM instrumento
INNER JOIN cor ON instrumento.cod_cor = cor.id_cor
INNER JOIN modelo ON instrumento.cod_modelo = modelo.id_modelo";

if(!empty($_POST)){
    if($_POST["modelo"]!=""){
        if(isset($_POST["select_cor"]) && $_POST["select_cor"]!=""){
            $select_cor = $_POST["select_cor"];

            $select .= " WHERE cor.id_cor = '$select_cor'";
        }else{
            $modelo = $_POST["modelo"];

            $select .= " WHERE modelo.id_modelo like '$modelo'";       

        }   
    }
    
    if($_POST["instrumento_filtro"]!=""){
        $nome_instrumento = $_POST["instrumento_filtro"];
        
        $select .= " WHERE instrumento.nome like '%$nome%'";
    } 
}
echo "<tbody id='tbody_instrumento'>";
$res=mysqli_query($conexao, $select) or die($select);
$i=0;
while($linha=mysqli_fetch_assoc($res)){
    $id_instrumento=$linha["id_instrumento"];
    echo"
    <tr>
            <td>".$linha["instrumento"]."</td>
            <td>".$linha["nome_modelo"]."</td>
            <td>".$linha["nome_cor"]."</td>
            <td>".$linha["preco"]."</td>
            <td>";
            if($_SESSION["permissao"]=="2"){
                echo "<form action='inserir_compras.php' method='post'>";
                echo "<input type='hidden' name='cod_instrumento' value='$id_instrumento' />";    
                echo "<button type='submit' class='btn comprar btn-primary'>Comprar</button>";
                echo "</form>";
            }
            echo"</td>
    </tr>";
    $i++;
}

    

if($i==0){
    echo "<tr><td colspan='6'>Ops...o admin não abasteceu o estoque, por favor aguarde!</td></tr>";
}
echo "</tbody>";
echo "</table>";


rodape();



?>