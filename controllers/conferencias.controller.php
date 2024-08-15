<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];

if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de CONFERENCIAS
require_once('../models/conferencias.model.php');
//error_reporting(0);
$conferencias = new Conferencias;

switch ($_GET["op"]) {
        //TODO: operaciones de conferencias

    case 'todos': //TODO: Procedimiento para cargar todos los datos del conferencia
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase conferencias.model.php
        $datos = $conferencias->todos(); // Llamo al metodo todos de la clase conferencias.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticion para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno': //TODO: procedimiento para obtener un registro de la base de datos
        $id_conferencia = $_POST["id_conferencia"];
        $datos = array();
        $datos = $conferencias->uno($id_conferencia);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        
    case 'insertar':  //TODO: Procedimiento para insertar un conferencia en la base de datos
        $nombre = $_POST["nombre"];
        $fecha_inicio = $_POST["fecha_inicio"];
        $ubicacion = $_POST["ubicacion"];
        $descripcion = $_POST["descripcion"];
        $organizador = $_POST["organizador"];
        $costo = $_POST["costo"];
        $estado = $_POST["estado"];
        $datos = array();
        $datos = $conferencias->insertar($nombre, $fecha_inicio, $ubicacion, $descripcion, $organizador, $costo, $estado);
        echo json_encode($datos);
        break;
        
    case 'actualizar':  //TODO: Procedimiento para actualizar un Conferencia en la base de datos
        $id_conferencia = $_POST["id_conferencia"];
        $nombre = $_POST["nombre"];
        $fecha_inicio = $_POST["fecha_inicio"];
        $ubicacion = $_POST["ubicacion"];
        $descripcion = $_POST["descripcion"];
        $organizador = $_POST["organizador"];
        $costo = $_POST["costo"];
        $estado = $_POST["estado"];
        $datos = array();
        $datos = $conferencias->actualizar($id_conferencia, $nombre, $fecha_inicio, $ubicacion, $descripcion, $organizador, $costo, $estado);
        echo json_encode($datos);
        break;
        
    case 'eliminar': //TODO: Procedimiento para eliminar un conferencia en la base de datos
        $id_conferencia = $_POST["id_conferencia"];
        $datos = array();
        $datos = $conferencias->eliminar($id_conferencia);
        echo json_encode($datos);
        break;
}