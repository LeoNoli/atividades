<?php
    include "conexao.php";

    $select_genero = "SELECT nome, id_genero FROM genero";
    $resultado_genero = mysqli_query($con,$select_genero);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="jquery-3.5.1.min.js"></script>
        <title>Lista Banda</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index.css">
	    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
                    <h2 class="text-center"><b>Lista de Bandas Cadastrados</b></h2>
                </header>
                <form method="post">
                    <div class="form-group">
                        <div class="input-group" >
                            <select class="custom-select mr-sm-2" name="genero" class="text-center">
                                <option selected>Gênero da Banda...</option>
                                <?php
                                    while($row_genero = mysqli_fetch_assoc($resultado_genero)){
                                        echo '<option value='.$row_genero["nome"].'> '.$row_genero["nome"].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
				        <div class="input-group" >
                            <input type="text" name="banda" placeholder="Nome da Banda...">
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

            $select = "SELECT banda.nome as banda, genero.nome as genero FROM banda INNER JOIN genero ON banda.cod_genero = genero.id_genero";

            if(!empty($_POST)){
                $select .= " WHERE (1=1) ";
                    
                if($_POST["banda"]!=""){
                    $nome = $_POST["banda"];
                    $select .= " AND banda.nome like '%$nome%' ";
                }

                if($_POST["genero"]!=""){
                    $genero = $_POST["genero"];
                    $select .= " AND genero.nome like '%$genero%' ";
                }
            }

            $res=mysqli_query($con, $select) or die($select);
            while($linha=mysqli_fetch_assoc($res)){
                echo "<ul>";
                echo"<li>".$linha["banda"]. "-".$linha["genero"]."</li>";
                echo "</ul>";
            }
        ?>
        <script src="bootstrap.min.js"></script>
    </body>
</html>


