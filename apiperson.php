<?php

include_once 'Persona.php';

class ApiPerson{
    
    function getAll(){
        $persona = new Persona();

        $personas = array();

        $personas['items'] = array();

        $response = $persona->obtenerPersonas();

        if($response->rowCount()){
            while($row = $response->fetch(PDO::FETCH_ASSOC)){
                    $item =array(
                        "nombre" => $row['nombre'],
                        "ApellidoPaterno" => $row['ApellidoPaterno'],
                        "ApellidoMaterno" => $row['ApellidoMaterno'],
                        "edad" => $row["edad"],


                    );
                    array_push($personas,$item);
            }

            $this->PrintJson($personas);


        }
        
        else{
           $this->Error("No hay personas registradas");
        }
    }//fin función getAll


    function getById($id){
        $persona = new Persona();

        $personas = array();

        $personas['items'] = array();

        $response = $persona->obtenerPersona($id);

        if($response->rowCount()){
            while($row = $response->fetch(PDO::FETCH_ASSOC)){
                    $item =array(
                        "nombre" => $row['nombre'],
                        "ApellidoPaterno" => $row['ApellidoPaterno'],
                        "ApellidoMaterno" => $row['ApellidoMaterno'],
                        "edad" => $row["edad"],


                    );
                    array_push($personas,$item);
            }

            $this->PrintJson($personas);


        }
        
        else{
           $this->Error("No existe persona registrada con el id " .$id);
        }
    }//fin función getById



     
     


    function PrintJson($array){
        echo "<code>" . json_encode($array) . "</code>";
    }

    function Error($mensaje){
        echo "<code>" . json_encode(array("mensaje" => $mensaje)) . "</code>";

    }

}
