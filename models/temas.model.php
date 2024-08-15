<?php
//TODO: Clase de Temas
require_once('../config/config.php');
class Temas
{
    //TODO: Implementar los metodos de la clase

    public function todos() 
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `temas`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($id_tema) 
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `temas` WHERE `id_tema`=$id_tema";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($descripcion) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `temas`(
            `descripcion`
            ) 
            VALUES (
            '$descripcion'
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
    public function actualizar($id_tema, $descripcion) 
    {
        try {
            $con = new ClaseConectar($id_tema);
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `temas` SET 
             `descripcion`='$descripcion'
            WHERE `id_tema` = $id_tema";
            if (mysqli_query($con, $cadena)) {
                return $id_tema;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($id_tema) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `temas` WHERE `id_tema`= $id_tema";
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