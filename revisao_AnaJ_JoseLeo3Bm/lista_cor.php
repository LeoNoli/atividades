
<?php
include "conf.php";

cabecalho();

include "script_remover_cor.php";

echo '<div class="login-form col-xs-1 offset-xs-1
col-sm-2 offset-sm-5 col-md-2 offset-md-5">
<div class="form-row align-items-center">
    <div class="col-auto my-2">
    <header>
        <h1 class="text-center" class="img-fluid"></h1>
        <h2 class="text-center"><b>Lista de Cores Cadastradas</b></h2>
    </header>
    <form method="post">
        <div class="form-group">
            <div class="input-group" >
                <input type="text" name="cor" placeholder="Cor do Instrumento">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
        <hr /><hr />      
<div id="lista" class="text-center">     
</div>
</div>
</div>            
</form>';

echo "
    <h3>Cores</h3>
    <div id='msg'></div>
    <table>
        <tr>
            <th>Cor</th>
            <th>Ação</th>
        </tr>";

//$select = "SELECT cor.nome as cor, instrumento.nome as instrumento FROM cor INNER JOIN instrumento ON cor.cod_instrumento = instrumento.id_instrumento";

echo "<tbody id='tbody_cor'>";
$select = "SELECT * FROM cor";

if($_SESSION["permissao"]=="3" || $_SESSION["permissao"]=="2"){
    $select.= " WHERE cor='".$_SESSION["usuario"]."'";
}

if(!empty($_POST)){
    $select .= " WHERE (1=1) ";
        
    if($_POST["cor"]!=""){
        $nome = $_POST["cor"];
        $select .= " AND cor like '%$nome%' ";
    }
}

$res=mysqli_query($conexao, $select) or die($select);
$i=0;
while($linha=mysqli_fetch_assoc($res)){
    echo "<tr>
            <td>".$linha["nome"]."</td>
            <td>
                <button class='btn btn-warning alterar' value='".$linha["id_cor"]."' data-toggle='modal' 
                    data-target='#modal'>Alterar</button>   
                <button class='btn btn-danger remover' value='".$linha["id_cor"]."'>Remover</button>
                                   
            </td>
    </tr>";
    $i++;
}
if($i==0){
    echo "<tr><td colspan='6'>Não há cores cadastradas</td></tr>";
}
echo "</table>";

$titulo = "Alterar Cor";
$nome_form = "alterar_cor.php";
include "modal.php";

include "scripts_cor.php";
rodape();

?>