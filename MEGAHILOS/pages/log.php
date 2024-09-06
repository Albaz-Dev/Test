<?php
    require '../php/config.php';
    require '../php/conexion.php';
    require '../php/users/clienteFunciones.php';
    $db = new Database();
    $con = $db -> conectar();

    $errors = [];

    if (!empty($_POST)) {
        $nombres = trim($_POST['nombres']);
        $apellidos = trim($_POST['apellidos']);
        $email = trim($_POST['email']);
        $telefono = trim($_POST['telefono']);
        $dni = trim($_POST['dni']);
        $usuario = trim($_POST['usuario']);
        $password = trim($_POST['password']);
        $repassword = trim($_POST['repassword']);

        if (!esNulo([$nombres, $apellidos, $email, $telefono, $dni, $usuario, $password, $repassword])) {
            $errors[] = "Debe llenar todos los campos";
        }
        
        if (!esEmail($email)) {
            $errors[] = "La dirección de correo no es válida";
        }
        
        if (!validaPassword($password, $repassword)) {
            $errors[] = "Las contraseñas no coinciden";
        }
        
        if (usuarioExiste($usuario, $con)) {
            $errors[] = "El nombre de usuario $usuario ya existe";
        }
        
        if (emailExiste($email, $con)) {
            $errors[] = "El correo electrónico $email ya existe";
        }

        if(count($errors) == 0 ){
        
            $id = registraCliente([$nombres, $apellidos, $email, $telefono, $dni], $con);

            if ($id > 0) {
                $pass_hash = password_hash($password, PASSWORD_DEFAULT);
                $token = generarToken();
                if (!registraUsuario([$usuario, $pass_hash, $token, $id], $con)) {
                    $errors[] = "Error al registrar usuario";
                }
            } else {
                $errors[] = "Error al registrar cliente";
            }
        }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/382f57ddc0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/log.css">
</head>
<body>

    <?php include '../php/menu.php';?>

    <main>
        <div class="container my-5">
            <div class="card formulario-card">
                <div class="card-body">
                    <h2 class="card-title text-center">Datos del cliente</h2>
                    <?php mostrarMensajes($errors); ?>

                    <form class="row g-3" action="log.php" method="post" autocomplete="off">
                        <div class="col-md-6">
                            <label for="nombres" class="form-label">Nombres</label>
                            <input type="text" name="nombres" id="nombres" class="form-control stylish-input" required>
                        </div>
                        <div class="col-md-6">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control stylish-input" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" name="email" id="email" class="form-control stylish-input" required>
                            <span id="validaEmail" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" name="telefono" id="telefono" class="form-control stylish-input" required>
                        </div>
                        <div class="col-md-6">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="text" name="dni" id="dni" class="form-control stylish-input" required>
                        </div>
                        <div class="col-md-6">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" name="usuario" id="usuario" class="form-control stylish-input" required>
                            <span id="validaUsuario" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control stylish-input" required>
                        </div>
                        <div class="col-md-6">
                            <label for="repassword" class="form-label">Repetir contraseña</label>
                            <input type="password" name="repassword" id="repassword" class="form-control stylish-input" required>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-moderno">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
            <p class="text-center mt-3"><i>Rellene todos los campos</i></p>
        </div>
    </main>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

     <script>
        let txtUsuario = document.getElementById('usuario');
        txtUsuario.addEventListener("blur", function() {
            existeUsuario(txtUsuario.value)
        }, false);

        let txtEmail = document.getElementById('email');
        txtEmail.addEventListener("blur", function() {
            existeEmail(txtEmail.value)
        }, false);

        function existeUsuario(usuario) {
            let url = "../php/users/clienteAjax.php";
            let formData = new FormData();
            formData.append("action", "existeUsuario");
            formData.append("usuario", usuario);

            fetch(url, {
            method: 'POST',
            body: formData
            }).then(response => response.json())
            .then(data => {
                
                if (data.ok) {
                    document.getElementById('usuario').value = "";
                    document.getElementById('validaUsuario').innerHTML = 'Usuario no disponible';
                } else {
                    document.getElementById('validaUsuario').innerHTML = '';
                }

            });
        }

        function existeEmail(email) {
            let url = "../php/users/clienteAjax.php";
            let formData = new FormData();
            formData.append("action", "existeEmail");
            formData.append("email", email);

            fetch(url, {
                method: 'POST',
                body: formData
            }).then(response => response.json())
            .then(data => {
                if (data.ok) {
                    document.getElementById('email').value = "";
                    document.getElementById('validaEmail').innerHTML = 'Email no disponible';
                } else {
                    document.getElementById('validaEmail').innerHTML = '';
                }
            })
        }


    </script>




</body>
</html>