<?php
if (! empty ( $_POST ['tipo'] ) && $_POST ['tipo'] == 1) {
	
	require_once 'cadastrar.class.php';
	
	$buscar = new cadastrar();
	$buscar->buscar ();
	
} elseif (! empty ( $_POST ['tipo'] ) && $_POST ['tipo'] == 2) {
	
	/*if ($_POST ['nome'] || $_POST ['email'])
		header ( "Location: cadastrar.php" );*/
	$ano = $_POST ['ano'];
	$valor = $_POST ['valor'];
	$linha = $_POST ['linha'];
	
	require_once 'cadastrar.class.php';
	
    $cadastrar = new cadastrar();
    $cadastrar -> cadastrarDados($ano, $valor, $linha);
	print_r ( $_REQUEST );
	header ( "Location: ../index.php" );
}

?>