<?php 

class negocio {

public function generarPlantilla() {
    // Incluir Archivo a la ruta
    include 'vista/plantilla.php';
}

 // Metodo para obtener la pestaña seleccionada en el menú
    private function validarPestañaBarraDeNavegacion($pestaña) {
        
        $exito = false;
        $pestañas = array("Inicio","Informacion","Documentos","Proyectos","Galeria","Registro","Acceder","Salir", "Editar","file");
        if(in_array($pestaña, $pestañas)){
            $exito=true;
        }
        return $exito;
        
    }
    
    // Metodo para obtener la pestaña a redirigir 
    private function validarPestañaRedireccion($pestaña) {
        
        $exito=false;
        $pestañas = array("perfil","error","FuncionesAdmin");
        if(in_array($pestaña, $pestañas)){
            $exito=true;
        }
        return $exito;
        
    }
    
    public function generarEnlace($enlace) {
        
        if($this->validarPestañaBarraDeNavegacion($enlace)){
            return "vista/modulos/pestanas/" .$enlace. ".php";
        }else if($this->validarPestañaRedireccion($enlace)){
            return "vista/modulos/" .$enlace. ".php";
        }else{
            return "vista/modulos/pestanas/Inicio.php";
        }  
    }

    public function ingresarGoogleNegocio($UsuarioDTO){
        return UsuarioDAO::ingresarGoogle($UsuarioDTO);
    }

    public function actualizarUsuarioNegocio($id,$UsuarioDTO){
        return UsuarioDAO::actualizarUsuario($id,$UsuarioDTO);
    }

}
