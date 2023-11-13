<html>

<head>
    <title>Temperature Conversion and Favorite fruits</title>
</head>

<body>
    <?php

    // fahrenheit to celsuis

        if (isset ( $_GET ['fahrenheit'] )) {
        $fahrenheit = $_GET ['fahrenheit'];
        } else {
        $fahrenheit = null;
        }
        if (is_null ( $fahrenheit )) {
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        Fahrenheit temperature: <input type="text" name="fahrenheit" /><br />
        <input type="submit" value="Convert to Celsius!" />
    </form>
    <?php
        } else {
        $celsius = ($fahrenheit - 32) * 5 / 9;
        printf ( "%.2fF is %.2fC", $fahrenheit, $celsius );
        }
    ?>

    <?php

    // celsuis to fahrenheit

        if (isset ( $_GET ['celsius'] )) {
        $celsius = $_GET ['celsius'];
        } else {
        $celsius = null;
        }
        if (is_null ( $celsius )) {
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        Celsius temperature: <input type="text" name="celsius" /><br />
        <input type="submit" value="Convert to fahrenheit!" />
    </form>
    <?php
        } else {
        $fahrenheit = (($celsius*9)/5)+32 ; 
        printf ( "%.2fC is %.2fF", $celsius, $fahrenheit );
        }
    ?>

    <!-- listbox -->
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        Select your fav fruit:<br />
        <select name="attributes[]" multiple>
            <option value="apple">Apple</option>
            <option value="banana">Banana</option>
            <option value="orange">Orange</option>
            <option value="grape">Grape</option>
            <option value="mango">mango</option>
        </select><br />
        <input type="submit" name="s" value="Record my fav fruit!" />
    </form>
    <?php if (array_key_exists('s', $_GET)) {
        $description = join(' ', $_GET['attributes']);
        echo "You like  {$description}.";
        } 
    ?>
</body>

</html>