<?php

include "Funciones//FuncionesBatalla.php";

class ControladorBatalla extends FuncionesBatalla {

    function recibirSolicitud($metodo, $parametro) {

        $nuevoParametro = urldecode($parametro[0]);

        if ($metodo === "DELETE") {

            if ($nuevoParametro === "usuario") {

                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->borrarRegistro($nuevoValor);
            }
            
        } else if ($metodo === "GET") {

            if ($nuevoParametro === "desafio") {

                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->iniciarBatalla($nuevoValor);
            } else if ($nuevoParametro === "batalla") {

                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->buscarTurno($nuevoValor);
            } else if ($nuevoParametro === "obtenerMovimiento") {

                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->obtenerMovimiento($nuevoValor);
            } else if ($nuevoParametro === "resultadoBatalla") {

                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->obtenerResultadoBatalla($nuevoValor);
            } else if ($nuevoParametro === "resultadosBatallas") {

                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->obtenerResultadosBatallas($nuevoValor);
            }
            
        } else if ($metodo === "POST") {

            if ($nuevoParametro === "movimiento") {

                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->registrarMovimiento($nuevoValor);
            }
            
        } else if ($metodo === "PUT") {
            
            if ($nuevoParametro === "terminarMovimiento") {
                
                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->terminarMovimiento($nuevoValor);
                
            } else if ($nuevoParametro === "terminarTurno") {

                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->terminarTurno($nuevoValor);
                
            } else if ($nuevoParametro === "perderBatalla") {

                $valor = urldecode($parametro[1]);
                $nuevoValor = json_decode($valor);
                $this->perderBatalla($nuevoValor);
            }
        }
    }

}
