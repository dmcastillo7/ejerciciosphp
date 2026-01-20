<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú de Tareas PHP</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; padding: 40px; background-color: #f4f4f4; }
        .container { max-width: 400px; margin: 0 auto; background: white; padding: 50px; border-radius: 15px; box-shadow: 0 10 20px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #333; }
        .menu-btn { 
            display: block; 
            width: 92%; 
            padding: 15px; 
            margin: 10px 0; 
            background-color: #007bff; 
            color: white; 
            text-decoration: none; 
            text-align: center; 
            border-radius: 15px; 
            font-size: 18px;
            transition: background 0.9s;
        }
        .menu-btn:hover { background-color: #36ad5a; }
        .footer { margin-top: 20px; text-align: center; font-size: 12px; color: #777; }
    </style>
</head>
<body>

<div class="container">
    <h1>Mis Ejercicios de PHP</h1>
    <p style="text-align: center;">Selecciona un ejercicio para probarlo:</p>
    
    <a href="ejercicio1.php" class="menu-btn">🍇 Ejercicio 1: Vinicultores</a>
   

    <div class="footer">
        Tarea desarrollada para Aplicacion de Tecnologías Web<br>
        Hecho con HTML5 y PHP
    </div>
</div>

</body>
</html>