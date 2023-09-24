<?php
include("Model/ClassArticulos.php");

class ClassTemplates{

    public function metaDescription(){
        $description = "MiProyect es el punto de encuentro de personas amantes del conocimiento. Una comunidad que te sorprenderá con diversos temas que posiblemente hasta ahora desconocias.";
        return $description;

    }

    public function metaDescriptionLeer($id, $categoria, $titulo){
        $objClassArticulo = new ClassArticulos();
        $contents = $objClassArticulo->selectArticuloLeer($id, $categoria, $titulo);
        if($contents != null){
            foreach($contents as $content){
                $description = $content->copete;
            }
        }else{
            $description = "MiProyect es el punto de encuentro de personas amantes del conocimiento. Una comunidad que te sorprenderá con diversos temas que posiblemente hasta ahora desconocias.";
        }
        return $description;
    }

    public function metaKeywords(){
        $keywords = "PERÚ, INTERNACIONAL, OPINIÓN, CIENCIA, CULTURA, TECNOLOGÍA";
        return $keywords;
    }

    public function metaKeywordsLeer($id, $categoria, $titulo){
        $objClassArticulo = new ClassArticulos();
        $contents = $objClassArticulo->selectPalabrasClave($id, $categoria, $titulo);
        if($contents != null){
            foreach($contents as $content){
                $keywords = $content->palabraClave1 . ", " .
                            $content->palabraClave2 . ", " . 
                            $content->palabraClave3 . ", " .
                            $content->palabraClave4;
            }
        }else{
            $keywords = "PERÚ, INTERNACIONAL, OPINIÓN, CIENCIA, CULTURA, TECNOLOGÍA";
        }
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

    public function metaCompartirPostFacebookLeer($id, $categoria, $titulo, $baseUrlImagen, $baseUrl){ // modificar meta property="og:image"
        $objClassArticulo = new ClassArticulos();
        $contents = $objClassArticulo->selectArticuloLeer($id, $categoria, $titulo);
        if($contents != null){
            foreach($contents as $content){
                $fechaISO = date("Y/m/d", strtotime($content->fecha));
                $meta = '
                <!-- Etiquetas meta para compartir en Facebook -->
                <meta property="og:title" content="'.$content->titulo.'">
                <meta property="og:description" content="'.$content->copete.'">
                <meta property="og:image" content="'.$baseUrlImagen.'/proyectoPersonal/'.$content->imagen.'">
                <meta property="og:url" content="'.$baseUrl.'?id='.$content->id.'&categoria='.$content->categoria.'&titulo='.$content->titulo.'">
                <meta property="og:site_name" content="'.NAME_APP.'">
                <meta property="og:type" content="article">
                
                <!-- Reemplaza los valores entre comillas con los correspondientes a tu post -->
                
                <!-- Etiquetas adicionales opcionales -->
                <meta property="og:locale" content="es_ES">
                <meta property="article:author" content="'.$content->autor.'">
                <meta property="article:published_time" content="'.$fechaISO.'">
                ';
            }
        }else{
            date_default_timezone_set("America/Lima");
            $fechaISO = date("Y-m-d");
            $meta = '
            <!-- Etiquetas meta para compartir en Facebook -->
            <meta property="og:title" content="'.NAME_APP.'">
            <meta property="og:description" content="MiProyect es el punto de encuentro de personas amantes del conocimiento. Una comunidad que te sorprenderá con diversos temas que posiblemente hasta ahora desconocias.">
            <meta property="og:image" content="'.$baseUrlImagen.'/proyectoPersonal/images/logo.png">
            <meta property="og:url" content="'.$baseUrl.'">
            <meta property="og:site_name" content="'.NAME_APP.'">
            <meta property="og:type" content="article">
            
            <meta property="og:locale" content="es_ES">
            <meta property="article:author" content="'.NAME_APP.'">
            <meta property="article:published_time" content="'.$fechaISO.'">
            ';
        }
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

    public function metaCompartirPostTwitterLeer($id, $categoria, $titulo, $baseUrlImagen, $baseUrl){ // // modificar meta name="twitter:image"
        $objClassArticulo = new ClassArticulos();
        $contents = $objClassArticulo->selectArticuloLeer($id, $categoria, $titulo);
        if($contents != null){
            foreach($contents as $content){
                $fechaISO = date("Y/m/d", strtotime($content->fecha));
                $meta = '
                <!-- Etiquetas Twitter Cards para compartir en Twitter -->
                <meta name="twitter:card" content="summary_large_image">
                <meta name="twitter:title" content="'.$content->titulo.'">
                <meta name="twitter:description" content="'.$content->copete.'">
                <meta name="twitter:image" content="'.$baseUrlImagen.'/proyectoPersonal/'.$content->imagen.'">
                <meta name="twitter:url" content="'.$baseUrl.'?id='.$content->id.'&categoria='.$content->categoria.'&titulo='.$content->titulo.'">';
            }
        }else{
            date_default_timezone_set("America/Lima");
            $fechaISO = date("Y-m-d");
            $meta = '
            <!-- Etiquetas Twitter Cards para compartir en Twitter -->
            <meta name="twitter:card" content="summary_large_image">
            <meta name="twitter:title" content="'.NAME_APP.'">
            <meta name="twitter:description" content="MiProyect es el punto de encuentro de personas amantes del conocimiento. Una comunidad que te sorprenderá con diversos temas que posiblemente hasta ahora desconocias.">
            <meta name="twitter:image" content="'.$baseUrlImagen.'/proyectoPersonal/images/logo.png">
            <meta name="twitter:url" content="'.$baseUrl.'">';
        }
        return $meta;
    }

    public function title(){
        $objClassArticulo = new ClassArticulos();
        $contents = $objClassArticulo->selectArticuloTitulos();
        foreach($contents as $content){
            $title = $content->titulo;
        }
        return $title;
    }

    public function contenedorCarga(){ // funciona con el script que está en index.php
        $template = '    
        <div id="contenedor_carga">
            <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <!--div id="carga"></div-->
            <center><img src="images/logo.png" class="img-fluid" id="carga" height="30%" width="30%" style="margin-top:60%"></center>
            <div class="d-flex justify-content-center mt-4">
            <button class="btn btn-carga" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Cargando...
            </button>
            </div>
            </div>
            <div class="col-md-4"></div>
            </div>
        </div>';
      return $template;
    }

    public function nav(){
        $year = date('Y');
        $template = '
            <nav class="navbar color-blue fixed-top">
                <div class="container container-fluid">
                    <a class="navbar-brand" href="index.php">
                        <img src="images/logo.png" alt="'.NAME_APP.'" width="50" height="30" class="d-inline-block align-text-top" title="'.NAME_APP.'">
                    </a>
                    <button class="btn btn-outline-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-bars text-white"></i></button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">     
                        <a class="navbar-brand" href="index.php">
                        <img src="images/logo.png" alt="'.NAME_APP.'" width="50" height="30" class="d-inline-block align-text-top" title="'.NAME_APP.'">
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
                            <a href="portada.php"><i class="fa-solid fa-chevron-left"></i> Portada</a>
                            <a href="internacional.php"><i class="fa-solid fa-chevron-left"></i> Internacional</a>
                            <a href="opinion.php"><i class="fa-solid fa-chevron-left"></i> Opinión</a>
                            <a href="ciencia.php"><i class="fa-solid fa-chevron-left"></i> Ciencia</a>
                            <a href="cultura.php"><i class="fa-solid fa-chevron-left"></i> Cultura</a>
                            <a href="tecnologia.php"><i class="fa-solid fa-chevron-left"></i> Tecnología</a>
                        </div>
                        <hr class="mt-4">
                        <h6 class="mt-2">OTROS ENLACES</h6>
                        <a href="otros-enlaces/ayuda.php" class="miLink">Ayuda</a><br>
                        <a href="otros-enlaces/contacto.php" class="miLink">Contacto</a><br>
                        <a href="otros-enlaces/declaracion-de-principios.php" class="miLink">Declaración de principios</a><br>
                        <a href="otros-enlaces/aviso-legal.php" class="miLink">Aviso legal</a><br>
                        <a href="otros-enlaces/politica-de-privacidad.php" class="miLink">Política de privacidad</a><br>
                        <a href="otros-enlaces/politica-de-cookies.php" class="miLink">Política de cookies</a><br>
                        <a href="otros-enlaces/preguntas-frecuentes.php" class="miLink">Preguntas frecuentes</a><br>
                        <a href="otros-enlaces/lector-rss.php" class="miLink">Lector RSS</a>
                        <hr class="mt-4">
                        <center><span class="text-small">&copy '.NAME_APP.' - '. $year .' Todos los derechos reservados</span></center>
                    </div>
                    </div>
                </div>
            </nav>';
            return $template;
    }

    public function myMargin(){
        $template = '
                    <div class="my-margin">
                    </div>';
        return $template;
    }

    public function header(){
        $template = '    
        <header>
            <div class="bg-sky bg-image">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                    <form class="input-group" name="formBuscarArticulo" id="formBuscarArticulo" method="GET" action="buscar-articulo.php">
                        <input type="text" class="form-control" placeholder="Buscar artículo" name="articulo" id="articulo">
                        <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <div class="container nav-scroller py-1 mt-4">
                    <nav class="nav d-flex justify-content-between">
                        <a class="miLink2" href="portada.php"><b>PORTADA</b></a>
                        <a class="miLink2" href="internacional.php"><b>INTERNACIONAL</b></a>
                        <a class="miLink2" href="opinion.php"><b>OPINIÓN</b></a>
                        <a class="miLink2" href="ciencia.php"><b>CIENCIA</b></a>
                        <a class="miLink2" href="cultura.php"><b>CULTURA</b></a>
                        <a class="miLink2" href="tecnologia.php"><b>TECNOLOGÍA</b></a>
                    </nav>
                    </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </header>';
        return $template;
    }

    public function ultimasNovedades(){
        $objClassArticulo = new ClassArticulos();
        $template = '
        <div class="nav-scroller mt-4 py-1">
                    <div class="row">
                            <div class="col-md-2"><b>ÚLTIMAS NOVEDADES: </b></div>
                            <div class="col-md-10">
                                <marquee id="">';
                                    $contents = $objClassArticulo->selectArticuloTitulos();
                                    if($contents != null){
                                        foreach($contents as $content){
                                            $template .= '
                                                <a class="p-2 link-secondary" href="leer.php?id='.$content->id.'&categoria='.$content->categoria.'&titulo='.$content->titulo.'">'.$content->titulo.'</a> |
                                            ';
                                        }
                                    }else{
                                        $template .= 'No se encontraron títulos.'; 
                                    }                                        
                                $template .= '
                                </marquee>
                            </div>
                    </div>
                    <hr>
        </div>';
        return $template;
    }

    public function articulosUno_row12(){
        $objClassArticulo = new ClassArticulos();

        $contents = $objClassArticulo->selectArticuloUnoInternacional();
        if($contents != null){
            foreach($contents as $content){
                $template = '
                <div class="col mb-2">
                <div class="card shadow h-100">
                    <img loading="lazy" src="'.$content->imagen.'" class="card-img-top" height="100%" alt="'.$content->titulo.'">
                    <div class="card-body">
                    <h6 class="badge bg-danger fst-italic"><a href="internacional.php" class="text-white">'.$content->categoria.'</a></h6>
                    <h6 class="card-title"><a href="leer.php?id='.$content->id.'&categoria='.$content->categoria.'&titulo='.$content->titulo.'">'.$content->titulo.'</a></h6>  
                    <span class="text-small"><b><i class="fa-sharp fa-solid fa-calendar-days"></i> '.$content->fecha.'</b></span> 
                    </div>
                </div>
                </div>';
            }
        }else{
            $template .= '
            <div class="alert alert-danger" role="alert">
                No existe un artículo para estar categoría.
            </div>
            ';
        }

        $contents = $objClassArticulo->selectArticuloUnoOpinion();
        if($contents != null){
            foreach($contents as $content){
                $template .= '
                <div class="col mb-2">
                <div class="card shadow h-100">
                    <img loading="lazy" src="'.$content->imagen.'" class="card-img-top" height="100%" alt="'.$content->titulo.'">
                    <div class="card-body">
                    <h6 class="badge bg-warning fst-italic"><a href="opinion.php" class="text-white">'.$content->categoria.'</a></h6>
                    <h6 class="card-title"><a href="leer.php?id='.$content->id.'&categoria='.$content->categoria.'&titulo='.$content->titulo.'">'.$content->titulo.'</a></h6>  
                    <span class="text-small"><b><i class="fa-sharp fa-solid fa-calendar-days"></i> '.$content->fecha.'</b></span> 
                    </div>
                </div>
                </div>';
            }
        }else{
            $template .= '
            <div class="alert alert-danger" role="alert">
                No existe un artículo para estar categoría.
            </div>
            ';
        }

        $contents = $objClassArticulo->selectArticuloUnoCiencia();
        if($contents != null){
            foreach($contents as $content){
                $template .= '
                <div class="col mb-2">
                <div class="card shadow h-100">
                    <img loading="lazy" src="'.$content->imagen.'" class="card-img-top" height="100%" alt="'.$content->titulo.'">
                    <div class="card-body">
                    <h6 class="badge bg-success fst-italic"><a href="ciencia.php" class="text-white">'.$content->categoria.'</a></h6>
                    <h6 class="card-title"><a href="leer.php?id='.$content->id.'&categoria='.$content->categoria.'&titulo='.$content->titulo.'">'.$content->titulo.'</a></h6>  
                    <span class="text-small"><b><i class="fa-sharp fa-solid fa-calendar-days"></i> '.$content->fecha.'</b></span> 
                    </div>
                </div>
                </div>';
            }
        }else{
            $template .= '
            <div class="alert alert-danger" role="alert">
                No existe un artículo para estar categoría.
            </div>
            ';
        }

        $contents = $objClassArticulo->selectArticuloUnoCultura();
        if($contents != null){
            foreach($contents as $content){
                $template .= '
                <div class="col mb-2">
                <div class="card shadow h-100">
                    <img loading="lazy" src="'.$content->imagen.'" class="card-img-top" height="100%" alt="'.$content->titulo.'">
                    <div class="card-body">
                    <h6 class="badge bg-secondary fst-italic"><a href="cultura.php" class="text-white">'.$content->categoria.'</a></h6>
                    <h6 class="card-title"><a href="leer.php?id='.$content->id.'&categoria='.$content->categoria.'&titulo='.$content->titulo.'">'.$content->titulo.'</a></h6>  
                    <span class="text-small"><b><i class="fa-sharp fa-solid fa-calendar-days"></i> '.$content->fecha.'</b></span> 
                    </div>
                </div>
                </div>';
            }
        }else{
            $template .= '
            <div class="alert alert-danger" role="alert">
                No existe un artículo para estar categoría.
            </div>
            ';
        }

        $contents = $objClassArticulo->selectArticuloUnoTecnologia();
        if($contents != null){
            foreach($contents as $content){
                $template .= '
                <div class="col mb-2">
                <div class="card shadow h-100">
                    <img loading="lazy" src="'.$content->imagen.'" class="card-img-top" height="100%" alt="'.$content->titulo.'">
                    <div class="card-body">
                    <h6 class="badge bg-primary fst-italic"><a href="tecnologia.php" class="text-white">'.$content->categoria.'</a></h6>
                    <h6 class="card-title"><a href="leer.php?id='.$content->id.'&categoria='.$content->categoria.'&titulo='.$content->titulo.'">'.$content->titulo.'</a></h6>  
                    <span class="text-small"><b><i class="fa-sharp fa-solid fa-calendar-days"></i> '.$content->fecha.'</b></span> 
                    </div>
                </div>
                </div>';
            }
        }else{
            $template .= '
            <div class="alert alert-danger" role="alert">
                No existe un artículo para estar categoría.
            </div>
            ';
        }

        return $template;
    }

    public function articulosUno_row8(){
        $objClassArticulo = new ClassArticulos();
        $template = '
        <div class="col-md-8">
            <aside class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
            <h4 class="fst-italic">Manifiesto</h4>
            <p class="text-justify">Nuestro aporte al desarrollo de la cultura es un deber más como persona, no podemos aspirar a cambiar aquello que no nos agrada de la sociedad si carecemos de los medios para compartir opiniones, expresar ideas o dar puntos de vista. Convirtiéndonos así, en una alternativa frente a la censura y la cultura de la cancelación que múltiples medios pretenden normalizar.</p> 
            <hr>
            <i><b>Juntos, por la libertad de expresión y el pensamiento independiente.</b></i>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </aside>

            <!--Inicio artículos-->
            <h3>Más recientes</h3>
            <hr>

            <div class="row" data-masonry=\'' . json_encode('{"percentPosition": true }') . '\'>';
        
            $contents = $objClassArticulo->selectArticulos();
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
                    
                    $template .= '
                    <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-2" style="background-image: url('.$content->imagen.')">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h4 class="pt-5 mt-5 mb-4 fw-bold"><a href="leer.php?id='.$content->id.'&categoria='.$content->categoria.'&titulo='.$content->titulo.'" class="miLink2">'.$content->titulo.'</a></h4>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="me-auto">
                            <a href=""><img loading="lazy" src="images/logo.png" alt="Bootstrap" width="40" height="40" class="rounded-circle border border-white"></a>
                            </li>
                            <li class="d-flex align-items-center me-3">
                            <h6 class="badge '.$colorCategoria.' fst-italic"><a href="'.$link.'" class="text-white">'.$content->categoria.'</a></h6>
                            </li>
                        </ul>
                        <span class="text-small"><b><i class="fa-sharp fa-solid fa-calendar-days"></i> '.$content->fecha.'</b></span>
                        </div>
                    </div>
                    </div>
                    ';
                }
            }else{
                $template .= '
                <div class="alert alert-danger" role="alert">
                    Aún no existen artículos.
                </div>
                ';
            }

            $template .= '                      
            </div>
            <!--Fin artículos-->
        </div>';
        return $template;
    }


    public function verMas_row8($nombreArchivo){
        $objClassArticulo = new ClassArticulos();
        $template = '
        <div class="col-md-8">

        <!--Inicio artículos-->
        <h3>'.$nombreArchivo.'</h3>
        <hr>

        <div class="row" data-masonry=\'' . json_encode('{"percentPosition": true }') . '\'>';
        
        $contents = $objClassArticulo->selectArticuloOpcion($nombreArchivo);
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
                
                $template .= '
                <div class="col-sm-6 col-lg-4 mb-4">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-2" style="background-image: url('.$content->imagen.')">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h4 class="pt-5 mt-5 mb-4 fw-bold"><a href="leer.php?id='.$content->id.'&categoria='.$content->categoria.'&titulo='.$content->titulo.'" class="miLink2">'.$content->titulo.'</a></h4>
                    <ul class="d-flex list-unstyled mt-auto">
                        <li class="me-auto">
                        <a href=""><img loading="lazy" src="images/logo.png" alt="Bootstrap" width="40" height="40" class="rounded-circle border border-white"></a>
                        </li>
                        <li class="d-flex align-items-center me-3">
                        <h6 class="badge '.$colorCategoria.' fst-italic"><a href="'.$link.'" class="text-white">'.$content->categoria.'</a></h6>
                        </li>
                    </ul>
                    <span class="text-small"><b><i class="fa-sharp fa-solid fa-calendar-days"></i> '.$content->fecha.'</b></span>
                    </div>
                </div>
                </div>
                ';
            }
        }else{
            $template .= '
            <div class="alert alert-danger" role="alert">
                No existen un artículos para estar categoría.
            </div>
            ';
        }

        $template .= '
                                    
        </div>
        <!--Fin artículos-->

    </div>
        ';
        return $template;
    }



    public function sectionLeer_row8($id, $categoria, $titulo){
        $objClassArticulo = new ClassArticulos();
        $template = '
        <div class="col-md-8">

        <!--Inicio artículos-->
        <h3>'.$categoria.'</h3>
        <hr>';

        $contents = $objClassArticulo->selectArticuloLeer($id, $categoria, $titulo);
        if($contents != null){
            // contador de visitas 
            $objClassArticulo->updateContadorArticulo($id, $categoria, $titulo);
            foreach($contents as $content){
                $categoria = $content->categoria;
                switch($categoria){
                    case 'Internacional': $colorCategoria = "bg-danger"; $link="internacional.php"; break;
                    case 'Opinión': $colorCategoria =  "bg-warning"; $link="opinion.php"; break;
                    case 'Ciencia': $colorCategoria = "bg-success"; $link="ciencia.php"; break;
                    case 'Cultura': $colorCategoria = "bg-secondary"; $link="cultura.php"; break;
                    case 'Tecnología': $colorCategoria = "bg-primary"; $link="tecnologia.php"; break; 
                }
                $template .= '
                <div class="row">
                <p>'.$content->copete.'</p>
                <div class="col-sm-12 col-lg-12 mb-4">
                  <div class="card card-cover shadow h-100 overflow-hidden text-white bg-dark rounded-2" style="background-image: url('.$content->imagen.')">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h1 class="pt-5 mt-5 mb-4 fw-bold">'.$content->titulo.'</h1>
                      <ul class="d-flex list-unstyled mt-auto">
                        <li class="me-auto">
                        <h6 class="badge '.$colorCategoria.' fst-italic"><a href="'.$link.'" class="text-white">'.$content->categoria.'</a></h6>
                        </li>
                      </ul>
                      <span class="text-small"><b><i class="fa-sharp fa-solid fa-calendar-days"></i> '.$content->fecha.'</b></span>
                    </div>
                  </div>
                </div>
              </div>
                
              <h6><img loading="lazy" src="https://github.com/twbs.png" alt="Bootstrap" width="40" height="40" class="rounded-circle border border-white"> <a href="">'.$content->autor.'</a></h6>
              <hr>
    
              <div class="row mb-2">
                    <div class="col-md-2"><a href="#"><i class="fa-brands fa-square-facebook"></i> Facebook</a></div>
                    <div class="col-md-2"><a href="#"><i class="fa-brands fa-x-twitter"></i> Twitter</a></div>
                    <div class="col-md-2"><a href="#"><i class="fa-brands fa-square-whatsapp"></i> WhatssApp</a></div>
                    <div class="col-md-2"><a href="#"><i class="fa-brands fa-linkedin"></i> Linkedin</a></div>
                    <div class="col-md-2"><a href="#"><i class="fa-solid fa-square-envelope"></i> Email</a></div>
              </div>
              <hr>
              '.$content->contenido.'

              <div class="alert alert-success mt-4 mb-4">
                <div id="container">
                    <input type="hidden" class="hidden" id="text-to-speech-'.$content->id.'" value="'.strip_tags($content->contenido).'">
                    <div class="row" id="controls">
                    <div class="col-md-2"><a class="btn" href="#"><i class="fa-solid fa-print"></i> Imprimir</a> |</div> 
                    <div class="col-md-2"><button class="btn" id="play-button-'.$content->id.'"><i class="fa-solid fa-play"></i> Escuchar</button></div>
                    <div class="col-md-2"><button class="btn" id="pause-button-'.$content->id.'"><i class="fa-sharp fa-solid fa-pause"></i> Pausa</button></div>
                    <div class="col-md-2"><button class="btn" id="resume-button-'.$content->id.'"><i class="fa-solid fa-circle"></i> Reanudar</button></div>
                    </div>
                    <div class="progress">
                    <div class="progress-bar bg-primary" id="progress-'.$content->id.'"></div>
                    </div>
                </div>
              </div>
              
              <div class="alert alert-light" role="alert">
                  <b><i class="fa-solid fa-tags"></i> Etiquetas:</b>
                  <a href="etiqueta.php?etiqueta='. $content->palabraClave1.'">#'. $content->palabraClave1.'</a>
                  <a href="etiqueta.php?etiqueta='. $content->palabraClave2.'">#'. $content->palabraClave2.'</a>
                  <a href="etiqueta.php?etiqueta='. $content->palabraClave3.'">#'. $content->palabraClave3.'</a>
                  <a href="etiqueta.php?etiqueta='. $content->palabraClave4.'">#'. $content->palabraClave4.'</a>
              </div>
              
              <h3>También puedes ver</h3>
              <hr>

              <div class="row" data-masonry=\'' . json_encode('{"percentPosition": true }') . '\'>';
              $contents = $objClassArticulo->selectArticuloSieteRelacionados($id, $categoria);
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
                      
                      $template .= '
                      <div class="col-sm-6 col-lg-4 mb-4">
                      <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-2" style="background-image: url('.$content->imagen.')">
                          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                          <h4 class="pt-5 mt-5 mb-4 fw-bold"><a href="leer.php?id='.$content->id.'&categoria='.$content->categoria.'&titulo='.$content->titulo.'" class="miLink2">'.$content->titulo.'</a></h4>
                          <ul class="d-flex list-unstyled mt-auto">
                              <li class="me-auto">
                              <a href=""><img loading="lazy" src="images/logo.png" alt="Bootstrap" width="40" height="40" class="rounded-circle border border-white"></a>
                              </li>
                              <li class="d-flex align-items-center me-3">
                              <h6 class="badge '.$colorCategoria.' fst-italic"><a href="'.$link.'" class="text-white">'.$content->categoria.'</a></h6>
                              </li>
                          </ul>
                          <span class="text-small"><b><i class="fa-sharp fa-solid fa-calendar-days"></i> '.$content->fecha.'</b></span>
                          </div>
                      </div>
                      </div>
                      ';
                  }
              }else{
                  $template .= '
                  <div class="alert alert-danger" role="alert">
                    No existen artículos para estar categoría.
                  </div>
                  ';
              }
              $template .= '
              </div>';
              
            }
        }else{
            $template .= '
            <div class="alert alert-danger" role="alert">
                Este artículo no exíste.
            </div>
            ';
        }

        $template .= '
        </div>
        ';
        return $template;
    }

    public function resultadosBusqueda_row8($articulo){
        $objClassArticulo = new ClassArticulos();
        $template = '
        <div class="col-md-8">

            <!--Inicio artículos-->
            <h3>Resultados búsqueda</h3>
            <hr>

            <div class="row" data-masonry=\'' . json_encode('{"percentPosition": true }') . '\'>';
        
            $contents = $objClassArticulo->selectArticulosResultadosBusqueda($articulo);
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
                    
                    $template .= '
                    <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-2" style="background-image: url('.$content->imagen.')">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h4 class="pt-5 mt-5 mb-4 fw-bold"><a href="leer.php?id='.$content->id.'&categoria='.$content->categoria.'&titulo='.$content->titulo.'" class="miLink2">'.$content->titulo.'</a></h4>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="me-auto">
                            <a href=""><img loading="lazy" src="images/logo.png" alt="Bootstrap" width="40" height="40" class="rounded-circle border border-white"></a>
                            </li>
                            <li class="d-flex align-items-center me-3">
                            <h6 class="badge '.$colorCategoria.' fst-italic"><a href="'.$link.'" class="text-white">'.$content->categoria.'</a></h6>
                            </li>
                        </ul>
                        <span class="text-small"><b><i class="fa-sharp fa-solid fa-calendar-days"></i> '.$content->fecha.'</b></span>
                        </div>
                    </div>
                    </div>
                    ';
                }
            }else{
                $template .= '
                <div class="alert alert-danger" role="alert">
                    Aún no existen artículos.
                </div>
                ';
            }

            $template .= '                      
            </div>
            <!--Fin artículos-->
        </div>';
        return $template;
    }

    public function publicarArticulo_row8(){
        $objClassArticulo = new ClassArticulos();
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
                    $imagen =  "images/images_internacional/". rand(0,1000) . $nombreImagenTemp;
                    move_uploaded_file($temp, $imagen);
                    break;
                case "Opinión":
                    $imagen =  "images/images_opinion/". rand(0,1000) . $nombreImagenTemp;
                    move_uploaded_file($temp, $imagen);
                    break;
                case "Ciencia":
                    $imagen =  "images/images_ciencia/". rand(0,1000) . $nombreImagenTemp;
                    move_uploaded_file($temp, $imagen);
                    break;
                case "Cultura":
                    $imagen =  "images/images_cultura/". rand(0,1000) . $nombreImagenTemp;
                    move_uploaded_file($temp, $imagen);
                    break;
                case "Tecnología":
                    $imagen =  "images/images_tecnologia/". rand(0,1000) . $nombreImagenTemp;
                    move_uploaded_file($temp, $imagen);
                    break;
            }
            $estadoPublicacion = $_POST["estadoPublicacion"];
            $autor = "Vimer Edem"; // poner esto en dinámico, que entre por parámetro
            date_default_timezone_set("America/Lima");
            $fecha = date("Y-m-d");

            $contents = $objClassArticulo->insertArticulo($titulo, $copete, $contenido, $palabraClave1, $palabraClave2, $palabraClave3, $palabraClave4, $imagen, $categoria, $estadoPublicacion, $autor, $fecha);
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
        $template = '
        <div class="col-md-8">
        <!--Inicio artículos-->
        <h3>Publicar artículo</h3>
        <hr>

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
                      <input type="text" class="form-control mb-4" name="palabraClave4" id="palabraClave4" placeholder="Palabra clave 4" required>
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
        <!--Fin artículos-->
        </div>        
        ';

        return $template;
    }

    public function publicarCuriosidades_row8(){
        $objClassArticulo = new ClassArticulos();
        $mensaje = '';
        if(isset($_POST["subirCuriosidad"])){
            $titulo = $_POST["titulo"];
            $nombreImagenTemp1 = $_FILES["imagen1"]["name"];
            $nombreImagenTemp2 = $_FILES["imagen2"]["name"];
            $nombreImagenTemp3 = $_FILES["imagen3"]["name"];
            $nombreImagenTemp4 = $_FILES["imagen4"]["name"];
            $temp1 = $_FILES["imagen1"]["tmp_name"];
            $temp2 = $_FILES["imagen2"]["tmp_name"];
            $temp3 = $_FILES["imagen3"]["tmp_name"];
            $temp4 = $_FILES["imagen4"]["tmp_name"];

            $imagen1 =  "images/images_curiosidades/". rand(0,1000) . $nombreImagenTemp1;
            move_uploaded_file($temp1, $imagen1);

            $imagen2 =  "images/images_curiosidades/". rand(0,1000) . $nombreImagenTemp2;
            move_uploaded_file($temp2, $imagen2);

            $imagen3 =  "images/images_curiosidades/". rand(0,1000) . $nombreImagenTemp3;
            move_uploaded_file($temp3, $imagen3);

            $imagen4 =  "images/images_curiosidades/". rand(0,1000) . $nombreImagenTemp4;
            move_uploaded_file($temp4, $imagen4);

            date_default_timezone_set("America/Lima");
            $fecha = date("Y-m-d");

            $contents = $objClassArticulo->insertCuriosidades($titulo, $imagen1, $imagen2, $imagen3, $imagen4, $fecha);
            if($contents){
                $mensaje = '<div class="alert alert-success mt-4" role="alert">
                            Curiosidad subido correctamente.
                        </div>';
            }else{
                $mensaje = '<div class="alert alert-danger mt-4" role="alert">
                            Error al subir curiosidad.
                        </div>';
            }

        }
        $template = '
        <div class="col-md-8">
        <!--Inicio artículos-->
        <h3>Publicar curiosidades</h3>
        <hr>

        <div class="row" data-masonry=\'' . json_encode('{"percentPosition": true }') . '\'>
      
          <div class="col-md-12 mb-4">
              <form name="form" id="form" method="post" action="" enctype="multipart/form-data">
                  <h6><span class="badge bg-primary">1</span> Título de la curiosidad</h6>
                  <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Escribe el título de artículo" required>
                  <br>
                  <div class="row">
                    <div class="col-md-3">
                        <h6><span class="badge bg-primary ">2</span> <b>Subir imágen 1</b></h6>
                        <input type="file" class="form-control form-control-sm mb-2" name="imagen1" id="imagen1" accept="image/*" required>
                    </div>
                    <div class="col-md-3">
                        <h6><span class="badge bg-primary ">3</span> <b>Subir imágen 2</b></h6>
                        <input type="file" class="form-control form-control-sm mb-2" name="imagen2" id="imagen2" accept="image/*" required>
                    </div>
                    <div class="col-md-3">
                        <h6><span class="badge bg-primary ">4</span> <b>Subir imágen 3</b></h6>
                        <input type="file" class="form-control form-control-sm mb-2" name="imagen3" id="imagen3" accept="image/*" required>
                    </div>
                    <div class="col-md-3">
                        <h6><span class="badge bg-primary ">5</span> <b>Subir imágen 4</b></h6>
                        <input type="file" class="form-control form-control-sm mb-2" name="imagen4" id="imagen4" accept="image/*" required>
                    </div>
                  </div>
                  <br>
                  <div class="d-grid gap-2">
                      <input type="submit" class="btn btn-primary" name="subirCuriosidad" id="subirCuriosidad" value="Subir curiosidad">
                  </div>                    
              </form>
            '.$mensaje.'
          </div>

        </div>
        <!--Fin artículos-->
        </div>        
        
        ';

        return $template;
    }

    public function articulosMasVistos_row4(){
        $objClassArticulo = new ClassArticulos();
        $template = ' 
        <aside class="col-md-4">
        <div class="" style="top: 2rem;"><!--div class="position-sticky" style="top: 2rem;"-->
            <h3>Más vistos</h3>
            <hr>';
            $contents = $objClassArticulo->selectMasLeidoInternacional();
            if($contents != null){
                foreach($contents as $content){
                    $template .= '
                    <div class="card shadow mb-4" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img loading="lazy" src="'.$content->imagen.'" width="100%" height="100%" alt="'.$content->titulo.'">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h6 class="card-title"><a href="leer.php?id='.$content->id.'&categoria='.$content->categoria.'&titulo='.$content->titulo.'">'.$content->titulo.'</a></h6>
                            <h6 class="badge bg-danger fst-italic"><a href="internacional.php" class="text-white">'.$content->categoria.'</a></h6>
                            <p class="card-text"><small class="text-muted"><i class="fa-solid fa-calendar-days"></i> '.$content->fecha.'</small></p>
                        </div>
                        </div>
                    </div>
                    </div>
                    ';
                }
            }else{
                $template .= '
                <div class="alert alert-danger mb-4" role="alert">
                  Artículo no disponible.
                </div>
                ';
            }

            $contents = $objClassArticulo->selectMasLeidoOpinion();
            if($contents != null){
                foreach($contents as $content){
                    $template .= '
                    <div class="card shadow mb-4" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img loading="lazy" src="'.$content->imagen.'" width="100%" height="100%" alt="'.$content->titulo.'">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h6 class="card-title"><a href="leer.php?id='.$content->id.'&categoria='.$content->categoria.'&titulo='.$content->titulo.'">'.$content->titulo.'</a></h6>
                            <h6 class="badge bg-warning fst-italic"><a href="opinion.php" class="text-white">'.$content->categoria.'</a></h6>
                            <p class="card-text"><small class="text-muted"><i class="fa-solid fa-calendar-days"></i> '.$content->fecha.'</small></p>
                        </div>
                        </div>
                    </div>
                    </div>
                    ';
                }
            }else{
                $template .= '
                <div class="alert alert-danger mb-4" role="alert">
                  Artículo no disponible.
                </div>
                ';
            }

            $contents = $objClassArticulo->selectMasLeidoCiencia();
            if($contents != null){
                foreach($contents as $content){
                    $template .= '
                    <div class="card shadow mb-4" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img loading="lazy" src="'.$content->imagen.'" width="100%" height="100%" alt="'.$content->titulo.'">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h6 class="card-title"><a href="leer.php?id='.$content->id.'&categoria='.$content->categoria.'&titulo='.$content->titulo.'">'.$content->titulo.'</a></h6>
                            <h6 class="badge bg-success fst-italic"><a href="ciencia.php" class="text-white">'.$content->categoria.'</a></h6>
                            <p class="card-text"><small class="text-muted"><i class="fa-solid fa-calendar-days"></i> '.$content->fecha.'</small></p>
                        </div>
                        </div>
                    </div>
                    </div>
                    ';
                }
            }else{
                $template .= '
                <div class="alert alert-danger mb-4" role="alert">
                  Artículo no disponible.
                </div>
                ';
            }

            $contents = $objClassArticulo->selectMasLeidoCultura();
            if($contents != null){
                foreach($contents as $content){
                    $template .= '
                    <div class="card shadow mb-4" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img loading="lazy" src="'.$content->imagen.'" width="100%" height="100%" alt="'.$content->titulo.'">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h6 class="card-title"><a href="leer.php?id='.$content->id.'&categoria='.$content->categoria.'&titulo='.$content->titulo.'">'.$content->titulo.'</a></h6>
                            <h6 class="badge bg-secondary fst-italic"><a href="cultura.php" class="text-white">'.$content->categoria.'</a></h6>
                            <p class="card-text"><small class="text-muted"><i class="fa-solid fa-calendar-days"></i> '.$content->fecha.'</small></p>
                        </div>
                        </div>
                    </div>
                    </div>
                    ';
                }
            }else{
                $template .= '
                <div class="alert alert-danger mb-4" role="alert">
                  Artículo no disponible.
                </div>
                ';
            }

            $contents = $objClassArticulo->selectMasLeidoTecnologia();
            if($contents != null){
                foreach($contents as $content){
                    $template .= '
                    <div class="card shadow mb-4" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img loading="lazy" src="'.$content->imagen.'" width="100%" height="100%" alt="'.$content->titulo.'">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h6 class="card-title"><a href="leer.php?id='.$content->id.'&categoria='.$content->categoria.'&titulo='.$content->titulo.'">'.$content->titulo.'</a></h6>
                            <h6 class="badge bg-primary fst-italic"><a href="tecnologia.php" class="text-white">'.$content->categoria.'</a></h6>
                            <p class="card-text"><small class="text-muted"><i class="fa-solid fa-calendar-days"></i> '.$content->fecha.'</small></p>
                        </div>
                        </div>
                    </div>
                    </div>
                    ';
                }
            }else{
                $template .= '
                <div class="alert alert-danger mb-4" role="alert">
                  Artículo no disponible.
                </div>
                ';
            }

            $template.= '
            <!--Zona de pruebas-->
            <!--Fin zona de pruebas-->


            <h3 class="mt-4">Curiosidades</h3>
            <hr>
            <div id="carouselExample" class="carousel slide">
                <a href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <div class="carousel-inner">';
                $contents = $objClassArticulo->selectCuriosidades();
                if($contents != null){
                    foreach($contents as $content){
                        $template .= '
                        <div class="carousel-item active">
                            <img loading="lazy" src="'.$content->imagen1.'" class="d-block w-100" alt="'.$content->titulo.'">
                        </div>
                        <div class="carousel-item">
                            <img loading="lazy" src="'.$content->imagen2.'" class="d-block w-100" alt="'.$content->titulo.'">
                        </div>
                        <div class="carousel-item">
                            <img loading="lazy" src="'.$content->imagen3.'" class="d-block w-100" alt="'.$content->titulo.'">
                        </div>
                        <div class="carousel-item">
                            <img loading="lazy" src="'.$content->imagen4.'" class="d-block w-100" alt="'.$content->titulo.'">
                        </div>
                        ';
                    }
                }else{
                    $template .= '
                    <div class="alert alert-danger mb-4" role="alert">
                      Artículo no disponible.
                    </div>
                    ';
                }
                $template .='
                </div>
                </a>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <i class="fa-solid fa-angle-left"></i>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <center><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></center>

                
                    <div id="carouselExample2" class="carousel slide">
                    <div class="carousel-inner">';
                    
                    if($contents != null){
                        foreach($contents as $content){
                            $template .= '
                            <div class="carousel-item active">
                                <img loading="lazy" src="'.$content->imagen1.'" class="d-block w-100" alt="'.$content->titulo.'">
                            </div>
                            <div class="carousel-item">
                                <img loading="lazy" src="'.$content->imagen2.'" class="d-block w-100" alt="'.$content->titulo.'">
                            </div>
                            <div class="carousel-item">
                                <img loading="lazy" src="'.$content->imagen3.'" class="d-block w-100" alt="'.$content->titulo.'">
                            </div>
                            <div class="carousel-item">
                                <img loading="lazy" src="'.$content->imagen4.'" class="d-block w-100" alt="'.$content->titulo.'">
                            </div>
                            ';
                        }
                    }else{
                        $template .= '
                        <div class="alert alert-danger mb-4" role="alert">
                          Artículo no disponible.
                        </div>
                        ';
                    }    
                    $template .= '
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample2" data-bs-slide="prev">
                    <i class="fa-solid fa-angle-left"></i>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample2" data-bs-slide="next">
                    <i class="fa-solid fa-angle-right"></i>
                    </button>
                    </div>
                
                </div>
            </div>
            </div>
            <!-- Fin Modal-->

                <h3 class="mt-4">Únete a nuestros canales</h3>
                <hr>
                <div class="shadow">
                    <a href="#"><img loading="lazy" src="images/telegram.png" class="d-block w-100" alt="..."></a>
                </div>
                <br>
                <div class="shadow">
                    <a href="#"><img loading="lazy" src="images/whatsApp.png" class="d-block w-100" alt="..."></a>
                </div>

        
                <h3 class="mt-4">¿Nos invitas un cafecito?</h3>
                <hr>
                <div class="shadow">
                    <a href="#"><img loading="lazy" src="images/cafecito.png" class="d-block w-100" alt="..."></a>
                </div>

                
            </div>

            <div class="p-4">
            <!--h4 class="fst-italic">Archivos</h4>
            <ol class="list-unstyled mb-0">
                <li><a href="#">March 2021</a></li>
                <li><a href="#">February 2021</a></li>
                <li><a href="#">January 2021</a></li>
                <li><a href="#">December 2020</a></li>
                <li><a href="#">November 2020</a></li>
                <li><a href="#">October 2020</a></li>
                <li><a href="#">September 2020</a></li>
                <li><a href="#">August 2020</a></li>
                <li><a href="#">July 2020</a></li>
                <li><a href="#">June 2020</a></li>
                <li><a href="#">May 2020</a></li>
                <li><a href="#">April 2020</a></li>
            </ol-->
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
                <img src="images/logo.png" class="rounded mx-auto d-block mt-2" height="25%" width="25%" alt="<?php echo NAME; ?>">
                <p class="text-white mt-2 miText-justify">
                '.NAME_APP.' es el punto de encuentro de personas amantes del conocimiento. Una comunidad que te sorprenderá con diversos temas que posiblemente hasta ahora desconocias.
                </p>
                <br>
                </div>
                <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="text-white mt-2">SECCIONES</h6>
                        <a href="portada.php" class="miLink">Portada</a><br>
                        <a href="internacional.php" class="miLink">Internacional</a><br>
                        <a href="opinion.php" class="miLink">Opinión</a><br>
                        <a href="ciencia.php" class="miLink">Ciencia</a><br>
                        <a href="cultura.php" class="miLink">Cultura</a><br>
                        <a href="tecnologia.php" class="miLink">Tecnología</a><br>
                        <!--a href="autores.php" class="miLink">Autores</a><br-->
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-white mt-2">OTROS ENLACES</h6>
                        <a href="otros-enlaces/ayuda.php" class="miLink">Ayuda</a><br>
                        <a href="otros-enlaces/contacto.php" class="miLink">Contacto</a><br>
                        <a href="otros-enlaces/declaracion-de-principios.php" class="miLink">Declaración de principios</a><br>
                        <a href="otros-enlaces/aviso-legal.php" class="miLink">Aviso legal</a><br>
                        <a href="otros-enlaces/politica-de-privacidad.php" class="miLink">Política de privacidad</a><br>
                        <a href="otros-enlaces/politica-de-cookies.php" class="miLink">Política de cookies</a><br>
                        <a href="otros-enlaces/preguntas-frecuentes.php" class="miLink">Preguntas frecuentes</a><br>
                        <a href="otros-enlaces/lector-rss.php" class="miLink">Lector RSS</a>
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