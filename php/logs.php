<?php
#función de registros de eventos
function logger_register($conn, $sql){
    #variable del evento, texto plano
$evento = "evento: ". $conn -> real_escape_string ($sql);
#crear consulta sql para registro
$sql1 = "INSERT INTO registros(registro) VALUES ('$evento')";
#guardar registros
if($conn-> query ($sql1)=== TRUE){ 


}
}
?>