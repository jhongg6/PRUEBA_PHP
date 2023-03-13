<?php

    include_once 'sitios.php';

    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $categoria = $_POST['categoria'];

    $items = array('nombre' => $nombre, 'direccion' => $direccion, 'categoria' => $categoria);

    $sitios = new Sitios();

    $sitios->newSitio($items);

?>