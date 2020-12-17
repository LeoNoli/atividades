<?php
    
    include "conf.php";

    cabecalho();



echo "
    <h3>Minhas Compras</h3>
    <div id='msg'></div>
    <table>
        <tr>
            <th>Instrumento</th>
            <th>Modelo</th>
            <th>Cor</th>
            <th>Preço</th>
        </tr>";

include "conexao.php";

$select="SELECT preco, instrumento.nome AS instrumento, cor.nome AS cor, modelo.nome AS modelo 
            FROM compra INNER JOIN instrumento ON 
                compra.cod_instrumento = instrumento.id_instrumento
                INNER JOIN cor ON
                instrumento.cod_cor = cor.id_cor
                INNER JOIN modelo ON
                instrumento.cod_modelo = modelo.id_modelo
                INNER JOIN usuario ON
                compra.cod_usuario = usuario.id_usuario AND usuario.id_usuario = '".$_SESSION['usuario']."'";

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
    echo"
    <tr>
            <td>".$linha["instrumento"]."</td>
            <td>".$linha["modelo"]."</td>
            <td>".$linha["cor"]."</td>
            <td>".$linha["preco"]."</td>
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