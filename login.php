<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de rendimiento académico</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="icon" href="../../assets/img/logo.png">
    <link rel="apple-touch-icon" href="../../assets/img/logo-grande.png">
</head>
<body>
    <div class="title">
        <span>Conexión general del sistema</span>
    </div>
    <div class="main">
        <div class="login">
            <form action="" method="post" name="login">
                <fieldset>
                    <legend class="heading">Inicio de sesión como administrador</legend>
                    <input type="text" name="userid" placeholder="Correo electrónico" autocomplete="off">
                    <input type="password" name="password" placeholder="Contraseña" autocomplete="off">
                    <input type="submit" value="Iniciar sesión">
                </fieldset>
            </form>    
        </div>
        <div class="search">
            <form action="./student.php" method="get">
                <fieldset>
                    <legend class="heading">Obtener resultados (Estudiantes)</legend>
                    <?php
                        include('init.php');
                        $class_result=mysqli_query($conn,"SELECT `name` FROM `project_03_class`");
                            echo '<select name="class">';
                            echo '<option selected disabled>Seleccionar clase</option>';
                        while($row = mysqli_fetch_array($class_result)){
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                        echo'</select>'
                    ?>
                    <input type="text" name="rn" placeholder="Núm. Matricula">
                    <input type="submit" value="Iniciar sesión">
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>

<?php
    include("init.php");
    session_start();
    if (isset($_POST["userid"],$_POST["password"]))
    {
        $username=$_POST["userid"];
        $password=$_POST["password"];
        $sql = "SELECT userid FROM project_03_admin_login WHERE userid='$username' and password = '$password'";
        $result=mysqli_query($conn,$sql);

        $count=mysqli_num_rows($result);
        
        if($count==1) {
            $_SESSION['login_user']=$username;
            header("Location: dashboard.php");
        }else {
            echo '<script language="javascript">';
            echo 'alert("Usuario o contraseña incorrecta")';
            echo '</script>';
        }
    }
?>