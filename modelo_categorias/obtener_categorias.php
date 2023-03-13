<?php
    include_once 'categorias.php';

    $categorias = new Categorias();

    $res = $categorias->getCategorias();
    $tabla = "  <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Accion</th>
                    </tr>
                </thead>
            <tbody>";
    while ($fila = $res->fetch(PDO::FETCH_ASSOC)) {
        $tabla .= "<tr>
                        <input type='hidden' name='id' value='{$fila['id']}'>
                        <td>{$fila['nombre']}</td>
                        <td><button class='delete-btn' onclick='eliminar({$fila['id']})'>Eliminar</button></td>
                    </tr>";
    }

    $tabla .= "</tbody>";

    echo $tabla;
    
?>