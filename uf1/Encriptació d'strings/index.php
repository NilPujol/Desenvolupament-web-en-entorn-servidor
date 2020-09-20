<?php

$sp = "kfhxivrozziuortghrvxrrkcrozxlwflrh";
$mr = " hv ovxozwozv vj o vfrfjvivfj h vmzvlo e hrxvhlmov oz ozx.vw z xve hv loqvn il hv lmnlg izxvwrhrvml ,hv b lh mv,rhhv mf w zrxvlrh.m";


echo decrypt($sp);
echo "<br>";
echo decrypt($mr);
echo "<br>";
echo "<br>";
encrypt("Nil Pujol");
echo "<br>";
$encriptat =  encryptMeu("Nil pujol!");
echo $encriptat;
echo "<br>";
echo decryptMeu($encriptat);

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

    return implode("", $sp);
}

function encrypt($str)
{
    $clave  = 'nil';
    $method = 'aes-128-cbc';
    $iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
    $encriptar = function ($text) use ($method, $clave, $iv) {
        return openssl_encrypt($text, $method, $clave, false, $iv);
    };

    $desencriptar = function ($text) use ($method, $clave, $iv) {
        $encrypted_data = base64_decode($text);
        return openssl_decrypt($text, $method, $clave, false, $iv);
    };
    $text_encriptat = $encriptar($str);
    $text_desencriptat = $desencriptar($text_encriptat);
    echo 'Encriptat: ' . $text_encriptat . '<br> Desencriptat: ' . $text_desencriptat . '<br>';
}

function encryptMeu($str)
{
    $clau = (int)preg_replace("/[^0-9]/", "", $_SERVER['REMOTE_ADDR']);
    $str = str_split($str, 1);
    foreach ($str as $lletra) {
        $strtemp[] = (string)(ord($lletra) * $clau);
    }
    $str = implode("0000", $strtemp);

    return bin2hex($str);
}
function decryptMeu($str)
{
    $clau = (int)preg_replace("/[^0-9]/", "", $_SERVER['REMOTE_ADDR']);
    $str = hex2bin($str);

    $str = explode("0000", $str);
    $strtemp = array();
    foreach ($str as $lletra) {
        $strtemp[] = (string)chr((int)$lletra / $clau);
    }
    return implode("", $strtemp);
}
