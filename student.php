<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student.css">
    <title>Gestor de rendimiento académico</title>
    <link rel="icon" href="../../assets/img/logo.png">
    <link rel="apple-touch-icon" href="../../assets/img/logo-grande.png">
</head>
<body>
    <?php
        include("init.php");
        if(!isset($_GET['class']))
            $class=null;
        else
            $class=$_GET['class'];
        $rn=$_GET['rn'];
        if (empty($class) or empty($rn) or preg_match("/[a-z]/i",$rn)) {
            if(empty($class))
                echo '<p class="error">Selecciona tu asignatura</p>';
            if(empty($rn))
                echo '<p class="error">Ingresa tu núm. matricula</p>';
            if(preg_match("/[a-z]/i",$rn))
                echo '<p class="error">El núm. de matricula es incorrecto</p>';
            exit();
        }
        $name_sql=mysqli_query($conn,"SELECT `name` FROM `project_03_students` WHERE `rno`='$rn' and `class_name`='$class'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
        }
        $result_sql=mysqli_query($conn,"SELECT `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage` FROM `project_03_result` WHERE `rno`='$rn' and `class`='$class'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $p1 = $row['p1'];
            $p2 = $row['p2'];
            $p3 = $row['p3'];
            $p4 = $row['p4'];
            $p5 = $row['p5'];
            $mark = $row['marks'];
            $percentage = $row['percentage'];
        }
        if(mysqli_num_rows($result_sql)==0){
            echo "No se encontraron datos en el sistema";
            exit();
        }
    ?>
    <div class="container">
        <div class="details">
            <span>Estudiante:</span> <?php echo $name ?> <br>
            <span>Asignatura:</span> <?php echo $class; ?> <br>
            <span>Núm. de Matricula:</span> <?php echo $rn; ?> <br>
        </div>
        <div class="main">
            <div class="s1">
                <p>Parciales</p>
                <p>Primero</p>
                <p>Segundo</p>
                <p>Tercero</p>
                <p>Cuarto</p>
                <p>Quinto</p>
            </div>
            <div class="s2">
                <p>Puntuación</p>
                <?php echo '<p>'.$p1.'</p>';?>
                <?php echo '<p>'.$p2.'</p>';?>
                <?php echo '<p>'.$p3.'</p>';?>
                <?php echo '<p>'.$p4.'</p>';?>
                <?php echo '<p>'.$p5.'</p>';?>
            </div>
        </div>
        <div class="result">
            <?php echo '<p>Puntos acumulados:&nbsp'.$mark.'</p>';?>
            <?php echo '<p>Calificación general:&nbsp'.$percentage.'%</p>';?>
        </div>

        <div class="button">
            <button onclick="window.print()">Imprimir calificaciones</button>
        </div>
    </div>
</body>
</html>