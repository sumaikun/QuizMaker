<?php
class Prueba1 extends EntidadBase{
    private $id;
    private $texto;
    private $respuesta;
    private $usuario;   
    private $pregunta;

    public function __construct($adapter) {
        $table="Prueba1";
        parent::__construct($table, $adapter);
    }
     
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
    }
     
    public function getTexto() {
        return $this->texto;
    }
 
    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function getRespuesta() {
        return $this->respuesta;
    }
 
    public function setRespuesta($respuesta) {
        $this->respuesta = $respuesta;
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
        
        $query="INSERT INTO Prueba1 (id,texto,respuesta,pregunta,usuario)
                VALUES(".$this->id.",
                       '".$this->texto."',
                       '".$this->respuesta."',
                       '".$this->pregunta."',
                       '".$this->usuario."'
                       );";
        echo $query;
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

    public function update(){
        
        $query="UPDATE Prueba1 SET texto = '".$this->texto."', respuesta = '".$this->respuesta."', pregunta = '".$this->pregunta."', usuario = '".$this->usuario."'    WHERE id = ".$this->id." ";
        echo $query;
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

    
 
}
?>