<?php
 include_once 'config.php';
if($conn -> connect_error){
#redirección a la vista de los botones 
#en caso de ver error
    header ("Location: ../../html/isc_db.html");
    die();
}
else{
    $sql = "SELECT * FROM cliente";
    $resultado = $conn -> query ($sql);
    //Resultado=!nada
    if($resultado -> num_rows > 0){
        //imprimir tabla
        echo "<table>";
        echo "<tr>
            <th>ID_cliente</th> 
            <th>Nombre</th> 
            <th>Apellido Paterno</th> 
            <th>Apellido Materno</th> 
            <th>Empresa</th> 
            <th>Teléfono</th>
            <th>Correo</th>  
            <th>Contraseña</th>    
            </tr>";
            //Cuerpo de la tabla: el cuerpo de la tabla se dibuja con un ciclo, en este caso el más adecuado es un while
        while($row = $resultado -> fetch_assoc()) //<- todos los elementos del resultando
        {
            echo"<tr>";
            echo '<td>'.$row[ "ID_cliente"] . "</td>"; //siempre se deben de poner los nombres de las columnas tal cual los tienes en la base de datos 
            echo '<td>'.$row[ "nombre"] . "</td>";
            echo '<td>'.$row[ "apellido_p"] . "</td>";
            echo '<td>'.$row[ "apellido_m"] . "</td>";
            echo '<td>'.$row[ "empresa"] . "</td>";
            echo '<td>'.$row[ "telefono"] . "</td>";
            echo '<td>'.$row[ "correo"] . "</td>";
            echo '<td>'.$row[ "pass"] . "</td>";
            echo '</tr>';
            
        }
        echo "</table>";
    }
}

?>