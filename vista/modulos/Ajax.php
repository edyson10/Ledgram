<?php

require_once '../../controlador/controlador.php';
require_once '../../modelo/negocio.php';
require_once '../../modelo/DTO/UsuarioDTO.php';
require_once '../../modelo/DAO/UsuarioDAO.php';
require_once '../../modelo/Conexion.php';

class Ajax
{

    public function obtenerControlador()
    {
        $controlador = new Controlador();
        return $controlador;
    }

    public function ingresarGoogle($nombre,$correo,$usuario,$foto){

        $exito = false;
        try{

            $UsuarioDTO = new UsuarioDTO($nombre,$correo,$foto,$usuario);
            $controlador = $this->obtenerControlador();
            $exito = $controlador->ingresarGoogleControlador($UsuarioDTO);
        }catch(Exception $exc){
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));       
        }

        if ($exito) {
            echo json_encode(array("exito" => true));
        } else {
            echo json_encode(array("exito" => false, "error" => "No se pudo loguear el Usuario"));
        }
    }

    public function actualizarUsuario($id,$nombre,$correo,$usuario){
        $exito = false;
        try 
        {
            $controlador = $this->obtenerControlador();
            $UsuarioDTO = new UsuarioDTO($nombre, $correo, $usuario, NULL);
            $exito = $controlador->actualizarUsuarioControlador($id,$UsuarioDTO);
        } catch (Exception $exc) {
            echo json_encode(array("exito" => false, "error" => $exc->getMessage()));
        }

        if ($exito) 
        {
            session_start();
            $usuario = unserialize($_SESSION['Usuario']);
            $usuario->setNombre($nombre);
            $usuario->setCorreo($correo);
            $usuario->setUsuario($usuario);
            $_SESSION['Usuario'] = serialize($usuario);
                echo json_encode(array("exito" => true));
        } else {
                echo json_encode(array("exito" => false, "error" => "No se encuentra el Usuario"));
        }
    }

}

$ajax = new Ajax();

$ingresarGoogle = isset($_POST['nombreGoogle'],$_POST['correoGoogle'],$_POST['usuarioGoogle'],$_POST['fotoGoogle']);
$actualizarUsuario = isset($_POST['actualizarId'],$_POST['actualizarNombres'], $_POST['actualizarCorreo'], $_POST['actualizarUsuario']);

if($ingresarGoogle){
    $ajax->ingresarGoogle($_POST['nombreGoogle'],$_POST['correoGoogle'],$_POST['usuarioGoogle'],$_POST['fotoGoogle']);
}else if($actualizarUsuario){
    $ajax->actualizarUsuario($_POST['actualizarId'],$_POST['actualizarNombres'], $_POST['actualizarCorreo'], $_POST['actualizarUsuario']);
}
?>
 