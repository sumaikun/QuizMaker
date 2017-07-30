<?php
class Prueba2 extends EntidadBase{
    private $id;    
    private $respuesta1;
    private $respuesta2;
    private $respuesta3;
    private $usuario;   
    private $pregunta;

    public function __construct($adapter) {
        $table="Prueba2";
        parent::__construct($table, $adapter);
    }
     
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
    }
     
 
    public function getRespuesta1() {
        return $this->respuesta1;
    }
 
    public function setRespuesta1($respuesta) {
        $this->respuesta1 = $respuesta;
    }

    public function getRespuesta2() {
        return $this->respuesta2;
    }
 
    public function setRespuesta2($respuesta) {
        $this->respuesta2 = $respuesta;
    }

    public function getRespuesta3() {
        return $this->respuesta3;
    }
 
    public function setRespuesta3($respuesta) {
        $this->respuesta3 = $respuesta;
    }

    public function getPregunta() {
        return $this->pregunta;
    }
 
    public function setPregunta($pregunta) {
        $this->pregunta = $pregunta;
    }

    public function getUsuario() {
        return $this->usuario;
    }
 
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
 
    public function save(){
        
        $query="INSERT INTO Prueba2 (id,respuesta1,respuesta2,respuesta3,pregunta,usuario)
                VALUES(".$this->id.",
                       '".$this->respuesta1."',
                       '".$this->respuesta2."',
                       '".$this->respuesta3."',
                       '".$this->pregunta."',
                       '".$this->usuario."'
                       );";
        echo $query;
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

    public function update(){
        
        $query="UPDATE Prueba2 SET  respuesta1 = '".$this->respuesta1."',respuesta2 = '".$this->respuesta2."', respuesta3 = '".$this->respuesta3."', pregunta = '".$this->pregunta."', usuario = '".$this->usuario."'    WHERE id = ".$this->id." ";
        echo $query;
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

    
 
}
?>