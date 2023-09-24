<?php
include("../Model/ClassOtrosEnlaces.php"); // esta clase también hereda de ClassArticulos.php
include("../Controller/Functions.php"); // para la funcion codigoCaptcha()

error_reporting(0); // para evitar las variables inexistentes en los inputs de entrada

class ClassTemplatesOtrosEnlaces{

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

    public function myMargin(){
        $template = '
                    <div class="my-margin">
                    </div>';
        return $template;
    }


    public function sectionOtrosEnlaces_row8($nombreArchivo){
        $objClassOtrosEnlaces = new ClassOtrosEnlaces();

        if($nombreArchivo == "Ayuda"){
            $vista = '<p>Esto es la sección de ayuda (Aún estamos en su desarrollo)</p>';
        }else if($nombreArchivo == "Contacto"){
            $mensaje = '';
            $codigo = codigoCaptcha();

            if(isset($_POST["enviarMensaje"])){
                $nombreContacto = $_POST["nombreContacto"];
                $correoContacto = $_POST["correoContacto"];
                $asuntoContacto = $_POST["asuntoContacto"];
                $mensajeContacto = $_POST["mensajeContacto"];
                $captachaGeneradoContacto = $_POST["captachaGeneradoContacto"];
                $captchaContacto = $_POST["captchaContacto"];

                if($captachaGeneradoContacto == $captchaContacto){
                    $contents = $objClassOtrosEnlaces->insertContactoMensajeRecibido($nombreContacto, $correoContacto, $asuntoContacto, $mensajeContacto);
                    if($contents){
                        $mensaje='<div class="alert alert-success mt-4" role="alert">
                            Mensaje enviado correctamente, en breve te responderemos.
                        </div>';
                    }else{
                        $mensaje='<div class="alert alert-danger mt-4" role="alert">
                            Error al enviar el mensaje, inténte nuevamente.
                        </div>';
                    }
                }else{
                    $mensaje='<div class="alert alert-danger mt-4" role="alert">
                        Ingrese el código captcha correcto, inténte nuevamente.
                    </div>';
                }
                
            }
            $vista = '
            <p>Si necesitas contactarnos para hacer alguna consulta o simplemente deseas dejarnos algun comentario, por favor siéntete libre de hacerlo. 
            Respondemos de lunes a viernes en horario laboral (Lima, Perú)</p>
            <form name="" class="mt-4 mb-4" method="post" action="">
                <div class="row">
                    <div class="col-md-4">
                    <label for="nombreContacto"><b>Nombre:</b> </label><input type="text" class="form-control mb-2" name="nombreContacto" maxlength="50" placeholder="Ingrese su nombre" value="'.$nombreContacto.'" required>
                    </div>
                    <div class="col-md-4">
                        <label for="nombreContacto"><b>Correo:</b> </label><input type="email" class="form-control mb-2" name="correoContacto" maxlength="80" placeholder="Ingrese su correo" value="'.$correoContacto.'" required>
                    </div>
                    <div class="col-md-4">
                        <label for="nombreContacto"><b>Asunto:</b> </label><input type="text" class="form-control mb-2" name="asuntoContacto" maxlength="80" placeholder="Ingrese su asunto" value="'.$asuntoContacto.'" required>
                    </div>
                    <div class="col-md-12">
                        <label for="mensajeContacto"><b>Mensaje:</b> </label><textarea class="form-control mb-2" name="mensajeContacto" rows="5" maxlength="250" placeholder="Ingrese su mensaje (Máximo 250 caracteres)" required>'.$mensajeContacto.'</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="captachaGeneradoContacto"><b>Código captcha:</b> </label><input type="text" class="form-control mb-2" name="captachaGeneradoContacto" maxlength="6" value="'.$codigo.'" readonly="readonly" required>
                    </div>
                    <div class="col-md-4">
                        <label for="captchaContacto"><b>Captcha:</b> </label><input type="text" class="form-control mb-2" name="captchaContacto" maxlength="6" placeholder="Ingrese el código captcha" required>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="d-grid mt-4">
                        <input type="submit" class="btn btn-primary" name="enviarMensaje" value="Enviar mensaje">
                    </div>
                </div>
            </form>
            '.$mensaje.'';
        }else if($nombreArchivo == "Declaración de principios"){
            $vista = '<p>Nuestro aporte al desarrollo de la cultura es un deber más como persona, no podemos aspirar a cambiar aquello que no nos agrada de la sociedad si carecemos de los medios para compartir opiniones, expresar ideas o dar puntos de vista. Convirtiéndonos así, en una alternativa frente a la censura y la cultura de la cancelación que múltiples medios pretenden normalizar.</p>
                      <p>Somos un proyecto que aspira a mejorar lo que en su momento comenzó como una aventura, siempre con el compromiso de defender los valores que han forjado nuestra civilización, tales como la fortaleza, la verdad, el buen actuar y, por supuesto, la belleza. Este proyecto se basa en la afirmación de la trascendencia humana como punto de referencia.</p>
                      <p>'.NAME_APP.' nace con el objetivo principal de otorgar a esos valores el peso que les corresponde en términos de identidad, unidad e integridad, a través de este medio, para así llegar al debate nacional e internacional, sin caer en el complejo inducido de lo “políticamente correcto”. Es entonces, que nuestra misión es también dar una crítica constructiva a los distintos acontecimientos actuales.</p>
                      <i><b>Juntos, por la libertad de expresión y el pensamiento independiente.</b></i>
                      <h5 class="mt-4">Desarrollador y director</h5>
                      <p>Vimer E. G. Remón</p>';
        }else if($nombreArchivo == "Aviso legal"){
            $vista = '<p>'.NAME_APP.' desde el punto de vista legal, pone a disposición del usuario las diferentes condiciones generales que se establecen al visitar nuestro portal web. La conexión a este sitio implica la aceptación del presente Aviso Legal, la Política de Privacidad y la Política de Cookies. Ponemos en su conocimiento que se respeta y observa las obligaciones legales vigentes a los que se ajusta quien acceda al portal web, en caso contrario declinamos cualquier tipo de responsabilidad. </p>
                      <h5>Protección de datos</h5>
                      <p>En el caso de que usted nos brinde alguno de sus datos personales, '.NAME_APP.' cuenta con funcionalidades para la encriptación de datos sensibles derivados de suscripciones o registros. </p>
                      <h5>Propiedad intelectual</h5>
                      <p>'.NAME_APP.' se reserva todos los derechos de propiedad intelectual e industrial sobre los contenidos del portal web y quedan prohibidos la explotación, modificación, difusión, transformación, distribución, transmisión por cualquier medio, posterior publicación, exhibición, comunicación pública o representación total o parcial sin autorización previa, expresa y por escrito.</p>
                      <h5>Exclusión de responsabilidad</h5>
                      <p>'.NAME_APP.' declina cualquier tipo de responsabilidad que se pudiese derivar de un uso incorrecto por parte de los visitantes o suscriptores, virus, caída del servidor, problemas de conexión al portal web o a alguno de los hipervínculos. También se declina toda responsabilidad por aquellos quienes remiten enlaces al portal web de '.NAME_APP.' desde otros espacios.</p>
                      <p>El contenido de las publicaciones es enteramente responsabilidad de sus autores, '.NAME_APP.' no necesariamente comparte sus opiniones. '.NAME_APP.' así como su director y el Consejo Directivo no aceptarán responsabilidad alguna ni obligación derivada por alguna de las publicaciones.</p>
                      </ol>';
        }else if($nombreArchivo == "Política de privacidad"){
            $vista = '<p>El objetivo de esta política es exclusivamente la de informar a los interesados acerca de los tratamientos que se realiza en el portal web '.NAME_APP.' y que afecten a sus datos personales en cumplimiento de lo establecido en el Reglamento General de Protección de Datos y La Ley Orgánica de Protección de Datos. La privacidad es base importante para el portal web '.NAME_APP.', por tal motivo se informa a los usuarios que todos los datos de carácter personal que se brinden serán tratados respetando esta legalidad vigente. </p>
                      <h5>Sobre los datos</h5>
                      <p>Los datos serán utilizados con la finalidad de mejorar la gestión de los servicios ofrecidos, realizar tareas de administración, como también la de emitir información comercial y/o publicitaria por medios ordinarios y/o electrónicos sobre productos o servicios que puedan ser de interés para los usuarios. La aceptación es de carácter revocable y '.NAME_APP.' dispondrá de mecanismos de los más intuitivos posibles para conseguir tales objetivos en sus emisiones.</p>
                      <p>'.NAME_APP.' garantiza la confidencialidad con los datos de carácter personal cuando estos son tratados con el propósito de mejorar la gestión de los servicios. Se evita su alteración, pérdida y uso no autorizado por parte de terceros.</p>
                      <p>El usuario puede omitir las respuestas, informaciones, actividades o eventos obtenidos por medio de formularios o canales de difusión emitidos por '.NAME_APP.', así como de cualquier otro tipo de cuestionario que se le pueda facilitar en un futuro. Sin embargo, la omisión del usuario para facilitar determinados datos no garantiza a '.NAME_APP.' poder llevar a cabo el servicio que se le ofrece.</p>
                      <p>Respecto de los datos obtenidos por '.NAME_APP.', el usuario podrá ejercer los derechos reconocidos en la normativa de Protección de Datos y Derechos de Acceso para su rectificación, cancelación, oposición, limitación y portabilidad. Siempre y cuando, resulte legalmente viable.</p>
                      <p>'.NAME_APP.' cuenta con perfiles en las distintas redes sociales, todos los usuarios que visitan el portal web tienen la oportunidad de unirse a estás páginas o grupos. Sin embargo, se debe tener en cuenta que salvo se le solicite sus datos directamente (para acciones de recibir respuestas, informaciones, actividades o eventos), sus datos pertenecerán a la red social correspondiente, por lo que se recomienda que lea sus condiciones de uso y políticas de privacidad, así como, asegurarse de configurar sus preferencias en cuanto al tratamiento de datos.    </p>
                      <h5>Formularios y canales de difusión</h5>
                      <p>Los datos brindados por el usuario a través de formularios o canales de difusión son necesarios en algunos casos para la activación de servicios solicitados como la comunicación o para la recepción de información. El tratamiento de datos personales se establece por medio de los formularios o canales de difusión para la realización de envíos informativos relacionados a las distintas categorías que '.NAME_APP.' ofrece. El usuario al suscribirse o unirse por alguno de los enlaces ofrecidos, estás aceptando las condiciones de privacidad del portal web. </p>
                      <p>Los datos brindados serán tratados con las siguientes finalidades, dependiendo del motivo por el que hayan sido entregados: </p>
                      <ul>
                        <li><p>Resolver dudas y consultas, así como también tramitar cualquier tipo de petición que sea realizada por el usuario a través de cualquiera de las formas de contacto que se ponen a disposición en el portal web. </p></li>
                        <li><p>Emisión de comunicaciones publicitarias, por medio de los diferentes canales de difusión, así como también de actividades o eventos organizados por '.NAME_APP.'. </p></li>
                        <li><p>Tramitar las solicitudes de suscripción y admisión realizadas por el usuario a cualquiera de los servicios. En este caso, los datos serán tratados sobre la base de la relación jurídica mantenida entre las partes. El tratamiento de los datos personales permite la correcta suscripción y admisión de los diferentes servicios, por lo que es obligatorio que se faciliten los datos personales verdaderos, siendo imposible tramitar su alta en un caso contrario. </p></li>
                      </ul>
                      <p>Los datos serán conservados durante el tiempo necesario mientras se da respuesta a la solicitud, reclamo, petición o consulta del usuario y dar esta por cerrada definitivamente. Luego serán conservados a modo de registro histórico de comunicación, salvo que el usuario haya solicitado su eliminación mediante el formulario de contacto. En el caso de que el usuario solicite alguno de los servicios ofrecidos, los datos podrán ser conservados mientras dure la relación e incluso posteriormente para dar respuesta a las posibles responsabilidades legales obtenidas como producto de la relación. En el caso de que los datos sean tratados para enviar comunicaciones publicitarias, estos podrán ser almacenados de manera indefinida, salvo que el usuario no haya dado su consentimiento para las mismas o se haya opuesto a este tipo de comunicaciones. </p>
                      <h5>¿A quiénes les darás tus datos?</h5>
                      <p>Los datos brindados serán cedidos a las siguientes entidades:</p>
                      <ul>
                        <li><p>Email Godaddy, es la empresa que '.NAME_APP.' contrata para el servicio de NewsLetter con el fin de enviar publicaciones recientes por correo. Solo se hará uso del email brindado por usuario. </p></li>
                        <li><p>APIs WhatsApp y Telegram, son las funciones que permiten a '.NAME_APP.' enviar mensajes por sus canales de difusión de forma automatizada. </p></li>
                        <li><p>A los administradores de la plataforma, '.NAME_APP.' no contrata terceros para el diseño y programación del portal web ni se hace uso de algún CMS, su desarrollo es enteramente producido por su desarrollador y director.   </p></li>
                      </ul>
                      <p>El usuario acepta el tratamiento y la inclusión de sus datos brindados durante la navegación por el portal web, proporcionados mediante algún formulario o por los canales de difusión. </p>
                      <p>Si se facilita datos de terceros a través del portal, quien lo haga asume la responsabilidad de haber obtenido previamente el consentimiento, informándose de todo lo previsto en el artículo 14 del Reglamento General de Protección de datos. </p>
                      <p>'.NAME_APP.' informa a sus usuarios que a través de sus redes sociales se publican eventos, promociones o cualquier otro tipo de información publicitaria sobre los servicios que ofrece ajeno a las publicaciones propias con las categorías existentes en el portal web, el usuario acepta ser destinatario de tal información. Si el usuario no desea recibir esta información en sus perfiles de redes sociales, deberá dejar de seguir las páginas y grupos de '.NAME_APP.'. </p>
                      <p>El usuario puede ejercer respecto a los datos brindados los derechos reconocidos en la normativa de protección de datos y los derechos de acceso, rectificación, oposición, limitación, cancelación y portabilidad, siembre que resulte legalmente necesario. Estos derechos se pueden ejercer por cada usuario a través del correo de contacto con el envío de una solicitud escrita y firmada, copia de DNI del interesado, petición e indicando como asunto – Política de Privacidad. </p>
                      <p>'.NAME_APP.' se compromete en la utilización de los datos personales brindados de acuerdo con las finalidades descritas, respetando la confidencialidad, así como a dar cumplimiento a su obligación de conservar y adaptar todas las medidas necesarias para evitar su modificación, pérdida, tratamiento o acceso no autorizado a terceros, conforme a la normativa de protección de datos vigentes. </p>
                      <p>La responsabilidad sobre la veracidad de los datos ingresados en el portal web o las redes sociales de '.NAME_APP.' es exclusiva del usuario, siendo este el responsable de facilitar datos verdaderos, exactos y actualizados, siendo único responsable en caso contrario de no brindar datos verdaderos. </p>
                      <h5>LSSI-CE</h5>
                      <p>La responsabilidad sobre la veracidad de los datos ingresados en el portal web o las redes sociales de '.NAME_APP.' es exclusiva del usuario, siendo este el responsable de facilitar datos verdaderos, exactos y actualizados, siendo único responsable en caso contrario de no brindar datos verdaderos. </p>
                      <p>'.NAME_APP.' con el objetivo de garantizar el cumplimiento de la LSSI-CE (Ley de Sociedad de la Información y Comercio Electrónico) habilita en todas las comunicaciones mediante correo electrónico con usted, una clausula legal a nivel informativo donde se habilita herramientas (correo electrónico o darse de baja) para garantizar el ejercicio de oposición a la recepción de comunicaciones electrónicas de ámbito informativo o comercial de forma automática con objeto de poner mecanismo sencillos y sin coste a su disposición, para el ejercicio de tal derecho (Derecho a la oposición). </p>
                      <p>'.NAME_APP.' habilita mecanismos que permiten poder revocar en todo momento los envíos informativos. El usuario de forma general podrá ejercer la oposición a esta finalidad mediante correo electrónico, el formulario contacto o canales de difusión. </p>
                      <h5>Responsabilidad</h5>
                      <p>'.NAME_APP.' informa a los usuarios que asume la responsabilidad del uso del portal web. Tal responsabilidad se extiende al registro que fuese necesario para acceder a determinados servicios o publicaciones. En el registro, el usuario será responsable de brindar información verás. En consecuencia, al usuario se le puede proporcionar datos de acceso sobre el que será único portador, comprometiéndose de hacer un uso responsable y confidencial de este. </p>
                      <h5>Modificación de la política de privacidad. </h5>
                      <p>'.NAME_APP.' puede modificar esta Política de Privacidad en función de las exigencias legislativas, normativas o con la finalidad de mejorar los productos y servicios que el portal web brinda.</p>
                      ';
        }else if($nombreArchivo == "Política de cookies"){
            $vista = '<p>El usuario consiente el uso de cookies en su navegador, que en ningún momento permitirá su identificación, con la única finalidad de facilitar su navegación por las diferentes secciones del portal web. En cualquier caso, el usuario puede denegar las cookies modificando la configuración de su navegador.</p>
                      <p>En caso de tener duda o alguna controversia relacionada a la política de privacidad y de protección de datos personales, el usuario puede ponerse en contacto a través del correo electrónico, formulario de contacto o canales de difusión. </p>
                      <p>El tratamiento de los datos con carácter personal, así como la emisión de comunicaciones comerciales realizadas por medios electrónicos, son acorde a la Ley Orgánica de Protección de Datos de Carácter Personal y a la Ley 34/2002, del 11 de julio (Servicio de la Sociedad de Información y de Comercio Electrónico).</p>
                      <p>'.NAME_APP.' utiliza Google Analytics, un servicio prestado por Goocle Inc., este usa “Cookies” que básicamente son archivos de texto que se guardan en su navegador para permitir ayudar al desarrollador a analizar el manejo que hacen los usuarios en el portal web. La información que extrae la cookie sobre el uso del portal web será directamente transmitida y archivada por Google en sus servidores de Estados Unidos. Google utilizará esta información por cuenta de '.NAME_APP.' con el propósito de seguir la pista de uso del portal web, recopilando informes de la actividad y prestando otros servicios relacionados con la actividad del portal web y de internet. </p>
                      <p>Google puede transmitir dicha información a terceros cuando así se lo requiera la legislación o cuando o cuando aquellos terceros procesen la información por cuenta de Google. Se puede consultar la Política de Privacidad de datos de Google Analytics visitando: <a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage" target="_blank">Uso de las cookies de Google Analytics en sitios web</a></p>
                      <p>Haciendo uso de estos archivos, '.NAME_APP.' no pretende tratar datos personales de los usuarios como su correo o nombre, sino para obtener exclusivamente información relacionada con el número de usuarios que visitan el portal, el número de páginas visitadas, frecuencia y reincidencias de visitas, etc. Todo esto con el fin de mejorar el portal web detectando nuevas necesidades y brindar un mejor servicio a los usuarios. El uso de cookies es de expresión consentida, en caso contrario, puede bloquear y eliminar las cookies instaladas a través de la configuración de las opciones de su navegador. </p>
                      <p>El usuario puede rechazar el tratamiento de los datos o información rechazando el uso de cookies por medio de la selección de configuración apropiada en su navegador. Tiene que saber que, si el usuario opta por esta opción, no podrá usar el portal web con plena funcionalidad. Al utilizar el portal web de '.NAME_APP.', el usuario consiente el tratamiento de su información por parte de Google con los fines ya descritos.  </p>
                      <p>Compartimos una lista con los enlaces de los principales navegadores y dispositivos para que el usuario disponga de toda la información y pueda consultar cómo gestionar las cookies en su navegador. </p>
                      <ul>
                        <li><b>Chrome:</b> <a href="https://support.google.com/chrome/answer/95647?co=GENIE.Platform%3DDesktop&hl=es" target="_blank">Borrar, permitir y gestionar las cookies en Chrome</a></li>
                        <li><b>Firefox:</b> <a href="https://support.mozilla.org/es/kb/cookies-informacion-que-los-sitios-web-guardan-en-" target="_blank">Información que los sitios web guardan en tu equipo</a></li>
                        <li><b>Explorer:</b> <a href="https://support.microsoft.com/es-es/help/278835/how-to-delete-cookie-files-in-internet-explorer" target="_blank">Cómo eliminar archivos de cookies en Internet Explorer</a></li>
                        <li><b>Safari</b> <a href="https://support.apple.com/kb/PH19214?viewlocale=es_ES&locale=en_GB" target="_blank">Borrar las cookies en Safari en el Mac</a></li>
                        <li><b>Opera</b> <a href="http://help.opera.com/Linux/10.60/es-ES/cookies.html" target="_blank">Preferencias web</a></li>
                      </ul>';
        }else if($nombreArchivo == "Preguntas frecuentes"){
            $vista = '<p>Esto es la sección de preguntas frecuentes (Aún estamos en su desarrollo)</p>';
        }else if($nombreArchivo == "Lector RSS"){
            $vista = '
            <p>RSS es un formato que permite suscribirnos de una manera sencilla y gratuita a diferentes contenidos de nuestras webs favoritas para así, estar al tanto de las últimas novedades. 
            Nosotros te ofrecemos este servicio de forma gratuita, todas las publicaciones están organizadas por categoría. ¡Anímate! es facil de usar, solo tienes que copiar el enlace RSS de tu interes y listo.</p>
            <div class="row">
                <div class="col-md-6">
                    <h5>¿Qué es RSS?</h5>
                    <p>La tecnología RSS permite enviar de forma automática las publicaciones de una web a una aplicación de lectura o agregador.
                    Nosotros, disponemos de este servicio de forma gratuita, para que nuestros lectores obtengan al instante las últimas publicaciones.</p>
                    <h5>Lectores RSS</h5>
                    <p>Exísten múltiples opciones para utilizar las fuentes RSS, la más común consiste en instalar una aplicación de lectura o agregador RSS.
                    No olvides agregarnos, recuerda que nuestro servicio es gratuito y puedes obtener las últimas publicaciones en tan solo un instante.</p>
                </div>
                <div class="col-md-6">
                    <h5>Nuestros enlaces RSS</h5>
                    <label for="politica" class="mb-2"><b>Política</b></label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control form-control-sm" id="politica" readonly="readonly" value="Política">
                        <button class="btn btn-warning btn-sm" id="btnPolitica" onclick="copiarEnlace1();"><i class="fa-solid fa-copy"></i> Copiar</button>
                    </div>
                    <label for="economia" class="mb-2"><b>Economía</b></label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control form-control-sm" id="economia" readonly="readonly" value="Economía">
                        <button class="btn btn-warning btn-sm" id="btnEconomia" onclick="copiarEnlace2();"><i class="fa-solid fa-copy"></i> Copiar</button>
                    </div>
                    <label for="ciencia" class="mb-2"><b>Ciencia</b></label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control form-control-sm" id="ciencia" readonly="readonly" value="Ciencia">
                        <button class="btn btn-warning btn-sm" id="btnCiencia" onclick="copiarEnlace3();"><i class="fa-solid fa-copy"></i> Copiar</button>
                    </div>
                    <label for="cultura" class="mb-2"><b>Cultura</b></label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control form-control-sm" id="cultura" readonly="readonly" value="Cultura">
                        <button class="btn btn-warning btn-sm" id="btnCultura" onclick="copiarEnlace4();"><i class="fa-solid fa-copy"></i> Copiar</button>
                    </div>
                    <label for="tecnologia" class="mb-2"><b>Tecnología</b></label>
                    <div class="input-group mb-4">
                        <input type="text" class="form-control form-control-sm" id="tecnologia" readonly="readonly" value="Tecnología">
                        <button class="btn btn-warning btn-sm" id="btnTecnologia" onclick="copiarEnlace5();"><i class="fa-solid fa-copy"></i> Copiar</button>
                    </div>
                    https://www.youtube.com/watch?v=7vmRbs9PmGs&t=11s
                    https://www.youtube.com/watch?v=DzeFsX2CcvE
                    https://servicios.elpais.com/rss/
                    https://es.wired.com/articulos/mejores-lectores-de-feeds-rss
                </div>
            </div>
            ';
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

    public function otrosEnlaces_row4($nombreArchivo){
        
        $lista = "";
        switch($nombreArchivo){
            case 'Ayuda': 
                $lista = '
                <li class="list-group-item list-group-item-primary"><a href="ayuda"><b>Ayuda</b></a></li>
                <li class="list-group-item"><a href="contacto"><b>Contacto</b></a></li>
                <li class="list-group-item"><a href="declaracion-de-principios"><b>Declaración de principios</b></a></li>
                <li class="list-group-item"><a href="aviso-legal"><b>Aviso legal</b></a></li>
                <li class="list-group-item"><a href="politica-de-privacidad"><b>Política de privacidad</b></a></li>
                <li class="list-group-item"><a href="politica-de-cookies"><b>Política de cookies</b></a></li>
                <li class="list-group-item"><a href="preguntas-frecuentes"><b>Preguntas frecuentes</b></a></li>
                <li class="list-group-item"><a href="lector-rss"><b>Lector RSS</b></a></li>
                '; 
            break;
            case 'Contacto': 
                $lista = '
                <li class="list-group-item"><a href="ayuda"><b>Ayuda</b></a></li>
                <li class="list-group-item list-group-item-primary"><a href="contacto"><b>Contacto</b></a></li>
                <li class="list-group-item"><a href="declaracion-de-principios"><b>Declaración de principios</b></a></li>
                <li class="list-group-item"><a href="aviso-legal"><b>Aviso legal</b></a></li>
                <li class="list-group-item"><a href="politica-de-privacidad"><b>Política de privacidad</b></a></li>
                <li class="list-group-item"><a href="politica-de-cookies"><b>Política de cookies</b></a></li>
                <li class="list-group-item"><a href="preguntas-frecuentes"><b>Preguntas frecuentes</b></a></li>
                <li class="list-group-item"><a href="lector-rss"><b>Lector RSS</b></a></li>
                '; 
            break;
            case 'Declaración de principios': 
                $lista = '
                <li class="list-group-item"><a href="ayuda"><b>Ayuda</b></a></li>
                <li class="list-group-item"><a href="contacto"><b>Contacto</b></a></li>
                <li class="list-group-item list-group-item-primary"><a href="declaracion-de-principios"><b>Declaración de principios</b></a></li>
                <li class="list-group-item"><a href="aviso-legal"><b>Aviso legal</b></a></li>
                <li class="list-group-item"><a href="politica-de-privacidad"><b>Política de privacidad</b></a></li>
                <li class="list-group-item"><a href="politica-de-cookies"><b>Política de cookies</b></a></li>
                <li class="list-group-item"><a href="preguntas-frecuentes"><b>Preguntas frecuentes</b></a></li>
                <li class="list-group-item"><a href="lector-rss"><b>Lector RSS</b></a></li>
                '; 
                break;
            case 'Aviso legal': 
                $lista = '
                <li class="list-group-item"><a href="ayuda"><b>Ayuda</b></a></li>
                <li class="list-group-item"><a href="contacto"><b>Contacto</b></a></li>
                <li class="list-group-item"><a href="declaracion-de-principios"><b>Declaración de principios</b></a></li>
                <li class="list-group-item list-group-item-primary"><a href="aviso-legal"><b>Aviso legal</b></a></li>
                <li class="list-group-item"><a href="politica-de-privacidad"><b>Política de privacidad</b></a></li>
                <li class="list-group-item"><a href="politica-de-cookies"><b>Política de cookies</b></a></li>
                <li class="list-group-item"><a href="preguntas-frecuentes"><b>Preguntas frecuentes</b></a></li>
                <li class="list-group-item"><a href="lector-rss"><b>Lector RSS</b></a></li>
                '; 
                break;
            case 'Política de privacidad': 
                $lista = '
                <li class="list-group-item"><a href="ayuda"><b>Ayuda</b></a></li>
                <li class="list-group-item"><a href="contacto"><b>Contacto</b></a></li>
                <li class="list-group-item"><a href="declaracion-de-principios"><b>Declaración de principios</b></a></li>
                <li class="list-group-item"><a href="aviso-legal"><b>Aviso legal</b></a></li>
                <li class="list-group-item list-group-item-primary"><a href="politica-de-privacidad"><b>Política de privacidad</b></a></li>
                <li class="list-group-item"><a href="politica-de-cookies"><b>Política de cookies</b></a></li>
                <li class="list-group-item"><a href="preguntas-frecuentes"><b>Preguntas frecuentes</b></a></li>
                <li class="list-group-item"><a href="lector-rss"><b>Lector RSS</b></a></li>
                ';   
                break;
            case 'Política de cookies': 
                $lista = '
                <li class="list-group-item"><a href="ayuda"><b>Ayuda</b></a></li>
                <li class="list-group-item"><a href="contacto"><b>Contacto</b></a></li>
                <li class="list-group-item"><a href="declaracion-de-principios"><b>Declaración de principios</b></a></li>
                <li class="list-group-item"><a href="aviso-legal"><b>Aviso legal</b></a></li>
                <li class="list-group-item"><a href="politica-de-privacidad"><b>Política de privacidad</b></a></li>
                <li class="list-group-item list-group-item-primary"><a href="politica-de-cookies"><b>Política de cookies</b></a></li>
                <li class="list-group-item"><a href="preguntas-frecuentes"><b>Preguntas frecuentes</b></a></li>
                <li class="list-group-item"><a href="lector-rss"><b>Lector RSS</b></a></li>
                '; 
                break; 
            case 'Preguntas frecuentes': 
                $lista = '
                <li class="list-group-item"><a href="ayuda"><b>Ayuda</b></a></li>
                <li class="list-group-item"><a href="contacto"><b>Contacto</b></a></li>
                <li class="list-group-item"><a href="declaracion-de-principios"><b>Declaración de principios</b></a></li>
                <li class="list-group-item"><a href="aviso-legal"><b>Aviso legal</b></a></li>
                <li class="list-group-item"><a href="politica-de-privacidad"><b>Política de privacidad</b></a></li>
                <li class="list-group-item"><a href="politica-de-cookies"><b>Política de cookies</b></a></li>
                <li class="list-group-item list-group-item-primary"><a href="preguntas-frecuentes"><b>Preguntas frecuentes</b></a></li>
                <li class="list-group-item"><a href="lector-rss"><b>Lector RSS</b></a></li>
                '; 
                break;
            case 'Lector RSS': 
                $lista = '
                <li class="list-group-item"><a href="ayuda"><b>Ayuda</b></a></li>
                <li class="list-group-item"><a href="contacto"><b>Contacto</b></a></li>
                <li class="list-group-item"><a href="declaracion-de-principios"><b>Declaración de principios</b></a></li>
                <li class="list-group-item"><a href="aviso-legal"><b>Aviso legal</b></a></li>
                <li class="list-group-item"><a href="politica-de-privacidad"><b>Política de privacidad</b></a></li>
                <li class="list-group-item"><a href="politica-de-cookies"><b>Política de cookies</b></a></li>
                <li class="list-group-item"><a href="preguntas-frecuentes"><b>Preguntas frecuentes</b></a></li>
                <li class="list-group-item list-group-item-primary"><a href="lector-rss"><b>Lector RSS</b></a></li>
                '; 
                break;
        }

        $template = ' 
        <aside class="col-md-4">
        <div class="" style="top: 2rem;"><!--div class="position-sticky" style="top: 2rem;"-->
            <h3>Otros enlaces</h3>
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
        $nameApp = "hols";
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
                        <a href="ayuda.php" class="miLink">Ayuda</a><br>
                        <a href="contacto.php" class="miLink">Contacto</a><br>
                        <a href="declaracion-de-principios.php" class="miLink">Declaración de principios</a><br>
                        <a href="aviso-legal.php" class="miLink">Aviso legal</a><br>
                        <a href="politica-de-privacidad.php" class="miLink">Política de privacidad</a><br>
                        <a href="politica-de-cookies.php" class="miLink">Política de cookies</a><br>
                        <a href="preguntas-frecuentes.php" class="miLink">Preguntas frecuentes</a><br>
                        <a href="lector-rss.php" class="miLink">Lector RSS</a>
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