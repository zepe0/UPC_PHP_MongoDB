<?php
declare(strict_types=1);

require '../vendor/autoload.php';

// Creo un alias del namespace
use MongoDB\Client as Mongo;

// Crea una instancia del driver MongoDB
$mongo= new Mongo("mongodb://localhost:27017");

//seleccionar
$db = $mongo->db; 
function colecion( string $newColecion) : string {

    $coleccion = $db->createCollection("mi_coleccion");
    
    echo "Coleccion Creada Exitosamente";
}
 //#Insertar
function insertar(sting $newColecion, array $data): string {

    $mongo= new Mongo("mongodb://localhost:27017");
    $db = $mongo->db; 
    $coleccion = $db->$newColecion;

    $coleccion->insertOne($data);

    echo "Documento insertado";
}


function actualizar(string $selec_coleccion, array $filtro, array $actualizar) : string  {
    $mongo= new Mongo("mongodb://localhost:27017");
    $db = $mongo->db; 
    $coleccion = $db->$selec_coleccion;
    $fo =$coleccion->updateOne($filtro, ['$set' => $actualizar]);

    $response = [];
    if ($fo->getMatchedCount() > 0) {
        $response["msn"] = "Modificado";
    } else {
        $response["msn"] = "sin resultado";
    }
 
    return json_encode($response);
     

}

   actualizar("mi_coleccion", ["titulo" => "as"],["titulo" => "asdasdas"]);