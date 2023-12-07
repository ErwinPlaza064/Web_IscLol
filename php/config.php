<?php
#credenciales de la base de datos 
function parseEnvFile($path){
    $content = file_get_contents($path);
    $lines = explode ("\n", $content);
    $envData = [];
        foreach ($lines as $line) {
            $line = trim($line);
    
              if(empty($line) || strpos($line, '#') === 0){
                    continue;
                }
                list ($key, $value)= explode ('=', $line, 2);
                $envData[$key]= trim($value);
        }
        return $envData;
    }
        function writer_user(){
            $credenciales = parseEnvFile('../credentials.env'); //credenciales guarda toda la información de las credenciales de usuarios creados   
            //{}
            $servername = $credenciales['NAME_SERVER'];
            $username = $credenciales['USER_DB_WRITER'];
             $password =$credenciales['PASS_WRITER'];
             $dbname= $credenciales['DB_NAME'];
            $conn = new mysqli ($servername,
                                 $username,
                                $password, 
                                $dbname);
            #verificar si hay errores en la conexión
            if($conn -> connect_error){
                die("Error en la conexión:" . $conn -> connect_error);
                    }
            return $conn;
    }
    
    function reader_user(){
        $credenciales = parseEnvFile('../credentials.env'); //credenciales guarda toda la información de las credenciales de usuarios creados   
            //{}
            $servername = $credenciales['NAME_SERVER'];
            $username = $credenciales['USER_DB_READER'];
             $password =$credenciales['PASS_READER'];
             $dbname= $credenciales['DB_NAME'];
            $conn = new mysqli ($servername,
                                 $username,
                                $password, 
                                $dbname);
            #verificar si hay errores en la conexión
            if($conn -> connect_error){
                die("Error en la conexión:" . $conn -> connect_error);
                    }
            return $conn;
    }

/*
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
*/

?>
