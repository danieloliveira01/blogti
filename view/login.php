<?php
//include_once 'includes/header.php'; //header
include ("../model/clientes.php");
include_once '../model/conexaomodel.php';

include_once 'includes/mensagem.php';

$clientes = new Clientes();
// Limpa a sessão 
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
  


?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <title>BlogTI</title>
      <!--Import materialize.css-->
       <!-- Compiled and minified CSS --> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="../../css/custom.css">

      <style type="stylesheet">
      	

      </style>



      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

	<body> 
		
		<main>
		    <center>
		     <div class="container">
		        <div  class="z-depth-3 y-depth-3 x-depth-3 grey green-text lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px; margin-top: 100px; solid #EEE;">
		        <div class="section"></div>
		<div class="section"><a href="#!" class="brand-logo"><i class="material-icons">computer</i><h5>Blog TI</h5></a></div>
		    
		      <div class="section"><i class="mdi-alert-error red-text"></i></div>
		      
		  		<form action="../controller/controlador.php" method="POST">
		            <div class='row'>

		              <div class='input-field col s12'>


		                <input class='validate' type="text" name='email' id='email' required />
		                <label for='email'>Usuario</label>
		              </div>
		            </div>
		            <div class='row'>
		              <div class='input-field col m12'>
		                <input class='validate' type='password' name='senha' id='senha' required />
		                <label for='password'>Senha</label>
		              </div>
		              <label style='float: right;'>
		              <a><b style="color: #F5F5F5;">Forgot Password?</b></a>
		              </label>
		            </div>
		            <div class="row">
		            	Ainda não é cadastrado? <a href="cadusuario.php" class="btn green" type="submit" > Cadastrar</a>
		            </div>
		            <br/>
		            <center>
		              <div class='row'>
		                <button style="margin-left:65px;"  type='submit' name='btn_login' class='col  s6 btn btn-small white black-text  waves-effect z-depth-1 y-depth-1'>Login</button>
		              </div>
		            </center>
		        </form>
		     
		        </div>
		       </div>
		      </center>
		      </main>

        <!--JavaScript at end of body for optimized loading-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 </body>

<?php

?>
