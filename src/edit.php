<?php
include_once("config.php");

if(isset($_POST['modifica'])) {
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $type = mysqli_real_escape_string($mysqli, $_POST['type']);
    $level = mysqli_real_escape_string($mysqli, $_POST['level']);
    $trainer = mysqli_real_escape_string($mysqli, $_POST['trainer']);
    $region = mysqli_real_escape_string($mysqli, $_POST['region']);

    if(empty($name) || empty($type) || empty($level) || empty($trainer) || empty($region)) {
        if(empty($name)) {
            echo "<font color='red'>Campo nombre vacío.</font><br/>";
        }

        if(empty($type)) {
            echo "<font color='red'>Campo tipo vacío.</font><br/>";
        }

        if(empty($level)) {
            echo "<font color='red'>Campo nivel vacío.</font><br/>";
        }

        if(empty($trainer)) {
            echo "<font color='red'>Campo entrenador vacío.</font><br/>";
        }

        if(empty($region)) {
            echo "<font color='red'>Campo región vacío.</font><br/>";
        }
    } else {
        $stmt = mysqli_prepare($mysqli, "UPDATE pokemon SET name=?, type=?, level=?, trainer=?, region=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, "ssisss", $name, $type, $level, $trainer, $region, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_free_result($stmt);
        mysqli_stmt_close($stmt);

        header("Location: index.php");
    }
}

$id = $_GET['id'];

$id = mysqli_real_escape_string($mysqli, $id);

$stmt = mysqli_prepare($mysqli, "SELECT name, type, level, trainer, region FROM pokemon WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $name, $type, $level, $trainer, $region);
mysqli_stmt_fetch($stmt);
mysqli_stmt_free_result($stmt);
mysqli_stmt_close($stmt);
mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Modificación Pokémon</title>
</head>

<body>
<div>
    <header>
        <h1>Panel de Control</h1>
    </header>
    
    <main>              
    <ul>
        <li><a href="index.php" >Inicio</a></li>
        <li><a href="add.html" >Alta</a></li>
    </ul>
    <h2>Modificación Pokémon</h2>

    <form action="edit.php" method="post">
        <div>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" value="<?php echo $name;?>" required>
        </div>

        <div>
            <label for="type">Tipo</label>
            <input type="text" name="type" id="type" value="<?php echo $type;?>" required>
        </div>

        <div>
            <label for="level">Nivel</label>
            <input type="number" name="level" id="level" value="<?php echo $level;?>" required>
        </div>

        <div>
            <label for="trainer">Entrenador</label>
            <input type="text" name="trainer" id="trainer" value="<?php echo $trainer;?>" required>
        </div>

        <div>
            <label for="region">Región</label>
            <input type="text" name="region" id="region" value="<?php echo $region;?>" required>
        </div>

        <div>
            <input type="hidden" name="id" value=<?php echo $id;?>>
            <input type="submit" name="modifica" value="Guardar">
            <input type="button" value="Cancelar" onclick="location.href='index.php'">
        </div>
    </form>

    </main> 
    <footer>
    Created by the IES Miguel Herrero team &copy; 2024
    </footer>
</div>
</body>
</html>
