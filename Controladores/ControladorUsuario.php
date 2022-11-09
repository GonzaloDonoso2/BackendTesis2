<?php

include "Funciones//FuncionesUsuario.php";

class ControladorUsuario extends FuncionesUsuario {
    
    function recibirSolicitud ($metodo, $parametro) {
        
        $nuevoParametro = urldecode($parametro[0]);
        
        if ($metodo === "DELETE") {
            
            if ($nuevoParametro === "usuario") {
                
                $valor = urldecode($parametro[1]);
                $usuario = json_decode($valor);
                $this->borrarRegistro($usuario);
            }
            
        } elseif ($metodo === "GET") {
            
            if ($nuevoParametro === "inicioSesion") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->iniciarSesion($nuevoValor);
                
            } elseif ($nuevoParametro === "nombreUsuario") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->buscarUsuario($nuevoValor)   ;      
            } 
            
        } elseif ($metodo === "POST") {
            
            if ($nuevoParametro === "") {
               
                $this->corregirRetretato();
                
            } elseif ($nuevoParametro === "usuario") {
                
                $valor = urldecode($parametro[1]);
                $usuario = json_decode($valor);
                $this->registrarUsuario($usuario);
                
            } elseif ($nuevoParametro === "nombreUsuario") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->buscarUsuario($nuevoValor);
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
