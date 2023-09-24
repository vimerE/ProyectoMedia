<?php
include("classArticulos.php");

class ClassAdministracion extends classArticulos{

    
    public function selectArticulosAutor(){ // Sobrescritura de método, ya existe en classArticulos. Modificar esto para que solo seleccione los artículos de acuerdo al usuario que ha ingresado
        $pdo = new Connection();
        $response = $pdo->query("SELECT * FROM articulos_subidos ORDER BY id DESC")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        }
    }

    public function selectArticuloAutor($id, $categoria, $titulo){
        $pdo = new Connection();
        $response = $pdo->query("SELECT * FROM articulos_subidos WHERE id = '$id' AND categoria = '$categoria' AND titulo = '$titulo'")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        }
    }

    //-------Inserts------------------------
    public function insertArticulo($titulo, $copete, $contenido, $palabraClave1, $palabraClave2, $palabraClave3, $palabraClave4, $imagen, $categoria, $estadoPublicacion, $autor, $fecha){
        $pdo = new Connection();
        $sql = "INSERT INTO articulos_subidos (titulo, copete, contenido, palabraClave1, palabraClave2, palabraClave3, palabraClave4, imagen, categoria, estadoPublicacion, autor, fecha) 
        VALUES (:titulo, :copete, :contenido, :palabraClave1, :palabraClave2, :palabraClave3, :palabraClave4, :imagen, :categoria, :estadoPublicacion, :autor, :fecha)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':titulo', $titulo);
        $stmt->bindValue(':copete', $copete);
        $stmt->bindValue(':contenido', $contenido);
        $stmt->bindValue(':palabraClave1', $palabraClave1);
        $stmt->bindValue(':palabraClave2', $palabraClave2);
        $stmt->bindValue(':palabraClave3', $palabraClave3);
        $stmt->bindValue(':palabraClave4', $palabraClave4);
        $stmt->bindValue(':imagen', $imagen);
        $stmt->bindValue(':categoria', $categoria);
        $stmt->bindValue(':estadoPublicacion', $estadoPublicacion);
        $stmt->bindValue(':autor', $autor);
        $stmt->bindValue(':fecha', $fecha);
        $stmt->execute();
        if($stmt){
            return TRUE;
        }else{
            return FALSE;
        }     
    }

    public function updateArticulo($id, $titulo, $copete, $contenido, $palabraClave1, $palabraClave2, $palabraClave3, $palabraClave4, $imagen, $categoria, $estadoPublicacion, $autor){
        $pdo = new Connection();
        /*$sql = "INSERT INTO articulos_subidos (titulo, copete, contenido, palabraClave1, palabraClave2, palabraClave3, palabraClave4, imagen, categoria, estadoPublicacion, autor, fecha) 
        VALUES (:titulo, :copete, :contenido, :palabraClave1, :palabraClave2, :palabraClave3, :palabraClave4, :imagen, :categoria, :estadoPublicacion, :autor, :fecha)";*/

        $sql = "UPDATE articulos_subidos SET titulo=:titulo, copete=:copete, contenido=:contenido, palabraClave1=:palabraClave1, palabraClave2=:palabraClave2, palabraClave3=:palabraClave3, palabraClave4=:palabraClave4, imagen=:imagen, categoria=:categoria, estadoPublicacion=:estadoPublicacion, autor=:autor WHERE id=:id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':titulo', $titulo);
        $stmt->bindValue(':copete', $copete);
        $stmt->bindValue(':contenido', $contenido);
        $stmt->bindValue(':palabraClave1', $palabraClave1);
        $stmt->bindValue(':palabraClave2', $palabraClave2);
        $stmt->bindValue(':palabraClave3', $palabraClave3);
        $stmt->bindValue(':palabraClave4', $palabraClave4);
        $stmt->bindValue(':imagen', $imagen);
        $stmt->bindValue(':categoria', $categoria);
        $stmt->bindValue(':estadoPublicacion', $estadoPublicacion);
        $stmt->bindValue(':autor', $autor);
        $stmt->execute();
        if($stmt){
            return TRUE;
        }else{
            return FALSE;
        }   
    }
}


/*-------------------------TEST------------------------------- */
/*$id = 1;
$categoria = "Internacional"; 
$titulo = "Título internacional";
$obj = new ClassAdministracion();
$contents = $obj->selectArticuloAutor($id, $categoria, $titulo);
if($contents != null){
    foreach($contents as $content){
        echo $content->titulo . "<br>" . 
             $content->copete . "<br>" . 
             $content->contenido;
    }
}else{
    echo "Sin registros";
}*/

/*$id = 1; // Esto es para comprobar si funciona el extends
$categoria = 'Internacional'; 
$titulo = 'Título internacional';
$obj = new ClassAdministracion();
$contents = $obj->selectPalabrasClave($id, $categoria, $titulo);
if($contents != null){
    foreach($contents as $content){
        echo $content->palabraClave1 . ", " . 
             $content->palabraClave2 . ", " .
             $content->palabraClave3 . ", " .
             $content->palabraClave4;
    }
}else{
    echo "Sin registros";
}*/

/*$titulo = "Este es el título Tecnología"; 
$copete = "Este es una breve descripción en el copete del artículo de Tecnología"; 
$contenido ="Tan solo una pequeña descripción en el contenido es suficiente para saber que el ejemplo esta bien";
$palabraClave1 = "palabraClave1"; 
$palabraClave2 = "palabraClave2"; 
$palabraClave3 = "palabraClave3";
$palabraClave4 = "palabraClave4"; 
$imagen = "imagen.jpg"; 
$categoria = "Tecnología"; 
$estadoPublicacion = "Público";
$autor = "Autor prueba"; 
$fecha = "22/07/2023";
$obj = new ClassAdministracion();
$contents = $obj->insertArticulo($titulo, $copete, $contenido, $palabraClave1, $palabraClave2, $palabraClave3, $palabraClave4, $imagen, $categoria, $estadoPublicacion, $autor, $fecha);
if($contents){
    echo "Subido correctamente";
}else{
    echo "Error al subir";
}*/

/*$id = 1;
$titulo = "a"; 
$copete = "b"; 
$contenido = "c"; 
$palabraClave1 = "d"; 
$palabraClave2 = "e"; 
$palabraClave3 = "f"; 
$palabraClave4 = "g"; 
$imagen = "h"; 
$categoria = "i"; 
$estadoPublicacion = "j"; 
$autor = "k"; 
$fecha = "l";

$obj = new ClassAdministracion();
$content = $obj->updateArticulo($id, $titulo, $copete, $contenido, $palabraClave1, $palabraClave2, $palabraClave3, $palabraClave4, $imagen, $categoria, $estadoPublicacion, $autor, $fecha);
if($content){
    echo "Actualizado";
}else{
    echo "Error al actualizar";
}

*/

?>