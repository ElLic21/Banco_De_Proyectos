<?php
session_start();
if (!isset($_SESSION['nivel'])){
    header('Location:index.html')
}
include("conexion.php");
$id_cliente = mysqli_real_escape_string($con, $_GET['id_cliente']);
$nombre = mysqli_real_escape_string($con, $_GET['nombre']);
$email = mysqli_real_escape_string($con, $_GET['email']);
$mensaje = mysqli_real_escape_string($con, $_GET['mensaje']);
$telefono = mysqli_real_escape_string($con, $_GET['telefono']);
$carrera = mysqli_real_escape_string($con, $_GET['carrera']);

$sql = "UPDATE clientes set
nombre = '{$nombre}',
email = '{$email}',
mensaje = '{$mensaje}',
telefono = '{$telefono}',
carrera = '{$carrera}'
WHERE id_cliente = {$id_cliente}";
echo $sql;
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

        <script src="https://kit.fontawesome.com/c2a9869452.js" crossorigin="anonymous">

        </script>
        
    </head>
    <body>
        <!-- Header -->
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
                    <h3> Cliente Actualizado </h3>
                    <p>
                       <?php
                        if($r){
                            echo "Modificando Datos";
                        }else{
                            echo "Datos No Modificados";
                        }
                    ?>    
                    </p>
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
        </script>     
    </body>
</html>