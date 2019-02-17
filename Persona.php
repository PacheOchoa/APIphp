<?php

include_once "Conexion.php";

class Persona extends Conexion{
     
   function obtenerPersonas(){
       
       $sql = $this->connect()->query('select * from personas');
     
       return $sql; 

      
      

   }

   function obtenerPersona($id){
       $sql = $this->connect()->prepare("select * from personas where id=:id");

       $sql->execute(["id" =>$id]);

       return $sql;
   }

}