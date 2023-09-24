<?php
include("../Controller/Const.php");
include("../Views/ClassTemplatesOtrosEnlaces.php");
$objClassTemplatesOtrosEnlaces = new ClassTemplatesOtrosEnlaces();

$url = "http://localhost/proyectoPersonal/politica-de-privacidad.php";
// Extraer la ruta
$ruta = parse_url($url, PHP_URL_PATH);
// Obtener el nombre del archivo sin la extensión .php
$nombreArchivo = pathinfo(basename($ruta), PATHINFO_FILENAME);

//echo "Nombre del archivo sin extensión: " . $nombreArchivo . "<br>";
switch($nombreArchivo){
  case 'ayuda': $nombreArchivo = "Ayuda"; break;
  case 'contacto': $nombreArchivo = "Contacto"; break;
  case 'declaracion-de-principios': $nombreArchivo = "Declaración de principios"; break;
  case 'aviso-legal': $nombreArchivo = "Aviso legal"; break;
  case 'politica-de-privacidad': $nombreArchivo = "Política de privacidad"; break;
  case 'politica-de-cookies': $nombreArchivo = "Política de cookies"; break;
  case 'preguntas-frecuentes': $nombreArchivo = "Preguntas frecuentes"; break;
  case 'lector-rss': $nombreArchivo = "Lector RSS"; break;
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

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/logo.ico">
    <title><?php echo NAME_APP; ?> - Declaración de principios</title>
    <meta name="description" content="<?php echo $objClassTemplatesOtrosEnlaces->metaDescription(); ?>">
    <meta name="keywords" content="<?php echo $objClassTemplatesOtrosEnlaces->metaKeywords(); ?>">
    <?php 
    echo $objClassTemplatesOtrosEnlaces->metaCompartirPostFacebook($nombreArchivo, $baseUrlImagen, $baseUrl); 
    echo $objClassTemplatesOtrosEnlaces->metaCompartirPostTwitter($nombreArchivo, $baseUrlImagen, $baseUrl);
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--My styles-->
    <link rel="stylesheet" href="../css/mystyle.css">
    <!--Fontawesome-->
    <script src="https://kit.fontawesome.com/8cf8ae9f8f.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
      echo $objClassTemplatesOtrosEnlaces->nav();
      echo $objClassTemplatesOtrosEnlaces->myMargin();
      //echo $objClassTemplatesOtrosEnlaces->header();
    ?>

    <section class="container">
      <?php
        //echo $objClassTemplatesOtrosEnlaces->ultimasNovedades();
      ?>
      <div class="network d-none d-sm-none d-md-block">
        <div class="row row-cols-1 row-cols-md-5 mb-4">
          <?php
          //echo $objClassTemplatesOtrosEnlaces->articulosUno_row12(); 
          ?>
        </div>
      </div>
      <div class="row">
        <?php 
        echo $objClassTemplatesOtrosEnlaces->sectionOtrosEnlaces_row8($nombreArchivo); 
        echo $objClassTemplatesOtrosEnlaces->otrosEnlaces_row4($nombreArchivo);
        ?>
      </div>
    </section>

    <?php
      echo $objClassTemplatesOtrosEnlaces->footer();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
  </body>
</html>