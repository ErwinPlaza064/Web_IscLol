<?php
if (php_sapi_name() !== 'cli'){
   echo php_sapi_name();
   die ("no puedes abrirlo desde el navegador");
} else{
function categoriacommit(){
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
    $pdo -> exec("CREATE TABLE categoria(
      ID_categoria INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR (30) NOT NULL)");
   } catch(Exception $e){
      echo $e;
   }
   } 
   function insertvalues2(){
      try{
          #Conexion
          $pdo = new PDO("mysql:host=localhost;dbname=web_isc","root","");
          #
          $pdo -> setAttribute(PDO::ATTR_ERRMODE,
                               PDO::ERRMODE_EXCEPTION);
          #
          $pdo -> beginTransaction();
          $pdo -> exec("INSERT INTO categoria (nombre) VALUES ('Sistema_Desktop'), ('Pagina_web'), ('Aplicacion_web'), ('Aplicacion_movil'), ('Videojuego')");
          $pdo -> commit();
         } catch(Exeption $e){
            echo $e;
   
         }
      }
   
   function categoriarollback(){
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
    $pdo -> exec("DROP TABLE categoria");
    $pdo-> commit();
   } catch(Exception $e){
   }
   }
} 
   
?>