<?php
class Universidades extends EntidadBase{
    private $id;
    private $nombre;
       
     
    public function __construct($adapter) {
        $table="universidades";
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
    
 
    public function save(){
        
        $query="INSERT INTO universidades (id,nombre)
                VALUES(".$this->id.",
                       '".$this->nombre."'
                       );";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

    public function update(){
        
        $query="UPDATE preguntas SET nombre = '".$this->nombre."' WHERE id = ".$this->id." ";
        //echo $query;
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

    
 
}
?>