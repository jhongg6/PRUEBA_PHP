<?php
    include_once '../modelo_db/db.php';

    class Categorias extends db{

        function getCategorias(){
            $query = $this->connect()->query('SELECT * FROM categorias');
            return $query;
        }

        function newCategoria($nombre){
            $query = $this->connect()->prepare('INSERT INTO categorias (nombre) VALUES (:nombre)');
            $query->execute(['nombre' => $nombre]);
            return $query;
        }
    
        function deleteCategoria($id){
            $query = $this->connect()->prepare('DELETE FROM categorias WHERE id = :id');
            $query->execute(['id' => $id]);
            return $query;
        }
    }
?>