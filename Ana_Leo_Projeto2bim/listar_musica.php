<?php
    include "conexao.php";

    $select_genero = "SELECT nome, id_genero FROM genero";
    $resultado_genero = mysqli_query($con,$select_genero);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>lista musica</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index.css">
	    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function(){
                $("select[name='genero']").change(function(){
                    genero = $("select[name='genero']").val();
                    
                    text = "<select name='select_banda' id='select_banda'><option value=''>Selecione uma Banda...</option>";
                    $("select[name='select_banda']" ).prop( "disabled", false );
                        $.post("seleciona_banda.php",{'genero':genero},function(resultado){                   
                            $.each(resultado, function(i, v){
                                text += '<option value = "'+v.id_banda+'"> '+v.nome+' </option>';

                                $("#banda").html(text);
                            });                                             
                        });
                });
            });
        </script>
        </head>
        <body>
        <?php
            include "cabecalho.php";
        ?>
        <div class="login-form col-xs-1 offset-xs-1
            col-sm-2 offset-sm-5 col-md-2 offset-md-5">
            <div class="form-row align-items-center">
                <div class="col-auto my-2">
                <header>
                    <h1 class="text-center" class="img-fluid"></h1>
                    <h2 class="text-center"><b>Lista de Músicas Cadastrados</b></h2>
                </header>
                <form method="post">
                    <div class="form-group">
                        <div class="input-group" >
                            <select class="custom-select mr-sm-2" name="genero" class="text-center">
                                <option selected>Gênero da Banda...</option>
                                <?php
                                    while($row_genero = mysqli_fetch_assoc($resultado_genero)){
                                        echo '<option value='.$row_genero["id_genero"].'> '.$row_genero["nome"].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group" >
                            <div id="banda">
                                <select class="custom-select mr-sm-2" name="select_banda" id="select_banda" class="text-center">
                                    <option selected>Selecione uma Banda...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
				        <div class="input-group" >
                            <input type="text" name="musica" placeholder="Nome da música...">
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </div>
                    </div>
                    <hr /><hr />      
        <div id="lista" class="text-center">     
         </div>
            </div>
        </div>            
        </form>

        <?php

            include "conexao.php";

            $select="SELECT musica.nome as nome_musica, banda.nome as nome_banda, genero.nome as nome_genero, genero.id_genero as id_genero, banda.id_banda as id_banda 
            FROM musica INNER JOIN banda ON musica.cod_banda = banda.id_banda 
            INNER JOIN genero ON banda.cod_genero = genero.id_genero";

            if(!empty($_POST)){
                if($_POST["genero"]!=""){
                    if(isset($_POST["select_banda"]) && $_POST["select_banda"]!=""){
                        $select_banda = $_POST["select_banda"];
        
                        $select .= " AND banda.id_banda = '$select_banda'";
                    }else{
                        $genero = $_POST["genero"];
        
                        $select .= " AND genero.id_genero = '$genero'";       

                    }   
                }
                
                if($_POST["musica"]!=""){
                    $nome_musica = $_POST["musica"];
                    
                    $select .= " WHERE musica.nome like '%$nome_musica%'";
                } 
            }


            $res=mysqli_query($con, $select) or die($select);
            while($linha=mysqli_fetch_assoc($res)){
                echo "<ul>";
                echo"<li>".$linha["nome_musica"]. "-" .$linha["nome_banda"]. "-".$linha["nome_genero"]."</li>";
                echo "</ul>";
            }
        
        ?>

        <script src="bootstrap.min.js"></script>
    </body>
</html>

