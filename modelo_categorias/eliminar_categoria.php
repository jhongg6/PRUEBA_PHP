<?php

    include_once 'categorias.php';

    $categorias = new Categorias();

    $id = $_POST['id'];

    $categorias->deleteCategoria($id);
?>