<?php

include_once '../modelo_db/db.php';

class Sitios extends db{
    
    function getSitios(){
        $query = $this->connect()->query('SELECT * FROM sitios_favoritos');
        return $query;
    }

    function getSitio($id){
        $query = $this->connect()->prepare('SELECT * FROM sitios_favoritos WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query;
    }

    function newSitio($sitio){
        $query = $this->connect()->prepare('INSERT INTO sitios_favoritos (nombre, direccion, categoria) VALUES (:nombre, :direccion, :categoria)');
        $query->execute(['nombre' => $sitio['nombre'], 'direccion' => $sitio['direccion'], 'categoria' => $sitio['categoria']]);
        return $query;
    }

    function deleteSitio($id){
        $query = $this->connect()->prepare('DELETE FROM sitios_favoritos WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query;
    }

    

}

?>