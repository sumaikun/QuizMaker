<?php
class ModeloBase extends EntidadBase{
    private $table;
    private $fluent;
     
    public function __construct($table, $adapter) {
        $this->table=(string) $table;
        parent::__construct($table, $adapter);
         
        //$this->fluent=$this->getConetar()->startFluent();
    }
     
    /*public function fluent(){
        return $this->fluent;
    } laravel query builder*/
     
    public function ejecutarSql($query){
        $query=$this->db()->query($query);
        if($query==true){
            if($query->num_rows>1){
                while($row = $query->fetch_object()) {
                   $resultSet[]=$row;
                }
            }elseif($query->num_rows==1){
                if($row = $query->fetch_object()) {
                    $resultSet=$row;
                }
            }else{
                $resultSet=null;
            }
        }else{
            $resultSet=false;
        }
         
        return $resultSet;
    }


    //Aqui podemos montarnos métodos para los modelos de consulta
     
}
?>