<?php

include "Conectores//ConectorBaseDatos.php";

class FuncionesPersonaje extends ConectorBaseDatos {  
    
    function borrarUsuario ($personaje) {        
       
        $id = $personaje->id; 
        $consulta = "delete from Personajes where id = $id";
        $this->consultarBaseDatos($consulta);

        echo "El personaje fue borrado de manera exitosa.";
    }
    
    function corregirNombre ($nombre) {  
        
        $id = $nombre->id;    
        $nombrePersonaje = $nombre->nombre;   
        $consulta = "update Usuarios set nombre = '$nombrePersonaje' where id = $id";
        
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
    
    function iniciarSesion ($usuario) {        
       
        $correoElectronico = $usuario->correoElectronico;
        $contrasena = $usuario->contrasena;
        $consulta = "select id, nombre, retrato from Usuarios where correoElectronico = '$correoElectronico' and contrasena = '$contrasena' and estado = 'VIGENTE'";
        $respuesta = $this->consultarBaseDatos($consulta);

        if (mysqli_num_rows($respuesta) > 0) {

            foreach ($respuesta as $key => $value) {

                $id = $value["id"];
                $nombre = $value["nombre"];
                $retrato = $value["retrato"];
            }

            $jsonRespuesta[] = array(
                
                "id" => $id,
                "nombre" => $nombre,
                "retrato" => $retrato
            );

            $respuestaUsuario = json_encode($jsonRespuesta);
            
            echo $respuestaUsuario;
            
        } else {

            echo "Este usuario no está registrado.";
        }
    } 

    function registrarPersonaje ($personaje) {
        
        $nombre = $personaje->nombre;
        $color = $personaje->color;
        $agilidad = $personaje->agilidad;
        $destreza = $personaje->destreza;
        $intelecto = $personaje->intelecto;
        $punteria = $personaje->punteria;
        $vigor = $personaje->vigor;
        $heroismo = $personaje->heroismo;
        $idCategoria = $personaje->idCategoria;
        $idUsuario = $personaje->idUsuario;
        $consulta = "insert into Personajes (nombre, color, agilidad, destreza, intelecto, punteria, vigor, heroismo, idCategoria, idUsuario) values ('$nombre', '$color', $agilidad, $destreza, $intelecto, $punteria, $vigor, $heroismo, $idCategoria, $idUsuario)";
        
        $this->consultarBaseDatos($consulta);

        echo "El personaje fue registrado de manera exitosa.";
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
    
    function obtenerPersonajes($nuevoValor) {

        $idUsuario = $nuevoValor->idUsuario;
        $consultaExterior = "select * from Personajes where idUsuario = $idUsuario and estado = 'VIGENTE'";
        $respuestaExterior = $this->consultarBaseDatos($consultaExterior);

        foreach ($respuestaExterior as $key => $valueExterior) {

            $idPersonaje = $valueExterior["id"];
            $nombrePersonaje = $valueExterior["nombre"];
            $alcanceArma = $valueExterior["alcanceArma"];
            $ataqueArma = $valueExterior["ataqueArma"];
            $danoArma = $valueExterior["danoArma"];
            $defensaArma = $valueExterior["defensaArma"];
            $defensaArmadura = $valueExterior["defensaArmadura"];
            $evasion = $valueExterior["evasion"];
            $iniciativa = $valueExterior["iniciativa"];
            $movimiento = $valueExterior["movimiento"];
            $punteriaArma = $valueExterior["punteriaArma"];
            $resistenciaArma = $valueExterior["resistenciaArma"];
            $resistenciaArmadura = $valueExterior["resistenciaArmadura"];
            $salud = $valueExterior["salud"];
            $tipoDano = $valueExterior["tipoDano"];
            $idCategoria = $valueExterior["idCategoria"];
            $consultaInterior = "select nombre from Categorias where id = $idCategoria";
            $respuestaInterior = $this->consultarBaseDatos($consultaInterior);

            foreach ($respuestaInterior as $key => $valueInterior) {

                $categoria = $valueInterior["nombre"];
            };

            $jsonRespuesta[] = array(
                
                "idPersonaje" => $idPersonaje,
                "nombrePersonaje" => $nombrePersonaje,
                "alcanceArma" => $alcanceArma,
                "ataqueArma" => $ataqueArma,
                "categoria" => $categoria,
                "danoArma" => $danoArma,
                "defensaArma" => $defensaArma,
                "defensaArmadura" => $defensaArmadura,
                "evasion" => $evasion,
                "iniciativa" => $iniciativa,
                "movimiento" => $movimiento,
                "punteriaArma" => $punteriaArma,
                "resistenciaArma" => $resistenciaArma,
                "resistenciaArmadura" => $resistenciaArmadura,
                "salud" => $salud,
                "tipoDano" => $tipoDano,
                "categoria" => $categoria
            );
        }

        $respuestaPersonajes = json_encode($jsonRespuesta);

        echo $respuestaPersonajes;
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
}
