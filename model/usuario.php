<?php

//iniciar a sessao


     class Usuarios{


        public function  CadastrarUsuario($nome, $email, $senha, $nivel_acesso){
            session_start();
               $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
               $insert = "insert into usuario(nome,email,senha, nivel_acesso)values('$nome', '$email', '$senha', '$nivel_acesso') ";
               
               if(mysqli_query($objetdoConexao,$insert)):
                  $_SESSION['mensagem'] = "Cadastrado com sucesso!";
                  header('Location: ../view/login.php');
                    
               else:
                $_SESSION['mensagem'] = "Erro ao cadastrar!";
                  header('Location: ../view/login.php');
                endif;
               
           
        }

        public function verificaAcesso($login, $senha) {
            session_start();
             $objetdoConexao =  mysqli_connect('localhost','root','','blogti');
              $select = "SELECT * FROM usuario where email= '$login' and senha = '$senha'";
             $resultado = mysqli_query($objetdoConexao, $select);
                    
             $dados = mysqli_fetch_array($resultado);
             /*
             if(mysqli_query($objetdoConexao,$select)):
                  $_SESSION['mensagem'] = "Consultar login";
                  //header('Location: ../view/login.php');
                    
               else:
                $_SESSION['mensagem'] = "Erro ao consultar!";
                  //header('Location: ../view/login.php');
                endif;
               
              */
             return $dados;
        }
}