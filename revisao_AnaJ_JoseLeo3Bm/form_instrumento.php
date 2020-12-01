<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/jquery-3.5.1.min.js"></script>

            <script>
                $(document).ready(function(){
                  
                        //PHP pra buscar
                        
                        $.getJSON("seleciona_modelo.php", function(g){
                            option="<option label='Modelo do Instrumento' />";
                            $.each(g, function(indice, valor){
                                option+="<option value='"+valor.id_modelo+"'> "+valor.nome+" </option>";
                            });
                            $("#modelo").html(option);
                        });
                    

                        $("#modelo").change(function(){

                        $.getJSON("seleciona_cor.php", function(b){
                            option="<option label='Cor do Instrumento' />";
                            $.each(b, function(indice, valor){
                                option+="<option value='"+valor.id_cor+"'> "+valor.nome+" </option>";
                            });
                            $("#cor").html(option);
                        });
                        });
                        
                  
                });
            </script>
        <title>Cadastro Modelo</title>
    </head>
    <body>

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
            <div class="form-group">
                <div class="input-group">
                    <select name="modelo" id="modelo">
                        <option label="Modelo do Instrumento" />
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <select name="cor" id="cor">
                        <option label="Cor do Instrumento" />
                    </select>
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

