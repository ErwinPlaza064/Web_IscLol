<?php
include_once 'config.php';
include_once 'logs.php';
include_once 'encriptado.php';
include_once 'limpiezaregex.php';
$regex = "/[^a-zA-Z0-9@._]/";
    $conn= writer_user();
if($conn -> connect_error){
    echo "Error  en la conexión";
}
else{
    #echo "Conexión exitosa";
    $name= $_POST['nombre'];
    $name= preg_replace($regex, "", $name);
    $lastname1 = $_POST['apellido_p'];
    $lastname1 = preg_replace($regex, "", $lastname1);
    $lastname2 = $_POST['apellido_m'];
    $lastname2 = preg_replace($regex, "", $lastname2);
    $empresa = $_POST['empresa'];
    $empresa = preg_replace($regex, "", $empresa);
    $phone= $_POST['telefono'];
    $phone = preg_replace($regex, "", $phone);
    $email= $_POST['correo'];
    $email = preg_replace($regex, "",$email);
    #$email = encriptarTexto($email, $key, $iv);
    $pswd= $_POST ['pass'];
    $pswd= preg_replace($regex, "", $pswd);
    $pswd = encriptarString($pswd);
//Encontrar un correo ya registrado
    $sql2 = "SELECT correo FROM cliente WHERE correo= '$email' ";
    $result = $conn -> query ($sql2);
   # $pswd = encriptarString($pswd);
   /* $email = encriptarTexto(preg_replace($regex, "", $_POST['correo']),$key, $iv);
    $phone = encriptarTexto(preg_replace($regex, "", $_POST['telefono']),$key, $iv);*/
    //Encontrar un correo ya registrado
    if($result -> num_rows > 0){
        echo "<script>
        alert ('Este correo ya está registrado, por favor ingrese uno nuevo.');
        window.location = '../html/registrar.html';
        </script>";
        exit();
       # header("Location:../html/registrar.html");
    }else{
                $sql = "INSERT INTO cliente(nombre, apellido_p, apellido_m, empresa, telefono, correo, pass) VALUES ('$name', '$lastname1', '$lastname2', '$empresa', '$phone', '$email', '$pswd')";
        logger_register($conn, $sql);
        #query returna booleano
           if($conn -> query($sql)=== TRUE){
            echo ("Registro exitoso");
                                            }
    else{
    $conn -> error;
   echo("Error en tu registro");
                                             }
    header("Location: ../index.html");
    $conn-> close();
    }

 }
?>