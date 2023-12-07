<?php
if (php_sapi_name() !== 'cli'){
    echo php_sapi_name();
    die ("no puedes abrirlo desde el navegador");
 } else{
include_once 'commit_empleados.php';
include_once 'commit_categoria.php';
include_once 'commit_producto.php';
include_once 'commit_cliente.php';
include_once 'commit_activacionProd.php';
include_once 'commit_logs.php';
include_once 'commit_relacionProdCliente.php';
include_once 'commit_relacionProdCat.php';
include_once 'commit_relacionActivacionProd.php';


empleadosrollback();
categoriarollback();
productorollback();
clienterollback();
activacionProdrollback();
registrosrollback();
relacionProdClienterollback();
relacionProdCatrollback();
relacionActivacionProdrollback();
}

?>