<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <?php
        INCLUDE 'dbInterface.php';
        global $nome;
        ?>

        <script type="text/javascript" src="ajax.js"></script>
        <script type="text/javascript" src="productsNFE.js"></script>
        <script type="text/javascript">
            var numberOfNonColumns = 3;
            function calculateTotal()
            {
                var i,total=0;
                var numRows = document.getElementById("productsList").rows.length - numberOfNonColumns;
                for(i=1;i<=numRows;i++)
                {
                    total += document.getElementById("totalProduto" + i).value*1;
                }
                //total *= (1 - document.getElementById("descontoNota").value/100);
                document.getElementById("totalNota").value = total.toFixed(2);
                calculateDiscount();
            }

            function calculatePrice(prodNumber)
            {
                var preco = document.getElementById("precoProduto" + prodNumber).value;
                var quantidade = document.getElementById("quantidadeProduto" + prodNumber).value;
                //var desconto = document.getElementById("descontoProduto" + prodNumber).value;

                var totalProduto = preco*quantidade/**(100-desconto)/100*/;
                document.getElementById("totalProduto" + prodNumber).value = totalProduto.toFixed(2);
                calculateTotal();
            }

            function calculateDiscount()
            {
                var discount = document.getElementById("descontoNota").value*1;
                var valorNota = document.getElementById("totalNota").value*1;
                document.getElementById("totalDesconto").value = (valorNota * discount/100).toFixed(2);
            }

            function exportNFe()
            {
                var numRows = document.getElementById("productsList").rows.length-3;
                document.getElementById("numeroProdutos").value = numRows;
                form.submit();
            }
        </script>

    </head>
    <body onload="insertNewProductIntoList()">
        <br/>

        <form id="nfe" action="generateNFe.php" onsubmit="exportNFe()" method="post" accept-charset="UTF-8">
            <table>
                <tr>
                    <td colspan="2">
                        Numero da Nota Fiscal: <input type="text" size="10" name="idNota" id="idNota" />
                    </td>
                    <td>
                        Numero de Volumes: <input type="text" size="10" name="numeroVolumes" id="numeroVolumes" value="1">
                    </td>
                <tr>
                    <td colspan="4">
                        Cliente:
                            <select name ="idCliente" id="idCliente" value="" onchange="selectClientAddress(this.value)">
                                <?php listClients(); ?>
                            </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="4"><b>Endereço</b></td>
                </tr>
                <tr id="mostrarEnderecoCliente">
                    <td>Cidade</td>
                    <td>Rua</td>
                    <td>Numero</td>
                    <td>CEP</td>
                </tr>
            </table>

            <br/>
            <br/>
            <br/>

            <table id="productsList">
                <tr>
                    <td>Codigo:</td>
                    <td>Produto:</td>
                    <td>Preco:</td>
                    <td>Quantidade:</td>
                    <td>Desconto %:</td>
                    <td>Total:</td>
                    <td>EXCLUIR</td>
                    <td>CFOP:</td>
                    <td>CST:</td>
                    <td>Origem:</td>
                    <td>Situacao Trib</td>
                    <td>Regime:</td>
                    <td>PIS:</td>
                    <td>Cofins:</td>
					          <td>NCM:</td>
                </tr>
                <tr>
                    <td colspan="4">
                        <input type="button" onClick="insertNewProductIntoList()" value="+"/>
                    </td>
                    <td>
                        <input type="text" size="3" maxlength="3" name="descontoNota" id="descontoNota" onchange="calculateDiscount()" value="0">
                    </td>
                    <td colspan="10">
                        <input type="text" size="14" maxlength="30" name="totalNota" id="totalNota" value="0.00"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <input type="submit" value="Gerar Nota"/>
                    </td>
                    <td>
                        Desconto:
                    </td>
                    <td colspan="10">
                        <input type="text" size="14" maxlength="30" name="totalDesconto" id="totalDesconto" value="0.00"/>
                    </td>
                </tr>
            </table>
            <input type="hidden" name="numeroProdutos" id="numeroProdutos" value=0 />
        </form>
    </body>
</html>
