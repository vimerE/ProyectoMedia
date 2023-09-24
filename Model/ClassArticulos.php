<?php
include("Connection.php");

Class ClassArticulos{
    public function selectPalabrasClave($id, $categoria, $titulo){
        $pdo = new Connection();
        $response = $pdo->query("SELECT palabraClave1, palabraClave2, palabraClave3, palabraClave4 FROM articulos_subidos WHERE id = '$id' AND categoria = '$categoria' AND titulo = '$titulo'")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        }
    }

    public function selectArticuloTitulos(){
        $pdo = new Connection();
        $response = $pdo->query("SELECT id, titulo, categoria FROM articulos_subidos  ORDER BY fecha DESC LIMIT 21")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        }
    }

    public function selectArticuloUnoInternacional(){
        $pdo = new Connection();
        $response = $pdo->query("SELECT * FROM articulos_subidos WHERE categoria = 'Internacional' ORDER BY id DESC LIMIT 1")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        }
    }

    public function selectArticuloUnoOpinion(){
        $pdo = new Connection();
        $response = $pdo->query("SELECT * FROM articulos_subidos WHERE categoria = 'Opinión' ORDER BY id DESC LIMIT 1")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        }
    }

    public function selectArticuloUnoCiencia(){
        $pdo = new Connection();
        $response = $pdo->query("SELECT * FROM articulos_subidos WHERE categoria = 'Ciencia' ORDER BY id DESC LIMIT 1")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        }
    }

    public function selectArticuloUnoCultura(){
        $pdo = new Connection();
        $response = $pdo->query("SELECT * FROM articulos_subidos WHERE categoria = 'Cultura' ORDER BY id DESC LIMIT 1")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        }
    }

    public function selectArticuloUnoTecnologia(){
        $pdo = new Connection();
        $response = $pdo->query("SELECT * FROM articulos_subidos WHERE categoria = 'Tecnología' ORDER BY id DESC LIMIT 1")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        }
    }

    public function selectArticulos(){
        $pdo = new Connection();
        $response = $pdo->query("SELECT * FROM articulos_subidos ORDER BY fecha DESC LIMIT 21")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        }
    }

    public function selectArticuloOpcion($nombreArchivo){
        $pdo = new Connection();
        $response = $pdo->query("SELECT * FROM articulos_subidos WHERE categoria = '$nombreArchivo' ORDER BY id DESC LIMIT 21")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        }
    }

    public function selectArticuloLeer($id, $categoria, $titulo){
        $pdo = new Connection();
        $response = $pdo->query("SELECT * FROM articulos_subidos WHERE id = '$id' AND categoria ='$categoria' AND titulo = '$titulo' LIMIT 1")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        }
    }

    public function selectArticuloSieteRelacionados($id, $categoria){
        $pdo = new Connection();
        $response = $pdo->query("SELECT * FROM articulos_subidos WHERE (id != '$id' AND categoria = '$categoria') ORDER BY id DESC LIMIT 7")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        }
    }

    public function selectArticulosResultadosBusqueda($articulo){
        $pdo = new Connection();
        $response = $pdo->query("SELECT * FROM articulos_subidos WHERE titulo LIKE '%$articulo%' ORDER BY id DESC LIMIT 21")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        }
    }

    public function selectMasLeidoInternacional(){
        $pdo = new Connection();
        $response = $pdo->query("SELECT * FROM articulos_subidos WHERE contadorVisitas = (SELECT MAX(contadorVisitas) FROM articulos_subidos WHERE categoria = 'Internacional') AND categoria = 'Internacional' LIMIT 1")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        } 
    }

    public function selectMasLeidoOpinion(){
        $pdo = new Connection();
        $response = $pdo->query("SELECT * FROM articulos_subidos WHERE contadorVisitas = (SELECT MAX(contadorVisitas) FROM articulos_subidos WHERE categoria = 'Opinión') AND categoria = 'Opinión' LIMIT 1")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        } 
    }

    public function selectMasLeidoCiencia(){
        $pdo = new Connection();
        $response = $pdo->query("SELECT * FROM articulos_subidos WHERE contadorVisitas = (SELECT MAX(contadorVisitas) FROM articulos_subidos WHERE categoria = 'Ciencia') AND categoria = 'Ciencia' LIMIT 1")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        } 
    }

    public function selectMasLeidoCultura(){
        $pdo = new Connection();
        $response = $pdo->query("SELECT * FROM articulos_subidos WHERE contadorVisitas = (SELECT MAX(contadorVisitas) FROM articulos_subidos WHERE categoria = 'Cultura') AND categoria = 'Cultura' LIMIT 1")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        } 
    }

    public function selectMasLeidoTecnologia(){
        $pdo = new Connection();
        $response = $pdo->query("SELECT * FROM articulos_subidos WHERE contadorVisitas = (SELECT MAX(contadorVisitas) FROM articulos_subidos WHERE categoria = 'Tecnología') AND categoria = 'Tecnología' LIMIT 1")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        } 
    }

    public function selectCuriosidades(){
        $pdo = new Connection();
        $valor = rand(1,4); // modificar esto a medida que se tiene más curiosidades subidos
        $response = $pdo->query("SELECT * FROM curiosidades WHERE id = '$valor'")->fetchAll(PDO::FETCH_OBJ);
        if($response != null){
            return $response;
        }else{
            return null;
        }  
    }
    //-------Inserts------------------------

    public function insertCuriosidades($titulo, $imagen1, $imagen2, $imagen3, $imagen4, $fecha){
        $pdo = new Connection();
        $sql = "INSERT INTO curiosidades (titulo, imagen1, imagen2, imagen3, imagen4, fecha) 
        VALUES (:titulo, :imagen1, :imagen2, :imagen3, :imagen4, :fecha)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':titulo', $titulo);
        $stmt->bindValue(':imagen1', $imagen1);
        $stmt->bindValue(':imagen2', $imagen2);
        $stmt->bindValue(':imagen3', $imagen3);
        $stmt->bindValue(':imagen4', $imagen4);
        $stmt->bindValue(':fecha', $fecha);
        $stmt->execute();
        if($stmt){
            return TRUE;
        }else{
            return FALSE;
        }     
    }


    //-------Updates------------------------

    public function updateContadorArticulo($id, $categoria, $titulo){ // este método se usa en leer.php
        $pdo = new Connection();
		$sql = "UPDATE articulos_subidos SET contadorVisitas=contadorVisitas+1 WHERE id = :id AND categoria = :categoria AND titulo = :titulo";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':id', $id);
		$stmt->bindValue(':categoria', $categoria);
        $stmt->bindValue(':titulo', $titulo);
		$stmt->execute();
        if($stmt){
            return $value = TRUE;
        }else{
            return $value = FALSE;
        } 
    }

}


//-------------------------TEST-----------------
/*$id = 1;
$categoria = 'Internacional'; 
$titulo = 'Título internacional';
$obj = new ClassArticulos();
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


/*$obj = new ClassArticulos();
$contents = $obj->selectArticuloTitulos();
if($contents != null){
    foreach($contents as $content){
        echo $content->titulo . "<br>"; 
    }
}else{
    echo "Sin registros";
}*/



/*$obj = new ClassArticulos();
$contents = $obj->selectArticuloUnoPolitica();
if($contents != null){
    foreach($contents as $content){
        echo $content->id . "<br>" . 
            $content->titulo . "<br>" . 
            $content->contenido  . "<br>" . 
            '<img src="../'.$content->imagen.'">' . "<br>";
            $content->categoria  . "<br>" . 
            $content->estado  . "<br>" .  
            $content->autor  . "<br>" . 
            $content->fecha;
    
    }
}else{
    echo "Sin registros";
}

$contents = $obj->selectArticuloUnoEconomia();
if($contents != null){
    foreach($contents as $content){
        echo $content->id . "<br>" . 
            $content->titulo . "<br>" . 
            $content->contenido  . "<br>" . 
            '<img src="../'.$content->imagen.'">' . "<br>";
            $content->categoria  . "<br>" . 
            $content->estado  . "<br>" .  
            $content->autor  . "<br>" . 
            $content->fecha;
    
    }
}else{
    echo "Sin registros";
}

$contents = $obj->selectArticuloUnoCiencia();
if($contents != null){
    foreach($contents as $content){
        echo $content->id . "<br>" . 
            $content->titulo . "<br>" . 
            $content->contenido  . "<br>" . 
            '<img src="../'.$content->imagen.'">' . "<br>";
            $content->categoria  . "<br>" . 
            $content->estado  . "<br>" .  
            $content->autor  . "<br>" . 
            $content->fecha;
    
    }
}else{
    echo "Sin registros";
}

$contents = $obj->selectArticuloUnoCultura();
if($contents != null){
    foreach($contents as $content){
        echo $content->id . "<br>" . 
            $content->titulo . "<br>" . 
            $content->contenido  . "<br>" . 
            '<img src="../'.$content->imagen.'">' . "<br>";
            $content->categoria  . "<br>" . 
            $content->estado  . "<br>" .  
            $content->autor  . "<br>" . 
            $content->fecha;
    
    }
}else{
    echo "Sin registros";
}

$contents = $obj->selectArticuloUnoTecnologia();
if($contents != null){
    foreach($contents as $content){
        echo $content->id . "<br>" . 
            $content->titulo . "<br>" . 
            $content->contenido  . "<br>" . 
            '<img src="../'.$content->imagen.'">' . "<br>";
            $content->categoria  . "<br>" . 
            $content->estado  . "<br>" .  
            $content->autor  . "<br>" . 
            $content->fecha;
    
    }
}else{
    echo "Sin registros";
}*/

/*$obj = new ClassArticulos();
$contents = $obj->selectMasLeidoInternacional();
if($contents != null){
    foreach($contents as $content){
        echo $content->id . "<br>" . 
            $content->titulo . "<br>" . 
            $content->contenido  . "<br>" . 
            '<img src="../'.$content->imagen.'">' . "<br>" .
            $content->categoria  . "<br>" . 
            $content->estadoPublicacion  . "<br>" .  
            $content->autor  . "<br>" . 
            $content->fecha;
    }
}else{
    echo "No existe publicación";
}*/


/*$titulo = "Título prueba";
$imagen1 = "Imagen 1"; 
$imagen2 = "Imagen 2"; 
$imagen3 = "Imagen 3"; 
$imagen4 = "Imagen 4"; 
$fecha = "12/07/2023";
$obj = new ClassArticulos();
$contents = $obj->insertCuriosidades($titulo, $imagen1, $imagen2, $imagen3, $imagen4, $fecha);
if($contents){
    echo "Subido exitosamente";
}else{
    echo "Error al subir imagenes";
}*/

/*$id = 1;
$categoria = "Internacional"; 
$titulo = "Título internacional";
$obj = new ClassArticulos();
$contents = $obj->updateContadorArticulo($id, $categoria, $titulo);
if($contents){
    echo "Actualizado";
}else{
    echo "Error al actualizar";
}*/
?>