<?php
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM pokemon ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Panel de control</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  crossorigin="anonymous">
</head>
<body>
<div class = "container">
	<div class="jumbotron">
      <h1 class="display-4">Panel de control</h1>
      <p class="lead">Demo app</p>
    </div>
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="add.html">Alta</a></li>
    </ul>
    <h2>Listado de Pokémon</h2>
    <table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Nivel</th>
            <th>Entrenador</th>
            <th>Región</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
<?php
//mysqli_fetch_array- Obtiene una fila de resultados como un array asociativo, numérico o ambos
while($res = mysqli_fetch_array($result)) {
    echo "<tr>\n";
    echo "<td>".$res['name']."</td>\n";
    echo "<td>".$res['type']."</td>\n";
    echo "<td>".$res['level']."</td>\n";
    echo "<td>".$res['trainer']."</td>\n";
    echo "<td>".$res['region']."</td>\n";
    echo "<td>";
    echo "<a href=\"edit.php?id=$res[id]\">Editar</a>\n";
    echo "<a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('¿Está seguro que desea eliminar el registro?')\" >Eliminar</a></td>\n";
    echo "</td>";
    echo "</tr>\n";
}

mysqli_close($mysqli);
?>
    </tbody>
    </table>
    </main>
    <footer>
    Created by the IES Miguel Herrero team &copy; 2024
    </footer>
</div>
</body>
</html>
