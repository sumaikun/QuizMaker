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
            <li class="active"><a href="<?php echo $helper->url("Preguntas","index"); ?>">Preguntas</a></li>
            <li><a href="<?php echo $helper->url("Parameters","index"); ?>">Parametros</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <?php
      $msg->display();
    ?>

    <div class="container">
	
	<form action="<?php echo $helper->url("Preguntas","create"); ?>" method='POST' enctype='multipart/form-data'>
	<br>
	  <div class="form-group">
		<label for="email">Titulo de la pregunta:</label>
		<input type="text" class="form-control" name="titulo">
	  </div>
	  <div class="form-group">
		<label for="pwd">Imagen:</label>
		<input type="file" class="form-control" name="imagen">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
	<br>
	
	<table class="table table-bordered" id="ImageTable">
		<thead>
			<tr>
				<td>Id</td>
				<td>Titulo Pregunta</td>
				<td>Imagen</td>
				<td>Opciones</td>
			</tr>
		</thead>
		<tbody>
			<?php if(isset($preguntas)) {foreach($preguntas as $pregunta) {  ?>
      <tr>
        <td><?php echo $pregunta->id ?></td>
        <td><?php echo $pregunta->titulo ?></td>
        <td> <img src="Images/<?php echo $pregunta->imagen ?>" class="img-responsive img-rounded" style="max-width:50px;"></td>         
        <td><a href="<?php echo $helper->url("Preguntas","edit"); ?>&id=<?php echo $pregunta->id; ?>" onclick="return confirm_click();" ><button class="btn btn-xs btn-warning">Editar</button></a>
         <a href="<?php echo $helper->url("Preguntas","delete"); ?>&id=<?php echo $pregunta->id; ?>" onclick="return confirm_click();"><button class="btn btn-xs btn-danger">Eliminar</button></a></td>
      </tr>
      <?php }}?>
		</tbody>
	</table>
    </div><!-- /.container -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
      <form action="<?php echo $helper->url("Preguntas","update"); ?>" method='POST' enctype='multipart/form-data'>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar pregunta</h4>
      </div>
      <div class="modal-body">
          <input type="hidden" name="id" value="<?php if(isset($epregunta)) { echo $epregunta->id;} ?>"> 
        <div class="form-group">
        <label for="email">Titulo:</label>
          <input type="text" class="form-control" id="titulo" name="titulo" value="<?php if(isset($epregunta)){echo $epregunta->titulo;} ?>">
        </div>
        <div class="form-group">
        <label for="pwd">Imagen:</label>
          <input type="file" class="form-control" id="imagen" name="imagen" value="<?php if(isset($epregunta)){echo (int)$epregunta->imagen;} ?>">
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
    $('#ImageTable').DataTable({"bSort": false,"language": {"url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"}});

      function confirm_click(){return confirm("¿Esta seguro?");}
      <?php if(isset($edit)){  ?>
        <?php echo "$(document).ready(function () {" ?>
           <?php echo "$('#myModal').modal('show');"  ?>
        <?php echo "});"  ?>
      <?php } ?>
    </script>
  </body>
</html>
