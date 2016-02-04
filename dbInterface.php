<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function dbConnect()
{
    $con = mysqli_connect('localhost','root','','tavanoEMoretto');
    if (mysqli_connect_errno())
    {
        echo ('Could not connect to DB: ' . mysqli_connect_error());
    }
    return $con;
}

function dbExecQuery($sql,$con)
{
    $result = mysqli_query($con,$sql);
    if (!$result)
    {
        //echo '<script language="javascript">confirm("Do you want this?")</script>;';
        echo ('Failed to execute query: ' . $sql . '\nError: ' . mysql_error());
    }


    return $result;
}

function dbCloseConnection($con){
    mysqli_close($con);
}

function dbFetchArray($queryResult){
  return mysqli_fetch_array($queryResult,MYSQLI_ASSOC);
}

function insertClient()
{
    $con=dbConnect();

    $sql = 'INSERT INTO cliente (';
    $values = ' VALUES (';
    
    $sql .= 'estabelecimentoCliente,';
    $values .= '"' . $_POST[estabelecimentoCliente] . '",';

    $sql .= 'nomeCliente,';
    $values .= '"' . $_POST[nomeCliente] . '",';

    $sql .= 'documentoCliente,';
    $values .= '"' . $_POST[documentoCliente] . '",';
    
    $sql .= 'numeroDocumentoCliente,';
    $values .= '"' . $_POST[numeroDocumentoCliente] . '",';

    $sql .= 'inscricaoEstadualCliente,';
    $values .= '"' . $_POST[inscricaoEstadualCliente] . '",';

    $sql .= 'emailCliente,';
    $values .= '"' . $_POST[emailCliente] . '",';

    $sql .= 'telefoneCliente,';
    $values .= '"' . $_POST[telefoneCliente] . '",';

    $sql .= 'ruaCliente,';
    $values .= '"' . $_POST[ruaCliente] . '",';

    $sql .= 'numeroCliente,';
    $values .= '"' . $_POST[numeroCliente] . '",';

    $sql .= 'complementoCliente,';
    $values .= '"' . $_POST[complementoCliente] . '",';

    $sql .= 'bairroCliente,';
    $values .= '"' . $_POST[bairroCliente] . '",';

    $sql .= 'cidadeCliente,';
    $values .= '"' . $_POST[cidadeCliente] . '",';

    $sql .= 'idCidadeCliente,';
    $values .= '"' . $_POST[idCidadeCliente] . '",';

    $sql .= 'estadoCliente,';
    $values .= '"' . $_POST[estadoCliente] . '",';

    $sql .= 'paisCliente,';
    $values .= '"' . $_POST[paisCliente] . '",';

    $sql .= 'cepCliente) ';
    $values .= '"' . $_POST[cepCliente] . '");';


    $sql .= $values;
  

    dbExecQuery($sql,$con);
    dbCloseConnection($con);
}

function listClients()
{
    $con = dbConnect();

    $sql="SELECT idCliente, estabelecimentoCliente, nomeCliente FROM cliente";

    $result = dbExecQuery($sql, $con);

    echo '<option value="0"></option>';
    while($row = dbFetchArray($result))
      {
        $str = '<option value="'. $row['idCliente'] .'">';
        $str .= $row['idCliente'] . ' - ' . $row['nomeCliente'];
        $str .= '</option>';
        echo $str;
      }
      dbCloseConnection($con);
}

function listCities()
{
    $con = dbConnect();
    $sql="SELECT DISTINCT cidadeCliente, idCidadeCliente FROM cliente";
    $result = dbExecQuery($sql, $con);

    echo '<optgroup label="Cidades de Clientes Cadastrados">';
    while($row = dbFetchArray($result))
    {
        $str = '<option value="'. $row['idCidadeCliente'] .'">';
        $str .= $row['cidadeCliente'];
        $str .= '</option>';
        echo $str;
    }
    echo '</optgroup>';

    $sql="SELECT * FROM cidade";
    $result = dbExecQuery($sql, $con);

    echo '<optgroup label="Todas as Cidade de SP">';
    while($row = dbFetchArray($result))
    {
        $str = '<option value="'. $row['idCidade'] .'">';
        $str .= $row['nomeCidade'];
        $str .= '</option>';
        echo $str;
    }
    echo '</optgroup>';

    dbCloseConnection($con);
}


function insertProduct()
{
    $con=dbConnect();

    $sql = 'INSERT INTO produto (';
    $values = ') VALUES (';

    $sql .= 'idProduto,';
    $values .= '"' . $_POST[idProduto] . '",';

    $sql .= 'nomeProduto,';
    $values .= '"' . $_POST[nomeProduto] . '",';

    $sql .= 'NCM,';
    $values .= '"' . $_POST[codigoBarrasProduto] . '",';

    $sql .= 'unidadeComercialProduto,';
    $values .= '"' . $_POST[unidadeComercialProduto] . '",';

    $sql .= 'precoComercialProduto,';
    $values .= '"' . $_POST[precoComercialProduto] . '",';

    $sql .= 'unidadeTributavelProduto,';
    $values .= '"' . $_POST[unidadeComercialProduto] . '",';

    $sql .= 'precoTributavelProduto,';
    $values .= '"' . $_POST[precoComercialProduto] . '",';

    $sql .= 'CFOP,';
    $values .= '"' . $_POST[CFOP] . '",';

    $sql .= 'CST,';
    $values .= '"' . $_POST[CST] . '",';

    $sql .= 'origem,';
    $values .= '"' . $_POST[origem] . '",';

    $sql .= 'situacaoTributaria,';
    $values .= '"' . $_POST[situacaoTributaria] . '",';

    $sql .= 'regime,';
    $values .= '"' . $_POST[regime] . '",';

    $sql .= 'PIS,';
    $values .= '"' . $_POST[PIS] . '",';


    $sql .= 'situacaoTributaria,';
    $values .= '"' . $_POST[Cofins] . '",';

    $sql .= $values;


    dbExecQuery($sql,$con);
    dbCloseConnection($con);
}

function listProducts()
{
    $con = dbConnect();

    $sql="SELECT idProduto, nomeProduto FROM produto";

    $result = dbExecQuery($sql, $con);

    echo '<option value=""></option>';
    while($row = dbFetchArray($result))
     {
        $str = '<option value="'. $row['idProduto'] .'">';

        $len = strlen($row['idProduto']);
        $id = $len == 1 ? "000" : ($len == 2 ? "00" : ($len == 1 ? "0" : ""));
        $id = $id.$row['idProduto'];
        $str .= $row['idProduto'] . ' --- ' . $row['nomeProduto'];

        $str .= '</option>';
        echo $str;
    }
    dbCloseConnection($con);
}
?>