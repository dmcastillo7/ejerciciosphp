<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fábricas "El cometa" - Calculadora de Precios</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Fábricas "El Cometa"</h1>
        <h2>Calculadora de Precios</h2>
        
        <form method="post" action="">
            <div class="form-group">
                <label for="materia_prima">Costo de Materia Prima ($):</label>
                <input type="number" id="materia_prima" name="materia_prima" step="0.01" min="0" required>
            </div>
            
            <div class="form-group">
                <label for="clave">Clave del Producto:</label>
                <select id="clave" name="clave" required>
                    <option value="">Seleccione una clave</option>
                    <option value="1">Clave 1</option>
                    <option value="2">Clave 2</option>
                    <option value="3">Clave 3</option>
                    <option value="4">Clave 4</option>
                    <option value="5">Clave 5</option>
                    <option value="6">Clave 6</option>
                </select>
            </div>
            
            <button type="submit" name="calcular">Calcular Precio de Venta</button>
        </form>
        
        <?php
        // Variables locales
        if (isset($_POST['calcular'])) {
            // Obtener valores del formulario
            $materia_prima = floatval($_POST['materia_prima']);
            $clave = intval($_POST['clave']);
            
            // Variables para los cálculos
            $mano_obra = 0;
            $gastos_fabricacion = 0;
            
            // Calcular costo de mano de obra según la clave usando condicionales if-elseif-else
            if ($clave == 3 || $clave == 4) {
                // Para claves 3 o 4: 75% del costo de materia prima
                $mano_obra = $materia_prima * 0.75;
            } elseif ($clave == 1 || $clave == 5) {
                // Para claves 1 o 5: 80% del costo de materia prima
                $mano_obra = $materia_prima * 0.80;
            } elseif ($clave == 2 || $clave == 6) {
                // Para claves 2 o 6: 85% del costo de materia prima
                $mano_obra = $materia_prima * 0.85;
            } else {
                echo "<div class='result'>Error: Clave no válida</div>";
                exit;
            }
            
            // Calcular gastos de fabricación según la clave usando condicionales if-elseif-else
            if ($clave == 2 || $clave == 5) {
                // Para claves 2 o 5: 30% del costo de materia prima
                $gastos_fabricacion = $materia_prima * 0.30;
            } elseif ($clave == 3 || $clave == 6) {
                // Para claves 3 o 6: 35% del costo de materia prima
                $gastos_fabricacion = $materia_prima * 0.35;
            } elseif ($clave == 1 || $clave == 4) {
                // Para claves 1 o 4: 28% del costo de materia prima
                $gastos_fabricacion = $materia_prima * 0.28;
            }
            
            // Calcular costo de producción
            $costo_produccion = $materia_prima + $mano_obra + $gastos_fabricacion;
            
            // Calcular precio de venta (costo de producción + 45% del costo de producción)
            $precio_venta = $costo_produccion + ($costo_produccion * 0.45);
            
            // Mostrar resultados
            echo "<div class='result'>";
            echo "<h3>Resultados para Producto con Clave $clave</h3>";
            
            echo "<table>";
            echo "<tr><th>Concepto</th><th>Valor ($)</th><th>Porcentaje sobre Materia Prima</th></tr>";
            echo "<tr><td>Materia Prima</td><td>" . number_format($materia_prima, 2) . "</td><td>100%</td></tr>";
            echo "<tr><td>Mano de Obra</td><td>" . number_format($mano_obra, 2) . "</td><td>" . (($mano_obra/$materia_prima)*100) . "%</td></tr>";
            echo "<tr><td>Gastos de Fabricación</td><td>" . number_format($gastos_fabricacion, 2) . "</td><td>" . (($gastos_fabricacion/$materia_prima)*100) . "%</td></tr>";
            echo "<tr style='background-color:#a0bcea;'><td><strong>Costo de Producción</strong></td><td><strong>" . number_format($costo_produccion, 2) . "</strong></td><td></td></tr>";
            echo "<tr style='background-color:#4270bc;'><td><strong>Precio de Venta</strong></td><td><strong>" . number_format($precio_venta, 2) . "</strong></td><td>+45% sobre costo de producción</td></tr>";
            echo "</table>";
            
            echo "</div>";
            
            // Ejemplo adicional: Mostrar cálculos para todas las claves usando un ciclo for
            echo "<div class='product-info'>";
            echo "<h4>Cálculos para todas las claves (usando ciclo for):</h4>";
            
            echo "<table>";
            echo "<tr><th>Clave</th><th>Mano de Obra</th><th>Gastos Fab.</th><th>Costo Prod.</th><th>Precio Venta</th></tr>";
            
            // Usamos un ciclo for para iterar por todas las claves
            for ($i = 1; $i <= 6; $i++) {
                // Reiniciamos variables para cada iteración
                $mano_obra_for = 0;
                $gastos_fab_for = 0;
                
                // Calcular mano de obra para cada clave
                if ($i == 3 || $i == 4) {
                    $mano_obra_for = $materia_prima * 0.75;
                } elseif ($i == 1 || $i == 5) {
                    $mano_obra_for = $materia_prima * 0.80;
                } elseif ($i == 2 || $i == 6) {
                    $mano_obra_for = $materia_prima * 0.85;
                }
                
                // Calcular gastos de fabricación para cada clave
                if ($i == 2 || $i == 5) {
                    $gastos_fab_for = $materia_prima * 0.30;
                } elseif ($i == 3 || $i == 6) {
                    $gastos_fab_for = $materia_prima * 0.35;
                } elseif ($i == 1 || $i == 4) {
                    $gastos_fab_for = $materia_prima * 0.28;
                }
                
                // Calcular costo de producción y precio de venta
                $costo_prod_for = $materia_prima + $mano_obra_for + $gastos_fab_for;
                $precio_venta_for = $costo_prod_for + ($costo_prod_for * 0.45);
                
                // Resaltar la fila de la clave seleccionada
                if ($i == $clave) {
                    echo "<tr style='background-color:#4270bc; font-weight:bold;'>";
                } else {
                    echo "<tr>";
                }
                
                echo "<td>Clave $i</td>";
                echo "<td>$" . number_format($mano_obra_for, 2) . "</td>";
                echo "<td>$" . number_format($gastos_fab_for, 2) . "</td>";
                echo "<td>$" . number_format($costo_prod_for, 2) . "</td>";
                echo "<td>$" . number_format($precio_venta_for, 2) . "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
            echo "</div>";
        }
        ?>
        
        <div class="product-info">
            <h4>Información sobre los productos:</h4>
            <ul>
                <li><strong>Claves 1 y 5:</strong> Mano de obra 80%, Gastos de fabricación 28% (clave 1) y 30% (clave 5)</li>
                <li><strong>Claves 2 y 6:</strong> Mano de obra 85%, Gastos de fabricación 30% (clave 2) y 35% (clave 6)</li>
                <li><strong>Claves 3 y 4:</strong> Mano de obra 75%, Gastos de fabricación 35% (clave 3) y 28% (clave 4)</li>
                <li><strong>Precio de venta:</strong> Costo de producción + 45% del costo de producción</li>
            </ul>
        </div>
    </div>
</body>
</html>