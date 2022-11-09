<?php

include "Conectores//ConectorBaseDatos.php";

class FuncionesBatalla extends ConectorBaseDatos {
    
    function iniciarBatalla ($nuevoValor) {
        
        $idDesafio = $nuevoValor->id;
        $jsonRespuesta = array();
        $consulta = "select id from Batallas where idDesafio = $idDesafio";
        $respuesta = $this->consultarBaseDatos($consulta);
        
        foreach ($respuesta as $key => $value) {
            
            $idBatalla = $value["id"];
        }
        
        $jsonRespuesta[] = array(
            
            "idBatalla" => $idBatalla
        );
        
        $consulta = "select idUsuario1, idUsuario2, colorUsuario1, colorUsuario2 from Desafios where id = $idDesafio";
        $respuesta = $this->consultarBaseDatos($consulta);
        
        foreach ($respuesta as $key => $value) {
            
            $idUsuario1 = $value["idUsuario1"];
            $idUsuario2 = $value["idUsuario2"];
            $colorUsuario1 = $value["colorUsuario1"];
            $colorUsuario2 = $value["colorUsuario2"];
        }
        
        $consulta = "select nombre from Usuarios where id = $idUsuario1";
        $respuesta = $this->consultarBaseDatos($consulta);
        
        foreach ($respuesta as $key => $value) {
            
            $nombreUsuario1 = $value["nombre"];
        }
        
        $consulta = "select nombre from Usuarios where id = $idUsuario2";
        $respuesta = $this->consultarBaseDatos($consulta);
        
        foreach ($respuesta as $key => $value) {
            
            $nombreUsuario2 = $value["nombre"];
        }
        
        $jsonRespuesta[] = array(
            
            "usuario1" => [
                
                "idUsuario1" => $idUsuario1,
                "nombreUsuario1" => $nombreUsuario1,
                "colorUsuario1" => $colorUsuario1                    
            ]
        );
        
        $jsonRespuesta[] = array(
            
            "usuario2" => [
                
                "idUsuario2" => $idUsuario2,
                "nombreUsuario2" => $nombreUsuario2,
                "colorUsuario2" => $colorUsuario2                    
            ]
        ); 
        
        $consultaExterior = "select * from Personajes where idUsuario = $idUsuario1 and estado = 'VIGENTE'";
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
                
                "personajesUsuario1" => [ 
                    
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
                    "categoria" => $categoria,
                    "idUsuario" => $idUsuario2
                ]                
            );
        }
        
        $consultaExterior = "select * from Personajes where idUsuario = $idUsuario2 and estado = 'VIGENTE'";
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
                
                "personajesUsuario2" => [   
                    
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
                    "categoria" => $categoria,
                    "idUsuario" => $idUsuario2
                ]                
            );
        }

        $respuestaBatalla = json_encode($jsonRespuesta);        
        echo $respuestaBatalla;   
    }
    
    function buscarTurno($nuevoValor) {

        $idBatalla = $nuevoValor->id;
        $jsonRespuesta = array();
        $consultaExterior = "select estado from Batallas where id = $idBatalla and estado = 'VIGENTE'";
        $respuestaExterior = $this->consultarBaseDatos($consultaExterior);
                
        if (mysqli_num_rows($respuestaExterior) > 0) {

            $consultaInterior = "select id, numeroTurno, idPersonaje from Turnos where idBatalla = $idBatalla and estado = 'VIGENTE'";
            $respuestaInterior = $this->consultarBaseDatos($consultaInterior);

            foreach ($respuestaInterior as $key => $value) {

                $idTurno = $value["id"];
                $numeroTurno = $value["numeroTurno"];
                $idPersonaje = $value["idPersonaje"];
            }
            
            $consultaInterior = "select id from Movimientos where idPersonaje = $idPersonaje and idTurno = $idTurno and estado = 'VIGENTE'";
            $respuestaInterior = $this->consultarBaseDatos($consultaInterior);
            
            if (mysqli_num_rows($respuestaInterior) > 0) { 
                
                $idMovimiento = $value["id"];  
                
            } else {
                
                $idMovimiento = "SIN MOVIMIENTO";                 
            }            

            $jsonRespuesta[] = array(
                
                "idTurno" => $idTurno,
                "numeroTurno" => $numeroTurno,
                "idPersonaje" => $idPersonaje,
                "idMovimiento" => $idMovimiento
            );

            $respuestaBatalla = json_encode($jsonRespuesta);
            
        } else {
            
            $respuestaBatalla = "La batalla ha terminado.";            
        }
        
        echo $respuestaBatalla;
    }
    
    function registrarMovimiento($nuevoValor) {
        
        $idPersonaje = $nuevoValor->idPersonaje;
        $idTurno = $nuevoValor->idTurno;
        $posicionInicial = $nuevoValor->posicionInicial; 
        $posicionFinal = $nuevoValor->posicionFinal;        
        $consulta = "insert into Movimientos (idPersonaje, idTurno, posicionInicial, posicionFinal, orientacion, estado) values ($idPersonaje, $idTurno, '$posicionInicial', '$posicionFinal', 'SIN ORIENTACION', 'VIGENTE')";
        $this->consultarBaseDatos($consulta);
        $respuestaBatalla = "Movimiento registrado.";
        echo $respuestaBatalla;
    }
    
    function obtenerMovimiento($nuevoValor) {
        
        $idPersonaje = $nuevoValor->idPersonaje;
        $idTurno = $nuevoValor->idTurno;
        $jsonRespuesta = array();
        $consulta = "select id, posicionInicial, posicionFinal from Movimientos where idPersonaje = $idPersonaje and idTurno = $idTurno";
        $respuesta = $this->consultarBaseDatos($consulta);
        
        foreach ($respuesta as $key => $value) {
            
            $idMovimiento = $value["id"];
            $posicionInicial = $value["posicionInicial"];
            $posicionFinal = $value["posicionFinal"];
        }

        $jsonRespuesta[] = array(
            
            "idMovimiento" => $idMovimiento,            
            "posicionInicial" => $posicionInicial,
            "posicionFinal" => $posicionFinal
        );

        $respuestaBatalla = json_encode($jsonRespuesta);
        echo $respuestaBatalla;
    }
    
    function terminarMovimiento($nuevoValor) {
        
        $idMovimiento = $nuevoValor->idMovimiento;
        $orientacion = $nuevoValor->orientacion;
        $consulta = "update Movimientos set estado = 'TERMINADO', orientacion = '$orientacion' where id = $idMovimiento";
        $this->consultarBaseDatos($consulta);
        $respuestaBatalla = "Movimiento terminado.";
        echo $respuestaBatalla;
    }
    
    function terminarTurno($nuevoValor) {
        
        $idDesafio = $nuevoValor->idDesafio;        
        $idBatalla = $nuevoValor->idBatalla;
        $idPersonaje = $nuevoValor->idPersonaje;
        $idTurno = $nuevoValor->idTurno;
        $numeroTurno = $nuevoValor->numeroTurno;
        $jsonRespuesta = array();
        $consulta = "select idUsuario1, idUsuario2 from Desafios where id = $idDesafio";
        $respuesta = $this->consultarBaseDatos($consulta);
        
        foreach ($respuesta as $key => $value) {
            
            $idUsuario1 = $value["idUsuario1"];
            $idUsuario2 = $value["idUsuario2"];
        }
        
        $consultaExterior = "select idPersonaje from BatallasEstadisticas where idBatalla = $idBatalla and idUsuario = $idUsuario1 and saludPersonaje > 0";
        $respuestaExterior = $this->consultarBaseDatos($consultaExterior);
        
        if (mysqli_num_rows($respuestaExterior) === 0) {
            
            $consultaInterior = "update Batallas set estado = 'TERMINADA' where id = $idBatalla";
            $this->consultarBaseDatos($consultaInterior);
            $consultaInterior = "update Turnos set estado = 'TERMINADO' where idBatalla = $idBatalla";
            $this->consultarBaseDatos($consultaInterior);
            $consultaInterior = "insert into BatallasResultados (resultado, idBatalla, idUsuario) values ('DERROTA', $idBatalla, $idUsuario1)";
            $this->consultarBaseDatos($consultaInterior);
            $consultaInterior = "insert into BatallasResultados (resultado, idBatalla, idUsuario) values ('VICTORIA', $idBatalla, $idUsuario2)";
            $this->consultarBaseDatos($consultaInterior);
        }
        
        $consultaExterior = "select idPersonaje from BatallasEstadisticas where idBatalla = $idBatalla and idUsuario = $idUsuario2 and saludPersonaje > 0";
        $respuesta = $this->consultarBaseDatos($consultaExterior);
        
        if (mysqli_num_rows($respuesta) === 0) {
            
            $consultaInterior = "update Batallas set estado = 'TERMINADA' where id = $idBatalla";
            $this->consultarBaseDatos($consultaInterior);
            $consultaInterior = "update Turnos set estado = 'TERMINADO' where idBatalla = $idBatalla";
            $this->consultarBaseDatos($consultaInterior);
            $consultaInterior = "insert into BatallasResultados (resultado, idBatalla, idUsuario) values ('DERROTA', $idBatalla, $idUsuario2)";
            $this->consultarBaseDatos($consultaInterior);
            $consultaInterior = "insert into BatallasResultados (resultado, idBatalla, idUsuario) values ('VICTORIA', $idBatalla, $idUsuario1)";
            $this->consultarBaseDatos($consultaInterior);
        }

        $consulta = "select idPersonaje, iniciativaPersonaje from BatallasEstadisticas where idBatalla = $idBatalla and saludPersonaje > 0 order by iniciativaPersonaje asc";
        $respuesta = $this->consultarBaseDatos($consulta);
        
        foreach ($respuesta as $key => $value) {

            $provisorioIdPersonaje = $value["idPersonaje"];

            $jsonRespuesta[] = array(
                
                "idPersonaje" => $provisorioIdPersonaje
            );
        }
        
        $consulta = "update Turnos set estado = 'TERMINADO' where id = $idTurno";
        $this->consultarBaseDatos($consulta);

        for ($i = 0; $i < count($jsonRespuesta); $i++) {
            
            if ($jsonRespuesta[$i]["idPersonaje"] === $idPersonaje){
                
                if ($i ===  0) {

                    $provisorioIdPersonaje = $jsonRespuesta[(count($jsonRespuesta) - 1)]["idPersonaje"];
                    $provisorioNumeroTurno = ($numeroTurno + 1);
                    $consulta = "insert into Turnos (numeroTurno, estado, idBatalla, idPersonaje) values ($provisorioNumeroTurno, 'VIGENTE', $idBatalla, $provisorioIdPersonaje)";
                    $this->consultarBaseDatos($consulta);
                    
                } else {

                    $provisorioIdPersonaje = $jsonRespuesta[$i - 1]["idPersonaje"];
                    $provisorioNumeroTurno = ($numeroTurno + 1);
                    $consulta = "insert into Turnos (numeroTurno, estado, idBatalla, idPersonaje) values ($provisorioNumeroTurno, 'VIGENTE', $idBatalla, $provisorioIdPersonaje)";
                    $this->consultarBaseDatos($consulta);
                }
            }
        }
        
        $respuestaBatalla = count($jsonRespuesta);

        //$respuestaBatalla = "Turno terminado";
        echo $respuestaBatalla;
    }
    
    function perderBatalla($nuevoValor) {

        $idBatalla = $nuevoValor->idBatalla;
        $idUsuario = $nuevoValor->idUsuario;        
        $consulta = "select idDesafio from Batallas where id = $idBatalla";
        $respuesta = $this->consultarBaseDatos($consulta);

        foreach ($respuesta as $key => $value) {

            $idDesafio = $value["idDesafio"];
        }
        
        $consulta = "select idUsuario1, idUsuario2 from Desafios where id = $idDesafio";
        $respuesta = $this->consultarBaseDatos($consulta);

        foreach ($respuesta as $key => $value) {

            $idUsuario1 = $value["idUsuario1"];
            $idUsuario2 = $value["idUsuario2"];
        }
        
        $consulta = "update Batallas set estado = 'TERMINADA' where id = $idBatalla";
        $this->consultarBaseDatos($consulta);
        
        $consulta = "update Turnos set estado = 'TERMINADO' where idBatalla = $idBatalla";
        $this->consultarBaseDatos($consulta);
        
        if ($idUsuario === $idUsuario1) {

            $consulta = "insert into BatallasResultados (resultado, idBatalla, idUsuario) values ('DERROTA', $idBatalla, $idUsuario1)";
            $this->consultarBaseDatos($consulta);
            $consulta = "insert into BatallasResultados (resultado, idBatalla, idUsuario) values ('VICTORIA', $idBatalla, $idUsuario2)";
            $this->consultarBaseDatos($consulta);
            
        } else if ($idUsuario === $idUsuario2) {
            
            $consulta = "insert into BatallasResultados (resultado, idBatalla, idUsuario) values ('DERROTA', $idBatalla, $idUsuario2)";
            $this->consultarBaseDatos($consulta);
            $consulta = "insert into BatallasResultados (resultado, idBatalla, idUsuario) values ('VICTORIA', $idBatalla, $idUsuario1)";
            $this->consultarBaseDatos($consulta);          
        }
        
        $respuestaBatalla = "La batalla ha terminado.";
        echo $respuestaBatalla;
    }
    
    function obtenerResultadoBatalla($nuevoValor) {

        $idBatalla = $nuevoValor->idBatalla;
        $idUsuario = $nuevoValor->idUsuario;   
        $jsonRespuesta = array();
        $consulta = "select resultado from BatallasResultados where idBatalla = $idBatalla and idUsuario = $idUsuario";
        $respuesta = $this->consultarBaseDatos($consulta);

        foreach ($respuesta as $key => $value) {

            $resultadoBatalla = $value["resultado"];        
        }
        
        $jsonRespuesta[] = array(
            
            "resultadoBatalla" => $resultadoBatalla
        );
        
        $respuestaBatalla = json_encode($jsonRespuesta);        
        echo $respuestaBatalla;
    }
    
    function obtenerResultadosBatallas($nuevoValor) {
        
        $idUsuario = $nuevoValor->idUsuario;   
        $jsonRespuesta = array();
        $consulta = "select resultado from BatallasResultados where idUsuario = $idUsuario";
        $respuesta = $this->consultarBaseDatos($consulta);

        foreach ($respuesta as $key => $value) {

            $resultadoBatalla = $value["resultado"];
            
            $jsonRespuesta[] = array(
            
                "resultadoBatalla" => $resultadoBatalla
            );
        } 
        
        $respuestaBatalla = json_encode($jsonRespuesta);        
        echo $respuestaBatalla;
    }
}
