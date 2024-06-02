<?php
    include("init.php");
    
    $no_of_classes=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `project_03_class`"));
    $no_of_students=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `project_03_students`"));
    $no_of_result=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `project_03_result`"));
?>      
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="normalize.css">
    <title>Gestor de rendimiento académico</title>
    <link rel="icon" href="../../assets/img/logo.png">
    <link rel="apple-touch-icon" href="../../assets/img/logo-grande.png">
    <style>
        .main{
            border-radius: 10px;
            border-width: 5px;
            border-style: solid;
            padding: 20px;
            margin: 7% 20% 0 20%;
        }
    </style>
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
        <?php
            echo '<p>Numero de asignaturas:'.$no_of_classes[0].'</p>';
            echo '<p>Numero de estudiantes:'.$no_of_students[0].'</p>';
            echo '<p>Numero de resultados:'.$no_of_result[0].'</p>';
        ?>
    </div>
    <div class="footer">
    </div>
</body>
</html>
<?php
   include('session.php');
?>