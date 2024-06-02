<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/form.css" media="all">
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
                <legend>Agregar Estudiante</legend>
                <input type="text" name="student_name" placeholder="Nombre del estudiante">
                <input type="text" name="roll_no" placeholder="Núm.de matricula">
                <?php
                    include('init.php');
                    include('session.php');
                    $class_result=mysqli_query($conn,"SELECT `name` FROM `project_03_class`");
                        echo '<select name="class_name">';
                        echo '<option selected disabled>Selecciona la asignatura</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                <input type="submit" value="Registrar">
            </fieldset>
        </form>
    </div>
    <div class="footer">
    </div>
</body>
</html>
<?php

    if(isset($_POST['student_name'],$_POST['roll_no'])) {
        $name=$_POST['student_name'];
        $rno=$_POST['roll_no'];
        if(!isset($_POST['class_name']))
            $class_name=null;
        else
            $class_name=$_POST['class_name'];
        if (empty($name) or empty($rno) or empty($class_name) or preg_match("/[a-z]/i",$rno) or !preg_match("/^[a-zA-Z ]*$/",$name)) {
            if(empty($name))
                echo '<p class="error">Ingresa el nombre del estudiante</p>';
            if(empty($class_name))
                echo '<p class="error">Selecciona una asignatura</p>';
            if(empty($rno))
                echo '<p class="error">Ingresa el núm. de matricula</p>';
            if(preg_match("/[a-z]/i",$rno))
                echo '<p class="error">El núm. matricula no cumple los parámetros establecidos</p>';
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    echo '<p class="error">No se permiten números ni símbolos en el nombre.</p>'; 
                  }
            exit();
        }
        $sql = "INSERT INTO `project_03_students` (`name`, `rno`, `class_name`) VALUES ('$name', '$rno', '$class_name')";
        $result=mysqli_query($conn,$sql);        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Los datos ingresados no cumplen los parámetros establecidos")';
            echo '</script>';
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Estudiante registrado")';
            echo '</script>';
        }
    }
?>