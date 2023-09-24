<?php
include("Controller/Const.php");
include("Views/ClassTemplates.php");
$objClassTemplates = new ClassTemplates();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="images/logo.ico">
    <title><?php echo NAME_APP; ?> - Publicar artículo</title>
    <meta name="description" content="<?php echo $objClassTemplates->metaDescription(); ?>">
    <meta name="keywords" content="<?php echo $objClassTemplates->metaKeywords(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- ckeditor -->
    <script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
    <!--My styles-->
    <link rel="stylesheet" href="css/mystyle.css">
    <!--Fontawesome-->
    <script src="https://kit.fontawesome.com/8cf8ae9f8f.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
      echo $objClassTemplates->nav();
    ?>
    <!--Inicio fin espacio vacio-->
    <div class="my-margin2">
    </div>
    <!--Fin espacio vacio-->
    <section class="container">
      <div class="row">
        <?php
          echo $objClassTemplates->publicarArticulo_row8();
          echo $objClassTemplates->articulosMasVistos_row4(); 
        ?>
      </div>
    </section>

    <?php
      echo $objClassTemplates->footer();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
  </body>
</html>