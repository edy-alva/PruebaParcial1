<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];

if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de REGISTROS
require_once('../models/registros.model.php');
//error_reporting(0);
$registros = new Registros;

switch ($_GET["op"]) {
        //TODO: operaciones de registros

    case 'todos': //TODO: Procedimiento para cargar todos los datos del registro
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase registros.model.php
        $datos = $registros->todos(); // Llamo al metodo todos de la clase registros.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticion para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno': //TODO: procedimiento para obtener un registro de la base de datos
        $id_registro = $_POST["id_registro"];
        $datos = array();
        $datos = $registros->uno($id_registro);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        
    case 'insertar':  //TODO: Procedimiento para insertar un registro en la base de datos
        $fecha = $_POST["fecha"];
        $estado = $_POST["estado"];
        $id_asistente = $_POST["id_asistente"];
        $id_conferencia = $_POST["id_conferencia"];
        $datos = array();
        $datos = $registros->insertar($fecha, $estado, $id_asistente, $id_conferencia);
        echo json_encode($datos);
        break;
        
    case 'actualizar':  //TODO: Procedimiento para actualizar un Registro en la base de datos
        $id_registro = $_POST["id_registro"];
        $fecha = $_POST["fecha"];
        $estado = $_POST["estado"];
        $id_asistente = $_POST["id_asistente"];
        $id_conferencia = $_POST["id_conferencia"];
        $datos = array();
        $datos = $registros->actualizar($id_registro, $fecha, $estado, $id_asistente, $id_conferencia);
        echo json_encode($datos);
        break;
        
    case 'eliminar': //TODO: Procedimiento para eliminar un registro en la base de datos
        $id_registro = $_POST["id_registro"];
        $datos = array();
        $datos = $registros->eliminar($id_registro);
        echo json_encode($datos);
        break;
}