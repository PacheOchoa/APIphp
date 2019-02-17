<?php

include_once "apiperson.php";

$obj =  new ApiPerson();

$item = array(
    "nombre" => spanish_utf8($_POST['nombre']),
    "ApellidoPaterno" => spanish_utf8($_POST['ApellidoPaterno']),
    "ApellidoMaterno" => spanish_utf8($_POST['ApellidoMaterno']),
    "edad" => spanish_utf8($_POST['edad']),
    
);

function spanish_utf8($var){

    return utf8_encode($var);
}

$obj->add($item);

header("refresh:3;url=index.php");



?>