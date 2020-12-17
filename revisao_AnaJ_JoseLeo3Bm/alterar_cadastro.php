<form>
    <div class="form-group">
		<div class="input-group">
            <input type="text" name="nome" id="nome" placeholder="Nome...">
            <input type="hidden" name="id_usuario" id="id_usuario">
            <input type="text" name="email_cadastro" placeholder="Email...">
            <input type="checkbox" name="trocar_senha" value="1" /> Trocar Senha <br />
            <div id="trocar_senha" style="display:none;">
                <input type="password" name="senha_cadastro" placeholder="Digite a Senha...">
                <input type="password" name="confirma_senha" placeholder="Confirme a Senha...">
            </div>
            <br />
        </div>
    </div>
</form>