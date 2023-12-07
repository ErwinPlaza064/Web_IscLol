<?php

function encriptarString($inputString){
    $outputString = hash ('sha256', $inputString);
    return $outputString;

}
$key= "MayraGuadalupeYepezAguilar200504"; 
//debe de ser una clave  secreta de 32 carácteres, tipo text y difícil de quebrar.
$iv= "zxcasdqwevbnfgh1";
function encriptarTexto( $data, $key, $iv){
    $cipher = "AES-256-CBC"; 
    $opciones = OPENSSL_RAW_DATA;
    $encriptado = openssl_encrypt($data, $cipher, $key, $opciones, $iv);
    return base64_encode($encriptado);
}
function desencriptarTexto($encriptado, $key, $iv){
    $cipher = "AES-256-CBC";
    $opciones = OPENSSL_RAW_DATA;
    $decrypt = openssl_decrypt( base64_decode($encriptado), 'aes-256-cbc', $key, $opciones, $iv);
        return $decrypt;
}
 
/*$encrypt_data = encriptarTexto( $data, $key, $iv);
$decrypt_data = desencriptarTexto($encrypt_data, $key, $iv);
echo  $encrypt_data . "\n"; 
echo  $decrypt_data;
*/
    
    
?>