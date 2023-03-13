<?php

    include_once '../modelo_categorias/categorias.php';

    $categoria = new Categorias();

    $res = $categoria->getCategorias();

    $option = "<option value=''>-seleccione-</option>";

    while ($fila = $res->fetch(PDO::FETCH_ASSOC)) {
        $option .= "<option value='{$fila['nombre']}'>{$fila['nombre']}</option>";
    }

    echo $option;

?>