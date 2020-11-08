<?php
include "conf.php";

cabecalho();

if(empty($_POST))
        {
            echo'<div class="login-form col-xs-10 offset-xs-1 
            col-sm-6 offset-sm-3 col-md-4 offset-md-4">
            <header>
			    <h1 class="text-center" class="img-fluid"></h1>
			    <h2 class="text-center">Cadastre um <b>instrumento musical</b></h2>
		    </header>
            <form action="form_instrumento.php" method="post">
            <div class="form-group">
				<div class="input-group">
                    <input type="text" name="instrumento" id="instrumento" placeholder="Nome do instrumento...">
                </div>
            </div>
            
				<div class="float-left">
                    <button type="submit" class="btn btn-primary">Cadastrar Instrumento</button>
                </div>

            </form>
            </div>';
        }
        else
        {
            include "inserir_instrumento.php";
        }

rodape();
?>

