<?php
    include "conexao.php";

    $select_modelo = "SELECT nome, id_modelo FROM modelo";
    $resultado_modelo = mysqli_query($conexao,$select_modelo);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lista Instrumento</title>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script>
           $(document).ready(function(){
                $("select[name='modelo']").change(function(){
                    modelo = $("select[name='modelo']").val();
                    
                    text = "<select name='select_cor' id='select_cor'><option value=''>Selecione uma Cor...</option>";
                    $("select[name='select_cor']" ).prop( "disabled", false );
                        $.post("seleciona_cor.php",{'modelo':modelo},function(resultado){                   
                            $.each(resultado, function(i, v){
                                text += '<option value = "'+v.id_cor+'"> '+v.nome+' </option>';

                                $("#cor").html(text);
                            });                                             
                        });
                });
            });
        </script>
        </head>

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
                <select class="custom-select mr-sm-2" name="modelo" class="text-center">
                    <option selected>Modelo...</option>';
?>
                    <?php
                        while($row_modelo = mysqli_fetch_assoc($resultado_modelo)){
                            echo '<option value='.$row_modelo["id_modelo"].'> '.$row_modelo["nome"].'</option>';
                        }
                    ?>
<?php
                echo'</select>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group" >
                <div id="cor">
                    <select class="custom-select mr-sm-2" name="select_cor" id="select_cor" class="text-center">
                        <option selected>Selecione uma Cor...</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group" >
                <input type="text" name="instrumento_filtro" placeholder="Instrumento...">
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
    <h3>Instrumento</h3>
    <div id='msg'></div>
    <table>
        <tr>
            <th>Nome do Instrumento</th>
            <th>Modelo</th>
            <th>Cor</th>
            <th>Ação</th>
        </tr>";

include "conexao.php";

$select="SELECT instrumento.nome AS instrumento, cor.nome AS nome_cor, modelo.nome AS nome_modelo, instrumento.id_instrumento AS id_instrumento
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
    echo "<tr>
            <td>".$linha["instrumento"]."</td>
            <td>".$linha["nome_modelo"]."</td>
            <td>".$linha["nome_cor"]."</td>
            <td>
                <button class='btn btn-warning alterar' value='".$linha["id_instrumento"]."' data-toggle='modal' 
                    data-target='#modal'>Alterar</button>
                <button class='btn btn-danger remover' value='".$linha["id_instrumento"]."'>Remover</button>                       
            </td>
    </tr>";
    $i++;
}
if($i==0){
    echo "<tr><td colspan='6'>Não há instrumentos cadastrados</td></tr>";
}
echo "</tbody>";
echo "</table>";

$titulo = "Alterar Instrumento";
$nome_form = "alterar_instrumento.php";
include "modal.php";

include "scripts_instrumento.php";

rodape();

?>