<?php
include("classArticulos.php");

class classOtrosEnlaces extends classArticulos{
    public function insertContactoMensajeRecibido($nombre, $correo, $asunto, $mensaje){
        $pdo = new Connection();
        $sql = "INSERT INTO contacto_mensajes_recibidos (nombre, correo, asunto, mensaje) 
        VALUES (:nombre, :correo, :asunto, :mensaje)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nombre', $nombre);
        $stmt->bindValue(':correo', $correo);
        $stmt->bindValue(':asunto', $asunto);
        $stmt->bindValue(':mensaje', $mensaje);
        $stmt->execute();
        if($stmt){
            return TRUE;
        }else{
            return FALSE;
        }     
    }


}


//------------------------TEST------------------------------

/*$id = 1; // Esto es para comprobar si funciona el extends
$categoria = 'Internacional'; 
$titulo = 'Título internacional';
$obj = new classOtrosEnlaces();
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


/*$nombre = "Vimer"; 
$correo = "vimeredem@gmail.com"; 
$asunto = "Solicito más información"; 
$mensaje = "Buenas tardes, solicito más información sobre esta web";
$obj = new classOtrosEnlaces();
$contents = $obj->insertContactoMensajeRecibido($nombre, $correo, $asunto, $mensaje);
if($contents){
    echo "Mensaje enviado correctamente";
}else{
    echo "Error al enviar mensaje";
}*/
?>
