<?php
include "conf.php";

cabecalho();

if(empty($_POST))
            {
                echo'<div class="login-form col-xs-10 offset-xs-1 
            col-sm-6 offset-sm-3 col-md-4 offset-md-4">
            <header>
			    <h1 class="text-center" class="img-fluid"></h1>
			    <h2 class="text-center">Cadastro de usuário</h2>
		    </header>
            <form name="cadastro" action="form_usuario.php" method="post">
            <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="nome" placeholder="Nome..." class="input-control col-12">
                        <input type="text" name="email_cadastro" placeholder="Email..." class="input-control col-12">
                        <input type="password" name="senha_cadastro" placeholder="Senha..." class="input-control col-12">
                    </div>
                </div>
                
				<div class="float-left">
                    <button type="button" class="btn cadastrar btn-primary">Cadastrar Usuario</button>
                </div>
           
            </form>
            </div>';
            }
            else
            {
                include "inserir_usuario.php";
            }

rodape();

?>