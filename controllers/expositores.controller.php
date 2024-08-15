<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];

if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de EXPOSITORES
require_once('../models/expositores.model.php');
//error_reporting(0);
$expositores = new Expositores;

switch ($_GET["op"]) {
        //TODO: operaciones de expositores

    case 'todos': //TODO: Procedimiento para cargar todos los datos del expositor
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase expositores.model.php
        $datos = $expositores->todos(); // Llamo al metodo todos de la clase expositores.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticion para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno': //TODO: procedimiento para obtener un registro de la base de datos
        $id_expositor = $_POST["id_expositor"];
        $datos = array();
        $datos = $expositores->uno($id_expositor);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        
    case 'insertar':  //TODO: Procedimiento para insertar un expositor en la base de datos
        $nombre = $_POST["nombre"];
        $titulo = $_POST["titulo"];
        $cargo = $_POST["cargo"];
        $datos = array();
        $datos = $expositores->insertar($nombre, $titulo, $cargo);
        echo json_encode($datos);
        break;
        
    case 'actualizar':  //TODO: Procedimiento para actualizar un Expositor en la base de datos
        $id_expositor = $_POST["id_expositor"];
        $nombre = $_POST["nombre"];
        $titulo = $_POST["titulo"];
        $cargo = $_POST["cargo"];
        $datos = array();
        $datos = $expositores->actualizar($id_expositor, $nombre, $titulo, $cargo);
        echo json_encode($datos);
        break;
        
    case 'eliminar': //TODO: Procedimiento para eliminar un expositor en la base de datos
        $id_expositor = $_POST["id_expositor"];
        $datos = array();
        $datos = $expositores->eliminar($id_expositor);
        echo json_encode($datos);
        break;
}