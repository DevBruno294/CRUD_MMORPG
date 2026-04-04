 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forja de Heroes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h2>Lista de Heroes</h2>
        <a class="btn btn-primary" href="/CRUD_MMORPG/create.php" role="button">Nuevo Heroe</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Clase</th>
                    <th>Nivel</th>
                    <th>Clan</th>
                    <th>Oro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $servername = "localhost:3307";
                $username = "root";
                $password = "";
                $database = "grimorio";

                //Creando la conexion a la base de datos
                $connection = new mysqli($servername, $username, $password, $database);

                //Chekeo de coneccion
                if($connection->connect_error){
                    die("Conexion Fallida" . $connection->connect_error);
                }

                //lee todas las filas de la tabla Personajes de la BD Grimorio
                $sql = "SELECT * FROM personajes";
                $resultado = $connection->query($sql);

                //Chekeo de error en las lecturas de las filas de la tabla Personajes
                if (!$resultado) {
                    die("query invalida". $connection->error);
                }
                ?>
                <tr>
                    <td>10</td>
                    <td>coso1</td>
                    <td>coso2</td>
                    <td>coso3</td>
                    <td>coso4</td>
                    <td>coso5</td>
                    <td>coso6</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/CRUD_MMORPG/edit.php">Editar</a>
                        <a class="btn btn-danger btn-sm" href="/CRUD_MMORPG/delete.php">Eliminar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>