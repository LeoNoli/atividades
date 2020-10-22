
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="jquery-3.5.1.min.js"></script>
        <title>Lista Gênero</title>
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
                <div class="col-auto my-1">
                <header>
                    <h1 class="text-center" class="img-fluid"></h1>
                    <h2 class="text-center"><b>Lista de Gêneros Cadastrados</b></h2>
                </header>
                <form method="post">
                    <div class="form-group">
				        <div class="input-group" >
                            <input type="text" name="genero" placeholder="Nome do gênero...">
                            <button type="submit" class="btn btn-primary">Filtrar Gênero</button>
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

            $select = "SELECT * FROM genero";

            if(!empty($_POST)){
                $select .= " WHERE (1=1) ";
                if($_POST["genero"]!=""){
                    $nome = $_POST["genero"];
                    $select .= " AND nome like '%$nome%' OR nome like '%$nome%'";
                }
            }

            $res=mysqli_query($con, $select) or die($select);
            while($linha=mysqli_fetch_assoc($res)){
                echo "<ul>";
                echo"<li>".$linha["nome"]."</li>";
                echo "</ul>";
            }
        ?>
        <script src="bootstrap.min.js"></script>
    </body>
</html>


        