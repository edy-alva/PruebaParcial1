<?php
//TODO: Clase de Conferencias
require_once('../config/config.php');
class Conferencias
{
    //TODO: Implementar los metodos de la clase

    public function todos() 
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `conferencias`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($id_conferencia) 
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `conferencias` WHERE `id_conferencia`=$id_conferencia";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombre, $fecha_inicio, $ubicacion, $descripcion, $organizador, $costo, $estado) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `conferencias`(
            `nombre`, `fecha_inicio`, `ubicacion`, `descripcion`, `organizador`, `costo`, `estado`
            ) 
            VALUES (
            '$nombre', '$fecha_inicio', '$ubicacion', '$descripcion', '$organizador', '$costo', '$estado'
            )";  
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($id_conferencia, $nombre, $fecha_inicio, $ubicacion, $descripcion, $organizador, $costo, $estado) 
    {
        try {
            $con = new ClaseConectar($id_conferencia);
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `conferencias` SET 
             `nombre`='$nombre', `fecha_inicio`='$fecha_inicio', `ubicacion`='$ubicacion', `descripcion`='$descripcion',
             `organizador`='$organizador', `costo`='$costo', `estado`='$estado' 
            WHERE `id_conferencia` = $id_conferencia";
            if (mysqli_query($con, $cadena)) {
                return $id_conferencia;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($id_conferencia) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `conferencias` WHERE `id_conferencia`= $id_conferencia";
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}