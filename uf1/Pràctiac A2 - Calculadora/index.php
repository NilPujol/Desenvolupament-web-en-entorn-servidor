<!DOCTYPE html>
<html lang="ca">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Calculadora</title>
</head>
<?php
$valor = "";
if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
}
$output = "0";
if (isset($_GET['output'])) {
    $output = $_GET['output'];
}
if ($output == "0" || $output == "00") {
    if ($valor != "") {
        $output = "";
    }
    if ($valor == "=") {
        $valor = "";
        $output = "0";
    }
}
if ($valor == "C") {
    $output = "0";
    $valor = "";
} else if ($valor == "=") {
    $valor = checkOperation($output, "");

    if ($valor != "ERROR") {
        ltrim($valor);
        try {
            eval("\$output=$valor;");
            $output = round($output, 4);
        } catch (DivisionByZeroError $e) {
            $output = "inf";
        } catch (Throwable) {
            $output = "ERROR";
        }
        $valor = "";
    } else {
        $output = "";
    }
}
?>

<body>
    <div class="container">
        <form name="calc" class="calculator" method="get">
            <input type="text" class="value" readonly name="output" value="<?php
                                                                            echo checkOperation($output, $valor); ?>" />
            <span class="num clear"><input type="submit" value="C" name="valor"></span>
            <span class="num"><input type="submit" value="/" name="valor"></span>
            <span class="num"><input type="submit" value="*" name="valor"></span>
            <span class="num"><input type="submit" value="7" name="valor"></span>
            <span class="num"><input type="submit" value="8" name="valor"></span>
            <span class="num"><input type="submit" value="9" name="valor"></span>
            <span class="num"><input type="submit" value="-" name="valor"></span>
            <span class="num"><input type="submit" value="4" name="valor"></span>
            <span class="num"><input type="submit" value="5" name="valor"></span>
            <span class="num"><input type="submit" value="6" name="valor"></span>
            <span class="num plus"><input type="submit" value="+" name="valor"></span>
            <span class="num"><input type="submit" value="1" name="valor"></span>
            <span class="num"><input type="submit" value="2" name="valor"></span>
            <span class="num"><input type="submit" value="3" name="valor"></span>
            <span class="num"><input type="submit" value="0" name="valor"></span>
            <span class="num"><input type="submit" value="00" name="valor"></span>
            <span class="num"><input type="submit" value="." name="valor"></span>
            <span class="num equal"><input type="submit" value="=" name="valor"></span>
        </form>
    </div>
</body>

<?php
function checkOperation($output, $valor)
{



    $str = $output . $valor;
    $regex = "/^(cos)|(sin)|(inf)|[0-9\(\)\-.\*\+\/]*$/";
    if (preg_match($regex, $str)) {
        return $str;
    } else {
        return "ERROR";
    }
}
