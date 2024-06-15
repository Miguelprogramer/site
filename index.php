<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $display = isset($_POST['display']) ? $_POST['display'] : '';

    if (isset($_POST['btn'])) {
        $btn = $_POST['btn'];

        if ($btn == 'C') {
            $display = '';
        } elseif ($btn == '=') {
            try {
                // Avalia a expressão matemática
                $display = eval("return $display;");
            } catch (Throwable $e) {
                $display = "Error";
            }
        } else {
            $display .= $btn;
        }
    }
} else {
    $display = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #121212;
            font-family: Arial, sans-serif;
            color: #ffffff;
        }
        .calculator {
            width: 320px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            background-color: #1e1e1e;
        }
        .display {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #333;
            border-radius: 5px;
            font-size: 24px;
            text-align: right;
            background-color: #333;
            color: #fff;
            box-sizing: border-box;
        }
        .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        .buttons button {
            padding: 20px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #555;
            color: #fff;
        }
        .buttons button:hover {
            background-color: #666;
        }
        .buttons .operator {
            background-color: #f9a825;
            color: white;
        }
        .buttons .operator:hover {
            background-color: #f57f17;
        }
        .buttons .equal {
            background-color: #4caf50;
            color: white;
        }
        .buttons .equal:hover {
            background-color: #388e3c;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <form method="POST">
            <input type="text" name="display" class="display" value="<?php echo htmlspecialchars($display); ?>" readonly />
            <div class="buttons">
                <button type="submit" name="btn" value="7">7</button>
                <button type="submit" name="btn" value="8">8</button>
                <button type="submit" name="btn" value="9">9</button>
                <button type="submit" name="btn" value="/" class="operator">/</button>

                <button type="submit" name="btn" value="4">4</button>
                <button type="submit" name="btn" value="5">5</button>
                <button type="submit" name="btn" value="6">6</button>
                <button type="submit" name="btn" value="*" class="operator">*</button>

                <button type="submit" name="btn" value="1">1</button>
                <button type="submit" name="btn" value="2">2</button>
                <button type="submit" name="btn" value="3">3</button>
                <button type="submit" name="btn" value="-" class="operator">-</button>

                <button type="submit" name="btn" value="0">0</button>
                <button type="submit" name="btn" value="C" class="operator">C</button>
                <button type="submit" name="btn" value="=" class="equal">=</button>
                <button type="submit" name="btn" value="+" class="operator">+</button>
            </div>
        </form>
    </div>
</body>
</html>
