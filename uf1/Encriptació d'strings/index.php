<?php

$sp = "kfhxivrozziuortghrvxrrkcrozxlwflrh";
$mr = " hv ovxozwozv vj o vfrfjvivfj h vmzvlo e hrxvhlmov oz ozx.vw z xve hv loqvn il hv lmnlg izxvwrhrvml ,hv b lh mv,rhhv mf w zrxvlrh.m";


echo decrypt($sp);
echo "<br>";
echo decrypt($mr);
echo "<br>";
encrypt("Nil Pujol");

function decrypt($sp)
{
    $alfabet = str_split("abcdefghijklmnopqrstuvwxyz", 1);
    $sp_array = str_split($sp, 1);
    $sp = array();
    $temp = "";
    foreach ($sp_array as $letter) {
        if (in_array($letter, $alfabet)) {
            $sp[] = $alfabet[count($alfabet) - array_search($letter, $alfabet) - 1];
        } else {
            $sp[] = $letter;
        }
    }
    $temp = implode("", $sp);
    $sp = array();
    $sp_array = str_split($temp, 3);
    foreach ($sp_array as $letter3) {
        $sp[] = strrev($letter3);
    }



    echo implode("", $sp);
}

function encrypt($str)
{
    echo bin2hex($str . $_SERVER['REMOTE_ADDR']);
}
