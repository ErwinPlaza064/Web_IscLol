<?php
if (php_sapi_name() !== 'cli'){
   echo php_sapi_name();
   die ("no puedes abrirlo desde el navegador");
} else{
function clientecommit(){
    #va a crear tablas 
    #PHP DATA OBJECT 
    try{
       $pdo = new PDO ("mysql:host=localhost; dbname=web_isc",
                                                        "root", ""); 
                                                        $pdo -> setAttribute(
                                                           PDO::ATTR_ERRMODE, 
                                                           PDO::ERRMODE_EXCEPTION);
    $pdo ->beginTransaction ();
    #execute
    $pdo -> exec("CREATE TABLE cliente(
        ID_cliente INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          nombre VARCHAR (21) NOT NULL,
          apellido_p VARCHAR (21) NOT NULL,
          apellido_m VARCHAR (21) NOT NULL,
          empresa VARCHAR (50) NOT NULL,
          telefono TEXT NOT NULL,
          correo VARCHAR (30) NOT NULL)");
   } catch(Exception $e){
      echo $e;
   }
   } 
   
   function clienterollback(){
    #va eliminar tablas  
    #PHP DATA OBJECT 
    try{
       $pdo = new PDO ("mysql:host=localhost; dbname=web_isc",
                                                        "root", ""); 
                                                        $pdo -> setAttribute(
                                                           PDO::ATTR_ERRMODE, 
                                                           PDO::ERRMODE_EXCEPTION);
    $pdo ->beginTransaction ();
    #execute
    $pdo -> exec("DROP TABLE cliente");
    $pdo-> commit();
   } catch(Exception $e){
   }
   } 
}
?>