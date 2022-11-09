<?php

include "Funciones//FuncionesPersonaje.php";

class ControladorPersonaje extends FuncionesPersonaje {
    
    function recibirSolicitud ($metodo, $parametro) {
        
        $nuevoParametro = urldecode($parametro[0]);
        
        if ($metodo === "DELETE") {
            
            if ($nuevoParametro === "usuario") {
                
                $valor = urldecode($parametro[1]);
                $usuario = json_decode($valor);
                $this->borrarRegistro($usuario);
            }
            
        } elseif ($metodo === "GET") {
            
            if ($nuevoParametro === "obtenerPersonajes") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->obtenerPersonajes($nuevoValor);
            
            } elseif ($nuevoParametro === "usuario") {
                
                $valor = urldecode($parametro[1]);
                $usuario = json_decode($valor);
                $this->iniciarSesion($usuario);
                
            } elseif ($nuevoParametro === "correoElectronico") {
                
                $valor = urldecode($parametro[1]);                
                $correoElectronico = json_decode($valor);
                $this->verificarUsuario($correoElectronico);
            } 
            
        } elseif ($metodo === "POST") {
            
            if ($nuevoParametro === "") {
               
                $this->corregirRetretato();
                
            } elseif ($nuevoParametro === "personaje") {
                
                $valor = urldecode($parametro[1]);
                $personaje = json_decode($valor);
                $this->registrarPersonaje($personaje);
            }
            
        } elseif ($metodo === "PUT") {
            
            if ($nuevoParametro === "nombre") {

                $valor = urldecode($parametro[1]);
                $nombre = json_decode($valor);
                $this->corregirNombre($nombre);
                
            } elseif ($nuevoParametro === "correoElectronico") {
                
                $valor = urldecode($parametro[1]);
                $correoElectronico = json_decode($valor);
                $this->corregirCorreoElectronico($correoElectronico);
                
            } elseif ($nuevoParametro === "contrasena") {
                
                $valor = urldecode($parametro[1]);                
                $contrasena = json_decode($valor);
                $this->corregirContrasena($contrasena);
            }
        }
    }
}
