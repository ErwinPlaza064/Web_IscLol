<?php
 include_once 'config.php';
if($conn -> connect_error){
#redirección a la vista de los botones 
#en caso de ver error
    header ("Location: ../../html/isc_db.html");
    die();
}
else{
    $sql = "SELECT * FROM registros";
    $resultado = $conn -> query ($sql);
    //Resultado=!nada
    if($resultado -> num_rows > 0){
        //imprimir tabla
        echo "<table>";
        echo "<tr>
            <th>ID_logs</th> 
            <th>ID_usuario</th> 
            <th>Registro</th> 
            <th>Fecha</th>    
            </tr>";
            //Cuerpo de la tabla: el cuerpo de la tabla se dibuja con un ciclo, en este caso el más adecuado es un while
        while($row = $resultado -> fetch_assoc()) //<- todos los elementos del resultando
        {
            echo"<tr>";
            echo '<td>'.$row[ "ID_logs"] . "</td>"; //siempre se deben de poner los nombres de las columnas tal cual los tienes en la base de datos 
            echo '<td>'.$row[ "ID_usuario"] . "</td>";
            echo '<td>'.$row[ "registro"] . "</td>";
            echo '<td>'.$row[ "fecha"] . "</td>";
            echo '</tr>';
            
        }
        echo "</table>";
    }
}

?>