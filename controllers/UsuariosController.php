<?php



class UsuariosController extends ControladorBase{
     
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
       
        $usuarios = new Usuarios($this->adapter);

        $usuarios = $usuarios->getAll();

        $modeluser = new UsuariosModel($this->adapter);

        foreach($usuarios as $usuario)
        {
            $usuario->universidad = $modeluser->universidad_relation($usuario->universidad);
            $usuario->carrera = $modeluser->carrera_relation($usuario->carrera);
        }

        $carrera = new Carreras($this->adapter);
        $carreras = $carrera->getAll();
        $universidad = new Universidades($this->adapter);
        $universidades = $universidad->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("Usuarios",array("usuarios"=>$usuarios,"universidades"=>$universidades,"carreras"=>$carreras));
    }

    public function create(){
    	//print_r($_POST);

        //return '';     
 
        // Display the messages
        //$this->message->display();           

        $usersql = new UsuariosModel($this->adapter);

        $sql = $usersql->ejecutarSql("select max(id) as max from usuarios");          

        if($sql->max == null)
        {
            $id=1;
        }
        else{
            $id = 1+$sql->max;
        }

        $usuario = new Usuarios($this->adapter);
        $usuario->setId($id);
    	$usuario->setNombre($_POST["nusuario"]);
    	$usuario->setCodigo($_POST["cusuario"]);
        $usuario->setEdad($_POST["eusuario"]);
        $usuario->setGenero($_POST["gusuario"]);
        $usuario->setUniversidad($_POST["uusuario"]);
        $usuario->setCarrera($_POST["causuario"]);
        $usuario->setEstrato($_POST["esusuario"]);

    	if($usuario->save())
        {
            $this->message->success('Usuario guardado');    
        }
        else{
            $this->message->warning('Existe un error en la información');   
        }        

    	$this->redirect('Usuarios');
    	
    }

    public function edit(){
        //echo $_GET['id'];
        $usuario = new Usuarios($this->adapter);
        $usuarios = $usuario->getAll();
        $modeluser = new UsuariosModel($this->adapter);

        foreach($usuarios as $user)
        {
            $user->universidad = $modeluser->universidad_relation($user->universidad);
            $user->carrera = $modeluser->carrera_relation($user->carrera);
        }

        $eusuario = $usuario->getById($_GET["id"]);
        $carrera = new Carreras($this->adapter);
        $carreras = $carrera->getAll();
        $universidad = new Universidades($this->adapter);
        $universidades = $universidad->getAll();
        //print_r($eusuario);
        
        $this->view("Usuarios",array("eusuario"=>$eusuario,"usuarios"=>$usuarios,"edit"=>"yes","carreras"=>$carreras,"universidades"=>$universidades));

    }

    public function delete(){
        //echo $_GET['id'];
        $usuario = new Usuarios($this->adapter);
        if($usuario->deleteById($_GET['id']))
        {
           // $usersql = new UsuariosModel($this->adapter);
            //$usersql->ejecutarSql("DELETE FROM prueba1 WHERE usuario =".$_GET['id']); 
            
            $this->message->success('Usuario eliminado');    
        }
        else{
            $this->message->warning('Sucede un error');   
        }
        $this->redirect('Usuarios');             
    }

    public function update(){

        $usuario = new Usuarios($this->adapter);
        $usuario->setId($_POST["id"]);
        $usuario->setNombre($_POST["nombre"]);
        $usuario->setCodigo($_POST["codigo"]);
        $usuario->setEdad($_POST["edad"]);
        $usuario->setGenero($_POST["genero"]);
        $usuario->setUniversidad($_POST["universidad"]);
        $usuario->setCarrera($_POST["carrera"]);
        $usuario->setEstrato($_POST["estrato"]);

        if($usuario->update())
        {
            $this->message->info('Usuario Actualizado');    
        }
        else{
            $this->message->warning('Sucede un error');   
        }        

        $this->redirect('Usuarios');
    }
     
    
 
}