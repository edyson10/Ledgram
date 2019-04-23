<?php

class UsuarioDTO{

    private $id;
    private $nombre;
    private $correo;
    private $foto;
    private $usuario;

    function __construct($nombre,$correo,$foto,$usuario)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->foto = $foto;
        $this->usuario = $usuario;
    }

    function getId(){
        return $this->id;
    }

    function getNombre(){
        return $this->nombre;
    }

    function getCorreo(){
        return $this->correo;
    }

    function getFoto(){
        return $this->foto;
    }

    function getUsuario(){
        return $this->usuario;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function setCorreo($correo){
        $this->correo = $correo;
    }

    function setFoto($foto){
        $this->foto = $foto;
    }

    function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    
    function setId($id){
        $this->id = $id;
    }

}

?>