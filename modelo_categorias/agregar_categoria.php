<?php

    include_once 'categorias.php';

    $nombre = $_POST['nombre'];

    $categorias = new Categorias();

    $categorias->newCategoria($nombre);

?>