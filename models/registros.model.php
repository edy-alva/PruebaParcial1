<?php
//TODO: Clase de Registros
require_once('../config/config.php');
class Registros
{
    //TODO: Implementar los metodos de la clase

    public function todos() 
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `registros`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($id_registro) 
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `registros` WHERE `id_registro`=$id_registro";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($fecha, $estado, $id_asistente, $id_conferencia) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `registros`(
            `fecha`, `estado`, `id_asistente`, `id_conferencia`
            ) 
            VALUES (
            '$fecha', '$estado', '$id_asistente', '$id_conferencia'
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
    public function actualizar($id_registro, $fecha, $estado, $id_asistente, $id_conferencia) 
    {
        try {
            $con = new ClaseConectar($id_registro);
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `registros` SET 
             `fecha`='$fecha', `estado`='$estado', `id_asistente`='$id_asistente', `id_conferencia`='$id_conferencia'
            WHERE `id_registro` = $id_registro";
            if (mysqli_query($con, $cadena)) {
                return $id_registro;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($id_registro) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `registros` WHERE `id_registro`= $id_registro";
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