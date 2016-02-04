<?php
    INCLUDE 'dbInterface.php';

    $q=$_GET["q"];
    $con = dbConnect();

    $sql="SELECT * FROM cliente WHERE idCliente = '".$q."'";

    $result = dbExecQuery($sql, $con);

    $row = dbFetchArray($result);

    echo '<td>' . $row['idCliente'] . "</td>";
    echo "<td>" . $row['nomeCliente'] . "</td>";
    
    dbCloseConnection($con);
?>