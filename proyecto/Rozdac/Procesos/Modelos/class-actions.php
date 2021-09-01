<?php

class actions{
    public function showBusiness(){
        try{
            $rows = null;
            $modelo = new Conexion();
            $db = $modelo->get_conexion();
            $st = $db->prepare("SELECT * FROM negocio");
            $st->execute();

            while($result = $st->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }catch(PDOException $e){
            echo '{"error":{"text":'. $e->getMessage() .'}}'; 
        }
    }
    public function showUsers(){
        try{
            $rows = null;
            $modelo = new Conexion();
            $db = $modelo->get_conexion();
            $st = $db->prepare("SELECT * FROM user");
            $st->execute();

            while($result = $st->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }catch(PDOException $e){
            echo '{"error":{"text":'. $e->getMessage() .'}}'; 
        }
    }
} 

?>