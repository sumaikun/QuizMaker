<?php
class Config extends EntidadBase{
    private $id;
    private $tiempo;
    private $cantidad;
    

    public function __construct($adapter) {
        $table="Config";
        parent::__construct($table, $adapter);
    }
     
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
    }
     
    public function getTtiempo() {
        return $this->tiempo;
    }
 
    public function setTiempo($tiempo) {
        $this->tiempo = $tiempo;
    }

    public function getCantidad() {
        return $this->cantidad;
    }
 
    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    
 
    public function save(){
        
        $query="INSERT INTO Config (id,tiempo,cantidad)
                VALUES(".$this->id.",
                       '".$this->tiempo."',
                       '".$this->cantidad."'
                       );";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

    public function update(){
        
        $query="UPDATE Config SET tiempo = '".$this->tiempo."', cantidad = '".$this->cantidad."'  WHERE id = ".$this->id." ";
        //echo $query;
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

    
 
}
?>