<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="./css/form.css">
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
            <legend>Ingresa resultado</legend>

                <?php
                    include("init.php");
                    include("session.php");
                    $select_class_query="SELECT `name` from `project_03_class`";
                    $class_result=mysqli_query($conn,$select_class_query);
                    echo '<select name="class_name">';
                    echo '<option selected disabled>Selecciona la asignatura</option>';
                        while($row = mysqli_fetch_array($class_result)) {
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                    echo'</select>';                      
                ?>
                <input type="text" name="rno" placeholder="Núm. Matricula">
                <input type="text" name="p1" id="" placeholder="Primer parcial">
                <input type="text" name="p2" id="" placeholder="Segunda parcial">
                <input type="text" name="p3" id="" placeholder="Tercer parcial">
                <input type="text" name="p4" id="" placeholder="Cuarta parcial">
                <input type="text" name="p5" id="" placeholder="Quinto parcial">
                <input type="submit" value="Registrar">
            </fieldset>
        </form>
    </div>
</body>
</html>
<?php
    if(isset($_POST['rno'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5']))
    {
        $rno=$_POST['rno'];
        if(!isset($_POST['class_name']))
            $class_name=null;
        else
            $class_name=$_POST['class_name'];
        $p1=(int)$_POST['p1'];
        $p2=(int)$_POST['p2'];
        $p3=(int)$_POST['p3'];
        $p4=(int)$_POST['p4'];
        $p5=(int)$_POST['p5'];
        $marks=$p1+$p2+$p3+$p4+$p5;
        $percentage=$marks/5;
        if (empty($class_name) or empty($rno) or $p1>100 or  $p2>100 or $p3>100 or $p4>100 or $p5>100 or $p1<0 or  $p2<0 or $p3<0 or $p4<0 or $p5<0 ) {
            if(empty($class_name))
                echo '<p class="error">Seleccionar asignatura</p>';
            if(empty($rno))
                echo '<p class="error">Ingresa núm. matricula</p>';
            if(preg_match("/[a-z]/i",$rno))
                echo '<p class="error">El núm. de matricula no se encuentra registrado</p>';
            if(preg_match("/[a-z]/i",$marks))
                echo '<p class="error">Ingresa un porcentaje de la calificación que sea balido</p>';
            if($p1>100 or  $p2>100 or $p3>100 or $p4>100 or $p5>100 or $p1<0 or  $p2<0 or $p3<0 or $p4<0 or $p5<0)
                echo '<p class="error">Ingresa un porcentaje de la calificación que sea balido</p>';
            exit();
        }
        $name=mysqli_query($conn,"SELECT `name` FROM `project_03_students` WHERE `rno`='$rno' and `class_name`='$class_name'");
        while($row = mysqli_fetch_array($name)) {
            $display=$row['name'];
            echo $display;
         }
        $sql="INSERT INTO `project_03_result` (`name`, `rno`, `class`, `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage`) VALUES ('$display', '$rno', '$class_name', '$p1', '$p2', '$p3', '$p4', '$p5', '$marks', '$percentage')";
        $sql=mysqli_query($conn,$sql);
        if (!$sql) {
            echo '<script language="javascript">';
            echo 'alert("Los datos ingresados no cumplen los parámetros establecidos")';
            echo '</script>';
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Calificaciones registradas")';
            echo '</script>';
        }
    }
?>