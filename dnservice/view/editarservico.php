 <?php
include_once 'includes/header.php'; //header
include ("../model/servicos.php");
include ("../model/clientes.php");
include_once '../model/conexaomodel.php';


$servicos = new Servicos();
$clientes = new Clientes();

?>

  <div class="row">
        <div class="col s20 m6 push-m3 ">
            <h5 class="light">Editar cliente</h5>
                                 <?php

                            if(isset($_GET['id'])):
                                 $objetdoConexao =  mysqli_connect('localhost','root','','DNService');
                                 $id = mysqli_escape_string($objetdoConexao, $_GET['id']);
                                $dados = $servicos->ListaServicosid($id);
                              endif
                        
                        ?>
          <div class="row">      
        
        <div class="col s12 m10 push-m1">
        <form action="../controller/controlador.php" method="POST">
            <h3 class="light">Editar Serviço</h3>
            <div class="input-field col s12">
               <input type="hidden" name="id" value="<?php echo $dados['id_os']?>">
              <i class="material-icons prefix">account_circle</i>
             <select name="id_cliente">
              <option value="<?php echo $dados['id_cliente']?>" ><?php echo $dados['nome']?></option>
              <?php
                $res = $clientes->ListaCliente();
                while($nome = mysqli_fetch_array($res)) {?>
                  <option value="<?php echo $nome['id_cliente'];?>"><?php echo $nome['nome'];?></option>
                  <?php
                }
              ?>

             </select>
              <label for="nome" >Cliente: </label>
            </div>
             <div class="input-field col s12">
              <i class="material-icons prefix">build</i>

              <select name="tipo_servico">
                <option value="<?php echo $dados['tipo_servico']?>" ><?php echo $dados['tipo_servico']?></option>
                <option value="Manut. computadores">Manutenção de computadores</option>
                <option value="Des. Software">Desenvolvimento de software</option>
                <option value="Redes">Redes</option>
              </select>
              <label for="nome" >Tipo de serviço: </label>
            </div>

             <div class="input-field col s12">
              <i class="material-icons prefix">date_range</i>
              <input type="date" name="data_servico" value="<?php echo $dados['data_servico']?>" id="data_servico"> 
              <label for="nome" >Data </label>
            </div>
             <div class="input-field col s12">
               <i class="material-icons prefix">mode_edit</i>
              <textarea name="descricao" id="descricao"  class="materialize-textarea"> HELLO WORLD</textarea> 
              <label  for="icon_prefix2" >Descrição: </label>
            </div>
            <div class="input-field col s12">
               <i class="material-icons prefix">attach_money</i>
                <input type="text" name="valor" value="<?php echo $dados['valor']?>" id="valor"> 
                <label for="valor" >Valor: R$ </label>
            </div>
            <div class="input-field col s12">
               <i class="material-icons prefix">assignment_turned_in</i>
                 <select name="pago">
                <option value="<?php echo $dados['pago']?>" ><?php echo $dados['pago']?></option>
                <option value="Sim">Sim</option>
                <option value="Nao">Não</option>
              </select>
                <label for="valor" >Pago:</label>
            </div>
            <button class="btn" type="submit" name="editarServico"> Atualizar</button>
            <a href="listacliente.php" class="btn green" type="submit" > Lista de Clientes</a>
          </form>
         
                     
          </div>
        </div>            

          </div>
      </div>


<?php
include_once 'includes/footer.php'; //footer
?>
