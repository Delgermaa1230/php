<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>фарэнхэтийн утгын Цельс рүү шилжүүлух</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        p {
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }

        .error {
            color: #ff0000;
            font-weight: bold;
        }

        .result {
            margin-top: 15px;
            padding: 10px;
            background-color: #e6f7ff;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<?php
function fahrenheitToCelsius($fahrenheit) {
    return ($fahrenheit - 32) * (5/9);
}

$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fahrenheit = $_POST["fahrenheit"];

    if (is_numeric($fahrenheit)) {
        $celsius = fahrenheitToCelsius($fahrenheit);
        $result = "<p class='result'>$fahrenheit фарэнхэтийн хэм нь $celsius целсийн хэмтэй тэнцүү.</p>";
    } else {
        $result = "<p class='error'>Тоон утга оруулна уу.</p>";
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="fahrenheit">фарэнхэтийн хэмийн утгын оруулна уу:</label>
    <input type="text" name="fahrenheit" id="fahrenheit" required>
    <br>
    <input type="submit" value="Цельс болгох">
    <?php echo $result; ?>
</form>

</body>
</html>


