<?php
    include_once 'sitios.php';

    $sitios = new Sitios();

    $res = $sitios->getSitios();
    $tabla = "  <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Categoria</th>
                        <th>Accion</th>
                    </tr>
                </thead>
            <tbody>";
    while ($fila = $res->fetch(PDO::FETCH_ASSOC)) {
        $tabla .= "<tr>
                        <input type='hidden' name='id' value='{$fila['id']}'>
                        <td>{$fila['nombre']}</td>
                        <td><a href='{$fila['direccion']}' target='_blank'>{$fila['direccion']}</a></td>
                        <td>{$fila['categoria']}</td>
                        <td><button class='delete-btn' onclick='eliminar({$fila['id']})'>Eliminar</button></td>
                    </tr>";
    }

    $tabla .= "</tbody>";

    echo $tabla;
    
?>