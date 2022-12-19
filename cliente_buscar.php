<?php
session_start();
if(!isset($_SESSION['nivel'])){
    header('Location:index.html');
}
include ("conexion.php");
$busqueda = "";
if(isset($_GET['nombre'])){
    $nombre = msqli_real_scape_string($con, $_GET['nombre']);
    $busqueda = 'nombre';
}
if(isset($_GET['email'])){
    $nombre = msqli_real_scape_string($con, $_GET['email']);
    $busqueda = 'email';
}
if(isset($_GET['mensaje'])){
    $nombre = msqli_real_scape_string($con, $_GET['mensaje']);
    $busqueda = 'mensaje';
}
if($busqueda !=""){
    if($busqueda == 'nombre'){
        $sql = "SELECT * FROM clientes WHERE nombre LIKE '&". $nombre ."%'";
    }
    if($busqueda == 'email'){
        $sql = "SELECT * FROM clientes WHERE email LIKE  '&". $email ."%'";
    }
    if($busqueda == 'mensaje'){
        $sql = "SELECT * FROM clientes WHERE email LIKE  '&". $mensaje ."%'";
    }
}

if($busqueda == 'mensaje'){
    $sql ="SELECT * FROM clientes";
echo $sql;
$query = mysqli_query($con, $sql);
$fila = mysqli_fetch_assoc($query);
$encontrados = mysqli_num_rows($query);
echo $encontrados;
} else{
    $sql = "SELECT * FROM clientes";
    $query = mysqli_query($con, $sql);
    $fila = mysqli_fetch_assoc($query);
    $encontrados = mysqli_num_rows($query);
}

?>
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
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/sweetalert.min.js"></script>

        <script> 
            $(document).ready(function(){
                $('.delete').click(function(e){
                    e.preventDefault();
                    var myid = $(this).attr('id_cliente');
                    swal({
                        title: "¡Alerta!",
                        text:  "¿Está seguro de eliminar al usuario?",
                        icon:  "warning",
                        buttons: {
                            cancel: true,
                            confirm: true,
                        }
                    })
                    .then ((isConfirm) =>{
                        if(isConfirm){
                            $.ajax({
                                url: "cliente_eliminar.php",
                                type: "GET",
                                data: {
                                    id_cliente: myid
                                },
                                datatype: "html",
                                success: function(){
                                    swal({
                                        title: "Eliminando",
                                        text:  "El comentario ha sido eliminado",
                                        icon:  "success"
                                    })
                                    .then(()=>{
                                        location.reload();
                                    })
                                },
                                error: function(){
                                    swal({
                                        title: "Error al eliminar",
                                        text:  "Por favor vuelva a intentarlo",
                                        icon:  "error"
                                    })
                                }
                            })
                        }
                    })
                })
            })
        </script>

    </head>
    <body>
        <!-- Header -->
        <header>
            <a href="#" class="marca"> Banco de Poryectos</a>
            <ul>
                <li><a href="index.html" onClick="alternar()">Inicio</a></li>
                <li><a href="cliente_panel.php" onClick="alternar()">Panel</a></li>
                <li><a href="cliente_nuevo.php" onClick="alternar()">Agregar</a></li>
                <li><a href="cliente_todos.php" onClick="alternar()">Ver Todos</a></li>
                <li><a href="cliente_buscar.php" onClick="alternar()">Busquedas</a></li>
                <li><a href="user_logout.php" onClick="alternar()">Logout></a></li>
            </ul>
            <div class="toggle" onClick="alternar()">
            </div>
        </header>
        <section class="sec contact" id="contact">
            <div class="content">
                <div class="mxw800p">
                <h3> Búscar Usuarios </h3>
                    <p> Bienvenid@ <?=$_SESSION['nombre'];?> </p>
                    <div class="contactForm">
                            <form action = "" method = "get">
                                <div class="row100">
                                   <div class = "inputBx50">
                                       <input type = "text" name = "nombre"
                                       placeholder = "Búscar por Nombre">
                                   </div> 
                                   <div class = "inputBx50">
                                       <input type = "submit" value = "buscar">
                                   </div>
                                </div>  
                            </form>
                        </div>

                        <tbody>
                            <?php
                            do{
                                $id = $fila['id_cliente'];
                                echo "
                                <tr>
                                    <td>{$fila['nombre']}</td>
                                    <td>{$fila['email']}</td>
                                    <td>{$fila['mensaje']}</td>
                                    <td>
                                        <a href = 'cliente_editar.php?id_cliente={$fila['id_cliente']}'>
                                            Editar
                                        </a>
                                    </td>
                                    <td><a href ='#' class = 'delete' id_cliente={$fila['id_cliente']}>
                                         Eliminar
                                        </a>
                                     </td>
                                </tr>
                                ";
                            }while($fila = mysqli_fetch_assoc($query))
                            ?>
                        </tbody>
                        <t foot>
                            <tr>
                                <td colspan = "6">
                                    <a href ="cliente_imprimir_todos.php" class="btn">
                                        Imprimir 
                                    </a>
                                </td>
                            </tr>
                        </t foot>    

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
            /**function valnum(){
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
            }*/
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