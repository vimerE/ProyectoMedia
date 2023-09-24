<?php
include("Controller/Const.php");
include("Views/ClassTemplates.php");

$id = $_GET["id"];
$categoria = $_GET["categoria"];
$titulo = $_GET["titulo"];

if(isset($id) && isset($categoria) && isset($titulo)){
  $objClassTemplates = new ClassTemplates();
}else{
  header("Location: index.php");
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="images/logo.ico">
    <title><?php echo NAME_APP .' - '. $titulo;?></title>
    <meta name="description" content="<?php echo $objClassTemplates->metaDescriptionLeer($id, $categoria, $titulo); ?>">
    <meta name="keywords" content="<?php echo $objClassTemplates->metaKeywordsLeer($id, $categoria, $titulo); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--My styles-->
    <link rel="stylesheet" href="css/mystyle.css">
    <!--Fontawesome-->
    <script src="https://kit.fontawesome.com/8cf8ae9f8f.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
      echo $objClassTemplates->nav();
      echo $objClassTemplates->myMargin();
      echo $objClassTemplates->header();
    ?>

    <section class="container">
       <?php
        echo $objClassTemplates->ultimasNovedades();
       ?>
       <div class="row row-cols-1 row-cols-md-5 g-4 mb-4">
        <?php
        echo $objClassTemplates->articulosUno_row12(); 
        ?>
       </div>
      <div class="row g-5">
        <?php 
        echo $objClassTemplates->sectionLeer_row8($id, $categoria, $titulo);
        echo $objClassTemplates->articulosMasVistos_row4();
        ?>
      </div>
    </section>

    <?php
      echo $objClassTemplates->footer();
    ?>

 
    <script>
      window.addEventListener('DOMContentLoaded', function() {
      const playButton = document.getElementById('play-button-<?php echo $id; ?>');
      const pauseButton = document.getElementById('pause-button-<?php echo $id; ?>');
      const resumeButton = document.getElementById('resume-button-<?php echo $id; ?>');
      const textToSpeechInput = document.getElementById('text-to-speech-<?php echo $id; ?>');
      const progressBar = document.getElementById('progress-<?php echo $id; ?>');

      let speechUtterance = new SpeechSynthesisUtterance();

      playButton.addEventListener('click', function() {
        if (textToSpeechInput.value) {
          speechUtterance = new SpeechSynthesisUtterance(textToSpeechInput.value);
          speechUtterance.addEventListener('end', function() {
            progressBar.style.width = '0';
          });
          speechUtterance.addEventListener('boundary', function(event) {
            if (event.name === 'word') {
              const progressPercentage = (event.charIndex / textToSpeechInput.value.length) * 100;
              progressBar.style.width = progressPercentage + '%';
            }
          });
          window.speechSynthesis.speak(speechUtterance);
        }
      });

      pauseButton.addEventListener('click', function() {
        window.speechSynthesis.pause();
      });

      resumeButton.addEventListener('click', function() {
        window.speechSynthesis.resume();
      });
    });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
  </body>
</html>