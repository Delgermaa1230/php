<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Selection</title>
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

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="button"], input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="button"]:hover, input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="button"] {
            margin-bottom: 10px;
        }

        .result {
            margin-top: 20px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

<form method="post" action="">
    <label for="available-fruits">Сонгох боломжит жимснүүд:</label>
    <select id="available-fruits" name="available-fruits[]" multiple>
        <option value="apple">Алим</option>
        <option value="banana">Банана</option>
        <option value="orange">Мандрин</option>
        <option value="grape">Усан үзэм</option>
        <option value="kiwi">Киви</option>
    </select>

    <br>

    <input type="button" value="Жимсийг Сонгох" onclick="moveSelectedOptions('available-fruits', 'selected-fruits')">

    <br>

    <label for="selected-fruits">Сонгогддсон жимснүүд:</label>
    <select id="selected-fruits" name="selected-fruits[]" multiple>
    </select>

    <br>

    <input type="submit" value="Илгээх">
</form>

<script>
function moveSelectedOptions(sourceId, destinationId) {
    var sourceSelect = document.getElementById(sourceId);
    var destinationSelect = document.getElementById(destinationId);

    for (var i = 0; i < sourceSelect.options.length; i++) {
        if (sourceSelect.options[i].selected) {
            var newOption = new Option(sourceSelect.options[i].text, sourceSelect.options[i].value);
            destinationSelect.add(newOption);
            sourceSelect.remove(i);
            i--; 
        }
    }

    saveSelectedOptionsToCookie();
}

function saveSelectedOptionsToCookie() {
    var selectedOptions = [];
    var selectedFruitsSelect = document.getElementById('selected-fruits');

    for (var i = 0; i < selectedFruitsSelect.options.length; i++) {
        selectedOptions.push(selectedFruitsSelect.options[i].value);
    }

    document.cookie = "selectedOptions=" + JSON.stringify(selectedOptions) + "; path=/";
}

function loadSelectedOptionsFromCookie() {
    var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)selectedOptions\s*=\s*([^;]*).*$)|^.*$/, "$1");

    if (cookieValue) {
        var selectedOptions = JSON.parse(cookieValue);
        var selectedFruitsSelect = document.getElementById('selected-fruits');

        for (var i = 0; i < selectedOptions.length; i++) {
            var newOption = new Option(selectedOptions[i], selectedOptions[i]);
            selectedFruitsSelect.add(newOption);
        }
    }
}

loadSelectedOptionsFromCookie();
</script>

</body>
</html>
