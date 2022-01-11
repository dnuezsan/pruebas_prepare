<?php

require 'config.php';

//preparacion de insercion
class Minijuegos
{
    protected $conexion;

    function __construct()
    {
        $this->conexion = new mysqli(SERVIDOR, USUARIO, CONTRASENIA, BD);
    }

    function insercion()
    {
        $sql = "INSERT INTO minijuego ('idMinijuego', 'nombre', 'ruta, 'portada', 'fechaHora) VALUES (?, ?, ?, ?, ?)";

        $consulta = $this->conexion->prepare($sql);

        $resultado = $consulta->$consulta;
    }


}
