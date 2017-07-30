<?php
class Usuarios extends EntidadBase{
    private $id;
    private $nombre;
    private $codigo;
    private $edad;
    private $genero;
    private $universidad;
    private $carrera;
    private $estrato;
   
     
    public function __construct($adapter) {
        $table="usuarios";
        parent::__construct($table, $adapter);
    }
     
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
    }
     
    public function getNombre() {
        return $this->nombre;
    }
 
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
 
    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
         $this->codigo = $codigo;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function setEdad($edad) {
         $this->edad = $edad;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function setGenero($genero) {
         $this->genero = $genero;
    }

    public function getUniversidad() {
        return $this->universidad;
    }

    public function setUniversidad($universidad) {
         $this->universidad = $universidad;
    }

    public function getCarrera() {
        return $this->carrera;
    }

    public function setCarrera($carrera) {
         $this->carrera = $carrera;
    }

    public function getEstrato() {
        return $this->estrato;
    }

    public function setEstrato($estrato) {
         $this->estrato = $estrato;
    } 
    
 
    public function save(){
        
        $query="INSERT INTO usuarios (id,nombre,codigo,edad,genero,carrera,universidad,estrato)
                VALUES(".$this->id.",
                       '".$this->nombre."',
                       '".$this->codigo."',
                       '".$this->edad."',
                       '".$this->genero."',
                       '".$this->carrera."',
                       '".$this->universidad."',
                       '".$this->estrato."'
                       );";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

    public function update(){
        
        $query="UPDATE usuarios SET nombre = '".$this->nombre."', codigo = '".$this->codigo."', edad = '".$this->edad."', genero = '".$this->genero."', carrera = '".$this->carrera."', universidad = '".$this->universidad."', estrato = '".$this->estrato."' WHERE id = ".$this->id." ";
        //echo $query;
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

  

    
 
}
?>