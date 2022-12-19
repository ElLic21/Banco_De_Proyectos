<?php
    session_start();
    requiere("conexion.php");
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $sql = "SELECT *FROM clientes 
            WHERE email = '{$email}'
            AND password = '{$password}'
            ";
        $query = mysqli_query($con, $sql);
        $fila = mysqli_fetch_assoc($query);
        $encontrados = mysqli_num_rows($query);

        if ($encontrados >= 1){
            $_SESSION['nombre'] = $fila['nombre'];
            $_SESSION['nivel'] = $fila['nivel'];
            header('Location:cliente_todos.php');
        }
        else{
            header('Location:index.html')
        }
?>