<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Alta Pokémon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  crossorigin="anonymous">
</head>

<body>
<div class = "container">
    <div class="jumbotron">
    <h1 class="display-4">Simple LAMP web app</h1>
		<p class="lead">Demo app</p>
	</div>
    <main>

<?php
include_once("config.php");

if(isset($_POST['inserta'])) 
{
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $type = mysqli_real_escape_string($mysqli, $_POST['type']);
    $level = mysqli_real_escape_string($mysqli, $_POST['level']);
    $trainer = mysqli_real_escape_string($mysqli, $_POST['trainer']);
    $region = mysqli_real_escape_string($mysqli, $_POST['region']);

    if(empty($name) || empty($type) || empty($level) || empty($trainer) || empty($region)) 
    {
        if(empty($name)) {
            echo "<div>Campo nombre vacío.</div>";
        }

        if(empty($type)) {
            echo "<div>Campo tipo vacío</div>";
        }

        if(empty($level)) {
            echo "<div>Campo nivel vacío.</div>";
        }

        if(empty($trainer)) {
            echo "<div>Campo entrenador vacío.</div>";
        }

        if(empty($region)) {
            echo "<div>Campo región vacío.</div>";
        }

        echo "<a href='javascript:self.history.back();'>Volver atras</a>";
    } //fin si
    else 
    {
        $stmt = mysqli_prepare($mysqli, "INSERT INTO pokemon (name, type, level, trainer, region) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssiss", $name, $type, $level, $trainer, $region);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_free_result($stmt);
        mysqli_stmt_close($stmt);
        echo "<div>Datos añadidos correctamente</div>";
        echo "<a href='index.php'>Ver resultado</a>";
    }//fin sino
}

//Cierra la conexión
mysqli_close($mysqli);
?>

    </main>
    <footer>
    Created by the IES Miguel Herrero team &copy; 2024
    </footer>
</div>
</body>
</html>


