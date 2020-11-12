<?php include ("../model/posts.php");?>
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

      



      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
      
    
  <nav class="blue">

    <div class="container ">
      <div class="nav-wrapper blue">
      <a href="../index.php" class="brand-logo"><i class="material-icons">computer
</i>Blog TI</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="../index.php">Home</a></li>
        <li><a href="perguntas.php">Perguntas</a></li>
        <li><a href="noticias.php">Notícias</a></li>
        <li><a href="dicas.php">Dicas</a></li>
        
        <li><a href="login.php"><i class="material-icons">account_circle</i></a></li>
      </ul>



    </div>



  </nav>


  <ul class="sidenav" id="mobile-demo">
    < <li><a href="../index.php">Home</a></li>
        <li><a href="./perguntas.php">Perguntas</a></li>
        <li><a href="./noticias.php">Notícias</a></li>
        <li><a href="./dicas.php">Dicas</a></li>
        <nav class="blue">
    <div class="nav-wrapper">
      <form  action="../controller/controlador.php" method="POST">
        <div class="input-field">
          <input id="search" type="search" name="search" placeholder="pesquise parte do título..." required>
          <label class="label-icon" for="search" name="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>       

  </ul>
      
    </div>
    



    <!--JavaScript at end of body for optimized loading-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     <script>  
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
        
</script>