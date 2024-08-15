<?php
//TODO: Clase de Expositores
require_once('../config/config.php');
class Expositores
{
    //TODO: Implementar los metodos de la clase

    public function todos() 
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `expositores`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($id_expositor) 
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `expositores` WHERE `id_expositor`=$id_expositor";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombre, $titulo, $cargo) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `expositores`(
            `nombre`, `titulo`, `cargo`
            ) 
            VALUES (
            '$nombre', '$titulo', '$cargo'
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
    public function actualizar($id_expositor, $nombre, $titulo, $cargo) 
    {
        try {
            $con = new ClaseConectar($id_expositor);
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `expositores` SET 
             `nombre`='$nombre', `titulo`='$titulo', `cargo`='$cargo' 
            WHERE `id_expositor` = $id_expositor";
            if (mysqli_query($con, $cadena)) {
                return $id_expositor;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($id_expositor) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `expositores` WHERE `id_expositor`= $id_expositor";
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