<?php
    INCLUDE 'dbInterface.php';

    $q=$_GET["q"];
    $con = dbConnect();

    $sql="SELECT precoComercialProduto AS a, CFOP AS b, CST AS c, origem AS d, situacaoTributaria AS e, regime AS f, PIS AS g, cofins AS h, NCM as i FROM produto WHERE idProduto = '".$q."'";

    $result = dbExecQuery($sql, $con);

    $row = dbFetchArray($result);

    echo $row['a']."|".$row['b']."|".$row['c']."|".$row['d']."|".$row['e']."|".$row['f']."|".$row['g']."|".$row['h']."|".$row['i'];

    dbCloseConnection($con);
?>