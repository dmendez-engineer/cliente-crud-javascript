<?php
    session_start();

    $serverName="MSI\SQLEXPRESS";
    $databaseName="Tienda";

    $user="sa";
    $password="Latin123";

    try{
        $conn=new PDO("sqlsrv:server=$serverName;Database=$databaseName",$user,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e){
        die( print_r( $e->getMessage() ) ); 
    }

?>