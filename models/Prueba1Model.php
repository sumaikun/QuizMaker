<?php
class Prueba1Model extends ModeloBase{
    private $table;
     
    public function __construct($adapter){
        $this->table="Prueba1";
        parent::__construct($this->table, $adapter);
    }
    //Metodos de consulta
    /*public function getUnUsuario(){
        $query="SELECT * FROM usuarios WHERE email='victor@victor.com'";
        $usuario=$this->ejecutarSql($query);
        return $usuario;
    }*/
}
?>