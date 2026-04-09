<?php
//Creando la conexion a la base de datos
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "grimorio";

$connection = new mysqli($servername, $username, $password, $database);



//1. creo las variables que van a almacenar los datos del formulario (siempre vacías al principio)
$nombre = "";
$clase = "";
$nivel = "";
$clan = "";
$oro = "";

//por si hay algun campo vacio
$mensajeDeError = "";

//si los campos estan todos completos
$mensajeDeConfirmacion =  "";


//2.solo se ejecuta cuando el usuario envió el formulario (POST), validamos

if ($_SERVER['REQUEST_METHOD'] =='POST') {
    $nombre = $_POST["nombre"];
    $clase = $_POST["clase"];
    $nivel = $_POST["nivel"];
    $clan = $_POST["clan"];
    $oro = $_POST["oro"];
    do {
        // Chequeo si hay algún campo vacío
        if (empty($nombre) || empty($clase) || empty($nivel) || empty($clan) ||empty($oro) ) {
            $mensajeDeError = "todos los campos son requeridos";
            break; // Sale del do-while y no ejecuta lo de abajo
        }
    
            //3. lógica de INSERT a la base de datos
            $sql = "INSERT INTO personajes (Nombre, Clase, Nivel, Clan, Oro)" .
                    "VALUES('$nombre', '$clase', '$nivel', '$clan', '$oro' )";
            $resultado = $connection ->query($sql);


            if (!$resultado) {
                $mensajeDeError = "query invalida" . $connection->error;
                break;
            }
            //4. si no hay campos vacios, agregar los datos a la Base de datos, limpiamos variables y damos mensaje de éxito
            $nombre = "";
            $clase = "";
            $nivel = "";
            $clan = "";
            $oro = "";
    
            $mensajeDeConfirmacion = "Personaje agregado correctamente";
            
           
    } while (false);
    
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forja de Heroes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</svg>
</head>
<body>
    <div class="container my-5">
        <a href="/CRUD_MMORPG/index.php" class="btn btn-primary">
            <i class="bi bi-arrow-left">Volver atras</i> 
        </a>
    </div>
        
    <div class="container my-5">
        <h2>Nuevo Heroe</h2>
       
        <?php 
            if (    !empty($mensajeDeError) ) {
              echo"
               <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$mensajeDeError</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
              ";
            }
        ?>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Clase</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="clase" value="<?php echo $clase; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nivel</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="nivel" value="<?php echo $nivel; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Clan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="clan" value="<?php echo $clan; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">oro</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="oro" value="<?php echo $oro; ?>">
                </div>
            </div>
            <?php 
            if (    !empty($mensajeDeConfirmacion)  ) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show role='alert'>
                          <strong>$mensajeDeConfirmacion</strong>
                          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'> </button>
                        </div>
                    </div>    
                </div>
                ";
            }
            
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/CRUD_MMORPG/index.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

   
</body>
</html>