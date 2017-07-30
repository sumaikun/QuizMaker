
<?php

class PreguntasController extends ControladorBase{
     
	public $conectar;
    public $adapter;

    public function __construct() {

        parent::__construct();
        
        require 'libraries/FlashMessages.php';  
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
        $this->message = new FlashMessages();
    }
     
    public function index(){
         
        $preguntas = new Preguntas($this->adapter);

        $preguntas = $preguntas->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("Preguntas",array("preguntas"=>$preguntas));
    }

    public function create(){    	
    	
    	$pregsql = new PreguntasModel($this->adapter);

        $sql = $pregsql->ejecutarSql("select max(id) as max from preguntas");          

        if($sql->max == null)
        {
            $id=1;
        }
        else{
            $id = 1+$sql->max;
        }

        
        $info = pathinfo($_FILES['imagen']['name']);
		$ext = $info['extension']; // get the extension of the file
		
		if($ext != 'jpg' and $ext != 'png'){
			$this->message->warning('Solo son validos los archivos .png y .jpg');
			$this->redirect('Preguntas'); 
		}

		$newname = $_POST['titulo'].".".$ext; 

		$target = 'Images/'.$newname;	


		move_uploaded_file( $_FILES['imagen']['tmp_name'], $target);	
		

        $pregunta = new Preguntas($this->adapter);
        $pregunta->setId($id);
    	$pregunta->setTitulo($_POST["titulo"]);
    	$pregunta->setImagen($newname);
    	if($pregunta->save())
        {
            $this->message->success('Pregunta guardada');    
        }
        else{
            $this->message->warning('Existe un error en la información');   
        }        

    	$this->redirect('Preguntas');
    }

    public function edit(){
      	//echo $_GET['id'];
        
        $preguntas = new Preguntas($this->adapter);
        $epregunta = $preguntas->getById($_GET["id"]);
        $preguntas = $preguntas->getAll();
        
        //print_r($eusuario);
        
        $this->view("Preguntas",array("epregunta"=>$epregunta,"preguntas"=>$preguntas,"edit"=>"yes"));

    }

    public function delete(){

    	$old = new Preguntas($this->adapter);
    	$img = $old->getById($_GET['id']);
    	if(file_exists("Images/".$img->imagen))
    	{
    		unlink("Images/".$img->imagen);
    	}

       $pregunta = new Preguntas($this->adapter);
        if($pregunta->deleteById($_GET['id']))
        {
            $this->message->success('Pregunta eliminada');    
        }
        else{
            $this->message->warning('Sucede un error');   
        }
        $this->redirect('Preguntas');  
    }

    public function update(){

    	
    	$old = new Preguntas($this->adapter);

    	$img = $old->getById($_POST['id']);

    	

    	$info = pathinfo($_FILES['imagen']['name']);
    	if($_FILES['imagen']['name'] != null)
    	{
    		if(file_exists("Images/".$img->imagen))
	    	{
	    		unlink("Images/".$img->imagen);
	    	}

    		$ext = $info['extension']; // get the extension of the file
			if($ext != 'jpg' and $ext != 'png'){
				$this->message->warning('Solo son validos los archivos .png y .jpg');
				$this->redirect('Preguntas'); 
			}

			$newname = $_POST['titulo'].".".$ext; 

			$target = 'Images/'.$newname;

			move_uploaded_file( $_FILES['imagen']['tmp_name'], $target);	
    	}
    	else{
    		$newname = $img->imagen;
    	}
		

    	$pregunta = new Preguntas($this->adapter);
        $pregunta->setId($_POST["id"]);
        $pregunta->setTitulo($_POST["titulo"]);
        $pregunta->setImagen($newname);
        if($pregunta->update())
        {
            $this->message->info('Pregunta Actualizada');    
        }
        else{
            $this->message->warning('Sucede un error');   
        }        

        $this->redirect('Preguntas');

       
    }
     
    
 
}