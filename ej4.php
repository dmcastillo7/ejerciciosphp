<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Promedio de Edades</title>
</head>
<body>

<h2>Calcular Edad Promedio de Alumnos</h2>

<!-- FORMULARIO 1: INGRESAR N -->
<form method="post">
    <label>Ingrese el número de alumnos:</label><br>
    <input type="number" name="n" min="1" required>
    <br><br>
    <input type="submit" name="generar" value="Generar Campos">
</form>

<hr>

<?php
// Verificar si se envió el número de alumnos
if (isset($_POST['generar'])) {

    $n = $_POST['n']; // variable global
    echo "<h3>Ingrese las edades</h3>";

    echo "<form method='post'>";
    echo "<input type='hidden' name='n' value='$n'>";

    // Ciclo for para crear campos de edad
    for ($i = 1; $i <= $n; $i++) {
        echo "Edad del alumno $i: ";
        echo "<input type='number' name='edades[]' min='0' required><br><br>";
    }

    echo "<input type='submit' name='calcular' value='Calcular Promedio'>";
    echo "</form>";
}

// Verificar si se enviaron las edades
if (isset($_POST['calcular'])) {

    $n = $_POST['n'];
    $edades = $_POST['edades'];
    $suma = 0;

    // Ciclo for para sumar las edades
    for ($i = 0; $i < $n; $i++) {
        $suma += $edades[$i];
    }

    $promedio = $suma / $n;

    echo "<h3>Resultado</h3>";
    echo "La edad promedio del grupo es: <strong>$promedio</strong>";
}
?>

</body>
</html>