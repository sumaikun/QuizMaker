<?php
class UsuariosModel extends ModeloBase{
    private $table;
     
    public function __construct($adapter){
        $this->table="usuarios";
        parent::__construct($this->table, $adapter);
    }
    //Metodos de consulta
    public function getUnUsuario($codigo){
        $query="SELECT * FROM usuarios WHERE codigo= ".$codigo;
        $usuario=$this->ejecutarSql($query);
        //print_r($usuario);
        if(isset($usuario->id))
        {return $usuario;}
        else{return null;}
        
    }

     public function universidad_relation($foid)
   {

        $sql = $this->ejecutarSql("select nombre from universidades where id = ".$foid);  
        return $sql->nombre;
   }

   public function carrera_relation($foid)
   {

        $sql = $this->ejecutarSql("select nombre from carreras where id = ".$foid);  
        return $sql->nombre;
   }
}
?>