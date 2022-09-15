<?php

$sp = "kfhxivrozziuortghrvxrrkcrozxlwflrh";
$mr = " hv ovxozwozv vj o vfrfjvivfj h vmzvlo e hrxvhlmov oz ozx.vw z xve hv loqvn il hv lmnlg izxvwrhrvml ,hv b lh mv,rhhv mf w zrxvlrh.m";


echo decrypt($sp);
echo "<br>";
echo decript($mr);

function decrypt($sp)
{
    $alfabet = str_split("abcdefghijklmnopqrstuvwxyz", 1);
    $sp_array = str_split($sp, 1);
    $sp = array();
    $temp = "";
    foreach ($sp_array as $letter) {
        $sp[] = $alfabet[count($alfabet) - array_search($letter, $alfabet) - 1];
    }

    $temp = implode("", $sp);
    $sp = array();
    $sp_array = str_split($temp, 3);
    foreach ($sp_array as $letter3) {
        $sp[] = strrev($letter3);
    }



    echo implode("", $sp);
}

function decript($mr)
{
}
