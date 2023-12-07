<?php
#limpiar carácteres extraños
function limpiarRegex($inputString){
    $regex = "/[^a-zA-Z0-9@._]/";
    $returnString = preg_replace($regex,"", $inputString);
    return $returnString;
}
?>