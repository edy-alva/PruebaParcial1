<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];

if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de TEMAS
require_once('../models/temas.model.php');
//error_reporting(0);
$temas = new Temas;

switch ($_GET["op"]) {
        //TODO: operaciones de temas

    case 'todos': //TODO: Procedimiento para cargar todos los datos del tema
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase temas.model.php
        $datos = $temas->todos(); // Llamo al metodo todos de la clase temas.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticion para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno': //TODO: procedimiento para obtener un registro de la base de datos
        $id_tema = $_POST["id_tema"];
        $datos = array();
        $datos = $temas->uno($id_tema);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        
    case 'insertar':  //TODO: Procedimiento para insertar un tema en la base de datos
        $descripcion = $_POST["descripcion"];
        $datos = array();
        $datos = $temas->insertar($descripcion);
        echo json_encode($datos);
        break;
        
    case 'actualizar':  //TODO: Procedimiento para actualizar un Tema en la base de datos
        $id_tema = $_POST["id_tema"];
        $descripcion = $_POST["descripcion"];
        $datos = array();
        $datos = $temas->actualizar($id_tema, $descripcion);
        echo json_encode($datos);
        break;
        
    case 'eliminar': //TODO: Procedimiento para eliminar un tema en la base de datos
        $id_tema = $_POST["id_tema"];
        $datos = array();
        $datos = $temas->eliminar($id_tema);
        echo json_encode($datos);
        break;
}