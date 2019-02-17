<?php

include_once "Conexion.php";

class Persona extends Conexion{
     
   function obtenerPersonas(){
       
       $sql = $this->connect()->query('select * from personas');
     
       return $sql; 

      
      

   }

   function AgregarPersona($array){
    $sql = $this->connect()->prepare("insert into personas(nombre,ApellidoMaterno,ApellidoPaterno,edad
    ) VALUES(:nombre,:ApellidoPaterno,:ApellidoMaterno,:edad)");

    $sql->execute(["nombre" =>$array['nombre'],"ApellidoPaterno" =>$array['ApellidoPaterno'],"ApellidoMaterno" =>$array['ApellidoMaterno'],
    "edad" =>$array['edad']]);

    return $sql;
   }

   function obtenerPersona($id){
       $sql = $this->connect()->prepare("select * from personas where id=:id");

       $sql->execute(["id" =>$id]);

       return $sql;
   }

}