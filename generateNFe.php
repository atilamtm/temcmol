<?php
    INCLUDE 'dbInterface.php';

$con = dbConnect();

if ((!array_key_exists("idCliente", $_POST)) ||
    (!array_key_exists("numeroProdutos", $_POST)) ||
	(!array_key_exists("totalNota", $_POST)) ||
	(!array_key_exists("descontoNota", $_POST)) ||
	(!array_key_exists("totalDesconto", $_POST)) ||
	(!array_key_exists("idNota", $_POST)) ||
	(!array_key_exists("numeroVolumes", $_POST)))
{
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';	
}
	
$idCliente = $_POST["idCliente"];
$numProds = $_POST["numeroProdutos"];
$codigoCampinas=3509502;
$totalNota = $_POST["totalNota"];
$descontoNota = $_POST["descontoNota"]*1;
$totalDesconto = $_POST["totalDesconto"]*1;
$idNota = $_POST["idNota"];
$numeroVolumes = $_POST["numeroVolumes"];

$rsEmpresa = "TAVANO & MORETTO COMERCIO DE MATERIAIS ODONTOLOGICOS LTDA";
$fantasiaEmpresa = "INTER DENTAL DISTRIBUIDORA";
$ieEmpresa = "244933964110";
$imEmpresa = "1456652";
$cnaeEmpresa = "4645103";
$cnpjEmpresa = "05502988000100";

if(false){
    if ((idCliente != null) && ($idCliente != "")) {
        $con = dbConnect();
        $query = "INSERT INTO NOTA_FISCAL (idCliente,idEmpresa,totalNota) VALUES (";
        $query += "$idCliente,$codigoCampinas,".$_POST["totalNota"].")";
        dbExecQuery($con,$query);
    }
}

$sql="SELECT * FROM cliente WHERE idCliente = '$idCliente'";
$result = dbExecQuery($sql, $con);
$row = dbFetchArray($result);

$file = fopen("C:\\Users\\odair\\Documents\\nfe_site\\nota_fiscal_$idNota.txt", "wb");
//fwrite($file,pack("CCC",0xef,0xbb,0xbf)); // UTF8 without BOM encoding

if ($file == 0){
    //Error opening file
    die("Could not open file");
}
date_default_timezone_set("America/Sao_Paulo");
$date = date("Y-m-d");
$hour = date("H:i:s");
$timezone = "-03:00";
fwrite($file, "NOTAFISCAL|1\r\n");
fwrite($file, "A|3.10|NFe|\r\n");
fwrite($file, "B|35||Venda com substituicao tributaria|1|55|1|$idNota|$date"."T".$hour."$timezone|$date"."T".$hour."$timezone|1|1|$codigoCampinas|1|1||1|1|0|0|3|3.10.49|||\r\n");
fwrite($file, "C|$rsEmpresa|$fantasiaEmpresa|$ieEmpresa||$imEmpresa|$cnaeEmpresa|3|\r\n");
fwrite($file, "C02|$cnpjEmpresa|\r\n");
fwrite($file, "C05|RUA WILLIAM BOOTH|229||JARDIM PAULICEIA|$codigoCampinas|Campinas|SP|13060074|1058|BRASIL|1932277966|\r\n");
fwrite($file, "E|".$row['nomeCliente']."|1|".$row['inscricaoEstadualCliente']."|||".$row['emailCliente']."|\r\n");
fwrite($file, "E02|".$row['numeroDocumentoCliente']."|\r\n");
fwrite($file, "E05|".$row['ruaCliente']."|".$row['numeroCliente']."|".$row['complementoCliente']."|".$row['bairroCliente']."|".$row['idCidadeCliente']."|".$row['cidadeCliente']."|".$row['estadoCliente']."|".$row['cepCliente']."|".$row['idPaisCliente']."|".$row['paisCliente']."|".$row['telefoneCliente']."|\r\n");


$descontoProduto = 0;
$totalDescontos = 0;
for ($i=1; $i<=$numProds; $i++){
	if ((!array_key_exists("idProduto$i", $_POST)) ||
	    (!array_key_exists("quantidadeProduto$i", $_POST)) ||
		(!array_key_exists("precoProduto$i", $_POST)) ||
		(!array_key_exists("totalProduto$i", $_POST)) ||
		(!array_key_exists("CFOP$i", $_POST)) ||
		(!array_key_exists("CST$i", $_POST)) ||
		(!array_key_exists("origem$i", $_POST)) ||
		(!array_key_exists("situacaoTributaria$i", $_POST)) ||
		(!array_key_exists("regime$i", $_POST)) ||
		(!array_key_exists("PIS$i", $_POST)) ||
		(!array_key_exists("cofins$i", $_POST)) ||
		(!array_key_exists("NCM$i", $_POST)))
	{
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
	}

    $idProduto = $_POST["idProduto$i"];
    $quantidadeProduto = $_POST["quantidadeProduto$i"]*1;
   if (($idProduto > 0) && ($quantidadeProduto > 0)) {
        
        
        $precoProduto = $_POST["precoProduto$i"]*1;
        //$descontoProduto = $_POST["descontoProduto$i"];
        $totalProduto = $_POST["totalProduto$i"]*1;
        if ($descontoNota > 0){
            $descontoProduto = $totalProduto * $descontoNota/100;
            $descontoProduto = round($descontoProduto,2);
        }
        $totalDescontos += $descontoProduto;
        $descontoProduto = $descontoProduto > 0 ? number_format($descontoProduto,2,".",""): "" ;
        $precoProduto = number_format($precoProduto,2,".","");
        $totalProduto = number_format($totalProduto,2,".","");
        $CFOP = $_POST["CFOP$i"];
        $CST = $_POST["CST$i"];
        $origem = $_POST["origem$i"];
        $situacaoTributaria = $_POST["situacaoTributaria$i"];
        $regime = $_POST["regime$i"];
        $PIS = $_POST["PIS$i"];
        $cofins = $_POST["cofins$i"];
		$NCM = $_POST["NCM$i"];

        $sql = "SELECT nomeProduto, cEan FROM produto where idProduto='$idProduto'";
        $result = dbExecQuery($sql, $con);
        $row = dbFetchArray($result);
        $nomeProduto = $row['nomeProduto'];
		// Substituir $nbsp por espaço em branco normal "0x20"
		// O correto aqui seria corrigir a base de dados, e não cada retorno dela.
		$nomeProduto = str_replace("\xA0", ' ', $nomeProduto);
		$cEan = $row['cEan'];

        fwrite($file, "H|$i||\r\n");
        $len = strlen($idProduto);
        $id = $len == 1 ? "000" : ($len == 2 ? "00" : ($len == 3 ? "0" : ""));
        $id = "$id".$idProduto;
        fwrite($file, "I|$id|$cEan|$nomeProduto|$NCM||$CFOP|UN|$quantidadeProduto|$precoProduto|$totalProduto||UN|$quantidadeProduto|$precoProduto|||$descontoProduto||1||||\r\n");
        fwrite($file, "M||\r\n");
        fwrite($file, "N|\r\n");
        fwrite($file, "N08|$origem|$CST|0.00|0.00|\r\n");
        fwrite($file, "Q|\r\n");
        fwrite($file, "Q04|07|\r\n");
        fwrite($file, "S|\r\n");
        fwrite($file, "S04|07|\r\n");
		//Identificar caracteres estranhos no nome do produto
		//echo($nomeProduto);
		//echo("<br>");
		//echo(bin2hex($nomeProduto));
		//echo("<br>");
		


        if(false){

            $query = "INSERT INTO PRODUTOS_NOTA (idNota,idProduto,precoProduto,quantidadeProduto";
            $query .= ",descontoProduto,totalProduto,CFOP,CST,origem,situacaoTributaria,";
            $query .= "regime,PIS,cofins) VALUES (";
            $query .=
            $query .= "$idProduto,";
            $query .= "$precoProduto,";
            $query .= "$quantidadeProduto,";
            $query .= "$descontoProduto,";
            $query .= "$totalProduto,";
            $query .= "$CFOP,";
            $query .= "$CST,";
            $query .= "$situacaoTributaria,";
            $query .= "$regime,";
            $query .= "$PIS,";
            $query .= "$cofins,";
			$query .= "$NCM)";

        }
    }
}

fwrite($file,"W|\r\n");
$totalNotaComDesconto = round(($totalNota-$totalDescontos),2);
$totalNotaComDesconto = number_format($totalNotaComDesconto,2,".","");
$totalNota = number_format($totalNota,2,".","");
$totalDescontos = number_format($totalDescontos,2,".","");
fwrite($file,"W02|0.00|0.00|0.00|0.00|0.00|$totalNota|0.00|0.00|$totalDescontos|0.00|0.00|0.00|0.00|0.00|$totalNotaComDesconto|\r\n");
fwrite($file,"X|0|\r\n");
fwrite($file, "X26|$numeroVolumes|Caixa de papelao|||||\r\n");
fwrite($file, "Z||ICMS recolhido por substituicao tributaria conf. art. 313-G do RICMS|\r\n");

dbCloseConnection($con);
fclose($file);

echo "Arquivo nota_fiscal_$idNota.txt gerado com sucesso na em Meus Documentos -> nfe_site <br/>";
echo "<a href=\"//localhost/temcmol/\">Cadastrar nova nota fiscal</a>";

?>
