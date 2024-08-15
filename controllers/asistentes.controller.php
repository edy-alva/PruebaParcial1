<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];

if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de ASISTENTES
require_once('../models/asistentes.model.php');
//error_reporting(0);
$asistentes = new Asistentes;

switch ($_GET["op"]) {
        //TODO: operaciones de asistentes

    case 'todos': //TODO: Procedimiento para cargar todos los datos del asistente
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase asistentes.model.php
        $datos = $asistentes->todos(); // Llamo al metodo todos de la clase asistentes.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticion para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno': //TODO: procedimiento para obtener un registro de la base de datos
        $id_asistente = $_POST["id_asistente"];
        $datos = array();
        $datos = $asistentes->uno($id_asistente);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        
    case 'insertar':  //TODO: Procedimiento para insertar un asistente en la base de datos
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $datos = array();
        $datos = $asistentes->insertar($nombre, $apellido, $email, $telefono);
        echo json_encode($datos);
        break;
        
    case 'actualizar':  //TODO: Procedimiento para actualizar un Asistente en la base de datos
        $id_asistente = $_POST["id_asistente"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $datos = array();
        $datos = $asistentes->actualizar($id_asistente, $nombre, $apellido, $email, $telefono);
        echo json_encode($datos);
        break;
        
    case 'eliminar': //TODO: Procedimiento para eliminar un asistente en la base de datos
        $id_asistente = $_POST["id_asistente"];
        $datos = array();
        $datos = $asistentes->eliminar($id_asistente);
        echo json_encode($datos);
        break;
}