<?php


class Conexao{
	private $pdo = null;



	public	function conecta(){

		try{
			$this->pdo = new PDO("mysql:host=localhost;dbname=blogti", 'root', 'root');
			echo "<br/>conexão bem sucedida";
		}
		catch(Exception $e){
		     echo $e->getMessage();
		 }
	}


	public function insere($id_cliente, $tipo_servico, $data, $descricao, $valor, $pago){
		try{
			   $sql = $this->pdo->prepare("INSERT INTO OrdemServicos (id_cliente,tipo_servico,data_servico, descricao, valor, pago) VALUES($id_cliente,$tipo_servico,$data_servico, $descricao, $valor, $pago)");
			  
			   $sql->execute();
			   echo "<br /> Inserção realizada com sucesso";
		}
		catch(Exception $e){
		    echo $e->getMessage();
		}
	}


	

		public function apagarEvento(){
		try{
			   $sql = $this->pdo->prepare("DELETE FROM compromissos ORDER BY `data` LIMIT 1;");
			   $sql->execute();
			   echo "<br /> Remoção realizada com sucesso";
			   return;
		}
		catch(Exception $e){
		    echo $e->getMessage();
		}
	}


	public function listaEventos(){
		try{
			    $data = $this->pdo->query("SELECT * FROM compromissos WHERE 1")->fetchAll();
				return $data;	
		}
		catch(Exception $e){
		    echo $e->getMessage();
		}
	}

	public function fechaConexao(){
		$this->pdo = null;
		return;
	}
}


?>