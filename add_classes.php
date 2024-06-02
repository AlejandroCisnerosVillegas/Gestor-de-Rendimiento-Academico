<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/form.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <title>Gestor de rendimiento académico</title>
    <link rel="icon" href="../../assets/img/logo.png">
    <link rel="apple-touch-icon" href="../../assets/img/logo-grande.png">
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo.png" alt="" class="logo"></a>
        <span class="heading">Panel de Control</span>
        <a href="logout.php" style="color: white"><span class="fa fa-sign-out fa-2x">Cerrar</span></a>
    </div>

    <div class="nav">
        <ul>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Asignaturas &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Nueva asignatura</a>
                    <a href="manage_classes.php">Administrar asignaturas</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Estudiantes &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Nuevo estudiante</a>
                    <a href="manage_students.php">Administrar estudiantes</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Resultados &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Agregar resultado</a>
                    <a href="manage_results.php">Administrar resultados</a>
                </div>
            </li>
        </ul>
    </div>
    <div class="main">
        <form action="" method="post">
            <fieldset>
                <legend>Agregar asignaturas</legend>
                <input type="text" name="class_name" placeholder="Nombre de asignatura">
                <input type="text" name="class_id" placeholder="Clave de la asignatura">
                <input type="submit" value="Registrar">
            </fieldset>        
        </form>
    </div>
    <div class="footer">
    </div>
</body>
</html>
<?php 
	include('init.php');
    include('session.php');
    if (isset($_POST['class_name'],$_POST['class_id'])) {
        $name=$_POST["class_name"];
        $id=$_POST["class_id"];
        if (empty($name) or empty($id) or preg_match("/[a-z]/i",$id)) {
            if(empty($name))
                echo '<p class="error">Ingresa asignatura</p>';
            if(empty($id))
                echo '<p class="error">Ingresa clave de asignatura</p>';
            if(preg_match("/[a-z]/i",$id))
                echo '<p class="error">Ingresa una clave que cumpla los parámetros establecidos</p>';
            exit();
        }
        $sql = "INSERT INTO `project_03_class` (`name`, `id`) VALUES ('$name', '$id')";
        $result=mysqli_query($conn,$sql); 
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("La asignatura o la clave no cumple los parámetros establecidos")';
            echo '</script>';
        } else{
            echo '<script language="javascript">';
            echo 'alert("Asignatura agregada")';
            echo '</script>';
        }
    }
?>