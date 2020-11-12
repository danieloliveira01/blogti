<?php


#vai cuidar de qual pagina exibir.

#se for passado um parâmetro cadastrar, o controlador deve encaminhar para a página de formulário de cadastro
#se for passado um parâmetro excluir, o controlador deve encaminhar para a página de exclusão


 if (isset($_POST['cadastrarUsuario'])) {
	include("../model/usuario.php");
		$usuario = new Usuarios();
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$nivel_acesso = 1;
		
		$usuario->CadastrarUsuario($nome,$email, $senha, $nivel_acesso);
	 	header('Location: ../view/login.php');	
} 




else if (isset($_POST['search'])) {
	include("../model/posts.php");
		$pesquisa = $_POST['search'];
	 	header('Location: ../view/pesquisa.php?search='.$pesquisa);	
} 


else if (isset($_POST['cadastrarPost'])) {
	include("../model/posts.php");
		$post = new Posts();
		$tipo_post = intval($_POST['tipo_post']);
		$titulo = $_POST['titulo'];
		$descricao = $_POST['descricao'];
		$linguagem_programacao = intval($_POST['linguagem_programacao']);
		$id_usuario = intval($_POST['id_usuario']);
		$hora = date('H:i:s');
		$dataHora = date('Y-m-d H:i:s');
		$resolvido = 0;
		$data = implode("-",array_reverse(explode("/",$dataHora)));
		$post->CadastrarPost($tipo_post,$titulo, $descricao, $linguagem_programacao, $id_usuario, $dataHora, $resolvido);
	 	//header('Location: ../view/listarclientes.php');	
} 



else if (isset($_POST['editarPost'])) {
	include("../model/posts.php");
		$post = new Posts();
		$tipo_post = intval($_POST['tipo_post']);
		$titulo = $_POST['titulo'];
		$descricao = $_POST['descricao'];
		$linguagem_programacao = intval($_POST['linguagem_programacao']);
		$id_post = intval($_POST['id_post']);
		$hora = date('H:i:s');
		$dataHora = date('Y-m-d H:i:s');
		$data = implode("-",array_reverse(explode("/",$dataHora)));
		$post->EditarPost($tipo_post,$titulo, $descricao, $linguagem_programacao, $id_post, $dataHora);
	 	header('Location: ../view/postitemuser.php?id='.$id_post);	
} 


else if (isset($_POST['deletarPost'])) {
	include("../model/posts.php");
		$id_post = intval($_POST['id_post']);
		$post = new Posts();
		
		
		
		$post->ExcluirPost($id_post);
	 header('Location: ../view/indexadm.php');	
} 


else if (isset($_POST['resolverPost'])) {
	include("../model/posts.php");
		$id_post = intval($_POST['id_post']);
		$post = new Posts();
		
		$resolver = intval($_POST['resolver']);
		
		$post->ResolverPost($id_post, $resolver);
	 header('Location: ../view/postitemuser.php?id='.$id_post);	
} 


else if (isset($_POST['btn-comentar'])) {
	include("../model/posts.php");
		$post = new Posts();
		$id_usuario = intval($_POST['id_usuario']);
		$id_post = intval($_POST['id_post']);
		$comentario = strval($_POST['comentario']);
		$dataHora = date('Y-m-d H:i:s');
		$post->CadastrarComentario($id_post,$id_usuario, $comentario, $dataHora);
	 	header('Location: ../view/postitemuser.php?id='.$id_post);	
} 


else if (isset($_POST['alterarComentario'])) {
	include("../model/posts.php");
		$post = new Posts();
		$id_post = intval($_POST['id_post']);
		$id_comentario = intval($_POST['id_comentario']);
		$comentario = $_POST['comentario'];
		$dataHora = date('Y-m-d H:i:s');
		$post->EditarComentario($id_comentario, $comentario, $dataHora);
	 	header('Location: ../view/postitemuser.php?id='.$id_post);	
} 



else if (isset($_POST['deletarComentario'])) {
	include("../model/posts.php");
		$id_post = intval($_POST['id_post']);
		$post = new Posts();
		$id = $_POST['id_comentario'];
		
		
		$post->ExcluirComentario($id);
	 header('Location: ../view/postitemuser.php?id='.$id_post);	
} 


else if (isset($_POST['btn_login'])) {
	include("../model/usuario.php");
		$usuarios = new Usuarios();
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		
		$user = $usuarios->verificaAcesso($email, $senha);
	 	echo $user['nome'];
		if ($user['nivel_acesso'] != null){
		
		
		$_SESSION['login'] = $user;
        header("Location:../view/indexadm.php");
    	}
    	else if($user['nivel_acesso'] == null){
    	
    		$_SESSION['mensagem'] = "Usuário não encontrado";
        	header("Location:../view/login.php");
    	}
    	

	 	

} 

 

else {#senão, se nenhum parâmetro for passado, mandar o visitante para a página de relação de compromissos

 	header('Location: ../index.php');
}

?>