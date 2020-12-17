<?php
include "conf.php";


cabecalho();

echo "
    <h3>Dados</h3>
    <div id='msg'></div>
    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Ação</th>
        </tr>";


echo "<tbody id='tbody_cadastro'>";
$select = "SELECT * FROM usuario";

if($_SESSION["permissao"]=="2"){
    $select.= " WHERE id_usuario='".$_SESSION["usuario"]."'";
}

if(!empty($_POST)){
    $select .= " WHERE (1=1) ";
        
    if($_POST["nome"]!=""){
        $nome = $_POST["nome"];
        $select .= " AND nome like '%$nome%' ";
    }

    if($_POST["email_cadastro"]!=""){
        $email = $_POST["email_cadastro"];
        $select .= " AND email like '%$email%' ";
    }
}

$res=mysqli_query($conexao, $select) or die($select);
$i=0;
while($linha=mysqli_fetch_assoc($res)){
    echo "<tr>
            <td>".$linha["nome"]."</td>
            <td>".$linha["email"]."</td>
            <td>
                <button class='btn btn-warning alterar' value='".$linha["id_usuario"]."' data-toggle='modal' 
                    data-target='#modal'>Alterar</button>"; 
                    if($_SESSION["permissao"]=="1"){    
                        echo"<button class='btn btn-danger remover' value='".$linha["id_usuario"]."'>Remover</button>";
                    }                       
            echo"</td>
    </tr>";
    $i++;
}
if($i==0){
    echo "<tr><td colspan='6'>Não há usuários cadastrados</td></tr>";
}
echo "</table>";

$titulo = "Alterar Cadastro";
$nome_form = "alterar_cadastro.php";
include "modal.php";

include "scripts_cadastro.php";
rodape();

?>