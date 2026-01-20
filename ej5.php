<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5 - Horas y Sueldo</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <a href="index.php" class="back-link">← Volver al Menú</a>
        <h1>Ejercicio 5</h1>
        <h2>Total de horas y sueldo semanal (6 días)</h2>

        <!-- FORMULARIO -->
        <form method="post" action="">
            <div class="form-group">
                <label for="valor_hora">Valor por hora ($):</label>
                <input type="number" id="valor_hora" name="valor_hora" step="0.01" min="0" required>
            </div>

            <?php
            // Generar 6 inputs (6 días de trabajo) con ciclo for
            for ($i = 1; $i <= 6; $i++) {
                echo "<div class='form-group'>";
                echo "<label for='dia_$i'>Horas trabajadas - Día $i:</label>";
                echo "<input type='number' id='dia_$i' name='horas[]' min='0' step='0.01' required>";
                echo "</div>";
            }
            ?>

            <button type="submit" name="calcular">Calcular</button>
        </form>

        <?php
        if (isset($_POST['calcular'])) {
            $valor_hora = floatval($_POST['valor_hora']);
            $horas = $_POST['horas'];

            $total_horas = 0;

            // Sumar horas con ciclo for
            for ($i = 0; $i < 6; $i++) {
                $total_horas += floatval($horas[$i]);
            }

            // Calcular sueldo
            $sueldo = $total_horas * $valor_hora;

            // Mostrar resultados
            echo "<div class='result'>";
            echo "<h3>Resultados</h3>";

            echo "<table>";
            echo "<tr><th>Concepto</th><th>Valor</th></tr>";
            echo "<tr><td>Valor por hora</td><td>$" . number_format($valor_hora, 2) . "</td></tr>";
            echo "<tr><td>Total de horas trabajadas</td><td>" . number_format($total_horas, 2) . "</td></tr>";
            echo "<tr style='background-color:#a0bcea;'><td><strong>Sueldo total</strong></td><td><strong>$" . number_format($sueldo, 2) . "</strong></td></tr>";
            echo "</table>";

            echo "</div>";

            // Detalle por día (tipo info adicional, como en tu ejercicio 3)
            echo "<div class='product-info'>";
            echo "<h4>Detalle de horas por día:</h4>";
            echo "<table>";
            echo "<tr><th>Día</th><th>Horas</th></tr>";

            for ($i = 0; $i < 6; $i++) {
                $dia = $i + 1;
                echo "<tr>";
                echo "<td>Día $dia</td>";
                echo "<td>" . number_format(floatval($horas[$i]), 2) . "</td>";
                echo "</tr>";
            }

            echo "<tr style='background-color:#4270bc; font-weight:bold;'>";
            echo "<td>Total</td>";
            echo "<td>" . number_format($total_horas, 2) . "</td>";
            echo "</tr>";

            echo "</table>";
            echo "</div>";
        }
        ?>

        <div class="product-info">
            <h4>Notas:</h4>
            <ul>
                <li>La semana considerada es de <strong>6 días</strong>.</li>
                <li><strong>Sueldo = Total de horas × Valor por hora</strong>.</li>
                <li>Las horas no pueden ser negativas.</li>
            </ul>
        </div>

    </div>
</body>
</html>
