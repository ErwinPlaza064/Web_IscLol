<?php
#4 variables indispensables 
$nombreserver="localhost";
$usuariobd="root";
$password="";
$nombrebd="web_isc";
$regex= "/[^a-zA-Z0-9@._]/";
$conn = new mysqli($nombreserver,
                  $usuariobd, 
                  $password, 
                  $nombrebd);

?>