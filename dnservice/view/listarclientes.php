 <?php
include_once 'includes/header.php'; //header
include ("../model/clientes.php");
include_once '../model/conexaomodel.php';

include_once 'includes/mensagem.php';

$clientes = new Clientes();

?>



  <div class="row">
        <div class="col s20 m6 push-m3 ">
            <h5 class="light">Todos os clientes - Registros</h5>
                <form action="../controller/controlador.php" method="POST">
                    <table class="striped">
                        <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Sobrenome</th>
                                    <th>Endereco</th>
                                    <th>Telefone</th>
                                    
                                    
                                </tr>
                        </thead>
                        <tbody>
                        <?php
                            $res = $clientes->ListaCliente();
                        

                            while($dados = mysqli_fetch_array($res)):
                        ?>
                                <tr>
                                    <td><?php echo $dados['nome']?></td>
                                    <td><?php echo $dados['sobrenome']?></td>
                                    <td><?php echo $dados['endereco']?></td>
                                    <td><?php echo $dados['telefone']?></td>
                                    <td><a href="editar.php?id=<?php echo $dados['id_cliente'];?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>

                                    <td><a href="#modal<?php echo $dados['id_cliente'];?>" class="btn-floating red  modal-trigger"><i class="material-icons">delete</i></a></td>


                                    <!-- Modal Structure -->
                                    <div id="modal<?php echo $dados['id_cliente'];?>" class="modal">
                                      <div class="modal-content">
                                        <h4>Opa!</h4> 
                                        <p>Tem certeza que deseja excluir este cliente?</p>
                                      </div>
                                      <div class="modal-footer">
                                        

                                         <form action="../controller/controlador.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $dados['id_cliente'];?>">
                                            <button type="submit" name="deletarCliente" class="btn red"> Sim, quero deletar</button>
                                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                          </form>

                                      </div>
                                    </div>
                                                                     
                                     
                                         
                                        </div>
                                      </div>


                                                                       
                                   
                                </tr>
                            <?php endwhile;?>
                        </tbody>
                        
                    </table
                            
                
          </div>
           <button class="btn" type="submit"  name="novoCliente"> Novo Cliente</button>  
          </form>
         
        </div>   


          </div>
      </div>
      


<?php
include_once 'includes/footer.php'; //footer
?>
