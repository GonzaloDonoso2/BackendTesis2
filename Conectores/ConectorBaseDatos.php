<?php

class ConectorBaseDatos {

    public function consultarBaseDatos($consulta) {
        
        $servidor = "sql10.freemysqlhosting.net";
        $usuario = "sql10520447";
        $contrasena = "p33gvEEUye";
        $baseDatos = "sql10520447";
        $conexion = mysqli_connect($servidor, $usuario, $contrasena, $baseDatos);
        
        $conexion->set_charset("utf8");
        
        $respuesta = mysqli_query($conexion, $consulta);

        mysqli_close($conexion);

        return $respuesta;        
    }
}
