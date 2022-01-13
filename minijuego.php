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


    /* function insercion()
    {
        $sql = "INSERT INTO minijuego ('idMinijuego', 'nombre') VALUES (?, ?)";

        $consulta_prep = $this->conexion->prepare($sql);

        $consulta_prep->bind_param('is', $_POST['idMinijuego'], $_POST['nombre']);

        if ($consulta_prep->execute()) {
            echo "Se ha realizado la inserción";
        }

        $consulta_prep->close();
    } */

    function insercion_masiva(){ /* Terminar */

        $sql = "INSERT INTO minijuego ('idMinijuego', 'nombre') VALUES (?,?)";

        $consulta= $this->conexion->prepare($sql);

        $datos_insertados = [['id'=>1,'nombre'=>"Pitufen"],
        ['id'=>2,'nombre'=>"El chumberisco"],
        ['id'=>3, 'nombre'=>"Presley dean"]];


        $consulta->bind_param('is', $datos_insertados[1]);

        $consulta->execute();

        $consulta->close();
    }

}
