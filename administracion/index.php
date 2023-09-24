<?php
include("../Controller/Const.php");
include("../Views/ClassTemplatesAdministracion.php");
$objClassTemplatesAdministracion = new ClassTemplatesAdministracion(); // tamnbién llama a error_reporting(0); para evitar la variable $msg
$url = "http://localhost/proyectoPersonal/administracion/index.php";
// Extraer la ruta
$ruta = parse_url($url, PHP_URL_PATH);
// Obtener el nombre del archivo sin la extensión .php
$nombreArchivo = pathinfo(basename($ruta), PATHINFO_FILENAME);

//echo "Nombre del archivo sin extensión: " . $nombreArchivo . "<br>";
switch($nombreArchivo){
    case 'index': $nombreArchivo = "Bienvenido"; break;
    case 'inicio': $nombreArchivo = "Inicio"; break;
    case 'publicar-articulos': $nombreArchivo = "Publicar artículos"; break;
    case 'editar-articulos': $nombreArchivo = "Editar artículos"; break;
    case 'eliminar-articulos': $nombreArchivo = "Eliminar artículos"; break;
    case 'publicar-curiosidades': $nombreArchivo = "Publicar curiosidades"; break;
    case 'editar-curiosidades': $nombreArchivo = "Editar curiosidades"; break;
    case 'eliminar-curiosidades': $nombreArchivo = "Eliminar curiosidades"; break;
}

// Obtiene la URL completa
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$domain = $_SERVER['HTTP_HOST'];
$url = $protocol . $domain . $_SERVER['REQUEST_URI'];
// Usamos parse_url() para obtener los componentes de la URL
$components = parse_url($url);
// Reconstruimos la URL sin la parte de la consulta (query string)
$scheme   = isset($components['scheme']) ? $components['scheme'] . '://' : '';
$host     = isset($components['host']) ? $components['host'] : '';
$path     = isset($components['path']) ? $components['path'] : '';

$baseUrlImagen = $scheme . $host; // Imprime: "http://localhost
$baseUrl = $scheme . $host . $path; //echo $baseUrl; // Imprime: "http://localhost/proyectoPersonal/leer"


/*-----Inicio Script de inicio de sesión ---- */
session_start();
if(!isset($_SESSION['usuario'])){ // Si la variable de sesión aún no fue creada, continua el flujo
    include "../Model/ClassUsuarios.php";
}else{
    header("Location: inicio.php");
}

if(isset($_POST["ingresar"])){
    $usuario = trim($_POST["usuario"]);
    $contrasenia = trim($_POST["contrasenia"]); 
    //echo $usuario . " " . $contrasenia;
    $objClassUsuarios = new ClassUsuarios();
    $content = $objClassUsuarios->SelectUsuarios($usuario, $contrasenia);
    if($content != NULL){
        // Crear una variable de session aquí
        //session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: inicio.php");
        exit(); // Asegurarse de que el script termine aquí

    }else{
        $msg = '<div class="alert alert-danger mt-2" role="alert">
                     Usuario o contraseña incorrecto.
                </div>';
    } 
}
/*-----Fin Script de inicio de sesión ---- */

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/logo.ico">
    <title><?php echo NAME_APP; ?> - Bienvenido</title>
    <meta name="description" content="<?php echo $objClassTemplatesAdministracion->metaDescription(); ?>">
    <meta name="keywords" content="<?php echo $objClassTemplatesAdministracion->metaKeywords(); ?>">
    <?php 
    echo $objClassTemplatesAdministracion->metaCompartirPostFacebook($nombreArchivo, $baseUrlImagen, $baseUrl); 
    echo $objClassTemplatesAdministracion->metaCompartirPostTwitter($nombreArchivo, $baseUrlImagen, $baseUrl);
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--My styles-->
    <link rel="stylesheet" href="../css/mystyle.css">
    <!--Fontawesome-->
    <script src="https://kit.fontawesome.com/8cf8ae9f8f.js" crossorigin="anonymous"></script>
</head>
<body class="bg_animate">
    <?php
      echo $objClassTemplatesAdministracion->nav();
      echo $objClassTemplatesAdministracion->myMargin();
      //echo $objClassTemplatesAdministracion->header();
    ?>

    <!--Inicio cuerpo-->
    <section class="container">
            <div class="row mt-4">
                <div class="col-md-4"></div>
                <div class="col-md-4 card shadow p-4 mt-4">
                    <form name="" id="" method="post" action="index.php">
                        <h2 class="text-center mt-4">Bienvenido</h2>
                        <div class="mt-4 mb-3">
                            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="contrasenia" id="contrasenia" placeholder="Contraseña" required>
                        </div>
                        <div class="d-grid gap-2 mb-3">
                            <input type="submit" class="btn btn-primary" name="ingresar" id="ingresar" value="Ingresar">
                        </div>
                        <span>¿Olvidaste tu contraseña? <a href="#">Contactar soporte</a>.</span>  
                        <?php $year = date('Y'); ?>  
                        <p class="text-small text-center mt-4">&copy <?php echo NAME_APP .' - '. $year; ?> Todos los derechos reservados</p>           
                    </form>
                    <?php
                    echo $msg;
                    ?>
                </div>
                <div class="col-md-4"></div>
            </div>

            <div class="burbujas">
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
            </div>
    </section>
    <!--Fin cuerpo-->

    <?php
      //echo $objClassTemplatesAdministracion->footer();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
  </body>
</html>