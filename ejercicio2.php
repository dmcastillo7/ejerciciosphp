<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>"La Langosta Ahumada" - Presupuestos</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <a href="index.php" class="back-link">← Volver al Menú</a>
        <h1>Banquetes "La Langosta Ahumada"</h1>
        <h2>Cotizacion de eventos</h2>
        
        <form method="post" action="">
            <div class="form-group">
                <label for="personas">Número de Personas:</label>
                <input type="number" id="personas" name="personas" min="1" placeholder="Ej: 250" required>
            </div>
            
            <button type="submit" name="calcular">Calcular Presupuesto</button>
        </form>
        
        <?php
        if (isset($_POST['calcular'])) {
            // 1. Obtener valores
            $personas = intval($_POST['personas']);
            
            // 2. Variables iniciales
            $costo_platillo = 0;
            $presupuesto_total = 0;
            
            
            if ($personas > 300) {
                $costo_platillo = 75.00;
            } elseif ($personas > 200 && $personas <= 300) {
                $costo_platillo = 85.00;
            } else {
                $costo_platillo = 95.00;
            }
            
            // Calcular Total
            $presupuesto_total = $personas * $costo_platillo;
            
            
            echo "<div class='result'>";
            echo "<h3>Presupuesto estimado para el evento</h3>";
            
            // Tabla de detalles
            echo "<table>";
            echo "<tr><th>Concepto</th><th>Detalle</th></tr>";
            
            echo "<tr><td>Cantidad de asistentes</td><td><strong>" . $personas . " personas</strong></td></tr>";
            
            // Fila resaltada para el precio unitario
            echo "<tr><td>Costo por platillo</td><td>$" . number_format($costo_platillo, 2) . "</td></tr>";
            
    
            echo "<tr style='background-color:#4270bc; color: white;'>";
            echo "<td><strong>PRESUPUESTO TOTAL</strong></td>";
            echo "<td><strong>$" . number_format($presupuesto_total, 2) . "</strong></td>";
            echo "</tr>";
            
            echo "</table>";
            echo "</div>";
        }
        ?>
        
        <div class="product-info">
            <h4>Políticas de Tarifas:</h4>
            <ul>
                <li><strong>Tarifa Base:</strong> $95.00 por persona (hasta 200 personas).</li>
                <li><strong>Tarifa Intermedia:</strong> $85.00 por persona (de 201 a 300 personas).</li>
                <li><strong>Tarifa Especial:</strong> $75.00 por persona (más de 300 personas).</li>
            </ul>
        </div>
    </div>
</body>
</html>