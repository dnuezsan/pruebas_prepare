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

   /*  function insercion()
    {
        $sql = "INSERT INTO minijuego ('idMinijuego', 'nombre', 'ruta, 'portada', 'fechaHora) VALUES (?, ?, ?, ?, ?)";

        $consulta = $this->conexion->prepare($sql);

        $resultado = $consulta->$consulta;
    } */

    function insercion()
    {
        $sql = "INSERT INTO minijuego ('idMinijuego', 'nombre') VALUES (?, ?)";

        $consulta_prep = $this->conexion->prepare($sql);

        $consulta_prep->bind_param('is', $_POST['idMinijuego'], $_POST['nombre']);

        if ($consulta_prep->execute()) {
            echo "Se ha realizado la inserción";
        }

        $consulta_prep->close();
    }

}
