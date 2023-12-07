<?php
include_once 'config.php';  
include_once 'encriptado.php';
include_once 'limpiezaregex.php';
$regex = "/[^a-zA-Z0-9@._]/";
$regex2 = "/[^a-zA-Z0-9@.$%]/";
        $conn = reader_user();
    if($conn -> connect_error){
        echo "Error en la conexión";
    }else{
        $mail = $_POST['correo'];
        $mail = preg_replace ($regex2,"",$mail);
        $pswd = $_POST['pass'];
        $pswd = preg_replace ($regex,"",$pswd);
        $pswd = encriptarString($pswd);

        #$regex = "/[^a-zA-Z0-9@._]/";
        #$mail = preg_replace ($regex2,"",$mail);

        #$regex2 = "/[^a-zA-Z0-9@.$%]/";
        #$pswd = preg_replace ($regex,"",$pswd);
       #$pswd = encriptarString($pswd);
       # $contraseñaencrypt = hash('sha256', 'pswd');

$sql = "SELECT * FROM cliente WHERE correo = '$mail' AND pass = '$pswd'";
$resultado = $conn ->query($sql);

if ($resultado -> num_rows > 00) {
header("Location: ../index.html");
}
else{
    echo "<script>
        alert ('El correo o la contraseña que ingresaste son incorrectos, por favor inténtalo de nuevo o crea una cuenta.');
        window.location = '../html/registrar.html';
        </script>";
}
    }
$conn -> close();
?>
