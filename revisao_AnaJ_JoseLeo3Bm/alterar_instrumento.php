
<form>
    <div class="form-group">
		<div class="input-group">
            <input type="text" name="instrumento" placeholder="Nome do instrumento...">
            <input type="hidden" name="id_instrumento" id="id_instrumento">
        </div>
    </div>
    <select name="cod_modelo" class="select-control col-12" >
        <option label="::Modelo::"></option>
        <?php
        
        $select="SELECT * FROM modelo";
        $res = mysqli_query($conexao,$select)
        or die(mysqli_error($conexao));
        while($l=mysqli_fetch_assoc($res)){
            $cod_modelo = $l["id_modelo"];
            $modelo = $l["nome"];
            echo "<option value='$cod_modelo'>$modelo</option>";
        }
        ?>
    </select>
    <select name="cod_cor" class="select-control col-12" >
        <option label="::Cor::"></option>
        <?php
        $select="SELECT * FROM cor";
        $res = mysqli_query($conexao,$select)
        or die(mysqli_error($conexao));
        while($l=mysqli_fetch_assoc($res)){
            $cod_cor = $l["id_cor"];
            $cor = $l["nome"];
            echo "<option value='$cod_cor'>$cor</option>";
        }
        ?>
    </select>
</form>