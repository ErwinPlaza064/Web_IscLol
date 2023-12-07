<?php
 include_once 'config.php';
if($conn -> connect_error){
#redirección a la vista de los botones 
#en caso de ver error
    header ("Location: ../../html/isc_db.html");
    die();
}
else{
    $sql = "SELECT * FROM empleados";
    $resultado = $conn -> query ($sql);
    //Resultado=!nada
    if($resultado -> num_rows > 0){
        //imprimir tabla
        echo "<table>";
        echo "<tr>
            <th>ID_empleado</th> 
            <th>Nombre</th>  
            <th>Apellido_P</th>
            <th>Apellido_M</th>
            <th>CURP</th>
            <th>Fecha de nacimiento</th> 
            <th>Empresa</th>
            <th>Cargo</th>    
            </tr>";
            //Cuerpo de la tabla: el cuerpo de la tabla se dibuja con un ciclo, en este caso el más adecuado es un while
        while($row = $resultado -> fetch_assoc()) //<- todos los elementos del resultando
        {
            echo"<tr>";
            echo '<td>'.$row[ "ID_empleado"] . "</td>"; //siempre se deben de poner los nombres de las columnas tal cual los tienes en la base de datos 
            echo '<td>'.$row[ "nombre"] . "</td>";
            echo '<td>'.$row[ "apellido_p"] . "</td>";
            echo '<td>'.$row[ "apellido_m"] . "</td>";
            echo '<td>'.$row[ "curp"] . "</td>";
            echo '<td>'.$row[ "fecha_de_nacimiento"] . "</td>";
            echo '<td>'.$row[ "empresa"] . "</td>";
            echo '<td>'.$row[ "cargo"] . "</td>";
            echo '</tr>';
            
        }
        echo "</table>";
    }
}

?>