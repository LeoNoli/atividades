<?php
include "conf.php";

cabecalho();

include "script_remover_instrumento.php";

echo '<div class="login-form col-xs-1 offset-xs-1
col-sm-2 offset-sm-5 col-md-2 offset-md-5">
<div class="form-row align-items-center">
    <div class="col-auto my-1">
    <header>
        <h1 class="text-center" class="img-fluid"></h1>
        <h2 class="text-center"><b>Lista de Instrumentos Cadastrados</b></h2>
    </header>
    <form method="post">
        <div class="form-group">
            <div class="input-group" >
                <input type="text" name="instrumento" placeholder="Nome do instrumento...">
                <button type="submit" class="btn btn-primary">Filtrar Instrumento</button>
            </div>
        </div>
        <hr /><hr />      
<div id="lista" class="text-center">
</div>
</div>
</div>            
</form>';

echo "
    <h3>Instrumento</h3>
    <div id='msg'></div>
    <table>
        <tr>
            <th>Nome do Instrumento</th>
            <th>Ação</th>
        </tr>";

include "conexao.php";

$select = "SELECT * FROM instrumento";

if(!empty($_POST)){
    $select .= " WHERE (1=1) ";
    if($_POST["instrumento"]!=""){
        $nome = $_POST["instrumento"];
        $select .= " AND nome like '%$nome%' OR nome like '%$nome%'";
    }
}

$res=mysqli_query($conexao, $select) or die($select);
while($linha=mysqli_fetch_assoc($res)){
    echo "<tr>
            <td>".$linha["nome"]."</td>
            <td>
                <button class='btn btn-danger remover' value='".$linha["nome"]."'>Remover</button>                       
            </td>
    </tr>";
}
echo "</table>";

rodape();

?>