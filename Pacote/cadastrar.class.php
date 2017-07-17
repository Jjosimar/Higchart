<?php
class cadastrar{

	public function buscar() {
		return $this->buscarDados();
	}


    public function cadastrarDados($ano, $valor, $linha) {
		require_once 'conexao.class.php';
		$conec = new conexao ();
		
		$pdo = new PDO ( "mysql:host=$conec->host;dbname=$conec->dbname", "$conec->usuario", "$conec->senha" );
		$existe = 0;
		
	   $existe = $this->verificarAno($pdo, $ano);
		
		if ($existe < 1) {
			try {
				$stmte = $pdo->prepare ( "INSERT INTO grafico (ano, valor, linha) VALUES (:ano, :valor, :linha)" );
				$stmte->bindParam ( ":ano", $ano, PDO::PARAM_STR );
				$stmte->bindParam ( ":valor", $valor, PDO::PARAM_STR );				
				$stmte->bindParam ( ":linha", $linha, PDO::PARAM_STR );				
				$executa = $stmte->execute ();
				
				if ($executa) {
					echo 'Dados inseridos com sucesso';
					$id_grafico = $pdo->lastInsertId(); //chave primaria
					print_r ( $_REQUEST );
					echo "chegou aqui";
			
				} else {
					echo 'Erro ao inserir os dados';
					print_r ( $executa );
				}
			} catch ( PDOException $e ) {
				echo $e->getMessage ();
			}
		} else {
			echo "ano ja cadastrado";
		}
	}

    private function verificarAno($pdo, $ano) {
		try {
			$stmte = $pdo->prepare ( "SELECT * FROM grafico where ano= ?" );
			$stmte->bindParam ( 1, $ano, PDO::PARAM_STR );
			$executa = $stmte->execute ();
				
			if ($executa) {
				while ( $reg = $stmte->fetch ( PDO::FETCH_OBJ ) ) { /* Para recuperar um ARRAY utilize PDO::FETCH_ASSOC */
					return $existe = 1;
				}
			}
		} catch ( PDOException $e ) {
			echo $e->getMessage ();
		}
	}

    	
	private function buscarDados(){
		require_once 'conexao.class.php';
		$conec = new conexao ();
		$pdo = new PDO ( "mysql:host=$conec->host;dbname=$conec->dbname", "$conec->usuario", "$conec->senha" );
		
		$contato = null; 
		try {
			$stmte = $pdo->prepare ( "SELECT * FROM contato");
			$executa = $stmte->execute (); 
				
			if ($executa) {
				while ( $reg = $stmte->fetch ( PDO::FETCH_OBJ ) ) {
					$contato[$reg->id_grafico] = $reg; //chave
				}
			}
		} catch ( PDOException $e )  {
			echo $e->getMessage ();
				
		}
		return $contato;
	}
	
}



?>