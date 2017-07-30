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
            <li class="active"><a href="<?php echo $helper->url("usuarios","index"); ?>">Usuarios</a></li>
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
      <br>
      <button data-toggle="collapse" data-target="#demo">Crear Usuario</button>

      <div id="demo" class="collapse">
       <div class="panel panel-default">
        <div class="panel-heading">Crear Usuario</div>
        <div class="panel-body">
          <form action="<?php echo $helper->url("Usuarios","create"); ?>" method="post">
          <br>
            <div class="form-group">
              <label>Nombre Usuario:</label>
              <input type="text" autocomplete="off" class="form-control" id="nusuario" name="nusuario" required>
            </div>
            <div class="form-group">
              <label>Codigo de identificación:</label>
              <input type="number" autocomplete="off" class="form-control" id="cusuario" name="cusuario" required>
            </div>
            <div class="form-group">
              <label>Edad:</label>
              <input type="number" autocomplete="off" class="form-control" id="eusuario" name="eusuario" required>
            </div>
            <div class="form-group">
              <label>Sexo:</label>
              <br>
              Hombre<input type="radio" class="form-control" id="susuario" name="gusuario" value ="Masculino" checked>
              Mujer<input type="radio" class="form-control" id="susuario" name="gusuario" value ="Femenino">
            </div>
            <div class="form-group">
              <label>Universidad:</label>
              <select class="form-control" name="uusuario" required>
                <option>Selecciona</option>
                <?php if(isset($universidades)) {foreach($universidades as $universidad) {  ?>
                  <option value="<?php echo $universidad->id ?>"><?php echo $universidad->nombre?></option>
                <?php }}?>
              </select>
            </div>
            <div class="form-group">
              <label>Carrera:</label>
              <select class="form-control" name="causuario" required>
                <option>Selecciona</option>
                <?php if(isset($carreras)) { foreach($carreras as $carrera) { ?>
                <option value= "<?php echo $carrera->id; ?>"> <?php echo $carrera->nombre; ?> </option> 
                <?php  }} ?>  
              </select>
            </div>
            <div class="form-group">
              <label>Estrato:</label>
              <select class="form-control" name="esusuario" required>               
                <option>Selecciona</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
      </div>
      
     	<br>
	
    	<table id="UserTable" class="table table-bordered">
    		<thead>
    			<tr>
    				<td>Id</td>
    				<td>Nombre Usuario</td>
    				<td>No. identificación</td>
    				<td>Edad</td>
            <td>Genero</td>
            <td>Universidad</td>
            <td>Carrera</td>
            <td>Estrato</td>
            <td>Opciones</td>
    			</tr>
    		</thead>
    		<tbody>
          <?php if(isset($usuarios)) {foreach($usuarios as $usuario) {  ?>
    			<tr>
            <td><?php echo $usuario->id ?></td>
            <td><?php echo $usuario->nombre ?></td>
            <td><?php echo $usuario->codigo ?></td>
            <td><?php echo $usuario->edad ?></td>
            <td><?php echo $usuario->genero ?></td>
            <td><?php echo $usuario->universidad ?></td>
            <td><?php echo $usuario->carrera ?></td>
            <td><?php echo $usuario->estrato ?></td>         
            <td><a href="<?php echo $helper->url("Usuarios","edit"); ?>&id=<?php echo $usuario->id; ?>" onclick="return confirm_click();" ><button class="btn btn-xs btn-warning">Editar</button></a>
             <a href="<?php echo $helper->url("Usuarios","delete"); ?>&id=<?php echo $usuario->id; ?>" onclick="return confirm_click();"><button class="btn btn-xs btn-danger">Eliminar</button></a> <a href="<?php echo $helper->url("Info","index"); ?>&id=<?php echo $usuario->id; ?>"><button class="btn btn-xs btn-success">INFO</button></a></td>
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
      <form action="<?php echo $helper->url("Usuarios","update"); ?>" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar usuario</h4>
      </div>
      <div class="modal-body">
          <input type="hidden" name="id" value="<?php if(isset($eusuario)) { echo $eusuario->id;} ?>"> 
        <div class="form-group">
        <label for="email">Nombre Usuario:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="<?php if(isset($eusuario)){echo $eusuario->nombre;} ?>" required>
        </div>
        <div class="form-group">
        <label for="pwd">Codigo de identificación:</label>
          <input type="number" class="form-control" id="codigo" name="codigo" value="<?php if(isset($eusuario)){echo (int)$eusuario->codigo;} ?>" required>
        </div>
        <div class="form-group">
          <label>Edad:</label>
          <input type="number" class="form-control" id="edad" name="edad" value="<?php if(isset($eusuario)){echo (int)$eusuario->edad;} ?>" required>
        </div>
        <div class="form-group">
          <label>Sexo:</label>
          <br>
          Hombre<input type="radio"  id="susuario" name="genero" value ="Masculino" checked>
          Mujer<input type="radio"  id="susuario" name="genero" value ="Femenino">
        </div>
        <div class="form-group">
          <label>Universidad:</label>
          <select class="form-control" name="universidad" required>
            <option>Selecciona</option>
              <?php if(isset($universidades)) {foreach($universidades as $universidad) {  ?>
              <option value="<?php echo $universidad->id ?>" <?php if(isset($eusuario) and  $universidad->id == $eusuario->universidad){echo 'selected';} ?> ><?php echo $universidad->nombre ?></option>
            <?php }}?>
          </select>
        </div>
        <div class="">
          <label>Carrera:</label>
          <select name="carrera" class="form-control" required>
          <option>Selecciona</option>
          <?php if(isset($carreras)) {  foreach($carreras as $carrera) { ?>
            <option value= "<?php echo $carrera->id; ?>" <?php if(isset($eusuario) and  $carrera->id == $eusuario->carrera){echo 'selected';} ?> > <?php echo $carrera->nombre; ?> </option> 
          <?php  }} ?>                 
          </select> 
        </div>
        <div class="form-group">
          <label>Estrato:</label>
          <select class="form-control" name="estrato" id="eestrato" required>
            <option>Selecciona</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
          </select>
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

     $('#UserTable').DataTable({"bSort": false,"language": {"url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"}});

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
