<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Aplicación psicologia</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="views/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Aplicación psicologia</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo $helper->url(); ?>">Inicio</a></li>
            <li><a href="<?php echo $helper->url("usuarios","index"); ?>">Usuarios</a></li>
            <li><a href="<?php echo $helper->url("Preguntas","index"); ?>">Preguntas</a></li>
            <li><a href="<?php echo $helper->url("Parameters","index"); ?>">Parametros</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <?php
      $msg->display();

      //print_r($carreras);


    ?>
   
    <div class="container">
      <br><br>
     <div class="col-lg-6">
        <span>Prueba 1</span>
        <table id="CarrTable" class="table table-bordered">
          <thead>
            <tr>
              <td>Id</td>
              <td>Pregunta</td>
              <td>Respuesta</td>
              <td>Justificación</td>          
            </tr>
          </thead>
          <tbody>
            <?php if(isset($prueba1)) {foreach($prueba1 as $prueba) {  ?>
            <tr>
              <td><?php echo $prueba->id ?></td>
              <td><?php echo $prueba->pregunta ?></td>
              <td><?php echo $prueba->respuesta ?></td>
              <td><?php echo $prueba->texto ?></td>
            </tr>
            <?php }}?>
          </tbody>
        </table>
        
      </div>

      <div class="col-lg-6">
        <span>Prueba 2</span>
        <table id="UnTable" class="table table-bordered">
          <thead>
            <tr>
              <td>Id</td>
              <td>Pregunta</td>
              <td>respuesta1</td>
              <td>respuesta2</td>
              <td>respuesta3</td>          
            </tr>
          </thead>
          <tbody>
            <?php if(isset($prueba2)) {foreach($prueba2 as $prueba) {  ?>
            <tr>
              <td><?php echo $prueba->id ?></td>
              <td><?php echo $prueba->pregunta ?></td>
              <td><?php echo $prueba->respuesta1 ?></td>
              <td><?php echo $prueba->respuesta2 ?></td>
              <td><?php echo $prueba->respuesta3 ?></td>
              </tr>
            <?php }}?>
          </tbody>
        </table>
      </div>   
    </div><!-- /.container -->


     



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
   <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script>
       $('#UnTable').DataTable({"bSort": false,"language": {"url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"}});
        $('#CarrTable').DataTable({"bSort": false,"language": {"url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"}});

      function confirm_click(){return confirm("¿Esta seguro?");}
      
      <?php if(isset($edit)){  ?>
        <?php echo "$(document).ready(function () {" ?>
           <?php echo "$('#myModal').modal('show');"  ?>
           <?php echo "$('#eestrato').val('".$eusuario->estrato."');"  ?>
        <?php echo "});"  ?>
      <?php } ?>
     

    </script>
  </body>
</html>