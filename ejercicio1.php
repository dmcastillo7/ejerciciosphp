<?php
// INICIAMOS PHP
$tipo = "";
$tamano = "";
$precio_inicial = "";
$kilos = "";
$precio_final = 0;
$ganancia_total = 0;
$mostrar_resultado = false;
$ajuste_texto = ""; // Para mostrar cuánto se sumó o restó (+0.20, -0.30, etc.)
$fila_activa = ""; // Para saber qué fila de la tabla pintar (A1, A2, B1, B2)

if (isset($_POST['calcular'])) {
    $tipo = $_POST['tipo'];
    $tamano = $_POST['tamano'];
    // Aseguramos que sean números decimales válidos
    $precio_inicial = floatval($_POST['precio_inicial']);
    $kilos = floatval($_POST['kilos']);
    
    $precio_final = $precio_inicial;

    // LÓGICA (Anidada)
    if ($tipo == 'A') {
        if ($tamano == '1') {
            $precio_final = $precio_final + 0.20;
            $ajuste_texto = "+$0.20";
            $fila_activa = "A1"; // Código para la fila
        } else { // Tamaño 2
            $precio_final = $precio_final + 0.30;
            $ajuste_texto = "+$0.30";
            $fila_activa = "A2";
        }
    } else { // Si es Tipo B
        if ($tamano == '1') {
            $precio_final = $precio_final - 0.30;
            $ajuste_texto = "-$0.30";
            $fila_activa = "B1";
        } else { // Tamaño 2
            $precio_final = $precio_final - 0.50;
            $ajuste_texto = "-$0.50";
            $fila_activa = "B2";
        }
    }

    $ganancia_total = $precio_final * $kilos;
    $mostrar_resultado = true;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
    <style>
        /* ESTILOS GENERALES */
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f2f5; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #4a4a4a; margin-bottom: 10px; }
        
        /* ESTILOS TABLA */
        .rules-table { width: 100%; border-collapse: collapse; margin: 20px 0; font-size: 14px; border: 1px solid #eee; }
        .rules-table th, .rules-table td { padding: 8px; border-bottom: 1px solid #eee; text-align: center; }
        .rules-table th { background-color: #f8f9fa; color: #555; font-weight: bold; }
        
        /* CLASE PARA ILUMINAR LA FILA (MORADO UVA) */
        .fila-activa { background-color: #eeeaf9 !important; color: #6c5ce7; font-weight: bold; border: 2px solid #6c5ce7; }
        
        /* Ajustes visuales positivos/negativos */
        .plus { color: green; }
        .minus { color: red; }

        /* INPUTS Y BOTONES */
        label { display: block; margin-bottom: 5px; font-weight: 600; color: #555; }
        select, input[type="number"] { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; font-size: 16px; margin-bottom: 15px; }
        
        /* Botón Morado */
        input[type="submit"] { width: 100%; padding: 12px; background-color: #6c5ce7; color: white; border: none; border-radius: 6px; font-size: 16px; cursor: pointer; transition: background 0.3s; margin-top: 10px;}
        input[type="submit"]:hover { background-color: #5b4cc4; }
        
        /* RESULTADOS */
        .result { margin-top: 20px; padding: 15px; background-color: #eeeaf9; border-left: 5px solid #6c5ce7; border-radius: 4px; color: #333; }
        .back-link { display: inline-block; margin-bottom: 20px; color: #6c5ce7; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

    <div class="container">
        <a href="index.php" class="back-link">← Volver al Menú</a>
        
        <h2>Calculadora</h2>
        <p style="text-align:center; color:#777; font-size:13px; margin-bottom:15px;">Reglas de Ajuste de Precio</p>
        
        <!-- TABLA DE REGLAS -->
        <table class="rules-table">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Tamaño</th>
                    <th>Ajuste</th>
                </tr>
            </thead>
            <tbody>
                <!-- Se ilumina si fila_activa coincide con el ID de la fila -->
                <tr class="<?php if($fila_activa == 'A1') echo 'fila-activa'; ?>">
                    <td>Tipo A</td><td>Tamaño 1</td><td class="plus">Carga +$0.20</td>
                </tr>
                <tr class="<?php if($fila_activa == 'A2') echo 'fila-activa'; ?>">
                    <td>Tipo A</td><td>Tamaño 2</td><td class="plus">Carga +$0.30</td>
                </tr>
                <tr class="<?php if($fila_activa == 'B1') echo 'fila-activa'; ?>">
                    <td>Tipo B</td><td>Tamaño 1</td><td class="minus">Rebaja -$0.30</td>
                </tr>
                <tr class="<?php if($fila_activa == 'B2') echo 'fila-activa'; ?>">
                    <td>Tipo B</td><td>Tamaño 2</td><td class="minus">Rebaja -$0.50</td>
                </tr>
            </tbody>
        </table>

        <form method="post">
            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:15px;">
                <div>
                    <label>Tipo:</label>
                    <select name="tipo">
                        <!-- El 'selected' mantiene la opción elegida -->
                        <option value="A" <?php if($tipo == 'A') echo 'selected'; ?>>Tipo A</option>
                        <option value="B" <?php if($tipo == 'B') echo 'selected'; ?>>Tipo B</option>
                    </select>
                </div>
                <div>
                    <label>Tamaño:</label>
                    <select name="tamano">
                        <option value="1" <?php if($tamano == '1') echo 'selected'; ?>>Tamaño 1</option>
                        <option value="2" <?php if($tamano == '2') echo 'selected'; ?>>Tamaño 2</option>
                    </select>
                </div>
            </div>
            
            <label>Precio Inicial por Kilo ($):</label>
            <input type="number" name="precio_inicial" step="0.01" required placeholder="Ej: 2.50" value="<?php echo $precio_inicial; ?>">

            <label>Kilos de Producción:</label>
            <input type="number" name="kilos" required placeholder="Ej: 1000" value="<?php echo $kilos; ?>">
            
            <input type="submit" name="calcular" value="Calcular Ganancia">
        </form>

        <?php if ($mostrar_resultado): ?>
            <div class='result'>
                <strong>📊 Resultado del Embarque:</strong><br><br>
                
                Precio Base: $<?php echo number_format($precio_inicial, 2); ?><br>
                Ajuste aplicado: <strong><?php echo $ajuste_texto; ?></strong> (Ver tabla)<br>
                <hr style='border: 0; border-top: 1px solid #6c5ce7; margin: 10px 0;'>
                Precio Final Kilo: <strong>$<?php echo number_format($precio_final, 2); ?></strong><br>
                <div style="margin-top:10px; font-size: 1.2em; color: #4a4a4a;">
                    Ganancia Total: <strong style="color:#6c5ce7;">$<?php echo number_format($ganancia_total, 2); ?></strong>
                </div>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>