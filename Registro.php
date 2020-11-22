<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recicladora AGS</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Fontawsome -->
    <script src="https://kit.fontawesome.com/2682b753b2.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="css/menu_emp.css">

    <style>
        .btn{
            color:#fff;
            background-color:#e74c3c;
            outline: none;
            border: 0;
            color: #fff;
            text-transform:uppercase;
            margin-right: 10px;
            border-radius:2px;
            cursor:pointer;
            position:relative;
        }
        .input-container{
            position:relative;
            margin-bottom:25px;
        }
        .input-container label{
            position:absolute;
            top:0px;
            left:0px;
            font-size:16px;
            color:#00000;	
            transition: all 0.5s ease-in-out;
        }
        .input-container input{ 
            border:0;
            border-bottom:1px solid #555;  
            background:transparent;
            width:100%;
            padding:8px 0 5px 0;
            font-size:16px;
            color:#00000;
        }
        .input-container input:focus{ 
            border:none;	
            outline:none;
            border-bottom:1px solid #e74c3c;	
        }
        .input-container input:focus ~ label,
        .input-container input:valid ~ label{
            top:-12px;
            font-size:12px;
            
        }
        table.center {
            margin-left: auto;
            margin-right: auto;
        }
        table{
            color: #ffffff;
        }
    </style>
</head>
<body>
    <nav class="menu">
        <ol>
            <li class="menu-item"><a href="inicio_emp.php">Home</a>
                <ol class="sub-menu">
                    <li class="menu-item"><a href="index.php"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
                </ol>     
            </li>
            <li class="menu-item"><a href="#">Recicladora</a>
                <ol class="sub-menu">
                    <li class="menu-item"><a href="recicladoras.php"><i class="fas fa-plus-circle"></i> Agregar</a></li>
                    <li class="menu-item"><a href="recicladora_eliminar.php"><i class="fas fa-trash-alt"></i> Eliminar</a></li>
                </ol>    
            </li>
            <li class="menu-item"><a href="#">Productos</a>
                <ol class="sub-menu">
                    <li class="menu-item"><a href="productos_agregar.php"><i class="fas fa-plus-circle"></i> Agregar</a></li>
                    <li class="menu-item"><a href="productos_eliminar.php"><i class="fas fa-trash-alt"></i> Eliminar</a></li>
                </ol>
            </li>
            <li class="menu-item"><a href="#">Cliente</a>
                <ol class="sub-menu">
                    <li class="menu-item"><a href="Registro.php"> <i class="fas fa-user-plus"></i> Agregar</a></li>
                    <li class="menu-item"><a href="cliente_actualizar.php"><i class="fas fa-user-edit"></i> Actualizar</a></li>
                   <li class="menu-item"><a href="cliente_eliminar.php"> <i class="fas fa-trash-alt"></i> Eliminar</a></li>
                </ol>
            </li>
            <li class="menu-item"><a href="#">Empleado</a>
                <ol class="sub-menu">
                    <li class="menu-item"><a href="empleados_agregar.php"><i class="fas fa-plus-circle"></i> Agregar</a></li>
                    <li class="menu-item"><a href="emp_eliminar.php"><i class="fas fa-trash-alt"></i> Eliminar</a></li>
                </ol>
            </li>
        </ol>
    </nav>
    <?php
        if($_POST)//Recibe los datos del formulario de abajo
        {
            
            include('database.php');
            $conexion=conectar();
            if(!$conexion)
            {
                die("error de conexion");
            }
            else
            {   
                $nombre=$_POST['nombre'];
                $ape_pat=$_POST['ape_pat'];//Recibe los datos del usuario con el formulario
                $ape_mat=$_POST['ape_mat'];
                $estado=$_POST['estado'];
                $colonia=$_POST['colonia'];
                $num=$_POST['numero'];
                $calle=$_POST['calle'];
                $telefono=$_POST['telefono'];
                $sql ="INSERT INTO cliente(nom_cliente,ape_pat,ape_mat,estado,colonia,calle,numero,telefono) VALUES('$nombre',
                '$ape_pat','$ape_mat','$estado','$colonia','$calle',$num,$telefono)";
                $result = $conexion->query($sql);//Con el query manda los datos y apoyado de la ecnriptacion md5 su contraseña queda encriptada
               header("http://localhost/conexion/productos.php") ;        
              }
        }
        else
        {
    ?>
    <table class="center">
        <tr>
            <td align="center">
                <h1>Ingrese los datos</h1> <!--Formulario para crear al nuevo usuario--> 
            </td>
        </tr>
        <tr>
            <td align="center">
                <form name="Registro" action="http://localhost/conexion/Registro.php" method="POST"> <!--Igualmente el formulario se envia a la misma pagina--> 
                    <div class="input-container">
                        <input type="text" name="nombre"><br><label>Nombre</label><br>
                    </div>
                    <div class="input-container">
                        <input type="text" name="ape_pat"><br><label>Apellido paterno</label><br>
                    </div>
                    <div class="input-container">
                        <input type="text" name="ape_mat"><br><label>Apellido materno</label><br>
                    </div>
                    <div class="input-container">
                        <input type="text" name="estado"><br><label>Estado</label><br>
                    </div>
                    <div class="input-container">
                        <input type="text" name="colonia"><br><label>Colonia</label><br>
                    </div>
                    <div class="input-container">
                        <input type="text" name="calle"><br><label>Calle</label><br>
                    </div>
                    <div class="input-container">
                        <input type="number" name="numero"><br><label>Número de casa</label><br>
                    </div>
                    <div class="input-container">
                        <input type="number" name="telefono"><br><label>Teléfono</label><br>
                    </div>
                <table>
                    <tr>
                        <td>
                            <input class="btn" type="submit" name="enviar" value="Enviar">
                        </td>
                        <td>
                            <input class="btn" type="reset" name="borrar" value="Borrar">
                        </td>
                    </tr>
                </table>
        </form> 
            </td>
        </tr>
    </table>
                    <?php
        }
    ?>

    <!-- Bootstrap files -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>