<?php



class ParametersController extends ControladorBase{
     
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
        $carrera = new Carreras($this->adapter);
        $carreras = $carrera->getAll();
        $universidad = new Universidades($this->adapter);
        $universidades = $universidad->getAll();
        $config = new Config($this->adapter);
        $config = $config->getById(1);
        $this->view("Parameters",array("universidades"=>$universidades,"carreras"=>$carreras,"config"=>$config));
        
    }

    public function createU(){
    	//print_r($_POST);

        //return '';     
 
        // Display the messages
        //$this->message->display();           

        $usql = new UniversidadesModel($this->adapter);

        $sql = $usql->ejecutarSql("select max(id) as max from universidades");          

        if($sql->max == null)
        {
            $id=1;
        }
        else{
            $id = 1+$sql->max;
        }

        $universidad = new Universidades($this->adapter);
        $universidad->setId($id);
        $universidad->setNombre($_POST["nombre"]);
     

        if($universidad->save())
        {
            $this->message->success('Universidad guardada');    
        }
        else{
            $this->message->warning('Existe un error en la información');   
        }        

        $this->redirect('Parameters',array("euniversidad"=>$euniversidad,"universidades"=>$universidades,"carreras"=>$carreras,"edit"=>"yes"));
    	
    }

    public function createC(){
        //print_r($_POST);

        //return '';     
 
        // Display the messages
        //$this->message->display();           

        $usql = new CarrerasModel($this->adapter);

        $sql = $usql->ejecutarSql("select max(id) as max from carreras");          

        if($sql->max == null)
        {
            $id=1;
        }
        else{
            $id = 1+$sql->max;
        }

        $universidad = new Carreras($this->adapter);
        $universidad->setId($id);
        $universidad->setNombre($_POST["nombre"]);
     

        if($universidad->save())
        {
            $this->message->success('carrera guardada');    
        }
        else{
            $this->message->warning('Existe un error en la información');   
        }        

        $this->redirect('Parameters');
        
    }

    public function editU(){
        $universidad = new Universidades($this->adapter);
        $universidades = $universidad->getAll();
        $euniversidad = $universidad->getById($_GET["id"]);
        $carrera = new Carreras($this->adapter);
        $carreras = $carrera->getAll();
        $config = new Config($this->adapter);
        $config = $config->getById(1);
        //print_r($eusuario);
        
        $this->view("Parameters",array("euniversidad"=>$euniversidad->nombre,"universidades"=>$universidades,"carreras"=>$carreras,"editU"=>"yes","config"=>$config));
        
    }

    public function editC(){
        $universidad = new Universidades($this->adapter);
        $universidades = $universidad->getAll();
        
        $carrera = new Carreras($this->adapter);
        $carreras = $carrera->getAll();
        $ecarrera = $carrera->getById($_GET["id"]);
        $config = new Config($this->adapter);
        $config = $config->getById(1);
        //print_r($eusuario);
        
        $this->view("Parameters",array("ecarrera"=>$ecarrera,"universidades"=>$universidades,"carreras"=>$carreras,"editC"=>"yes","config"=>$config));
           
    }

    public function deleteU(){
        $universidad = new Universidades($this->adapter);
        if($universidad->deleteById($_GET['id']))
        {
            $this->message->success('Universidad eliminada');    
        }
        else{
            $this->message->warning('Sucede un error');   
        }
        $this->redirect('Parameters');              
    }

    public function deleteC(){
        $carrera = new Carreras($this->adapter);
        if($carrera->deleteById($_GET['id']))
        {
            $this->message->success('Universidad eliminada');    
        }
        else{
            $this->message->warning('Sucede un error');   
        }
        $this->redirect('Parameters');                
    }

    public function updateU(){
        
        print_r($_POST);

        $universidad = new Universidades($this->adapter);
        $universidad->setId($_POST["id"]);
        $universidad->setNombre($_POST["nombreu"]);
        
        if($universidad->update())
        {
            $this->message->info('Universidad Actualizada');    
        }
        else{
            $this->message->warning('Sucede un error');   
        }        

        //$this->redirect('Parameters');
        
    }
     
    public function updateC(){

        //print_r($_POST);

        $carrera = new Carreras($this->adapter);
        $carrera->setId($_POST["id"]);
        $carrera->setNombre($_POST["nombreca"]);
        
        if($carrera->update())
        {
            $this->message->info('Carrera Actualizada');    
        }
        else{
            $this->message->warning('Sucede un error');   
        }        

        $this->redirect('Parameters');
    }

    public function Config()
    {
        $preguntas = new Preguntas($this->adapter);
        $preguntas = $preguntas->getAll();
        $config = new Config($this->adapter);
        $config->setId(1);
        $config->setTiempo($_POST["tiempo"]);
        $config->setCantidad($_POST["cantidad"]);

        if($_POST["cantidad"] > count($preguntas))
        {
            $this->message->warning('No tiene las suficientes preguntas');
            return $this->redirect('Parameters');
        }
        
        if($config->update())
        {
            $this->message->info('Configuración Actualizada');    
        }
        else{
            $this->message->warning('Sucede un error');   
        }        

        $this->redirect('Parameters');
    }
 
}