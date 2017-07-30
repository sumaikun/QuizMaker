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

    <link href="css/quiz.css" rel="stylesheet">

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

    <style>
      #answers_b{
        display:none;
      }
      #text-detail{display:none;}
    </style>

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
            <li class="active"><a href="<?php echo $helper->url(); ?>">Inicio</a></li>
            <!--<li><a href="<?php echo $helper->url("usuarios","index"); ?>">Usuarios</a></li>-->
            <!--<li><a href="<?php echo $helper->url("Preguntas","index"); ?>">Preguntas</a></li>-->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
	   <br>
  		<div class="container-fluid bg-info">
        <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
                <h3><span class="label label-warning" id="qid">2</span> <?php echo $pregunta->titulo ?></h3>
            </div>
            <div class="modal-body">
              <div id="image_q">                
                <image src="Images/<?php echo $pregunta->imagen ?>"  class="img-responsive img-thumbnail"/>
              </div> 
              <div id="answers_b">
                  <div class="col-xs-3 col-xs-offset-5">
                     <div id="loadbar" style="display: none;">
                        <div class="blockG" id="rotateG_01"></div>
                        <div class="blockG" id="rotateG_02"></div>
                        <div class="blockG" id="rotateG_03"></div>
                        <div class="blockG" id="rotateG_04"></div>
                        <div class="blockG" id="rotateG_05"></div>
                        <div class="blockG" id="rotateG_06"></div>
                        <div class="blockG" id="rotateG_07"></div>
                        <div class="blockG" id="rotateG_08"></div>
                    </div>
                </div>

                <div class="quiz" id="quiz" data-toggle="buttons">
                   <label class="form-control">Tu respuesta</label>
                   <textarea class="form-control" id="respuesta1"></textarea>
                   <label class="form-control">Tu respuesta</label>
                   <textarea class="form-control" id="respuesta2"></textarea>
                   <label class="form-control">Tu respuesta</label>
                   <textarea class="form-control" id="respuesta3"></textarea>
                </div>
              </div>              
            </div>
            <div class="modal-footer text-muted">
              <span id="answer"></span>

            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container -->

    <input type="hidden" name="answer_val">

    <div class="container" id="text-detail">
      <button class="btn btn-success form-control" onclick="load_function()">Siguiente</button>
    </div>          
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <script>

      function load_function()
      {
        console.log("here");
        if($("#respuesta1").val() == "" || $("#respuesta2").val() == "" || $("#respuesta3").val() == "")
        {
          return alert("llena todos los campos");
        }
        else
        {
          $('#quiz').fadeOut(); 
          $('#loadbar').show();
          var ajaxrequest = $.post("<?php echo $helper->url('Index','save2'); ?>", {respuesta1:$("#respuesta1").val(),respuesta2:$("#respuesta2").val(),respuesta3:$("#respuesta3").val()} ,function(){
              //console.log("this data "+ data);           
                //alert(data);            
            });
            ajaxrequest.done(function() {
                 window.location.href = "<?php echo $helper->url('Index','next2'); ?>&id=<?php echo 'test' ?>";
            });
            ajaxrequest.fail(function() {
                 alert( "se presento un error" );
            }); 
        }
         
      }

      $(function(){
          var choice;
          var loading = $('#loadbar').hide();
          $(document)
          .ajaxStart(function () {
              loading.show();
          }).ajaxStop(function () {
            loading.hide();
          });


      $.fn.checking = function(ck) {
          //
        }; 
      }); 

         var timeLeft = <?php echo $config->tiempo ?>;
          var elem = document.getElementById('qid');

          var timerId = setInterval(countdown, 1000);
     

          function countdown() {
            if (timeLeft == 0) {
              clearTimeout(timerId);
              doSomething();
            } else {
              elem.innerHTML =timeLeft;
              timeLeft--;
            }
          }

          var init = countdown();

          function doSomething()
          {
            $("#image_q").hide();
            $("#answers_b").show();
            $("#text-detail").show();
          }
      
    </script>
  </body>
</html>
