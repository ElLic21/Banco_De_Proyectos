<?php
    session_start();
    if(!isset($_SESSION['nivel'])){
        header('Location:index.html')
    }
    require('conexion.php');
    $sql = "SELECT imagen
    FROM clientes
    WHERE id_cliente = " . $_GET['id_cliente'];
    $query = mysqli_query($con,$sql);
    $fila = mysqli_fetch_assoc($query);
    
    unlink("imagenes/" . $fila['imagen']);
    
    $sql = "DELETE FROM clientes WHERE id_cliente=" . $_GET ['id_cliente'];
    $r = mysqli_query($con, $sql);
?>