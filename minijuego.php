<?php

require 'config.php';

//preparacion de insercion
class Minijuego
{
    protected $conexion;

    function __construct()
    {
        $this->conexion = new mysqli(SERVIDOR, USUARIO, CONTRASENIA, BD);
        if ($this->conexion->errno) {
            echo "Se ha producido el error: " . $this->conexion->errno;
        }
    }


    function insercion()
    {
        $sql = "INSERT INTO minijuego (id, nombre) VALUES (?, ?)";

        $consulta_prep = $this->conexion->prepare($sql);

        $id = 1;
        $nombre = "Peter Parker";

        $consulta_prep->bind_param('is', $id, $nombre);

        if ($consulta_prep->execute()) {
            echo "Se ha realizado la inserción";
        } else {
            echo "No se finalizó el proceso";
        }

        $consulta_prep->close();
    }


    function insercion_masiva()
    {

        $sql = "INSERT INTO minijuego (id, nombre) VALUES (?,?)";

        $consulta = $this->conexion->prepare($sql);

        $datos_insertados = [
            [1, "Pitufen"],
            [2, "El chumberisco"],
            [3, "Presley dean"]
        ];

        $longitud_array = count($datos_insertados);

        $consulta->bind_param('is', $a, $b);
        $contador = 0;

        foreach ($datos_insertados as list($a, $b)) {
            $consulta->execute();

            $contador++;

            if ($contador == $longitud_array) {
                echo 'Se ha llevado a cabo la inserción';
            }
        }

        $consulta->close();
    }

    function borrado()
    {
        $sql = "DELETE FROM minijuego WHERE id = ?";

        $consulta = $this->conexion->prepare($sql);

        $id = 1;

        $consulta->bind_param('i', $id);

        if ($consulta->execute()) {
            echo "Hecho";
        }

        $consulta->close();
    }

    function modificar()
    {
        $sql = "UPDATE minijuego SET nombre = 'Adivinanzas' WHERE id = ?";

        $consulta = $this->conexion->prepare($sql);

        $id = 1;

        $consulta->bind_param("i", $id);

        if ($consulta->execute()) {
            echo "actualizado";
        }

        $consulta->close();
    }

    function select(){

        $sql = 'SELECT * FROM minijuego WHERE id = ?';

        $consulta = $this->conexion->prepare($sql);

        $consulta->bind_param('i', $idDB);

        $arrayId = [1,2,3,4];

        foreach ($arrayId as $idDB) {
            $consulta->execute();
            $resultado = $consulta->get_result();
            while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
                echo $fila['nombre']." ";
            }
        }

        $consulta->close();
    }
}
