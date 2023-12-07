<?php
if (php_sapi_name() !== 'cli'){
   echo php_sapi_name();
   die ("no puedes abrirlo desde el navegador");
} else{
function activacionProdcommit(){
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
    $pdo -> exec("CREATE TABLE activacion_de_producto(
        ID_activacion INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          ID_producto INT NOT NULL,
          FOREIGN KEY (ID_producto)
          REFERENCES producto (ID_producto),
          ID_cliente INT NOT NULL,
          FOREIGN KEY (ID_cliente)
          REFERENCES cliente (ID_cliente),
          codigo_de_activacion VARCHAR (10) NOT NULL)");
   } catch(Exception $e){
      echo $e;
   }
   } 
   function insertvalues4(){
      try{
          #Conexion
          $pdo = new PDO("mysql:host=localhost;dbname=web_isc","root","");
          #
          $pdo -> setAttribute(PDO::ATTR_ERRMODE,
                               PDO::ERRMODE_EXCEPTION);
          #
          $pdo -> beginTransaction();
          $pdo -> exec("INSERT INTO activacion_de_producto(ID_producto, ID_cliente, codigo_de_activacion) VALUES 
          ('1', '3', 'EAB204ISC1')");
          $pdo -> commit();
      } catch(Exeption $e){
         echo $e;

      }
   }
   
   
   function activacionProdrollback(){
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
    $pdo -> exec("DROP TABLE activacion_de_producto");
    $pdo-> commit();
   } catch(Exception $e){
   }
   } 
}
?>