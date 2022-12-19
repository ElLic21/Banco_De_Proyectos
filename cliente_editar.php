<?php
include ("conexion.php");
$id_cliente = mysqli_real_escape_string($con, $_GET['id_cliente']);

$sql = "select * from clientes where id_cliente=".$id_cliente;
$query = mysqli_query($con,$sql);
$fila = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
       <meta name="viewport" 
        content="width=device-whidth"
        initial-scale="1.0" >
        <meta charset="utf-8">
        <title>Banco de Proyectos</title>
        <link rel="stylesheet"  href="css/estilo.css">

        <script src="https://kit.fontawesome.com/c2a9869452.js" crossorigin="anonymous">
            
        </script>
        
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
                <li><span onClick="showloginBox()">Iniciar Sesión</span></li>
            </ul>
            <div class="toggle" onClick="alternar()">
            </div>
        </header>
        <!-- Contact -->
        <section class="sec contact" id="contact">
            <div class="content">
                <div class="mxw800p">
                    <h3> Modifique su comentario </h3>
                    <p> Corrige tus datos que sean necesarios </p>
                </div>
                <div class="contactForm">
                    <form id="form" method="POST" action="cliente_modificar.php">
                        <div class="row100">
                            <div class="inputBx50">
                                <input type="text" name="nombre" placeholder="nombre"
                                value = <?=$fila['nombre'];?>>
                            </div>
                            <div class="inputBx50">
                                <input type="text" name="email" placeholder="email"
                                value = <?=$fila['email'];?>>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBx100">
                                <input type="text" name="mensaje" placeholder="mensaje"
                                value =  "<?=$fila['mensaje'];?>">
                        </div>
                        </div>
                         <!-- Menu deslegable -->
                       <!-- <div class="row100">
                            <div class="inputBx100">
                                <label for = "genero"> Genero </label> 
                                <select name ="genero">
                                    <option>Hombre</option>
                                    <option>Mujer</option>
                                </select>-->
                                <input type="hidden" name="id_cliente" value=<?=$fila['id_cliente'];?>>
                            </div>
                        </div>                        
                        <div class="row100">
                            <div class="inputBx100">
                                <input type="submit" value="Actualizar">
                            </div>
                        </div>
                    </form>
                </div>    
                    

                <div class="contactForm">
                    <form id="form" action ="cliente_modificar_imagen.php" method = "POST"  enctype = "multipart/form-data">
                        <h3> Modificar Imágen </h3> <!-- Aldo-->
                        <?php 
                            if ($fila['imagen']==""){
                                $imagen = "imagenes/usuario.jpg";
                            }
                            else{
                                $imagen = "imagenes/{$fila['imagen']}";
                            }
                        ?>
                        <img src = "<?php echo $imagen;?>">

                        <div class = "row100">
                            <div class = "inputBx100">
                                <span class="imagen">
                                <input type = "file" name="imagen"
                                    id= "imagen">
                                </span>
                                <label for = "imagen">
                                    <span id = "spimg">
                                        Modificar imagen
                                    </span>
                                </label>
                            </div>    
                        </div>
                        <input type="hidden"
                            name="id_cliente"
                            value=<?=$fila['id_cliente'];?>
                        >
                        <input type="hidden"
                            name = "imagen_anterior"
                            value=<?=$fila['imagen'];?>
                        >
                        <div class="row100">
                            <div class="inputBx100">
                                <input type="submi" value="Guardar Cambios">
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
        </script>     
    </body>
</html>