<?php
include "conf.php";

cabecalho();

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


include "conexao.php";

$select = "SELECT * FROM instrumento";

if(!empty($_POST)){
    $select .= " WHERE (1=1) ";
    if($_POST["instrumento"]!=""){
        $nome = $_POST["instrumento"];
        $select .= " AND nome like '%$nome%' OR nome like '%$nome%'";
    }
}

$res=mysqli_query($con, $select) or die($select);
while($linha=mysqli_fetch_assoc($res)){
    echo "<ul>";
    echo"<li>".$linha["nome"]."</li>";
    echo "</ul>";
}


rodape();

?>