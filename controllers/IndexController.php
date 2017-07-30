
<?php

class IndexController extends ControladorBase{
     
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
         
       
        //Cargamos la vista index y le pasamos valores
        $this->view("index");
    }

    public function begin(){
    	

    	$usuarios = new UsuariosModel($this->adapter);

    	$usuario = $usuarios->getUnUsuario($_POST['iden_code']);



        if($usuario == null)
        {
            $this->message->warning('No hay un usuario con este codigo');
            return $this->view("index");
        }

        else{$_SESSION["usuario"]= $usuario->id;}    	
    	
    	$_SESSION['anskIdentifier']= 1;

        $preguntas = new Preguntas($this->adapter);

        $pregunta = $preguntas->getById($_SESSION['anskIdentifier']);

        if($pregunta == null)
        {
            $this->message->warning('No hay preguntas para realizar el ejercicio');
        }

        $config = new Config($this->adapter);
        $config = $config->getById(1);
        //print_r($pregunta);        

        $this->view("Prueba",array("pregunta"=>$pregunta,"config"=>$config));
    }

    public function next()
    {
        $preguntas = new Preguntas($this->adapter);
        $config = new Config($this->adapter);
        $config = $config->getById(1);
        $_SESSION['anskIdentifier'] += 1;
        if($_SESSION['anskIdentifier']>$config->cantidad)
        {   
            $_SESSION['anskIdentifier'] = 1;
            $pregunta = $preguntas->getById($_SESSION['anskIdentifier']);
            return $this->view("Prueba2",array("pregunta"=>$pregunta,"config"=>$config));
        }
    	
        $pregunta = $preguntas->getById($_SESSION['anskIdentifier']);
        if($pregunta == null)
        {
            $this->message->warning('No hay mas preguntas');
        }
        
        $this->view("Prueba",array("pregunta"=>$pregunta,"config"=>$config));
    	
    }

    public function save()
    {
        print_r($_POST);

        $prueba1 = new Prueba1($this->adapter);
        //$prueba1->setId($id);
        $prueba1->setTexto($_POST['texto']);

        switch ($_POST['respuesta']) {
            case 1:
                $answer = "Sin poder";
                break;
            case 2:
                $answer = "Neutro";
                break;
            case 3:
                $answer = "Con poder";
                break;
        }

        $prueba1->setRespuesta($answer);

        $prueba1->setUsuario($_SESSION["usuario"]);

        $prueba1->setPregunta($_SESSION["anskIdentifier"]);

        $asksql = new Prueba1Model($this->adapter);

        $validation = $asksql->ejecutarSql("select * from Prueba1 where usuario = ".$_SESSION["usuario"]." and pregunta = ".$_SESSION['anskIdentifier']);

        if($validation == null)
        {
            $sql = $asksql->ejecutarSql("select max(id) as max from prueba1");          

            if($sql->max == null)
            {
                $id=1;
            }
            else{
                $id = 1+$sql->max;
            }

            $prueba1->setId($id);
            $prueba1->save();
    
        }
        else{
            $prueba1->setId($validation->id);
            $prueba1->update();
        }        
        

    }

    public function save2()
    {
        print_r($_POST);

        $prueba2 = new Prueba2($this->adapter);
        //$prueba1->setId($id);
        $prueba2->setRespuesta1($_POST['respuesta1']);

        $prueba2->setRespuesta2($_POST['respuesta2']);

        $prueba2->setRespuesta3($_POST['respuesta3']);

        $prueba2->setUsuario($_SESSION["usuario"]);

        $prueba2->setPregunta($_SESSION["anskIdentifier"]);

        $asksql = new Prueba1Model($this->adapter);

        $validation = $asksql->ejecutarSql("select * from Prueba2 where usuario = ".$_SESSION["usuario"]." and pregunta = ".$_SESSION['anskIdentifier']);

        if($validation == null)
        {
            $sql = $asksql->ejecutarSql("select max(id) as max from prueba2");          

            if($sql->max == null)
            {
                $id=1;
            }
            else{
                $id = 1+$sql->max;
            }

            $prueba2->setId($id);
            $prueba2->save();
    
        }
        else{
            $prueba2->setId($validation->id);
            $prueba2->update();
        }        
    }

    public function next2()
    {
        $config = new Config($this->adapter);
        $config = $config->getById(1);
        $_SESSION['anskIdentifier'] += 1;
        if($_SESSION['anskIdentifier']>$config->cantidad)
        {
            $this->message->success('Gracias por participar');
            $this->redirect('Index');
        }
        $preguntas = new Preguntas($this->adapter);
        $pregunta = $preguntas->getById($_SESSION['anskIdentifier']);
        if($pregunta == null)
        {
            $this->message->warning('No hay mas preguntas');
        }
        
        $this->view("Prueba2",array("pregunta"=>$pregunta,"config"=>$config));
        
    }
     
    
 
}