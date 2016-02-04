<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Inserir Novo Cliente</title>
        <script type="text/javascript" src="validateProductData.js"></script>
        <?php INCLUDE 'dbInterface.php'  ?>
    </head>
    <body>


        <form name="insertProductForm" method="post" onsubmit="return validateData()">
            <table>
                <tr>
                    <th colspan="2" align="center">Insira os dados do novo produto</th>
                </tr>
                <tr>
                    <td align="right">Codigo do Produto: </td>
                    <td><input type="text" name="idProduto"/></td>
                </tr>
                <tr>
                    <td align="right">Nome do Produto: </td>
                    <td><input type="text" name="nomeProduto"/></td>
                </tr>
                <tr>
                    <td align="right">NCM: </td>
                    <td><input type="text" name="NCM"/></td>
                </tr>
                <tr>
                    <td align="right">Unidade Comerciavel: </td>
                    <td><input type="text" name="unidadeComercialProduto"/></td>
                </tr>
                <tr>
                    <td align="right">Preco do Produto: </td>
                    <td><input type="text" name="precoComercialProduto"/></td>
                </tr>
                <tr>
                    <td align="right">CFOP: </td>
                    <td><input type="text" name="CFOP" value="5405"/></td>
                </tr>
                <tr>
                    <td align="right">CST: </td>
                    <td><input type="text" name="CST" value="060"/></td>
                </tr>                
                <tr>
                    <td align="right">Origem: </td>
                    <td><input type="text" name="origem" value="0"/></td>
                </tr>
                <tr>
                    <td align="right">Situacao Tributaria: </td>
                    <td><input type="text" name="situacaoTributaria" value="60"/></td>
                </tr>
                <tr>
                    <td align="right">Regime: </td>
                    <td><input type="text" name="regime" value="3"/></td>
                </tr>
                <tr>
                    <td align="right">PIS: </td>
                    <td><input type="text" name="PIS" value="07"/></td>
                </tr>
                <tr>
                    <td align="right">Cofins: </td>
                    <td><input type="text" name="cofins" value="07"/></td>
                </tr>

                <tr>
                    <td align="right"><input type="submit" value="Inserir Produto"  onClick=<?php insertProduct() ?>/></td>
                    <td><input type="reset" value="Limpar campos"/></td>
                </tr>

            </table>
        </form>

        <?php
        INCLUDE 'dbInterface.php';




        // put your code here
        ?>
    </body>
</html>
