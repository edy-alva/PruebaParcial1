<?php
//TODO: Clase de Asistentes
require_once('../config/config.php');
class Asistentes
{
    //TODO: Implementar los metodos de la clase

    public function todos() 
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `asistentes`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($id_asistente) 
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `asistentes` WHERE `id_asistente`=$id_asistente";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombre, $apellido, $email, $telefono) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `asistentes`(`nombre`, `apellido`, `email`, `telefono`) 
            VALUES (
            '$nombre', '$apellido', '$email', '$telefono'
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
    public function actualizar($id_asistente, $nombre, $apellido, $email, $telefono) 
    {
        try {
            $con = new ClaseConectar($id_asistente);
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `asistentes` SET 
            `nombre`='$nombre',`apellido`='$apellido',`email`='$email',`telefono`='$telefono'  
            WHERE `id_asistente` = $id_asistente";
            if (mysqli_query($con, $cadena)) {
                return $id_asistente;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($id_asistente) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `asistentes` WHERE `id_asistente`= $id_asistente";
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