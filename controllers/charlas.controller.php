<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];

if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de CHARLAS
require_once('../models/charlas.model.php');
//error_reporting(0);
$charlas = new Charlas;

switch ($_GET["op"]) {
        //TODO: operaciones de charlas

    case 'todos': //TODO: Procedimiento para cargar todos los datos del charla
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase charlas.model.php
        $datos = $charlas->todos(); // Llamo al metodo todos de la clase charlas.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticion para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno': //TODO: procedimiento para obtener un registro de la base de datos
        $id_charla = $_POST["id_charla"];
        $datos = array();
        $datos = $charlas->uno($id_charla);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        
    case 'insertar':  //TODO: Procedimiento para insertar un charla en la base de datos
        $fecha = $_POST["fecha"];
        $hora_inicio = $_POST["hora_inicio"];
        $duracion = $_POST["duracion"];
        $id_conferencia = $_POST["id_conferencia"];
        $id_tema = $_POST["id_tema"];
        $id_expositor = $_POST["id_expositor"];
        $datos = array();
        $datos = $charlas->insertar($fecha, $hora_inicio, $duracion, $id_conferencia, $id_tema, $id_expositor);
        echo json_encode($datos);
        break;
        
    case 'actualizar':  //TODO: Procedimiento para actualizar un Charla en la base de datos
        $id_charla = $_POST["id_charla"];
        $fecha = $_POST["fecha"];
        $hora_inicio = $_POST["hora_inicio"];
        $duracion = $_POST["duracion"];
        $id_conferencia = $_POST["id_conferencia"];
        $id_tema = $_POST["id_tema"];
        $id_expositor = $_POST["id_expositor"];
        $datos = array();
        $datos = $charlas->actualizar($id_charla, $fecha, $hora_inicio, $duracion, $id_conferencia, $id_tema, $id_expositor);
        echo json_encode($datos);
        break;
        
    case 'eliminar': //TODO: Procedimiento para eliminar un charla en la base de datos
        $id_charla = $_POST["id_charla"];
        $datos = array();
        $datos = $charlas->eliminar($id_charla);
        echo json_encode($datos);
        break;
}