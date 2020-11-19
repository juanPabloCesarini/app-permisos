<?php
    if (isset($_POST['msjError'])){
        switch ($_POST['msjError']) {
            case 'a':
                echo "<p class='text-center text-danger font-weight-bold'> Usuario o Contraseña incorrectos</p>";
                break;
            case 'b':
                echo "<p class='text-center text-danger font-weight-bold'> El usuario ya existe, elija otro</p>";
                break;
            case 'c':
                echo "<p class='text-center text-danger font-weight-bold'> Las contraseñas no coinciden</p>";
                break;
            case 'd':
                echo "<p class='text-center text-danger font-weight-bold'> Hubo un error, verificá que el nombre de usuario sea el correcto</p>";
                break;
            case 'e':
                echo "<p class='text-center text-danger font-weight-bold'> Tu perfil se encuentra creado, solo se puede acceder a --Editar Perfil--</p>";
                break;
            case 'f':
                echo "<p class='text-center text-danger font-weight-bold'> No se permite guardar un 0 (cero) como valor</p>";
                break;
            case 'g':
                echo "<p class='text-center text-danger font-weight-bold'> Solo se pueden subir imagenes png,jpeg,gif o jpg</p>";
                break;
            case 'h':
                echo "<p class='text-center text-danger font-weight-bold'> Solo se permiten imagenes de hasta 1 mega</p>";
                break;
            case 'i':
                echo "<p class='text-center text-danger font-weight-bold'> Ocurrió un error, por favor volver a cargar los datos</p>";
                break;
            case 'j':
                echo "<p class='text-center text-danger font-weight-bold'> Debe ingresar un médico al sistema</p>";
                break;
            case 'k':
                echo "<p class='text-center text-danger font-weight-bold'> Sin el médico seleccionado, no podemos enviar la receta</p>";
                break;
            default:
                # code...
                break;
        }
    }
?>
