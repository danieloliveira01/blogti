
<?php


     class Servicos{


        public function  CadastrarServico($id_cliente, $tipo_servico, $data_servico, $descricao, $valor, $pago){
                session_start();
               $objetdoConexao =  mysqli_connect('localhost','root','','DNService');
               $insert = "insert into OrdemServicos(id_cliente,tipo_servico,data_servico,descricao, valor, pago)values('$id_cliente', '$tipo_servico', '$data_servico', '$descricao', '$valor', '$pago') ";
               
                if(mysqli_query($objetdoConexao,$insert)):
                  $_SESSION['mensagem'] = "Cadastrado com sucesso!";
                  header('Location: ../index.php');
                    
               else:
                $_SESSION['mensagem'] = "Erro ao cadastrar!";
                  header('Location: ../index.php');
                endif;
               
           
        }
     

     public function ListaServicos(){
         $sql = "SELECT OrdemServicos.id_os, Clientes.nome, OrdemServicos.tipo_servico, OrdemServicos.data_servico, OrdemServicos.descricao, OrdemServicos.valor, pago FROM OrdemServicos inner join Clientes on Clientes.id_cliente = OrdemServicos.id_cliente"; //precisa concluir este inner join!
        $objetdoConexao =  mysqli_connect('localhost','root','','DNService');
        $resultado = mysqli_query($objetdoConexao, $sql);
        
        return  $resultado;

     }


     public function ListaServicosid($id){
                              $objetdoConexao =  mysqli_connect('localhost','root','','DNService');
                            
                              $sql = "SELECT OrdemServicos.id_os, OrdemServicos.id_cliente, Clientes.nome, OrdemServicos.tipo_servico, OrdemServicos.data_servico, OrdemServicos.descricao, OrdemServicos.valor, pago FROM OrdemServicos inner join Clientes on Clientes.id_cliente = OrdemServicos.id_cliente
                                  WHERE id_os = '$id'";
                          
                              $resultado = mysqli_query($objetdoConexao, $sql);
                    
                              $dados = mysqli_fetch_array($resultado);
        
                            return  $dados;

     }



     public function  editarServico($id_cliente, $tipo_servico, $data_servico, $descricao, $valor, $pago, $id){
            session_start();

            $objetdoConexao =  mysqli_connect('localhost','root','','DNService');
            echo $descricao;
            $update = "update OrdemServicos set id_cliente = '$id_cliente',tipo_servico = '$tipo_servico',data_servico = '$data_servico',descricao = '$descricao', valor = '$valor', pago = '$pago' WHERE id_os = '$id'";
           
             if(mysqli_query($objetdoConexao,$update)):
                  $_SESSION['mensagem'] = "Atualizado com sucesso!";
                  header('Location: ../view/listarclientes.php');
                    
               else:
                $_SESSION['mensagem'] = "Erro ao atualizar!";
                  header('Location: ../view/listarclientes.php');
                endif;
        
     }


     public function  ExcluirServico($id){
             session_start();
            $objetdoConexao =  mysqli_connect('localhost','root','','DNService');
            $delete = "DELETE from OrdemServicos where id_os = '$id'";
           if(mysqli_query($objetdoConexao,$delete)):
                  $_SESSION['mensagem'] = "Deletado com sucesso!";
                  header('Location: ../index.php');
                    
               else:
                $_SESSION['mensagem'] = "Erro ao deletar!";
                  header('Location: ../index.php');
                endif;
               
        
     }


        public function  InserirPagamento($nome, $data, $valor){
            $objetdoConexao =  mysqli_connect('localhost','root','','zemurrugabar');
            $insert = "insert into clientes(nome,data,valor_pago)values('$nome', '$data', '$valor') ";
            mysqli_query($objetdoConexao,$insert);
            if(mysqli_Insert_id($objetdoConexao)){
                echo "<span style='color:green'>Valor pago com sucesso</span>";
            }
            else{
            echo "<span style='color:red'>não foi Cadastrado com sucesso</span>";
            }
        
     }
    
       
        public function SearchClientes($nome){
            $objetdoConexao =  mysqli_connect('localhost','root','','zemurrugabar');
            $sql = "SELECT * FROM clientes WHERE nome = '$nome'";
            $resultado = mysqli_query($objetdoConexao, $sql);
          
            return $resultado;
        }
        public function CalculaDivida( $nome){
            $objetdoConexao =  mysqli_connect('localhost','root','','zemurrugabar');
            $sqlValor_devido = "SELECT SUM(valor_devido) AS total FROM clientes where nome = '$nome'";
            $resultado = mysqli_query($objetdoConexao, $sqlValor_devido);
            return $resultado;
        }

        public function CalculaValorPago( $nome){
            $objetdoConexao =  mysqli_connect('localhost','root','','zemurrugabar');
            $sqlValor_devido = "SELECT SUM(valor_pago) AS total FROM clientes where nome = '$nome'";
            $resultado = mysqli_query($objetdoConexao, $sqlValor_devido);
            return $resultado;
        }


        public function CalculaDividaTotal(){
            $objetdoConexao =  mysqli_connect('localhost','root','','zemurrugabar');
            $sqlValor_devido = "SELECT SUM(valor_devido) AS total FROM clientes";
            $resultado = mysqli_query($objetdoConexao, $sqlValor_devido);
            return $resultado;
        }

        public function CalculaValorPagoTotal(){
            $objetdoConexao =  mysqli_connect('localhost','root','','zemurrugabar');
            $sqlValor_devido = "SELECT SUM(valor_pago) AS total FROM clientes";
            $resultado = mysqli_query($objetdoConexao, $sqlValor_devido);
            return $resultado;
        }


        public function LimpaNome($nome)
        {
            $objetdoConexao =  mysqli_connect('localhost','root','','zemurrugabar');
            $sqlValor_devido = "delete * FROM clientes where nome  = '$nome'";
            $resultado = mysqli_query($objetdoConexao, $sqlValor_devido);
           
        }


    }

?>