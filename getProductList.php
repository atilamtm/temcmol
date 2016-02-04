<?php
    INCLUDE 'dbInterface.php';

    $con = dbConnect();

    $sql="SELECT idProduto, nomeProduto FROM produto";

    $result = dbExecQuery($sql, $con);

    echo '<option value=""></option>';
    while($row = dbFetchArray($result))
    {
        $str = '<option value="'. $row['idProduto'] .'">';

        $len = strlen($row['idProduto']);
        $id = $len == 1 ? "000" : ($len == 2 ? "00" : ($len == 3 ? "0" : ""));
        $id = "$id".$row['idProduto'];
        $str .= $id . ' - ' . $row['nomeProduto'];
        $str .= '</option>';
        echo $str;
    }

    dbCloseConnection($con);
?>