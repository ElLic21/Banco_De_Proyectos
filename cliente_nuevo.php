<!DOCTYPE html>
<html lang="es">
    <head>
       <meta name="viewport" 
        content="width=device-whidth"
        initial-scale="1.0" >
        <meta charset="utf-8">
        <title> Banco de Proyectos </title>
        <link rel="stylesheet"  href="css/estilo.css">

        <script src="https://kit.fontawesome.com/c2a9869452.js" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <header>
            <a href="#" class="marca"> Banco de Proyectos </a>
            <ul>
                <li><a href="index.html" onClick="alternar()">Inicio</a></li>
                <li><a href="cliente_panel.php" onClick="alternar()">Panel</a></li>
                <li><a href="cliente_nuevo.php" onClick="alternar()">Agregar</a></li>
                <li><a href="cliente_todos.php" onClick="alternar()">Ver Todos</a></li>
                <li><a href="cliente_buscar.php" onClick="alternar()">Busquedas</a></li>
                <li><span onClick = "showloginBox()">Iniciar sesion</span></li>
            </ul>
            <div class="toggle" onClick="alternar()">
            </div>
        </header>
        <section class="sec contact" id="contact">
            <div class="content">
                <div class="mxw800p">
                    <h3> Escriba sus comentarios</h3>
                    <p> Como una empesa nos interesa saber sus comentarios respecto a nuestros servisios. A continuacion puede
                        mandarsos sus comentarios
                    </p>
                </div>
                <div class="contactForm">
                    <form id="form" method="GET" action= "cliente_guardar.php">
                        <div class="row100">
                            <div class="inputBx50">
                                <input type="text" name="nombre" placeholder="Nombre"
                                id ="nombre" onkeyup ="valnom()">
                                <span id="name"></span>
                            </div>
                            <div class="inputBx50">
                                <input type="text" name="email" placeholder="Email"
                                id = "email" onkeyup="validacion()">
                                <span id="text"></span>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBx100">
                               <input type="password" name="password" placeholder="Password"
                                id="msj" onkeyup="mensa()">
                                <span id="password"></span>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBx100">
                               <input type="nivel" name="nivel" placeholder="Nivel"
                                id="msj" onkeyup="mensa()">
                                <span id="nivel"></span>
                            </div>
                        </div>
                         <!-- Menu deslegable -->
                       <!-- <div class="row100">
                            <div class="inputBx100">
                                <label for = "genero"> Genero </label> 
                                <select name ="genero">
                                    <option>Hombre</option>
                                    <option>Mujer</option>
                                </select>
                            </div>
                        </div>-->
                        <div class="row100">
                            <div class="inputBx100">
                                <input type="submit" value="Enviar">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="sci">
                    <ul>
                        <li><a href="#"><img src="imagenes/facebook"></a></li>
                        <li><a href="#"><img src="imagenes/twitter.png"></a></li>
                        <li><a href="#"><img src="imagenes/instagram.png"></a></li>
                    </ul>
                </div>
            </div>       
            <div id="button-up">
                <i class="fa-solid fa-up-long"></i>
            </div>       
        </section>
        
        <!-- SECCION DEL JAVASCRIP -->
        <script type="text/javascript">
            window.addEventListener("scroll", function(){
                var header = document.querySelector("header");
                header.classList.toggle("sticky", window.scrollY > 0)
            })
            function alternar(){
                var header = document.querySelector("header");
                header.classList.toggle("active");
            }
            buttonUp = document.getElementById("button-up");
            buttonUp.addEventListener("click", scrollUp);
            window.onscroll = function(){
                var scroll = document.documentElement.scrollTop;
                if (scroll > 200){
                    buttonUp.style.transform = "scale(1)";
                }
                else{
                    buttonUp.style.transform = "scale(0)";
                }
            }
            function scrollUp(){
                var scroll = document.documentElement.scrollTop;
                if(scroll>0){
                    window.requestAnimationFrame(scrollUp);
                    window.scrollTo(0, scroll-(scroll/10));
                }
            }
            // Validacion de campos 
            function valnom(){
                var nombre = document.getElementById("nombre").value;
                var text = document.getElementById("name");
                var pattern = /^[A-Za-z ]*$/;
                if (nombre.match(pattern)){
                    text.innerHTML="El nombre es valido";
                    text.style.color ="#4978ff";
                }    
                else{
                    text.innerHTML="Ingrese solo letras";
                    text.style.color ="#ff0000";     
            }
            }
            function validacion(){
                var email = document.getElementById("email").value;
                var text = document.getElementById("text");
                var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
                if (email.match(pattern)){
                    text.innerHTML="Email valido";
                    text.style.color="#4978ff";
                }
                else{
                    text.innerHTML="Introduzca un email valido";
                    text.style.color="#ff0000";
                }
            } 
            /** function valnum(){
                var numero = document.getElementById("numero").value;
                var text = document.getElementById("num");
                var valor = /^\d{9,19}$/;
                if (numero.match(valor)){
                    text.innerHTML="Numero validado";
                    text.style.color ="#4978ff";    
                }
                else{
                    text.innerHTML="introduzca 10 digitos(solo numeros)";
                    text.style.color ="#ff0000";     
                }
            } */
            function mensa(){
                var numero = document.getElementById("msj").value;
                var text = document.getElementById("mensa");
                var pattern = /^[A-Za-z ]*$/;
                if (numero.match(pattern)){
                    text.innerHTML="Mensaje Validado";
                    text.style.color ="#4978ff";    
                }
                else{
                    text.innerHTML="Escriba un Mensaje";
                    text.style.color ="#ff0000";     
                }
            }
        </script>     
    </body>
</html>