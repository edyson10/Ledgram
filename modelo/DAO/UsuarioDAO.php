<?php

class UsuarioDAO{

    function ingresarGoogle($UsuarioDTO){
        $exito = false;
        try{
            $nombre = $UsuarioDTO->getNombre();
            $correo = $UsuarioDTO->getCorreo();
            $foto = $UsuarioDTO->getFoto();
            $usuario = $UsuarioDTO->getUsuario();

            $conexion = Conexion::crearConexion();
            $consulta = $conexion->prepare("SELECT id AS id FROM usuario WHERE correo = ?");
            $consulta->bindParam(1,$correo,PDO::PARAM_STR);
            $consulta->execute();
            $existe = $consulta->rowCount();
            $respuesta = $consulta->fetch();
            if($existe>0){
                $UsuarioDTO->setId($respuesta['id']);
                session_start();
                $_SESSION['Usuario'] = serialize($UsuarioDTO);
                $exito=true;
            }else{
                $consulta2 = $conexion->prepare("INSERT INTO usuario (nombre,correo,usuario,foto) VALUES (?,?,?,?)");
                $consulta2->bindParam(1,$nombre,PDO::PARAM_STR);
                $consulta2->bindParam(2,$correo,PDO::PARAM_STR);
                $consulta2->bindParam(3,$usuario,PDO::PARAM_STR);
                $consulta2->bindParam(4,$foto,PDO::PARAM_STR);
                $consulta2->execute();

                $consulta3 = $conexion->prepare("SELECT id AS id FROM usuario WHERE correo = ?");
                $consulta3->bindParam(1,$correo,PDO::PARAM_STR);
                $consulta3->execute();
                $respuesta2 = $consulta3->fetch();
                $UsuarioDTO->setId($respuesta2['id']);
                session_start();
                $_SESSION['Usuario'] = serialize($UsuarioDTO);
                $exito=true;
            }
        }catch(Exception $exc){
            throw new Exception("Ocurrio un error" . $exc->getTraceAsString());
        }
        return $exito;
    }

    function actualizarUsuario($id,$UsuarioDTO){
        $exito = false;
        try
        {
            $nombre = $UsuarioDTO->getNombre();
            $correo = $UsuarioDTO->getCorreo();
            $usuario = $UsuarioDTO->getUsuario();
            $conexion = Conexion::crearConexion();
            $consulta = $conexion->prepare("UPDATE usuario SET nombre=? , correo=?, usuario=? WHERE id = ?;");
            $consulta->bindParam(1,$nombre,PDO::PARAM_STR);
            $consulta->bindParam(2,$correo,PDO::PARAM_STR);
            $consulta->bindParam(3,$usuario,PDO::PARAM_STR);
            $consulta->bindParam(4,$id,PDO::PARAM_INT); 
            $exito = $consulta->execute();
        }catch(Exception $exc)
        {
            throw new Exception("Ocurrio un error".$exc->getTraceAsString());
        }
        return $exito;
    }
    
}

?>