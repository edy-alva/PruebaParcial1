<?php
//TODO: Clase de Charlas
require_once('../config/config.php');
class Charlas
{
    //TODO: Implementar los metodos de la clase

    public function todos() 
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `charlas`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($id_charla) 
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `charlas` WHERE `id_charla`=$id_charla";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($fecha, $hora_inicio, $duracion, $id_conferencia, $id_tema, $id_expositor) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `charlas`(
            `fecha`, `hora_inicio`, `duracion`, `id_conferencia`, `id_tema`, `id_expositor`
            ) VALUES (
            '$fecha', '$hora_inicio', '$duracion', '$id_conferencia', '$id_tema', '$id_expositor'
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
    public function actualizar($id_charla, $fecha, $hora_inicio, $duracion, $id_conferencia, $id_tema, $id_expositor) 
    {
        try {
            $con = new ClaseConectar($id_charla);
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `charlas` SET 
            `fecha`='$fecha', `hora_inicio`='$hora_inicio', `duracion`='$duracion', `id_conferencia`='$id_conferencia', 
            `id_tema`='$id_tema', `id_expositor`='$id_expositor'  
            WHERE `id_charla` = $id_charla";
            if (mysqli_query($con, $cadena)) {
                return $id_charla;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($id_charla) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `charlas` WHERE `id_charla`= $id_charla";
            echo $cadena;
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