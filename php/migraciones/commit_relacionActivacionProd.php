<?php
if (php_sapi_name() !== 'cli'){
   echo php_sapi_name();
   die ("no puedes abrirlo desde el navegador");
} else{
function relacionActivacionProdcommit(){
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
    $pdo -> exec("CREATE TABLE relacion_producto_activacion(
        ID_relacion INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        ID_producto INT NOT NULL,
        FOREIGN KEY (ID_producto)
        REFERENCES producto (ID_producto),
         ID_activacion INT NOT NULL, 
         FOREIGN KEY (ID_activacion)
         REFERENCES activacion_de_producto (ID_activacion)
       )");
   } catch(Exception $e){
      echo $e;
   }
   } 
   
   function relacionActivacionProdrollback(){
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
    $pdo -> exec("DROP TABLE relacion_producto_activacion");
    $pdo-> commit();
   } catch(Exception $e){
   }
   } 
}
?>