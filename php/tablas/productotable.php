<?php
 include_once 'config.php';
if($conn -> connect_error){
#redirección a la vista de los botones 
#en caso de ver error
    header ("Location: ../../html/isc_db.html");
    die();
}
else{
    $sql = "SELECT * FROM producto";
    $resultado = $conn -> query ($sql);
    //Resultado=!nada
    if($resultado -> num_rows > 0){
        //imprimir tabla
        echo "<table>";
        echo "<tr>
            <th>ID_producto</th> 
            <th>Nombre</th> 
            <th>ID_categoria</th> 
            <th>Código de activación</th>    
            </tr>";
            //Cuerpo de la tabla: el cuerpo de la tabla se dibuja con un ciclo, en este caso el más adecuado es un while
        while($row = $resultado -> fetch_assoc()) //<- todos los elementos del resultando
        {
            echo"<tr>";
            echo '<td>'.$row[ "ID_producto"] . "</td>"; //siempre se deben de poner los nombres de las columnas tal cual los tienes en la base de datos 
            echo '<td>'.$row[ "nombre"] . "</td>";
            echo '<td>'.$row[ "ID_categoria"] . "</td>";
            echo '<td>'.$row[ "codigo_de_activacion"] . "</td>";
            echo '</tr>';
            
        }
        echo "</table>";
    }
}

?>