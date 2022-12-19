<?php
include("conexion.php");
$nombre = mysqli_real_escape_string($con, $_GET['nombre']);
$email = mysqli_real_escape_string($con, $_GET['email']);
$mensaje = mysqli_real_escape_string($con, $_GET['mensaje']);
$telefono = mysqli_real_escape_string($con, $_GET['telefono']);
$carrera = mysqli_real_escape_string($con, $_GET['carrera']);
$nivel = mysqli_real_escape_string($con, $_GET['nivel']);
$password = mysqli_real_escape_string($con, $_GET['password']);

$sql = "INSERT INTO clientes(nombre, email, mensaje, telefono, carrera, nivel, password)
VALUES('$nombre', '$email', '$mensaje', '$telefono', '$carrera', 'nivel', 'password')";

$r = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
       <meta name="viewport" 
        content="width=device-whidth"
        initial-scale="1.0" >
        <meta charset="utf-8">
        <title> Banco de Proyectos </title>
        <link rel="stylesheet" href="css/estilo.css">

        <script src="https://kit.fontawesome.com/c2a9869452.js" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <!-- Header -->
        <header>
            <a href="#" class="marca">Banco de Proyectos</a>
            <ul>
                <li><a href="index.html" onClick="alternar()">Inicio</a></li>
                <li><a href="cliente_panel.php" onClick="alternar()">Panel</a></li>
                <li><a href="cliente_nuevo.php" onClick="alternar()">Agregar</a></li>
                <li><a href="cliente_todos.php" onClick="alternar()">Ver Todos</a></li>
                <li><a href="cliente_buscar.php" onClick="alternar()">Busquedas</a></li>
                <li><span onClick="showloginBox()">Iniciar sesion</span></li> 
            </ul>
            <div class="toggle" onClick="alternar()">
            </div>
        </header>
        
        <!-- Header -->
        <section class="sec contact" id="contact">
            <div class="content">
                <div class="mxw800p">
                    <h3> Agregando Su Comentario </h3>
                    <p>Cliente Agregado</p>
                       <?php
                        if($r){
                            echo "Comentario Agregado";
                        }else{
                            echo "Comentario No Agregado";
                        }
                    ?>    
                    </p>
                </div>
                <div class="sci">
                    <ul>
                        <li><a href="#"><img src="imagenes/facebook.png"></a></li>
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

             //para esconder el bton o ver cuando hay scroll

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
                    window.scrollTo(0, scroll-(scroll/10));}
                }
            function validacion(){
                var email=document.getElementById("email").value;
                var text=document.getElementById("text");
                var pattern= /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

                if(email.match(pattern)){
                    text.innerHTML="Email Correcto :)";
                    text.style.color="#4978ff";
                }else{
                    text.innerHTML="Email Incorreto :(";
                    text.style.color="#4978ff";}
                }
            
            }










        </script>     
    </body>
</html>