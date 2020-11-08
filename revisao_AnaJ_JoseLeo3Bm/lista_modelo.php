<?php
    include "conexao.php";

    $select_instrumento = "SELECT nome, id_instrumento FROM instrumento";
    $resultado_instrumento = mysqli_query($con,$select_instrumento);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lista Modelo</title>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function(){
                $("select[name='instrumento']").change(function(){
                    instrumento = $("select[name='instrumento']").val();
                    
                    text = "<select name='select_cor' id='select_cor'><option value=''>Selecione uma Cor...</option>";
                    $("select[name='select_cor']" ).prop( "disabled", false );
                        $.post("seleciona_cor.php",{'instrumento':instrumento},function(resultado){                   
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
                <select class="custom-select mr-sm-2" name="instrumento" class="text-center">
                    <option selected>Instrumento Musical...</option>';
?>
                    <?php
                        while($row_instrumento = mysqli_fetch_assoc($resultado_instrumento)){
                            echo '<option value='.$row_instrumento["id_instrumento"].'> '.$row_instrumento["nome"].'</option>';
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

include "conexao.php";

$select="SELECT modelo.nome as nome_modelo, cor.nome as nome_cor, instrumento.nome as nome_instrumento, instrumento.id_instrumento as id_instrumento, cor.id_cor as id_cor 
FROM modelo INNER JOIN cor ON modelo.cod_cor = cor.id_cor 
INNER JOIN instrumento ON cor.cod_instrumento = instrumento.id_instrumento";

if(!empty($_POST)){
    if($_POST["instrumento"]!=""){
        if(isset($_POST["select_cor"]) && $_POST["select_cor"]!=""){
            $select_cor = $_POST["select_cor"];

            $select .= " AND cor.id_cor = '$select_cor'";
        }else{
            $instrumento = $_POST["instrumento"];

            $select .= " AND instrumento.id_instrumento = '$instrumento'";       

        }   
    }
    
    if($_POST["modelo"]!=""){
        $nome_modelo = $_POST["modelo"];
        
        $select .= " WHERE modelo.nome like '%$nome_modelo%'";
    } 
}


$res=mysqli_query($con, $select) or die($select);
while($linha=mysqli_fetch_assoc($res)){
    echo "<ul>";
    echo"<li>".$linha["nome_modelo"]. "-" .$linha["nome_cor"]. "-".$linha["nome_instrumento"]."</li>";
    echo "</ul>";
}

rodape();

?>