 <?php
include_once 'includes/header.php'; //header
include ("../model/clientes.php");
include_once '../model/conexaomodel.php';


$clientes = new Clientes();

?>

  <div class="row">
        <div class="col s20 m6 push-m3 ">
            <h5 class="light">Editar cliente</h5>
                                 <?php

                            if(isset($_GET['id'])):
                                 $objetdoConexao =  mysqli_connect('localhost','root','','DNService');
                                 $id = mysqli_escape_string($objetdoConexao, $_GET['id']);
                                $dados = $clientes->ListaClienteid($id);
                              endif
                        
                        ?>
                   
                               <div class="row">
        <div class="col s12 m10 push-m1">
        <form action="../controller/controlador.php" method="POST">
           
            <div class="input-field col s12">
                 <input type="hidden" name="id" value="<?php echo $dados['id_cliente']?>">
              <input type="text" name="nome" id="nome"  value="<?php echo $dados['nome']?>"> 
              <label for="nome" >Nome: </label>
            </div>
             <div class="input-field col s12">
              <input type="text" name="sobrenome" id="sobrenome"  value="<?php echo $dados['sobrenome']?>"> 
              <label for="nome" >Sobrenome: </label>
            </div>

             <div class="input-field col s12">
              <input type="text" name="endereco" id="endereco"  value="<?php echo $dados['endereco']?>"> 
              <label for="nome" >Endereco: </label>
            </div>
             <div class="input-field col s12">
              <input type="text" name="telefone" id="telefone"  value="<?php echo $dados['telefone']?>"> 
              <label for="nome" >Telefone: </label>
            </div>
            <button class="btn" type="submit"  name="editarcliente"> Atualizar</button>
            <a href="listacliente.php" class="btn green" type="submit" > Lista de Clientes</a>
          </form>


                        
          </div>
        </div>            

          </div>
      </div>
      


<?php
include_once 'includes/footer.php'; //footer
?>
