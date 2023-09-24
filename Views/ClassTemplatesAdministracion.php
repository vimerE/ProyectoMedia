<?php
include("../Model/ClassAdministracion.php"); // esta clase también hereda de ClassArticulos.php
include("../Controller/Functions.php"); // para la funcion codigoCaptcha()

error_reporting(0); // para evitar las variables inexistentes en los inputs de entrada

class ClassTemplatesAdministracion{

    public function metaDescription(){
        $description = "MiProyect es el punto de encuentro de personas amantes del conocimiento. Una comunidad que te sorprenderá con diversos temas que posiblemente hasta ahora desconocias.";
        return $description;

    }

    public function metaKeywords(){
        $keywords = "PERÚ, INTERNACIONAL, OPINIÓN, CIENCIA, CULTURA, TECNOLOGÍA";
        return $keywords;
    }

    public function metaCompartirPostFacebook($titulo, $baseUrlImagen, $baseUrl){ // modificar meta property="og:image"
        $fechaISO = date("Y/m/d");
        $meta = '
        <!-- Etiquetas meta para compartir en Facebook -->
        <meta property="og:title" content="'.$titulo.'">
        <meta property="og:description" content="MiProyect es el punto de encuentro de personas amantes del conocimiento. Una comunidad que te sorprenderá con diversos temas que posiblemente hasta ahora desconocias.">
        <meta property="og:image" content="'.$baseUrlImagen.'/proyectoPersonal/images/logo.png">
        <meta property="og:url" content="'.$baseUrl.'">
        <meta property="og:site_name" content="'.NAME_APP.'">
        <meta property="og:type" content="article">
        
        <meta property="og:locale" content="es_ES">
        <meta property="article:author" content="'.NAME_APP.'">
        <meta property="article:published_time" content="'.$fechaISO.'">
        ';
        return $meta;
    }

    public function metaCompartirPostTwitter($titulo, $baseUrlImagen, $baseUrl){ // modificar meta name="twitter:image"
        date_default_timezone_set("America/Lima");
        $fechaISO = date("Y-m-d");
        $meta = '
        <!-- Etiquetas Twitter Cards para compartir en Twitter -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="'.$titulo.'">
        <meta name="twitter:description" content="MiProyect es el punto de encuentro de personas amantes del conocimiento. Una comunidad que te sorprenderá con diversos temas que posiblemente hasta ahora desconocias.">
        <meta name="twitter:image" content="'.$baseUrlImagen.'/proyectoPersonal/images/logo.png">
        <meta name="twitter:url" content="'.$baseUrl.'">';
        return $meta;
    }

    public function nav(){
        $year = date('Y');
        $template = '
            <nav class="navbar color-blue fixed-top">
                <div class="container container-fluid">
                    <a class="navbar-brand" href="../portada.php">
                        <img src="../images/logo.png" alt="'.NAME_APP.'" width="50" height="30" class="d-inline-block align-text-top" title="'.NAME_APP.'">
                    </a>
                    <button class="btn btn-outline-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-bars text-white"></i></button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">     
                        <a class="navbar-brand" href="../portada.php">
                        <img src="../images/logo.png" alt="'.NAME_APP.'" width="50" height="30" class="d-inline-block align-text-top" title="'.NAME_APP.'">
                        </a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                    <h6 class="mt-2">BUSCADOR</h6>
                        <form name="formBuscarArticulo" id="formBuscarArticulo" method="GET" action="buscar-articulo.php">
                            <div class="input-group mt-3">
                            <input type="text" class="form-control" name="articulo" id="articulo" placeholder="Buscar publicación">
                            <button type="submit" class="input-group-text btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                        <hr class="mt-4">
                        <div class="d-grid gap-2">
                            <a href="../portada.php"><i class="fa-solid fa-chevron-left"></i> Portada</a>
                            <a href="../internacional.php"><i class="fa-solid fa-chevron-left"></i> Internacional</a>
                            <a href="../opinion.php"><i class="fa-solid fa-chevron-left"></i> Opinión</a>
                            <a href="../ciencia.php"><i class="fa-solid fa-chevron-left"></i> Ciencia</a>
                            <a href="../cultura.php"><i class="fa-solid fa-chevron-left"></i> Cultura</a>
                            <a href="../tecnologia.php"><i class="fa-solid fa-chevron-left"></i> Tecnología</a>
                        </div>
                        <hr class="mt-4">
                        <h6 class="mt-2">OTROS ENLACES</h6>
                        <a href="ayuda.php" class="miLink">Ayuda</a><br>
                        <a href="contacto.php" class="miLink">Contacto</a><br>
                        <a href="declaracion-de-principios.php" class="miLink">Declaración de principios</a><br>
                        <a href="aviso-legal.php" class="miLink">Aviso legal</a><br>
                        <a href="politica-de-privacidad.php" class="miLink">Política de privacidad</a><br>
                        <a href="politica-de-cookies.php" class="miLink">Política de cookies</a><br>
                        <a href="preguntas-frecuentes.php" class="miLink">Preguntas frecuentes</a><br>
                        <a href="lector-rss.php" class="miLink">Lector RSS</a>
                        <hr class="mt-4">
                        <center><span class="text-small">&copy '.NAME_APP.' - '. $year .' Todos los derechos reservados</span></center>
                    </div>
                    </div>
                </div>
            </nav>';
            return $template;
    }

    public function sectionInicioSesion_row12(){

        $year = date('Y');
        $template = '
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
                        <p class="text-small text-center mt-4">&copy '.NAME_APP.' - '. $year .' Todos los derechos reservados</p>           
                    </form>
                    '.$msg.'     
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
        ';
        return $template;
    }

    public function myMargin(){
        $template = '
                    <div class="my-margin">
                    </div>';
        return $template;
    }

    public function cerrarSesion(){
        $template = '<p class="mt-4"><b><i class="fa-solid fa-circle text-success"></i> Usuario: </b>' . $_SESSION["usuario"] . '  | <a href="logout"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión</a></p>';
        return $template;
    }


    public function sectionAdministracion_row8($nombreArchivo){
        $objClassAdministracion = new ClassAdministracion();

        if($nombreArchivo == "Inicio"){
            $vista = '
            <p>Si necesitas contactarnos para hacer alguna consulta sobre el funcionamiento de las publicaciones o simplemente deseas dejarnos alguna sugerencia, por favor siéntete libre de hacerlo. 
            <a href="#">Contactar soporte</a>. </p>
            <div class="row class="mt-4 mb-4"">
                <div class="col-md-6">
                    <h5>Artículos</h5>
                    <ul>
                        <li><a href="publicar-articulos"><b>Publicar artículos</b></a></li>
                        <li><a href="editar-articulos"><b>Editar artículos</b></a></li>
                        <li><a href="eliminar-articulos"><b>Eliminar artículos</b></a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5>Curiosidades</h5>
                    <ul>
                        <li><a href="publicar-curiosidades"><b>Publicar curiosidades</b></a></li>
                        <li><a href="editar-curiosidades"><b>Editar curiosidades</b></a></li>
                        <li><a href="eliminar-curiosidades"><b>Eliminar curiosidades</b></a></li>
                    </ul>
                </div>
            </div>';
        }else if($nombreArchivo == "Publicar artículos"){
            $mensaje = '';
            if(isset($_POST["subirArticulo"])){
                $titulo = $_POST["titulo"];
                $copete = $_POST["copete"];
                $contenido = $_POST["contenido"];
                $palabraClave1 = $_POST["palabraClave1"];
                $palabraClave2 = $_POST["palabraClave2"];
                $palabraClave3 = $_POST["palabraClave3"];
                $palabraClave4 = $_POST["palabraClave4"];
                $nombreImagenTemp = $_FILES["imagen"]["name"];
                $temp = $_FILES["imagen"]["tmp_name"];
                $categoria = $_POST["categoria"];
                switch($categoria){
                    case "Internacional":
                        $imagen =  "images/images_internacional/". rand(0,1000) . $nombreImagenTemp; // ruta para guardar en la DB
                        $imagenRuta =  "../". $imagen; // guarda el archivo en la ruta
                        move_uploaded_file($temp, $imagenRuta);
                        break;
                    case "Opinión":
                        $imagen =  "images/images_opinion/". rand(0,1000) . $nombreImagenTemp; // ruta para guardar en la DB
                        $imagenRuta =  "../". $imagen; // guarda el archivo en la ruta
                        move_uploaded_file($temp, $imagenRuta);
                        break;
                    case "Ciencia":
                        $imagen =  "images/images_ciencia/". rand(0,1000) . $nombreImagenTemp; // ruta para guardar en la DB
                        $imagenRuta =  "../". $imagen; // guarda el archivo en la ruta
                        move_uploaded_file($temp, $imagenRuta);
                        break;
                    case "Cultura":
                        $imagen =  "images/images_cultura/". rand(0,1000) . $nombreImagenTemp; // ruta para guardar en la DB
                        $imagenRuta =  "../". $imagen; // guarda el archivo en la ruta
                        move_uploaded_file($temp, $imagenRuta);
                        break;
                    case "Tecnología":
                        $imagen =  "images/images_tecnologia/". rand(0,1000) . $nombreImagenTemp; // ruta para guardar en la DB
                        $imagenRuta =  "../". $imagen; // guarda el archivo en la ruta
                        move_uploaded_file($temp, $imagenRuta);
                        break;
                }
                $estadoPublicacion = $_POST["estadoPublicacion"];
                $autor = "Vimer Edem"; // poner esto en dinámico, que entre por parámetro
                date_default_timezone_set("America/Lima");
                $fecha = date("Y-m-d");
    
                $contents = $objClassAdministracion->insertArticulo($titulo, $copete, $contenido, $palabraClave1, $palabraClave2, $palabraClave3, $palabraClave4, $imagen, $categoria, $estadoPublicacion, $autor, $fecha);
                if($contents){
                    $mensaje = '<div class="alert alert-success mt-4" role="alert">
                                Artículo subido correctamente.
                            </div>';
                }else{
                    $mensaje = '<div class="alert alert-danger mt-4" role="alert">
                                Error al subir artículo.
                            </div>';
                }
    
            }
            $vista = '
            <div class="row" data-masonry=\'' . json_encode('{"percentPosition": true }') . '\'>
          
              <div class="col-md-12 mb-4">
                  <form name="form" id="form" method="post" action="" enctype="multipart/form-data">
                      <h6><span class="badge bg-primary">1</span> Título del artículo</h6>
                      <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Escribe el título de artículo" required>
                      <br>
                      <h6><span class="badge bg-primary">2</span> Copete</h6>
                      <textarea class="form-control" name="copete" id="copete" placeholder="Escribe el copete del artículo" required></textarea>
                      <br>
                      <h6><span class="badge bg-primary">3</span> Contenido del artículo</h6>
                      <textarea class="form-control ckeditor" name="contenido" id="ckeditor" placeholder="Contenido" required></textarea>
                      <br>
    
                      <div class="row">
                        <div class="col-md-3">
                          <h6><span class="badge bg-primary">4</span> Palabra clave 1</h6>
                          <input type="text" class="form-control mb-4" name="palabraClave1" id="palabraClave1" placeholder="Palabra clave 1" required>
                        </div>
                        <div class="col-md-3">
                        <h6><span class="badge bg-primary">5</span> Palabra clave 2</h6>
                          <input type="text" class="form-control mb-4" name="palabraClave2" id="palabraClave2" placeholder="Palabra clave 2" required>
                        </div>
                        <div class="col-md-3">
                        <h6><span class="badge bg-primary">6</span> Palabra clave 3</h6>
                          <input type="text" class="form-control mb-4" name="palabraClave3" id="palabraClave3" placeholder="Palabra clave 3" required>
                        </div>
                        <div class="col-md-3">
                        <h6><span class="badge bg-primary">7</span> Palabra clave 4</h6>
                          <input type="text" class="form-control mb-4" name="palabraClave4" id="palabraClave4" placeholder="Palabra clave 4" value="" required>
                        </div>
                      </div>
                      
                      <div class="row">
                          <div class="col-md-4">
                              <h6><span class="badge bg-primary ">8</span> <b>Subir imágen</b></h6>
                              <input type="file" class="form-control mb-4" name="imagen" id="imagen" accept="image/*" required>
                          </div>
    
                          <div class="col-md-4">
                              <h6><span class="badge bg-primary ">9</span> <b>Categoría</b></h6>
                              <select class="form-select mb-4" name="categoria" id="categoria">
                                  <option disabled>Selecciona una categoría</option>
                                  <option value="Internacional">Internacional</option>
                                  <option value="Opinión">Opinión</option>
                                  <option value="Ciencia">Ciencia</option>
                                  <option value="Cultura">Cultura</option>
                                  <option value="Tecnología">Tecnología</option>
                              </select>
                          </div>
                        
                          <div class="col-md-4">
                              <h6><span class="badge bg-primary ">10</span> <b>Estado de publicación</b></h6>
                              <select class="form-select" name="estadoPublicacion" id="estadoPublicacion">
                                  <option disabled>Seleccionar estado</option>
                                  <option value="Pendiente">Pendiente</option>
                                  <option value="Público">Público</option>
                              </select>
                          </div>
                      </div>
                      <br>
                      <div class="d-grid gap-2">
                          <input type="submit" class="btn btn-primary" name="subirArticulo" id="subirArticulo" value="Subir artículo">
                      </div>                    
                  </form>
                '.$mensaje.'
              </div>
    
            </div> 
            ';
        }else if($nombreArchivo == "Editar artículos"){
            $vista = '
            <div class="col-md-12">
                <div class="row" data-masonry=\'' . json_encode('{"percentPosition": true }') . '\'>';
            
                $contents = $objClassAdministracion->selectArticulosAutor(); 
                if($contents != null){
                    foreach($contents as $content){
                        $categoria = $content->categoria;
                        switch($categoria){
                            case 'Internacional': $colorCategoria = "bg-danger"; $link="internacional.php"; break;
                            case 'Opinión': $colorCategoria =  "bg-warning"; $link="opinion.php"; break;
                            case 'Ciencia': $colorCategoria = "bg-success"; $link="ciencia.php"; break;
                            case 'Cultura': $colorCategoria = "bg-secondary"; $link="cultura.php"; break;
                            case 'Tecnología': $colorCategoria = "bg-primary"; $link="tecnologia.php"; break; 
                        }
                        
                        $vista .= '
                        <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-2" style="background-image: url(../'.$content->imagen.')">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h4 class="pt-5 mt-5 mb-4 fw-bold">'.$content->titulo.'</h4>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                <img loading="lazy" src="../images/logo.png" alt="Bootstrap" width="40" height="40" class="rounded-circle border border-white">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                <h6 class="badge '.$colorCategoria.' fst-italic">'.$content->categoria.'</h6>
                                </li>
                            </ul>
                            <span class="text-small"><b><i class="fa-sharp fa-solid fa-calendar-days"></i> '.$content->fecha.'</b></span>
                            </div>
                            <div class="card-body">
                                <div class="d-grid gap-2">
                                <a href="editar-articulo.php?id='.$content->id.'&categoria='.$content->categoria.'&titulo='.$content->titulo.'" class="btn btn-warning text-white" type="button">Editar artículo</a>
                                </div>
                            </div>
                        </div>
                        </div>
                        ';
                    }
                }else{
                    $vista .= '
                    <div class="alert alert-danger" role="alert">
                        Aún no existen artículos.
                    </div>
                    ';
                }
    
                $vista .= '                      
                </div>
                <!--Fin artículos-->
            </div>';
        }

        $template = '
        <div class="col-md-8">

        <!--Inicio artículos-->
        <h3>'.$nombreArchivo.'</h3>
        <hr>
        '.$vista.'

        </div>
        ';
        return $template;
    }

    public function sectionEditarAdministracion_row8($id, $categoria, $titulo){
        $objClassAdministracion = new ClassAdministracion();

        $mensaje = '';
        if(isset($_POST["editarArticulo"])){
            $titulo = $_POST["titulo"];
            $copete = $_POST["copete"];
            $contenido = $_POST["contenido"];
            $palabraClave1 = $_POST["palabraClave1"];
            $palabraClave2 = $_POST["palabraClave2"];
            $palabraClave3 = $_POST["palabraClave3"];
            $palabraClave4 = $_POST["palabraClave4"];
            $nombreImagenTemp = $_FILES["imagen"]["name"];
            $temp = $_FILES["imagen"]["tmp_name"];
            $imagenActual = $_POST["imagenActual"];
            $categoria = $_POST["categoria"];

            switch($categoria){
                case "Internacional":
                    if(($nombreImagenTemp != "") && ($temp != "")){
                        $imagen =  "images/images_internacional/". rand(0,1000) . $nombreImagenTemp; // ruta para guardar en la DB
                        $imagenRuta =  "../". $imagen; // guarda el archivo en la ruta
                        move_uploaded_file($temp, $imagenRuta);
                    }else{
                        $imagen = $imagenActual;
                    }
                    break;
                case "Opinión":
                    if(($nombreImagenTemp != "") && ($temp != "")){
                        $imagen =  "images/images_opinion/". rand(0,1000) . $nombreImagenTemp; // ruta para guardar en la DB
                        $imagenRuta =  "../". $imagen; // guarda el archivo en la ruta
                        move_uploaded_file($temp, $imagenRuta);
                    }else{
                        $imagen = $imagenActual;
                    }
                    break;
                case "Ciencia":
                    if(($nombreImagenTemp != "") && ($temp != "")){
                        $imagen =  "images/images_ciencia/". rand(0,1000) . $nombreImagenTemp; // ruta para guardar en la DB
                        $imagenRuta =  "../". $imagen; // guarda el archivo en la ruta
                        move_uploaded_file($temp, $imagenRuta);
                    }else{
                        $imagen = $imagenActual;
                    }
                    break;
                case "Cultura":
                    if(($nombreImagenTemp != "") && ($temp != "")){
                        $imagen =  "images/images_cultura/". rand(0,1000) . $nombreImagenTemp; // ruta para guardar en la DB
                        $imagenRuta =  "../". $imagen; // guarda el archivo en la ruta
                        move_uploaded_file($temp, $imagenRuta);
                    }else{
                        $imagen = $imagenActual;
                    }
                    break;
                case "Tecnología":
                    if(($nombreImagenTemp != "") && ($temp != "")){
                        $imagen =  "images/images_tecnologia/". rand(0,1000) . $nombreImagenTemp; // ruta para guardar en la DB
                        $imagenRuta =  "../". $imagen; // guarda el archivo en la ruta
                        move_uploaded_file($temp, $imagenRuta);
                    }else{
                        $imagen = $imagenActual;
                    }
                    break;
            }
            $estadoPublicacion = $_POST["estadoPublicacion"];
            $autor = "Vimer Edem"; // poner esto en dinámico, que entre por parámetro
            //date_default_timezone_set("America/Lima");
            //$fecha = date("d-m-Y");

            $contents = $objClassAdministracion->updateArticulo($id, $titulo, $copete, $contenido, $palabraClave1, $palabraClave2, $palabraClave3, $palabraClave4, $imagen, $categoria, $estadoPublicacion, $autor);
            if($contents){
                $mensaje = '<div class="alert alert-success mt-4" role="alert">
                            Artículo actualizado correctamente.
                        </div>';
            }else{
                $mensaje = '<div class="alert alert-danger mt-4" role="alert">
                            Error al actualizar artículo.
                        </div>';
            }

        }

        $contents = $objClassAdministracion->selectArticuloAutor($id, $categoria, $titulo); 
        if($contents != null){
            foreach($contents as $content){
                $vista = '
                <div class="row" data-masonry=\'' . json_encode('{"percentPosition": true }') . '\'>
              
                  <div class="col-md-12 mb-4">
                      <form name="form" id="form" method="post" action="" enctype="multipart/form-data">
                          <h6><span class="badge bg-warning">1</span> Título del artículo</h6>
                          <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Escribe el título de artículo" value="'.$content->titulo.'" required>
                          <br>
                          <h6><span class="badge bg-warning">2</span> Copete</h6>
                          <textarea class="form-control" name="copete" id="copete" placeholder="Escribe el copete del artículo" required>'.$content->copete.'</textarea>
                          <br>
                          <h6><span class="badge bg-warning">3</span> Contenido del artículo</h6>
                          <textarea class="form-control ckeditor" name="contenido" id="ckeditor" placeholder="Contenido" required>'.$content->contenido.'</textarea>
                          <br>
        
                          <div class="row">
                            <div class="col-md-3">
                              <h6><span class="badge bg-warning">4</span> Palabra clave 1</h6>
                              <input type="text" class="form-control mb-4" name="palabraClave1" id="palabraClave1" placeholder="Palabra clave 1" value="'.$content->palabraClave1.'" required>
                            </div>
                            <div class="col-md-3">
                            <h6><span class="badge bg-warning">5</span> Palabra clave 2</h6>
                              <input type="text" class="form-control mb-4" name="palabraClave2" id="palabraClave2" placeholder="Palabra clave 2" value="'.$content->palabraClave2.'" required>
                            </div>
                            <div class="col-md-3">
                            <h6><span class="badge bg-warning">6</span> Palabra clave 3</h6>
                              <input type="text" class="form-control mb-4" name="palabraClave3" id="palabraClave3" placeholder="Palabra clave 3" value="'.$content->palabraClave3.'" required>
                            </div>
                            <div class="col-md-3">
                            <h6><span class="badge bg-warning">7</span> Palabra clave 4</h6>
                              <input type="text" class="form-control mb-4" name="palabraClave4" id="palabraClave4" placeholder="Palabra clave 4" value="'.$content->palabraClave4.'" value="" required>
                            </div>
                          </div>
                          
                          <div class="row">
                              <div class="col-md-4">
                                  <h6><span class="badge bg-warning ">8</span> <b>Subir imágen</b></h6>
                                  <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
                                  <input type="hidden" name="imagenActual" id="imagenActual" value="'.$content->imagen.'">
                                  <div id="passwordHelpBlock" class="form-text mb-4">
                                        <b>Imagen actual:</b> '.basename($content->imagen).'
                                  </div>
                              </div>
        
                              <div class="col-md-4">
                                  <h6><span class="badge bg-warning ">9</span> <b>Categoría</b></h6>
                                  <select class="form-select mb-4" name="categoria" id="categoria">
                                      <option disabled>Selecciona una categoría</option>
                                      <option value="Internacional">Internacional</option>
                                      <option value="Opinión">Opinión</option>
                                      <option value="Ciencia">Ciencia</option>
                                      <option value="Cultura">Cultura</option>
                                      <option value="Tecnología">Tecnología</option>
                                  </select>
                              </div>
                            
                              <div class="col-md-4">
                                  <h6><span class="badge bg-warning ">10</span> <b>Estado de publicación</b></h6>
                                  <select class="form-select" name="estadoPublicacion" id="estadoPublicacion">
                                      <option disabled>Seleccionar estado</option>
                                      <option value="Pendiente">Pendiente</option>
                                      <option value="Público">Público</option>
                                  </select>
                              </div>
                          </div>
                          <br>
                          <div class="d-grid gap-2">
                              <input type="submit" class="btn btn-warning text-white" name="editarArticulo" id="editarArticulo" value="Editar artículo">
                          </div>                    
                      </form>
                    '.$mensaje.'
                  </div>
                </div>
                
                
                <script>
                document.getElementById("categoria").value = "'.$content->categoria.'";
                document.getElementById("estadoPublicacion").value = "'.$content->estadoPublicacion.'"; 
    
                </script>';    
            }
        }else{
            $vista = '<div class="alert alert-danger mt-4" role="alert">
                            El artículo no existe.
                      </div>';
        }

        $template = '
        <div class="col-md-8">

        <!--Inicio artículos-->
        <h3>Editar artículo</h3>
        <hr>
        '.$vista.'

        </div>
        ';
        return $template;
    }

    public function acciones_row4($nombreArchivo){

        $lista = "";
        switch($nombreArchivo){
            case 'Inicio': 
                $lista = '
                <li class="list-group-item list-group-item-primary"><a href="inicio.php"><b>Inicio</b></a></li>
                <li class="list-group-item"><a href="publicar-articulos"><b>Publicar artículos</b></a></li>
                <li class="list-group-item"><a href="editar-articulos"><b>Editar artículos</b></a></li>
                <li class="list-group-item"><a href="eliminar-articulos"><b>Eliminar artículos</b></a></li>
                <li class="list-group-item"><a href="publicar-curiosidades"><b>Publicar curiosidades</b></a></li>
                <li class="list-group-item"><a href="editar-curiosidades"><b>Editar curiosidades</b></a></li>
                <li class="list-group-item"><a href="eliminar-curiosidades"><b>Eliminar curiosidades</b></a></li>
                '; 
            break;
            case 'Publicar artículos': 
                $lista = '
                <li class="list-group-item"><a href="inicio.php"><b>Inicio</b></a></li>
                <li class="list-group-item list-group-item-primary"><a href="publicar-articulos"><b>Publicar artículos</b></a></li>
                <li class="list-group-item"><a href="editar-articulos"><b>Editar artículos</b></a></li>
                <li class="list-group-item"><a href="eliminar-articulos"><b>Eliminar artículos</b></a></li>
                <li class="list-group-item"><a href="publicar-curiosidades"><b>Publicar curiosidades</b></a></li>
                <li class="list-group-item"><a href="editar-curiosidades"><b>Editar curiosidades</b></a></li>
                <li class="list-group-item"><a href="eliminar-curiosidades"><b>Eliminar curiosidades</b></a></li>
                '; 
            break;
            case 'Editar artículos': 
                $lista = '
                <li class="list-group-item"><a href="inicio.php"><b>Inicio</b></a></li>
                <li class="list-group-item"><a href="publicar-articulos"><b>Publicar artículos</b></a></li>
                <li class="list-group-item list-group-item-primary"><a href="editar-articulos"><b>Editar artículos</b></a></li>
                <li class="list-group-item"><a href="eliminar-articulos"><b>Eliminar artículos</b></a></li>
                <li class="list-group-item"><a href="publicar-curiosidades"><b>Publicar curiosidades</b></a></li>
                <li class="list-group-item"><a href="editar-curiosidades"><b>Editar curiosidades</b></a></li>
                <li class="list-group-item"><a href="eliminar-curiosidades"><b>Eliminar curiosidades</b></a></li>
                '; 
            break;
            case 'Editar artículo': 
                $lista = '
                <li class="list-group-item"><a href="inicio.php"><b>Inicio</b></a></li>
                <li class="list-group-item"><a href="publicar-articulos"><b>Publicar artículos</b></a></li>
                <li class="list-group-item list-group-item-primary"><a href="editar-articulos"><b>Editar artículos</b></a></li>
                <li class="list-group-item"><a href="eliminar-articulos"><b>Eliminar artículos</b></a></li>
                <li class="list-group-item"><a href="publicar-curiosidades"><b>Publicar curiosidades</b></a></li>
                <li class="list-group-item"><a href="editar-curiosidades"><b>Editar curiosidades</b></a></li>
                <li class="list-group-item"><a href="eliminar-curiosidades"><b>Eliminar curiosidades</b></a></li>
                '; 
            break;
            case 'Eliminar artículos': 
                $lista = '
                <li class="list-group-item"><a href="inicio.php"><b>Inicio</b></a></li>
                <li class="list-group-item"><a href="publicar-articulos"><b>Publicar artículos</b></a></li>
                <li class="list-group-item"><a href="editar-articulos"><b>Editar artículos</b></a></li>
                <li class="list-group-item list-group-item-primary"><a href="eliminar-articulos"><b>Eliminar artículos</b></a></li>
                <li class="list-group-item"><a href="publicar-curiosidades"><b>Publicar curiosidades</b></a></li>
                <li class="list-group-item"><a href="editar-curiosidades"><b>Editar curiosidades</b></a></li>
                <li class="list-group-item"><a href="eliminar-curiosidades"><b>Eliminar curiosidades</b></a></li>
                '; 
            break;
            case 'Publicar curiosidades': 
                $lista = '
                <li class="list-group-item"><a href="inicio.php"><b>Inicio</b></a></li>
                <li class="list-group-item"><a href="publicar-articulos"><b>Publicar artículos</b></a></li>
                <li class="list-group-item"><a href="editar-articulos"><b>Editar artículos</b></a></li>
                <li class="list-group-item"><a href="eliminar-articulos"><b>Eliminar artículos</b></a></li>
                <li class="list-group-item list-group-item-primary"><a href="publicar-curiosidades"><b>Publicar curiosidades</b></a></li>
                <li class="list-group-item"><a href="editar-curiosidades"><b>Editar curiosidades</b></a></li>
                <li class="list-group-item"><a href="eliminar-curiosidades"><b>Eliminar curiosidades</b></a></li>
                '; 
            break;
            case 'Editar curiosidades': 
                $lista = '
                <li class="list-group-item"><a href="inicio.php"><b>Inicio</b></a></li>
                <li class="list-group-item"><a href="publicar-articulos"><b>Publicar artículos</b></a></li>
                <li class="list-group-item"><a href="editar-articulos"><b>Editar artículos</b></a></li>
                <li class="list-group-item"><a href="eliminar-articulos"><b>Eliminar artículos</b></a></li>
                <li class="list-group-item"><a href="publicar-curiosidades"><b>Publicar curiosidades</b></a></li>
                <li class="list-group-item list-group-item-primary"><a href="editar-curiosidades"><b>Editar curiosidades</b></a></li>
                <li class="list-group-item"><a href="eliminar-curiosidades"><b>Eliminar curiosidades</b></a></li>
                '; 
            break;
            case 'Editar curiosidad': 
                $lista = '
                <li class="list-group-item"><a href="inicio.php"><b>Inicio</b></a></li>
                <li class="list-group-item"><a href="publicar-articulos"><b>Publicar artículos</b></a></li>
                <li class="list-group-item"><a href="editar-articulos"><b>Editar artículos</b></a></li>
                <li class="list-group-item"><a href="eliminar-articulos"><b>Eliminar artículos</b></a></li>
                <li class="list-group-item"><a href="publicar-curiosidades"><b>Publicar curiosidades</b></a></li>
                <li class="list-group-item list-group-item-primary"><a href="editar-curiosidades"><b>Editar curiosidades</b></a></li>
                <li class="list-group-item"><a href="eliminar-curiosidades"><b>Eliminar curiosidades</b></a></li>
                '; 
            break;
            case 'Eliminar curiosidades': 
                $lista = '
                <li class="list-group-item"><a href="inicio.php"><b>Inicio</b></a></li>
                <li class="list-group-item"><a href="publicar-articulos"><b>Publicar artículos</b></a></li>
                <li class="list-group-item"><a href="editar-articulos"><b>Editar artículos</b></a></li>
                <li class="list-group-item"><a href="eliminar-articulos"><b>Eliminar artículos</b></a></li>
                <li class="list-group-item"><a href="publicar-curiosidades"><b>Publicar curiosidades</b></a></li>
                <li class="list-group-item"><a href="editar-curiosidades"><b>Editar curiosidades</b></a></li>
                <li class="list-group-item list-group-item-primary"><a href="eliminar-curiosidades"><b>Eliminar curiosidades</b></a></li>
                '; 
            break;
        }

        $template = ' 
        <aside class="col-md-4">
        <div class="" style="top: 2rem;"><!--div class="position-sticky" style="top: 2rem;"-->
            <h3>Acciones</h3>
            <hr>

            <ul class="list-group shadow">
                '.$lista.'
            </ul>


            <h3 class="mt-4">Únete a nuestros canales</h3>
            <hr>
                <div class="shadow">
                    <a href="#"><img loading="lazy" src="../images/telegram.png" class="d-block w-100" alt="..."></a>
                </div>
                <br>
                <div class="shadow">
                    <a href="#"><img loading="lazy" src="../images/whatsApp.png" class="d-block w-100" alt="..."></a>
                </div>
            </div>
        
            <div class="p-4">
            <h4 class="fst-italic">Redes</h4>
            <ol class="list-unstyled">
                <li><a href="#"><i class="fa-brands fa-square-facebook"></i> /MiProyect</a></li>
                <li><a href="#"><i class="fa-brands fa-square-instagram"></i> /miproyect</a></li>
                <li><a href="#"><i class="fa-brands fa-square-twitter"></i> /MiProyect</a></li>
            </ol>
            </div>

        </div>
        </div>
    </aside>';
        return $template;
    }

    public function footer(){
        $year = date('Y');
        $template = '
            <footer class="color-blue mt-4">
            <div class="container">
            <div class="row p-4">
                <div class="col-md-4">
                <img src="../images/logo.png" class="rounded mx-auto d-block mt-2" height="25%" width="25%" alt="<?php echo NAME; ?>">
                <p class="text-white mt-2 miText-justify">
                '.NAME_APP.' es el punto de encuentro de personas amantes del conocimiento. Una comunidad que te sorprenderá con diversos temas que posiblemente hasta ahora desconocias.
                </p>
                <br>
                </div>
                <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="text-white mt-2">SECCIONES</h6>
                        <a href="../portada.php" class="miLink">Portada</a><br>
                        <a href="../internacional.php" class="miLink">Internacional</a><br>
                        <a href="../opinion.php" class="miLink">Opinión</a><br>
                        <a href="../ciencia.php" class="miLink">Ciencia</a><br>
                        <a href="../cultura.php" class="miLink">Cultura</a><br>
                        <a href="../tecnologia.php" class="miLink">Tecnología</a><br>
                        <!--a href="autores.php" class="miLink">Autores</a><br-->
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-white mt-2">OTROS ENLACES</h6>
                        <a href="../otros-enlaces/ayuda.php" class="miLink">Ayuda</a><br>
                        <a href="../otros-enlaces/contacto.php" class="miLink">Contacto</a><br>
                        <a href="../otros-enlaces/declaracion-de-principios.php" class="miLink">Declaración de principios</a><br>
                        <a href="../otros-enlaces/aviso-legal.php" class="miLink">Aviso legal</a><br>
                        <a href="../otros-enlaces/politica-de-privacidad.php" class="miLink">Política de privacidad</a><br>
                        <a href="../otros-enlaces/politica-de-cookies.php" class="miLink">Política de cookies</a><br>
                        <a href="../otros-enlaces/preguntas-frecuentes.php" class="miLink">Preguntas frecuentes</a><br>
                        <a href="../otros-enlaces/lector-rss.php" class="miLink">Lector RSS</a>
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-white mt-2">BUSCADOR</h6>
                        <form method="" action="">
                        <div class="input-group mt-3">
                            <input type="text" class="form-control" placeholder="Buscar artículo">
                            <button type="submit" class="input-group-text btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
    
            <div class="footer mt-auto py-3 text-center color-blue-bold">
            <div class="container">
                <span class="text-white text-small">&copy '.NAME_APP.' - '. $year .' Todos los derechos reservados</span>
            </div>
            </div>
        </footer>
        ';
        return $template;
    }

}





?>