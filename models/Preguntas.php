<?php
class Preguntas extends EntidadBase{
    private $id;
    private $titulo;
    private $imagen;
   
     
    public function __construct($adapter) {
        $table="preguntas";
        parent::__construct($table, $adapter);
    }
     
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
    }
     
    public function getTitulo() {
        return $this->titulo;
    }
 
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
 
    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
         $this->imagen = $imagen;
    } 
    
 
    public function save(){
        
        $query="INSERT INTO preguntas (id,titulo,imagen)
                VALUES(".$this->id.",
                       '".$this->titulo."',
                       '".$this->imagen."'
                       );";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

    public function update(){
        
        $query="UPDATE preguntas SET titulo = '".$this->titulo."', imagen = '".$this->imagen."' WHERE id = ".$this->id." ";
        //echo $query;
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

    
 
}
?>