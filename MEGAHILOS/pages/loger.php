<?php
    require '../php/config.php';
    require '../php/conexion.php';
    require '../php/users/clienteFunciones.php';
    $db = new Database();
    $con = $db -> conectar();

    $proceso = isset($_GET['pag']) ? 'pago' : 'loger';

    $errors = [];

    if (!empty($_POST)) {
        
        $usuario = trim($_POST['usuario']);
        $password = trim($_POST['password']);
        $proceso = $_POST['proceso'] ?? 'loger';


        if (!esNulo([$usuario, $password])) {
            $errors[] = "Debe llenar todos los campos";
        }

        if (count($errors) == 0) {
            $errors[] = login($usuario, $password, $con, $proceso);
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
    <link rel="stylesheet" href="../css/loger.css">
</head>
<body>

        <?php include '../php/menu.php';?>

        <main class="form-login m-auto pt-4">
            <div class="card login-card">
                <div class="card-body">
                    <h2 class="card-title text-center">Iniciar sesión</h2>
                    <?php mostrarMensajes($errors); ?>

                    <form class="row g-3" action="loger.php" method="post" autocomplete="off">
                        <input type="hidden" name="proceso" value="<?php echo $proceso; ?>">

                        <div class="form-floating mb-3">
                            <input class="form-control stylish-input" type="text" name="usuario" id="usuario" placeholder="Usuario" required>
                            <label for="usuario">Usuario</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control stylish-input" type="password" name="password" id="password" placeholder="Contraseña" required>
                            <label for="password">Contraseña</label>
                        </div>

                        <div class="d-grid gap-3 col-12">
                            <button type="submit" class="btn btn-moderno">Ingresar</button>
                        </div>

                        <hr>

                        <div class="col-12 text-center">
                            ¿No tiene cuenta? <a href="log.php">Registrate aquí</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>


    
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>





</body>
</html>