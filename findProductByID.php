<?php
    INCLUDE 'dbInterface.php';

    $q=$_GET["q"];
    $con = dbConnect();

    $sql="SELECT * FROM produto WHERE idProduto = '".$q."'";

    $result = dbExecQuery($sql, $con);

    $row = dbFetchArray($result);

    echo '<td>' . $row['idProduto'] . "</td>";
    echo '<td>' . $row['nomeProduto'] . "</td>";
    
    dbCloseConnection($con);
?>