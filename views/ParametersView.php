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
            <li class="active"><a href="<?php echo $helper->url("Parameters","index"); ?>">Parametros</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
     <?php
      $msg->display();

      //print_r($usuarios);
    ?>
   <div class="container">
    <br>
      <div class = "col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">Carreras</div>
          <div class="panel-body">
            <form action="<?php echo $helper->url("Parameters","createC"); ?>" method="post">
            <br>
              <div class="form-group">
                <label>Nombre de la carrera:</label>
                <input type="text" autocomplete="off" class="form-control" id="nombre" name="nombre">
              </div>
              
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
      <div class = "col-lg-6">
        
        <div class="panel panel-default">
          <div class="panel-heading">Universidades</div>
          <div class="panel-body">
            <form action="<?php echo $helper->url("Parameters","createU"); ?>" method="post">
            <br>
              <div class="form-group">
                <label>Nombre de la universidad:</label>
                <input type="text" autocomplete="off" class="form-control" id="nombre" name="nombre">
              </div>
              
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <table id="CarrTable" class="table table-bordered">
          <thead>
            <tr>
              <td>Id</td>
              <td>Nombre Carrera</td>
              <td>Opciones</td>          
            </tr>
          </thead>
          <tbody>
            <?php if(isset($carreras)) {foreach($carreras as $carrera) {  ?>
            <tr>
              <td><?php echo $carrera->id ?></td>
              <td><?php echo $carrera->nombre ?></td>
              <td><a href="<?php echo $helper->url("Parameters","editC"); ?>&id=<?php echo $carrera->id; ?>" onclick="return confirm_click();" ><button class="btn btn-xs btn-warning">Editar</button></a>
               <a href="<?php echo $helper->url("Parameters","deleteC"); ?>&id=<?php echo $carrera->id; ?>" onclick="return confirm_click();"><button class="btn btn-xs btn-danger">Eliminar</button></a></td>
            </tr>
            <?php }}?>
          </tbody>
        </table>
        <div>
          <form action="<?php echo $helper->url("Parameters","Config"); ?>" method="post">
              <label>Tiempo de espera por cada imagen</label>
              <input type = "number" class="form-control" name="tiempo" value="<?php if(isset($config)) {echo $config->tiempo;} ?>"  id="tiempo">
              <label>Cantidad de preguntas para las pruebas</label>
              <input type = "number" class="form-control" name="cantidad" value="<?php if(isset($config)) {echo $config->cantidad;} ?>"  id="cantidad">
              <button type="submit" class="btn btn-warning form-control">Guardar</button>
          </form>
        </div>
      </div>
      <div class="col-lg-6">
        <table id="UnTable" class="table table-bordered">
          <thead>
            <tr>
              <td>Id</td>
              <td>Nombre Universidad</td>
              <td>Opciones</td>          
            </tr>
          </thead>
          <tbody>
            <?php if(isset($universidades)) {foreach($universidades as $universidad) {  ?>
            <tr>
              <td><?php echo $universidad->id ?></td>
              <td><?php echo $universidad->nombre ?></td>
              <td><a href="<?php echo $helper->url("Parameters","editU"); ?>&id=<?php echo $universidad->id; ?>" onclick="return confirm_click();" ><button class="btn btn-xs btn-warning">Editar</button></a>
               <a href="<?php echo $helper->url("Parameters","deleteU"); ?>&id=<?php echo $universidad->id; ?>" onclick="return confirm_click();"><button class="btn btn-xs btn-danger">Eliminar</button></a></td>
            </tr>
            <?php }}?>
          </tbody>
        </table>
      </div>   
    </div><!-- /.container -->


    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
      <form action="<?php echo $helper->url("Parameters","updateC"); ?>" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar carrera</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" value="<?php if(isset($ecarrera)){ echo $ecarrera->id; } ?>">
        <div class="form-group">
          <label>Nombre de la carrera:</label>
          <input type="text" autocomplete="off" class="form-control" value="<?php if(isset($ecarrera)){ echo $ecarrera->nombre; }?>" id="nombreca" name="nombreca">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-default"  value="Actualizar">
        <?//php print_r($eusuario); ?>
      </div>
    </div>

  </div>
</div>


<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
      <form action="<?php echo $helper->url("Parameters","updateU"); ?>" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar universidad</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" value="<?php if(isset($euniversidad)){ echo $euniversidad->id; } ?>">
        <div class="form-group">
            <label>Nombre de la universidad:</label>
            <input type="text" autocomplete="off" class="form-control" value="<?php if(isset($euniversidad)){echo $euniversidad->nombre ;}?>" id="nombre" name="nombrue">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-default"  value="Actualizar">
        <?//php print_r($eusuario); ?>
      </div>
    </div>

  </div>
</div>

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

        <?php if(isset($editC)){  ?>
        <?php echo "$(document).ready(function () {" ?>
           <?php echo "$('#myModal').modal('show');"  ?>
        <?php echo "});"  ?>
      <?php } ?>

      <?php if(isset($editU)){  ?>
        <?php echo "$(document).ready(function () {" ?>
           <?php echo "$('#myModal2').modal('show');"  ?>
        <?php echo "});"  ?>
      <?php } ?>

    </script>
  </body>
</html>
