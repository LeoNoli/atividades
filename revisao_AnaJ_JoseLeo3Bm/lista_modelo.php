<?php
include "conf.php";

cabecalho();

include "script_remover_modelo.php";

echo '<div class="login-form col-xs-1 offset-xs-1
col-sm-2 offset-sm-5 col-md-2 offset-md-5">
<div class="form-row align-items-center">
    <div class="col-auto my-2">
    <header>
        <h1 class="text-center" class="img-fluid"></h1>
        <h2 class="text-center"><b>Lista de Modelos Cadastrados</b></h2>
    </header>
    <form method="post">
        <div class="form-group">
            <div class="input-group" >
                <input type="text" name="modelo" placeholder="Nome do modelo...">
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
    <h3>Modelos</h3>
    <div id='msg'></div>
    <table>
        <tr>
            <th>Modelo</th>
            <th>Ação</th>
        </tr>";

include "conexao.php";

$select="SELECT * FROM modelo";

if(!empty($_POST)){  
    if($_POST["modelo"]!=""){
        $nome_modelo = $_POST["modelo"];
        
        $select .= " WHERE modelo.nome like '%$nome%'";
    } 
}

echo "<tbody id='tbody_modelo'>";
$res=mysqli_query($conexao, $select) or die($select);
$i=0;
while($linha=mysqli_fetch_assoc($res)){
    echo "<tr>
            <td>".$linha["nome"]."</td>
            <td>
                <button class='btn btn-warning alterar' value='".$linha["nome"]."' data-toggle='modal' 
                    data-target='#modal'>Alterar</button>
                <button class='btn btn-danger remover' value='".$linha["nome"]."'>Remover</button>                       
            </td>
    </tr>";
    $i++;
}
if($i==0){
    echo "<tr><td colspan='6'>Não há modelos cadastrados</td></tr>";
}
echo "</table>";

$titulo = "Alterar Modelo";
$nome_form = "alterar_modelo.php";
include "modal.php";

include "scripts_modelo.php";
rodape();

?>