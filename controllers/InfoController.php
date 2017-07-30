<?php



class InfoController extends ControladorBase{
     
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
       //$this->view("Info");
       $prueba1Model = new Prueba1($this->adapter);
       $prueba1 = $prueba1Model->getBy('usuario',$_GET['id']);
       $prueba2Model = new Prueba2($this->adapter);
       $prueba2 = $prueba2Model->getBy('usuario',$_GET['id']);
       $this->view("Info",array("prueba1"=>$prueba1,"prueba2"=>$prueba2));        
    }

   
    
     
    
 
}