<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("Location: index.php");
    }else{
        unset($_SESSION['usuario']); // anular la variable de sesión
        session_destroy(); // Eliminar la variable de sesión
    
        header("Location: index.php");
    }


?>