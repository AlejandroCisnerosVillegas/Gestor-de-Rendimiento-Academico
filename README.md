# Gestor de Rendimiento Académico

La plataforma **"Gestor de Rendimiento Académico"** es una herramienta integral diseñada para la universidad "Bahía del Mar", que tiene como objetivo central la gestión del rendimiento académico de los estudiantes. Con una estructura modular y fácil de usar, ofrece una amplia gama de funciones que abarcan desde la presentación de información general sobre la universidad y sus facultades hasta la administración detallada de asignaturas, estudiantes y calificaciones.

<p align="center">
  <img src="./images/Readme-01.png" alt="Descripción de la imagen" width="60%">
</p>

En su página principal, los visitantes encuentran una descripción completa de la institución, información sobre cursos, proceso de admisión, biblioteca y áreas universitarias. El panel de control brinda acceso exclusivo al administrador, quien puede gestionar asignaturas, estudiantes y calificaciones de manera eficiente. Las facultades se presentan detalladamente, ofreciendo información sobre cada una de las áreas académicas de la universidad.

<p align="center">
  <img src="./images/Readme-02.png" alt="Descripción de la imagen" width="60%">
</p>

Los estudiantes tienen acceso a una sección dedicada que abarca desde el proceso de admisión y el plan de estudios hasta el financiamiento académico y las pruebas de rendimiento. La plataforma permite a los estudiantes consultar sus calificaciones parciales y obtener un resumen detallado de su rendimiento académico, incluyendo el promedio general.

<p align="center">
  <img src="./images/Readme-03.png" alt="Descripción de la imagen" width="60%">
</p>

El sistema de registro de asignaturas y estudiantes simplifica la administración para el personal, mientras que el registro de calificaciones garantiza la precisión y el seguimiento adecuado del progreso académico de los estudiantes.

<p align="center">
  <img src="./images/Readme-04.png" alt="Descripción de la imagen" width="60%">
</p>

En resumen, el **"Gestor de Rendimiento Académico"** no solo mejora el acceso a la información y las calificaciones de los estudiantes, sino que también optimiza la gestión administrativa de la universidad, brindando una experiencia más completa y eficiente para toda la comunidad universitaria.

**Consulta la versión preliminar del proyecto aquí:** [https://gestor-de-rendimiento-academico.com](https://www.alejandrovillegas.net/projects/project-03/index.html)

# 📌 Información del Proyecto

Este proyecto ha sido desarrollado como parte del portafolio de soluciones tecnológicas, con el objetivo de ofrecer una herramienta eficiente y funcional para usuarios autodidactas interesados en la gestión y desarrollo de proyectos web.

- **Área**: Desarrollo de Proyectos Web

- **Usuario Final**: Autodidactas y Desarrolladores

- **Fecha de Desarrollo**: 15 de febrero de 2024

- **Portafolio de Proyectos**: [www.alejandrovillegas.net](https://www.alejandrovillegas.net/)

# Guía de Instalación y Configuración del Proyecto

## 🖥️ Requisitos del Sistema

Para ejecutar este proyecto de manera local, es necesario contar con un entorno de desarrollo que incluya Apache, MySQL y PHP. Se recomienda el uso de **XAMPP**, ya que fue el entorno con el que se desarrolló el proyecto. Sin embargo, también es compatible con:

- **XAMPP** (Windows, macOS, Linux)

- **WAMP** (Windows)

- **MAMP** (macOS, Windows)

- **LAMP** (Linux)

## 🔧 Instalación y Configuración del Proyecto

Siga los pasos según el entorno de desarrollo que esté utilizando:

### Para XAMPP (Recomendado)

1. Descargue y descomprima el archivo del proyecto en su sistema local.

2. Copie la carpeta del proyecto y colóquela en el directorio **_htdocs_** dentro de la carpeta de instalación de XAMPP (Ejemplo: **C:\xampp\htdocs\mi_proyecto**).

### Para WAMP

1. Descargue y descomprima el archivo del proyecto.

2. Copie la carpeta del proyecto y colóquela en el directorio **_www_** dentro de la carpeta de instalación de WAMP (Ejemplo: **C:\wamp64\www\mi_proyecto**).

### Para MAMP

1. Descargue y descomprima el archivo del proyecto.

2. Copie la carpeta del proyecto y colóquela en el directorio **_htdocs_** dentro de la carpeta de instalación de MAMP (Ejemplo: **/Applications/MAMP/htdocs/mi_proyecto**).

### Para LAMP

1. Descargue y descomprima el archivo del proyecto.

2. Mueva la carpeta del proyecto a **_/var/www/html/_** utilizando el siguiente comando en la terminal:

```
sudo mv mi_proyecto /var/www/html/
```

## 🗄️ Configuración de la Base de Datos

### Para XAMPP, WAMP y MAMP

1. Inicie su entorno de desarrollo y asegúrese de que **Apache** y **MySQL** estén en ejecución.

2. Abra su navegador y acceda a **_phpMyAdmin_** ingresando:

- **XAMPP**: http://localhost/phpmyadmin

- **WAMP**: http://localhost/phpmyadmin

- **MAMP**: http://localhost:8888/phpmyadmin

3. Diríjase a la pestaña **SQL** e ingrese el siguiente código para crear la base de datos:

```
CREATE DATABASE General;
```

4. Vaya a la pestaña Importar y seleccione el archivo **_DataBase.sql_** del repositorio para importar la estructura y los datos.

### Para LAMP

1. Abra la terminal y acceda a MySQL con:

```
mysql -u root -p
```

2. Cree la base de datos ejecutando:

```
CREATE DATABASE General;
```

3. Salga de MySQL y luego importe la base de datos con:

```
mysql -u root -p General < /ruta/del/archivo/DataBase.sql
```

Reemplace **_/ruta/del/archivo/_** con la ubicación real del archivo en su sistema.

## 🚀 Ejecución del Proyecto

1. Inicie su entorno de desarrollo:

- **XAMPP**: Abra el "Panel de Control de XAMPP" y active **Apache** y **MySQL**.

- **WAMP**: Haga clic en el icono de WAMP y active los servicios.

- **MAMP**: Abra MAMP y haga clic en **Start Servers**.

- **LAMP**: Ejecute los siguientes comandos en la terminal:

```
sudo systemctl start apache2
sudo systemctl start mysql
```

2. Abra un navegador e ingrese la siguiente URL según el entorno:

- **XAMPP / WAMP**: **_http://localhost/_**

- **MAMP**: **_http://localhost:8888/_**

- **LAMP**: **_http://localhost/_**

El proyecto ahora está funcionando en su entorno local. 🎉

## 🔑 Credenciales de Acceso

### 🛠️ Detalles de Inicio de Sesión para Administrador

- Nombre de usuario: **_admin@gmail.com_**

- Contraseña: **_12345_**
