<?php

function calculator($operator, $num1, $num2)
{
    switch ($operator) {
        case "Add":
            return $num1 + $num2;
        case "Substract":
            return $num1 - $num2;
        case "Multiply":
            return $num1 * $num2;
        case "Divide":
            return $num1 / $num2;
        case "Modulo":
            return $num1 % $num2;
    }
}
function errors($num1, $num2)
{
    if (!is_numeric($num1) && !is_numeric($num2)) {
        return ["e1" => "Number 1 is not a number!", "e2" => "Number 2 is not a number!"];
    }
    if (!is_numeric($num1)) {
        return ["e1" => "Number 1 is not a number!", "e2" => " "];
    }
    if (!is_numeric($num2)) {
        return ["e1" => " ", "e2" => "Number 2 is not a number!"];
    }
    if ($num1 == 0) {
        return ["e1" => "Division by zero is not allowed!"];
    }
    if ($num2 == 0) {
        return ["e2" => "Division by zero is not allowed!"];
    }
    return true;
}

$num1 = " ";
$num2 = " ";
$operator = " ";
$error1 = " ";
$error2 = " ";
$result = " ";

if (isset($_POST["operator"])) {
    $operator = $_POST["operator"];
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];

    $validiton = errors($num1, $num2);

    if ($validiton === true) {
        $result = calculator($operator, $num1, $num2);
    } else {
        $error1 = $validiton["e1"];
        $error2 = $validiton["e2"];
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>

<body>
    <h1>Calculator</h1>

    <form method="post">
        <label for="num1">Number 1: </label>
        <input type="text" id="num1" name="num1" value="<?= $num1 ?>">
        <?= $error1 ?>
        <p></p>

        <label for="num2">Number 2: </label>
        <input type="text" id="num2" name="num2" value="<?= $num2 ?>">
        <?= $error2 ?>
        <p></p>

        <h1>Operator: <?= $operator ?></h1>
        <h1>Result: <?= $result ?></h1>

        <input type="submit" name="operator" value="Add">
        <input type="submit" name="operator" value="Substract">
        <input type="submit" name="operator" value="Multiply">
        <input type="submit" name="operator" value="Divide">
        <input type="submit" name="operator" value="Modulo">

    </form>
</body>

</html>