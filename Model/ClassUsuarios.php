<?php
// no requiere incluir conexion por la forma secuencial, ver index.php


Class ClassUsuarios{
	public function SelectUsuarios($usuario, $contrasenia){
        $pdo = new Connection();
        $sql = $pdo->prepare("SELECT autor, usuario, contrasenia FROM usuarios_autores WHERE (usuario=:usuario AND contrasenia=:contrasenia) AND condicion = 'activo'");
        $sql->bindValue(':usuario', $usuario);
        $sql->bindValue(':contrasenia', $contrasenia);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
   
        //$response=array();
        $count = 0;
        $usuarioEncontrado ="";
        foreach($sql->fetchAll() as $row){
            $count++;
            $usuarioEncontrado = $row['usuario'];
            //array_push($response, $row['usuario'] ,$row['contrasenia'];
        }
        //print_r($response);
        if($count > 0){
            return $usuarioEncontrado;
        }else{
            return $usuarioEncontrado = NULL;
        }
    }
}




/*-----------------------------TEST-------------------------- */

/*$usuario = "vgomezr";
$contrasenia = "70979787";
$objClassAdministrador = new ClassUsuarios();
$content = $objClassAdministrador->SelectUsuarios($usuario, $contrasenia);
if($content != null){
    echo "Usuario correcto";
}else{
    echo "El usuario no existe";
}*/



?>