<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type='text/css' href="css/manage.css">
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
        <?php
            include('init.php');
            include('session.php');
            $sql = "SELECT `name`, `rno`, `class_name` FROM `project_03_students`";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
               echo "<table>
                <caption>Administrar estudiantes</caption>
                <tr>
                <th>Nombre</th>
                <th>Núm. de matricula</th>
                <th>Asignatura</th>
                </tr>";
                while($row = mysqli_fetch_array($result))
                  {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['rno'] . "</td>";
                    echo "<td>" . $row['class_name'] . "</td>";
                    echo "</tr>";
                  }
                echo "</table>";
            } else {
                echo "0 Students";
            }
        ?>
    </div>
    <div class="footer">
    </div>
</body>
</html>