<?php

/**
* 
*/
class controlador {
	
	private $negocio;

    // Constructor de la clase
    public function __construct() {
        $this->negocio = new negocio();
    }

    public function generarPlantilla() {
        return negocio::generarPlantilla();
    }

    public function generarVista() {

        $enlace = filter_input(INPUT_GET, "ubicacion");
        if ($enlace) {
            $enlace = $this->negocio->generarEnlace($enlace);
        } else {
            $enlace = $this->negocio->generarEnlace("Inicio");
        }
        include_once $enlace;
    }

    public function ingresarGoogleControlador($UsuarioDTO){
        return $this->negocio->ingresarGoogleNegocio($UsuarioDTO);
    }

    public function actualizarUsuarioControlador($id,$UsuarioDTO){
        return $this->negocio->actualizarUsuarioNegocio($id,$UsuarioDTO);
    }
	
}

?>