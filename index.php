<?php

include_once "apiperson.php";

$obj_person = new apiperson();

if(isset($_GET['id'])){
     $id = $_GET['id'];

    if(is_numeric($id)){
        $obj_person->getById($id);
    }else{
        $obj_person->Error("NO EXISTE PERSONA CON ESE ID");
    }
}else{
    $obj_person->getAll();
}


?>






