<?php
$host = "db4free.net:3306";
$user = "ana_julia";
$senha = "a738bc27f";
$bd = "intrumentos";


	$conexao = mysqli_connect($host, $user, $senha, $bd) 
		or die("erro conexao");
	
mysqli_set_charset($conexao, "utf8");


?>