<?php
    include('database.php');
    $conexion=conectar();
    if(!$conexion){
        die("error de conexion");
    }
    echo "<hr style='border-color: red'>";
    echo "<br>";
    $eliminar=$_POST['enviar2'];
    $sql ="DELETE from empleado
    where id_empleado=$eliminar"; //Con esta consulta filtra todas las preguntas que contengan esa palabra clave
    $result = $conexion->query($sql);
    header('Location: inicio_emp.php');
?>