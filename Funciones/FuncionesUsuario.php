<?php

include "Conectores//ConectorBaseDatos.php";

class FuncionesUsuario extends ConectorBaseDatos {  
    
    function borrarUsuario ($usuario) {        
       
        $id = $usuario->id; 
        $consulta = "delete from Usuarios where id = $id";
        $this->consultarBaseDatos($consulta);

        echo "El usuario fue borrado de manera exitosa.";
    }
    
    function corregirNombre ($nombre) {  
        
        $id = $nombre->id;    
        $nombreUsuario = $nombre->nombre;   
        $consulta = "update Usuarios set nombre = '$nombreUsuario' where id = $id";
        
        $this->consultarBaseDatos($consulta);
        
        echo "El nombre del usuario fue corregido de manera exitosa.";
    }
    
    function corregirRetretato() {  
        
        $id = json_decode($_POST["id"]);
        $idUsuario = $id->id;
        $nombreRetrato = $_FILES["retrato"]["name"];
        $extensionRetrato = pathinfo($nombreRetrato, PATHINFO_EXTENSION);
        $retrato = "Retrato" . $idUsuario . "." .$extensionRetrato;
        $consulta = "update Usuarios set retrato = '$retrato' where id = $idUsuario";
        
        $this->consultarBaseDatos($consulta);
        
        $informacionRetrato = $_FILES["retrato"]["tmp_name"]; 
        
        move_uploaded_file($informacionRetrato, "Imagenes//RetratosUsuarios//$retrato");  
    }
    
    function corregirCorreoElectronico ($correoElectronico) {  
        
        $id = $correoElectronico->id;    
        $correoElectronicoUsuario= $correoElectronico->correoElectronico;   
        $consulta = "update Usuarios set correoElectronico = '$correoElectronicoUsuario' where id = $id";
        
        $this->consultarBaseDatos($consulta);
        
        echo "El correo electrónico del usuario fue corregido de manera exitosa.";
    }
    
    function corregirContrasena ($contrasena) {  
        
        $id = $contrasena->id;    
        $contrasenaUsuario = $contrasena->contrasena;   
        $consulta = "update Usuarios set contrasena = '$contrasenaUsuario' where id = $id";
        
        $this->consultarBaseDatos($consulta);
        
        echo "La contraseña del usuario fue corregido de manera exitosa.";
    }
    
    function iniciarSesion ($nuevoValor) {        
       
        $correoElectronico = $nuevoValor->correoElectronico;
        $contrasena = $nuevoValor->contrasena;
        $consulta = "select id, nombre from Usuarios where correoElectronico = '$correoElectronico' and contrasena = '$contrasena' and estado = 'VIGENTE'";
        $respuesta = $this->consultarBaseDatos($consulta);

        if (mysqli_num_rows($respuesta) > 0) {

            foreach ($respuesta as $key => $value) {

                $id = $value["id"];
                $nombre = $value["nombre"];
            }

            $jsonRespuesta[] = array(
                
                "id" => $id,
                "nombre" => $nombre
            );

            $respuestaUsuario = json_encode($jsonRespuesta);
            
            echo $respuestaUsuario;
            
        } else {

            echo "Este usuario no está registrado.";
        }
    } 

    function registrarUsuario ($usuario) {
        
        $nombre = $usuario->nombre;
        $correoElectronico = $usuario->correoElectronico;
        $contrasena = $usuario->contrasena;
        $retrato = "SinRetrato.png";
        $consulta = "insert into Usuarios (nombre, retrato, correoElectronico, contrasena, estado) values ('$nombre', '$retrato', '$correoElectronico', '$contrasena', 'VIGENTE')";
        
        $this->consultarBaseDatos($consulta);

        echo "El usuario fue registrado de manera exitosa.";
    }
    
    function obtenerUsuario($id) {

        $idUsuario = $id->id;
        $consulta = "select nombre, retrato, correoElectronico, contrasena from Usuarios where id = $idUsuario";
        $respuesta = $this->consultarBaseDatos($consulta);

        foreach ($respuesta as $key => $value) {
            
            $nombre = $value["nombre"];
            $retrato = $value["retrato"];
            $correoElectronico = $value["correoElectronico"];
            $contrasena = $value["contrasena"];

            $jsonRespuesta[] = array(
                
                "nombre" => $nombre,
                "retrato" => $retrato,
                "correoElectronico" => $correoElectronico,
                "contrasena" => $contrasena
            );
        }

        $respuestaUsuario = json_encode($jsonRespuesta);
        
        echo $respuestaUsuario;
    }

    function verificarUsuario($correoElectronico) {
        
        $correoElectronicoUsuario = $correoElectronico->correoElectronico;  
        $consulta = "select correoElectronico from Usuarios where correoElectronico = '$correoElectronicoUsuario'";
        $respuesta = $this->consultarBaseDatos($consulta);

        if (mysqli_num_rows($respuesta) > 0) {
            
            echo "Este usuario está registrado.";
            
        } else {

            echo "Este usuario no está registrado.";
        }
    }
    
    function buscarUsuario($nuevoValor) {
        
        $nombre = $nuevoValor->nombre;  
        $consulta = "select id, nombre from Usuarios where nombre = '$nombre' and estado = 'VIGENTE'";
        $respuesta = $this->consultarBaseDatos($consulta);

        if (mysqli_num_rows($respuesta) > 0) {
            
            foreach ($respuesta as $key => $value) {
                
                $idUsuario = $value["id"];

                $jsonRespuesta[] = array(
                    "idUsuario" => $idUsuario
                );
            }

            $respuestaUsuario = json_encode($jsonRespuesta);

            echo $respuestaUsuario;
            
        } else {

            echo "Este usuario no está registrado.";
        }
    }
}
