<?php
$numerosA_Factoritzar = array(5, 12, 21, 54, 768);
foreach ($numerosA_Factoritzar as $numero) {
    echo "El factorial de " . $numero . " es: " . (string)factorial($numero) . "<br/>";
}

function factorial(int $numero): array | bool
{
    if ($numero < 0) return false;
    if ($numero < 2) {
        return 1;
    } else {
        return ($numero * factorial($numero - 1));
    }
}
