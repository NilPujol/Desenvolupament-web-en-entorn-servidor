<?php


$matriu = creaMatriu(4);
echo mostraMatriu($matriu) . "<br/>";
$matriu = transposaMatriu($matriu);
echo mostraMatriu($matriu);



function creaMatriu($n): array
{
    $arrayMatriu = array();
    for ($i = 0; $i < $n; $i++) { //i es la columna
        $linia = array();
        for ($j = 0; $j < $n; $j++) { //j es la fila
            if ($i == $j) {
                $linia[] = "*";
            } else if ($j < $i) {
                $linia[] = (string)rand(10, 20);
            } else {
                $linia[] = (string)($i + $j);
            }
        }
        $arrayMatriu[] = $linia;
    }
    return $arrayMatriu;
}

function mostraMatriu($matriu): string
{
    $textHTML = "<table>";
    foreach ($matriu as $linea) { //per cada fila
        $textHTML = $textHTML . "<tr>";
        foreach ($linea as $num) { //per cada num/caràcter
            $textHTML  .= "<td>" . (string)$num . "</td>";
        }
        $textHTML  .= "</tr>";
    }
    return $textHTML . "</table>";
}

function transposaMatriu($matriu): array //només funciona en arrays 2d
{
    array_unshift($matriu, null); //inserto el valor null al principi
    $matriu = call_user_func_array('array_map', $matriu); //mapejar el array a l'inversa i genera un nou array amb aquests valors
    return $matriu;
}
