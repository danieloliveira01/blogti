<?php
include_once 'includes/header.php'; //header
include ("../model/clientes.php");
$clientes = new Clientes();
?>



<br>
  <div class="row">
        <div class="col s12 m6 push-m3">
        <form action="../controller/controlador.php" method="POST">
            <h3 class="light">Cadastrar Serviço</h3>
            <div class="input-field col s12">
              <i class="material-icons prefix">account_circle</i>
             <select name="id_cliente">
              <option >Selecione</option>
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
                <option>Selecione</option>
                <option value="Manut. computadores">Manutenção de computadores</option>
                <option value="Des. Software">Desenvolvimento de software</option>
                <option value="Redes">Redes</option>
              </select>
              <label for="nome" >Tipo de serviço: </label>
            </div>

             <div class="input-field col s12">
              <i class="material-icons prefix">date_range</i>
              <input type="date" name="data_servico" id="data_servico"> 
              <label for="nome" >Data </label>
            </div>
             <div class="input-field col s12">
               <i class="material-icons prefix">mode_edit</i>
              <textarea name="descricao" id="descricao" class="materialize-textarea"> </textarea> 
              <label  for="icon_prefix2" >Descrição: </label>
            </div>
            <div class="input-field col s12">
               <i class="material-icons prefix">attach_money</i>
                <input type="text" name="valor" id="valor"> 
                <label for="valor" >Valor: R$ </label>
            </div>
            <div class="input-field col s12">
               <i class="material-icons prefix">assignment_turned_in</i>
                 <select name="pago">
                <option>Selecione</option>
                <option value="Sim">Sim</option>
                <option value="Nao">Não</option>
              </select>
                <label for="valor" >Pago:</label>
            </div>
            <button class="btn" type="submit" name="cadastrarServico"> Cadastrar</button>
            <a href="listacliente.php" class="btn green" type="submit" > Lista de Clientes</a>
          </form>



<?php
include_once 'includes/footer.php'; //footer
?>

