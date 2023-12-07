<?php
if (php_sapi_name() !== 'cli'){
   echo php_sapi_name();
   die ("no puedes abrirlo desde el navegador");
} else{
function productocommit(){
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
    $pdo -> exec("CREATE TABLE producto(
        ID_producto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          nombre VARCHAR (21) NOT NULL,
          ID_categoria INT NOT NULL,
          FOREIGN KEY (ID_categoria)
          REFERENCES categoria(ID_categoria),
          codigo_de_activacion VARCHAR (10) NOT NULL UNIQUE)");
   } catch(Exception $e){
      echo $e;
   }
   } 
   
   function insertvalues3(){
      try{
          #Conexion
          $pdo = new PDO("mysql:host=localhost;dbname=web_isc","root","");
          #
          $pdo -> setAttribute(PDO::ATTR_ERRMODE,
                               PDO::ERRMODE_EXCEPTION);
          #
          $pdo -> beginTransaction();
          $pdo -> exec("INSERT INTO producto(nombre, ID_categoria, codigo_de_activacion) VALUES ('EasyBussines', '1','EAB204ISC1'),
          ('Mi tiendita online', '3', 'MTON21ISC3')");
             $pdo -> commit();
            } catch(Exeption $e){
               echo $e;
      
            }
         }



   function productorollback(){
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
    $pdo -> exec("DROP TABLE producto");
    $pdo-> commit();
   } catch(Exception $e){
   }
   } 
}
   
?>