<?php
include_once 'includes/header.php'; //header
?>


<h3>Cadastro de clientes</h3>
<br>
  <div class="row">
        <div class="col s12 m6 push-m3">
        <form action="../controller/controlador.php" method="POST">
            <h3 class="light">Cadastrar Cliete</h3>
            <div class="input-field col s12">
              <input type="text" name="nome" id="nome"> 
              <label for="nome" >Nome: </label>
            </div>
             <div class="input-field col s12">
              <input type="text" name="sobrenome" id="sobrenome"> 
              <label for="nome" >Sobrenome: </label>
            </div>

             <div class="input-field col s12">
              <input type="text" name="endereco" id="endereco"> 
              <label for="nome" >Endereco: </label>
            </div>
             <div class="input-field col s12">
              <input type="text" name="telefone" id="telefone"> 
              <label for="nome" >Telefone: </label>
            </div>
            <button class="btn" type="submit" name="cadastrarCliente"> Cadastrar</button>
            <a href="listacliente.php" class="btn green" type="submit" > Lista de Clientes</a>
          </form>



<?php
include_once 'includes/footer.php'; //footer
?>

