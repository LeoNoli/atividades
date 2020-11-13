<?php
    include "conexao.php";

    $select_instrumento = "SELECT nome, id_instrumento FROM instrumento";
    $resultado_instrumento = mysqli_query($conexao,$select_instrumento);
?>
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
                <select class="custom-select mr-sm-2" name="instrumento" class="text-center">
                    <option selected>Instrumento Musical...</option>';
?>
                    <?php
                        while($row_instrumento = mysqli_fetch_assoc($resultado_instrumento)){
                            echo '<option value='.$row_instrumento["nome"].'> '.$row_instrumento["nome"].'</option>';
                        }
                    ?>
<?php
                echo '</select>
            </div>
        </div>
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
            <th>Instrumento</th>
            <th>Ação</th>
        </tr>";

$select = "SELECT cor.nome as cor, instrumento.nome as instrumento FROM cor INNER JOIN instrumento ON cor.cod_instrumento = instrumento.id_instrumento";

if(!empty($_POST)){
    $select .= " WHERE (1=1) ";
        
    if($_POST["cor"]!=""){
        $nome = $_POST["cor"];
        $select .= " AND cor.nome like '%$nome%' ";
    }

    if($_POST["instrumento"]!=""){
        $instrumento = $_POST["instrumento"];
        $select .= " AND instrumento.nome like '%$instrumento%' ";
    }
}

$res=mysqli_query($conexao, $select) or die($select);
while($linha=mysqli_fetch_assoc($res)){
    echo "<tr>
            <td>".$linha["cor"]."</td>
            <td>".$linha["instrumento"]."</td>
            <td>
                <button class='btn btn-danger remover' value='".$linha["cor"]."'>Remover</button>                       
            </td>
    </tr>";
}
echo "</table>";

rodape();

?>