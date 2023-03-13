<?php

    include_once 'sitios.php';

    $sitio = new Sitios();

    $id = $_POST['id'];

    $sitio->deleteSitio($id);
?>