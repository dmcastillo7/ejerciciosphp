<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sueldo del Empleado</title>
</head>
<body>

<h2>Cálculo de Horas Trabajadas y Sueldo</h2>

<!-- FORMULARIO -->
<form method="post">
    <label>Valor por hora ($):</label><br>
    <input type="number" name="valor_hora" min="0" step="0.01" required>
    <br><br>

    <h3>Horas trabajadas por día</h3>

    <?php
    // Ciclo for para mostrar los 6 días
    for ($i = 1; $i <= 6; $i++) {
        echo "Día $i: ";
        echo "<input type='number' name='horas[]' min='0' required><br><br>";
    }
    ?>

    <input type="submit" name="calcular" value="Calcular Sueldo">
</form>

<hr>

<?php
// Procesamiento del formulario
if (isset($_POST['calcular'])) {

    $valorHora = $_POST['valor_hora']; // variable global
    $horas = $_POST['horas'];
    $totalHoras = 0;

    // Ciclo for para sumar las horas
    for ($i = 0; $i < 6; $i++) {
        $totalHoras += $horas[$i];
    }

    // Cálculo del sueldo
    $sueldo = $totalHoras * $valorHora;

    echo "<h3>Resultados</h3>";
    echo "Total de horas trabajadas: <strong>$totalHoras</strong><br>";
    echo "Sueldo total a recibir: <strong>$$sueldo</strong>";
}
?>

</body>
</html>
