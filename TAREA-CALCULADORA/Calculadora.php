<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Calculadora</title>
</head>
<body>
    <div align="center">
        <form name="Calculadora" method="post">
            <p>
                <label for="operacion">Seleccione una operación:</label>
                <select name="operacion">
                    <option value="suma">Suma</option>
                    <option value="resta">Resta</option>
                    <option value="multiplicacion">Multiplicación</option>
                    <option value="division">División</option>
                </select>
            </p>
            <p>
                <label for="numero1">Número 1 (Rango entre 1 a 99):</label>
                <input type="number" name="numero1" min="1" max="99" required>
            </p>
            <p>
                <label for="numero2">Número 2 (Rango entre 1 a 99):</label>
                <input type="number" name="numero2" min="1" max="99" required>
            </p>
            <p>
                <input type="submit" value="Calcular" name="submitCalculadora">
            </p>
            
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $operacion = $_POST["operacion"];
                $numero1 = intval($_POST["numero1"]);
                $numero2 = intval($_POST["numero2"]);
                $resultado = 0;

                switch ($operacion) {
                    case "suma":
                        $resultado = $numero1 + $numero2;
                        break;
                    case "resta":
                        $resultado = $numero1 - $numero2;
                        break;
                    case "multiplicacion":
                        $resultado = $numero1 * $numero2;
                        break;
                    case "division":
                        if ($numero2 != 0) {
                            $resultado = $numero1 / $numero2;
                        } else {
                            $resultado = "Error: División por cero";
                        }
                        break;
                }
                
                echo "<h2>Resultado:</h2>";
                echo "<p>El resultado de la $operacion entre $numero1 y $numero2 es: $resultado</p>";
            }
            ?>
        </form>
    </div>
</body>
</html>