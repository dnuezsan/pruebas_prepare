<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz minijuegos</title>
</head>
<body>
    <form action="" method="POST">
    <input type="submit" name="insertar" value="insertar">
    <input type="submit" name="borrar" value="borrar">
    <input type="submit" name="actualizar" value="actualizar">
    <input type="submit" name="seleccionar" value="seleccionar">
    </form>
    <?php
    require 'minijuego.php';
    $prueba = new Minijuego();

    /* if ($_POST["hola"]) {
        $prueba->saludo();
    } */
    if (isset($_POST['insertar'])) {
        $prueba->insercion_masiva();
    }

    if (isset($_POST['borrar'])) {
        $prueba->borrado();
    }

    if (isset($_POST["actualizar"])) {
        $prueba->modificar();
    }

    if (isset($_POST['seleccionar'])) {
        $prueba->select();
    }
    
    ?>
</body>
</html>