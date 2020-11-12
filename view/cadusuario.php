<?php
include_once 'includes/header.php'; //header
include ("../model/clientes.php");
include_once '../model/conexaomodel.php';

include_once 'includes/mensagem.php';

$clientes = new Clientes();

?>

<!-- Conteudo -->

<div class="row container">
    
       <main>
		    <center>
		     <div class="container">
		        <div  class="z-depth-3  y-depth-3 x-depth-3 grey green-text lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px; margin-top: 100px; solid #EEE; width: 100%">
		        <div class="section"></div>
				<div class="section"><a href="#!" class="brand-logo"><i class="material-icons">computer</i><h5>CADASTRAR USUÁRIO<h5></a></div>
		    
		        <div class="section"><i class="mdi-alert-error red-text"></i></div>
		      
		      	<div class='row'>
		      	<form action="../controller/controlador.php" method="POST">
  
            <div class="input-field col s12">
            	<i class="material-icons prefix">face</i>
              <input type="text" name="nome" id="nome"> 
              <label for="nome" >Nome: </label>
            </div>

             <div class="input-field col s12">
             	<i class="material-icons prefix">alternate_email</i>
              <input type="text" name="email" id="email"> 
              <label for="email" >Email: </label>
            </div>
             <div class="input-field col s12">
             	<i class="material-icons prefix">lock</i>
              <input type="password" name="senha" id="senha"> 
              <label for="senha" >Senha: </label>
            </div>
             <a href="../index.php" class="btn red" type="submit" > Voltar</a>
            <button class="btn" type="submit" name="cadastrarUsuario"> Cadastrar</button>
           
        
          		</form>
		           
		     
		        </div>
		       </div>
		      </center>
		      </main>

</div>


<?php
include_once 'includes/footer.php'; //footer
?>