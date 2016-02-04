<?php
    INCLUDE 'dbInterface.php';

    $q=$_GET["q"];
    $con = dbConnect();

    $sql="SELECT * FROM cliente WHERE idCliente = '".$q."'";

    $result = dbExecQuery($sql, $con);

    $row = dbFetchArray($result);

    echo '<td>' . $row['cidadeCliente'] . "</td>";
    echo '<td>' . $row['ruaCliente'] . "</td>";
    echo '<td>' . $row['numeroCliente'] . "</td>";
    echo '<td>' . $row['cepCliente'] . "</td>";
    
    dbCloseConnection($con);
?>