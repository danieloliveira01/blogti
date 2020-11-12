<?php


#vai cuidar de qual pagina exibir.

#se for passado um parâmetro cadastrar, o controlador deve encaminhar para a página de formulário de cadastro
#se for passado um parâmetro excluir, o controlador deve encaminhar para a página de exclusão

if(isset($_POST['servicos'])) {
	header('Location: ../view/servicos.php');
}

else if (isset($_POST['novoServico'])) {
	header('Location: ../view/cadastrarServico.php');
}

else if (isset($_POST['clientes'])) {
	header('Location: ../view/listarclientes.php');
}

else if (isset($_POST['novoCliente'])) {
	header('Location: ../view/cadastrarcliente.php');
}


else if (isset($_POST['cadastrarCliente'])) {
	include("../model/clientes.php");
		$cliente = new Clientes();
		$nome = $_POST['nome'];
		$sobrenome = $_POST['sobrenome'];
		$endereco = $_POST['endereco'];
		$telefone = $_POST['telefone'];
		
		$cliente->CadastrarCliente($nome,$sobrenome,$endereco, $telefone);
	 	//header('Location: ../view/listarclientes.php');	
} 

else if (isset($_POST['editarcliente'])) {
	include("../model/clientes.php");

		$cliente = new Clientes();
		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$sobrenome = $_POST['sobrenome'];
		$endereco = $_POST['endereco'];
		$telefone = $_POST['telefone'];
		
		$cliente->EditarCliente($nome,$sobrenome,$endereco, $telefone, $id);
	 	header('Location: ../view/listarclientes.php');	
} 

else if (isset($_POST['deletarCliente'])) {
	include("../model/clientes.php");

		$cliente = new Clientes();
		$id = $_POST['id'];
		
		
		$cliente->ExcluirCliente($id);
	 	header('Location: ../view/listarclientes.php');	
} 


//serviços

else if (isset($_POST['cadastrarServico'])) {
	include("../model/servicos.php");
		$servico = new Servicos();
		$id_cliente = intval($_POST['id_cliente']);
		$tipo_servico = $_POST['tipo_servico'];
		$data_servico = $_POST['data_servico'];
		$descricao = $_POST['descricao'];
		$valor = floatval($_POST['valor']);
		$pago = $_POST['pago'];
		
		$servico->CadastrarServico($id_cliente,$tipo_servico,$data_servico, $descricao, $valor, $pago);
	 	//header('Location: ../view/listarclientes.php');	
} 


else if (isset($_POST['editarServico'])) {
		$id = $_POST['id'];
		include("../model/servicos.php");
		$servico = new Servicos();
		$id_cliente = intval($_POST['id_cliente']);
		$tipo_servico = $_POST['tipo_servico'];
		$data_servico = $_POST['data_servico'];
		$descricao = $_POST['descricao'];
		$valor = floatval($_POST['valor']);
		$pago = $_POST['pago'];

		$servico->editarServico($id_cliente,$tipo_servico,$data_servico, $descricao, $valor, $pago, $id);
	 	header('Location: ../index.php');	
} 


else if (isset($_POST['deletarServico'])) {
	include("../model/servicos.php");

		$servico = new Servicos();
		$id = $_POST['id'];
		
		
		$servico->ExcluirServico($id);
	 	header('Location: ../index.php');	
} 



/*
else if (isset($_POST['cadastrarServico'])) {
	include("../model/conexaoModel.php");
		$db = new Conexao();
		$db->conecta();

		$id_cliente = $_POST['id_cliente'];
		$tipo_servico = $_POST['tipo_servico'];
		$data_servico = $_POST['data_servico'];
		$descricao = $_POST['descricao'];
		$valor = $_POST['valor'];
		$pago = $_POST['pago'];
		$db->insere($id_cliente,$tipo_servico,$data_servico, $descricao, $valor, $pago);
	 	header('Location: ../view/servicos.php');	
} */

else if (isset($_GET['incluir'])) {
	 	header('Location: view/novoservico.php');	
} 

else if (isset($_GET['apagar'])) {
		include("../model/conexaoModel.php");
		$db = new Conexao();
		$db->conecta();
		$db->apagarEvento();
	 	header('Location: view/listagem.php');	
} 

else {#senão, se nenhum parâmetro for passado, mandar o visitante para a página de relação de compromissos

 	header('Location: ../index.php');
}

?>