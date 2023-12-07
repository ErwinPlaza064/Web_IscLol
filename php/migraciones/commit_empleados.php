<?php
if (php_sapi_name() !== 'cli'){
   echo php_sapi_name();
   die ("no puedes abrirlo desde el navegador");
} else{
function empleadoscommit(){
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
    $pdo -> exec("CREATE TABLE empleados(
        ID_empleado INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          nombre VARCHAR (21) NOT NULL,
          apellido_p VARCHAR (21) NOT NULL,
          apellido_m VARCHAR (21) NOT NULL,
          curp VARCHAR (18) NOT NULL UNIQUE,
          fecha_de_nacimiento DATE NOT NULL,
          empresa VARCHAR (30) NOT NULL,
          cargo VARCHAR(21) NOT NULL)");
   } catch(Exception $e){
      echo $e;
   }
   } 

   function insertvalues1(){
      try{
          #Conexion
          $pdo = new PDO("mysql:host=localhost;dbname=web_isc","root","");
          #
          $pdo -> setAttribute(PDO::ATTR_ERRMODE,
                               PDO::ERRMODE_EXCEPTION);
          #
          $pdo -> beginTransaction();
          $pdo -> exec("INSERT INTO empleados(nombre, apellido_p, apellido_m, curp, fecha_de_nacimiento, empresa, cargo) VALUES ('Kevin', 'Nieto', 'Perez', 'NIPK040330HGTTRVA3', '2004-03-30', 'Informatic Space Company', 'Desarrollador'),
          ('Mayra', 'Yepez', 'Aguilar', 'YEAM040520MGTPGYA8', '2004-05-20', 'Informatic Space Company', 'Desarrollador'),('Gerardo', 'Linares', 'Garcia', 'LIGL001110HGTNRSA0', '2000-11-10', 'Informatic Space Company','Desarrollador'), 
          ('Erwin', 'Martinez', 'Plaza', 'MAPE020724HGTRLRA3', '2002-07-24', 'Informatic Space Company', 'Desarrollador'),
          ('Abigail', 'Sierra', 'Coliote', 'SICG040716MGTRLDA6', '2004-07-16', 'Informatic Space Company', 'Desarrolladora')");
          $pdo -> commit();
      } catch(Exeption $e){
         echo $e;

      }
   }
   
   function empleadosrollback(){
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
    $pdo -> exec("DROP TABLE empleados");
    $pdo-> commit();
   } catch(Exception $e){
                            }
                              } 
                           }
   
?>