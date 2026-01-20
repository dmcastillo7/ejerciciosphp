<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 - Promedio de Edades</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <a href="index.php" class="back-link">← Volver al Menú</a>
        <h1>Ejercicio 4</h1>
        <h2>Edad promedio de un grupo de N alumnos</h2>

        <!-- FORMULARIO 1: Ingresar N -->
        <form method="post" action="">
            <div class="form-group">
                <label for="n">Número de alumnos (N):</label>
                <input type="number" id="n" name="n" min="1" required>
            </div>

            <button type="submit" name="generar">Generar campos</button>
        </form>

        <?php
        // Si se presiona "Generar campos", se dibuja el formulario de edades
        if (isset($_POST['generar'])) {
            $n = intval($_POST['n']);

            echo "<div class='product-info'>";
            echo "<h4>Ingrese las edades de los $n alumnos:</h4>";
            echo "</div>";

            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='n' value='$n'>";

            // Ciclo for para generar inputs de edades
            for ($i = 1; $i <= $n; $i++) {
                echo "<div class='form-group'>";
                echo "<label for='edad_$i'>Edad del alumno $i:</label>";
                echo "<input type='number' id='edad_$i' name='edades[]' min='0' required>";
                echo "</div>";
            }

            echo "<button type='submit' name='calcular'>Calcular promedio</button>";
            echo "</form>";
        }

        // Si se presiona "Calcular promedio", se procesa la suma y el promedio
        if (isset($_POST['calcular'])) {
            $n = intval($_POST['n']);
            $edades = $_POST['edades'];

            $suma = 0;

            // Ciclo for para sumar edades
            for ($i = 0; $i < $n; $i++) {
                $suma += intval($edades[$i]);
            }

            // Evitar división por cero (por seguridad)
            if ($n > 0) {
                $promedio = $suma / $n;

                echo "<div class='result'>";
                echo "<h3>Resultados</h3>";
                echo "<table>";
                echo "<tr><th>Concepto</th><th>Valor</th></tr>";
                echo "<tr><td>Número de alumnos (N)</td><td>$n</td></tr>";
                echo "<tr><td>Suma de edades</td><td>$suma</td></tr>";
                echo "<tr style='background-color:#a0bcea;'><td><strong>Promedio de edades</strong></td><td><strong>" . number_format($promedio, 2) . "</strong></td></tr>";
                echo "</table>";
                echo "</div>";

                // Mostrar detalle de edades ingresadas (opcional, pero útil)
                echo "<div class='product-info'>";
                echo "<h4>Edades ingresadas:</h4>";
                echo "<ul>";
                for ($i = 0; $i < $n; $i++) {
                    $num = $i + 1;
                    echo "<li>Alumno $num: " . intval($edades[$i]) . " años</li>";
                }
                echo "</ul>";
                echo "</div>";
            } else {
                echo "<div class='result'>Error: N debe ser mayor que 0.</div>";
            }
        }
        ?>

    </div>
</body>
</html>
