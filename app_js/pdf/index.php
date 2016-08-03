<html>
    <head>
        <meta charset="UTF-8">
        <title>PRUEBA</title>
    </head>
    <body>
        <br><br><br><br><br><br>
    <center>
        <img src="img/AgileDevelopers.PNG">
        <br>
        <form name="login">
            <table>
                <tr>
                    <td>Nombre Usuario:</td>
                    <td><input type="text" name="usuario"></td>
                </tr>
                <tr> 
                    <td>Contraseña:</td>
                    <td><input type="password" name="contra"></td>
                </tr>
                <tr>
                    <td><button type="button" onclick="go()">Inicio de Sesion</button></td>
                    <td><button type="button">¿Olvidaste la contraseña?</button></td>
                </tr>
            </table>
        </form>
        <script>
            function go() {

                if (document.login.usuario.value == 'prueba' && document.login.contra.value == 'prueba') {
                    window.location = "plantilla.php";
                } else {
                    alert("Porfavor ingrese, nombre de usuario y contraseña correctos.");
                }
            }
        </script>

    </center>
    <center>
        <br>
        <strong>
            <?php
            echo 'Pruebas Agiles Developers';
            ?>
        </strong>
    </center>

</body>
</html>
