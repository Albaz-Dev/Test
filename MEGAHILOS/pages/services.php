<?php
    require '../php/config.php';
    require '../php/conexion.php';
    $db = new Database();
    $con = $db -> conectar();
    
    $sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
    $sql -> execute();
    $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
    

   // session_destroy();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scythe electronics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/servicios.css">
    <script src="https://kit.fontawesome.com/382f57ddc0.js" crossorigin="anonymous"></script>
</head>

    <body>

        <?php include '../php/menu.php';?>

        <main>
            <div class="container py-4">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
                <?php foreach ($resultado as $row) : ?>
                    <div class="col">
                    <div class="card shadow h-100">
                        <?php
                        $id = $row['id'];
                        $imagen = "../media/productos/$id/principal.png";
                        if (!file_exists($imagen)) {
                            $imagen = "../media/nophoto.jpg";
                        }
                        ?>
                        <img src="<?php echo $imagen; ?>" class="card-img-top" alt="<?php echo $row['nombre']; ?>">

                        <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                        <p class="card-text">$<?php echo number_format($row['precio'], 2, '.', ','); ?></p>
                        <div class="mt-auto">
                            <a href="../php/services_bd/detalles.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha512', $row['id'], kEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>
                            <button class="btn btn-outline-success" type="button" onclick="addProducto(<?php echo $row['id']; ?>, '<?php echo hash_hmac('sha512', $row['id'], kEY_TOKEN); ?>')">Agregar al carrito</button>
                        </div>
                        </div>   
                    </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </main>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <script>

            function addProducto(id, token){
                let url = '../php/pasarelapagos/carrito.php';
                let formData = new FormData();
                formData.append('id', id);
                formData.append('token', token);

                fetch (url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if(data.ok){
                        let elemento = document.getElementById("num_cart")
                        elemento.innerHTML = data.numero
                    }
                })

            }                        
        </script>   
    </body>
</html>