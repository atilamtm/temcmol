<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Inserir Novo Cliente</title>
        <script type="text/javascript" src="validateClientData.js"></script>
        <?php INCLUDE 'dbInterface.php'  ?>
    </head>
    <body>


        <form name="insertClientForm" method="post" onsubmit="return validateData()">
            <table>
                <tr>
                    <th colspan="2" align="center">Insira os dados do novo cliente</th>
                </tr>
                <tr>
                    <td align="right">Estabelecimento: </td>
                    <td><input type="text" name="estabelecimentoCliente"/></td>
                </tr>
                <tr>
                    <td align="right">Cliente: </td>
                    <td><input type="text" name="nomeCliente"/></td>
                </tr>
                <tr>
                    <td align="right">Documento: </td>
                    <td>
                        <select name="documentoCliente">
                            <option value="CNPJ">CNPJ</option>
                            <option value="CPF">CPF</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right">Numero: </td>
                    <td><input type="text" name="numeroDocumentoCliente"/></td>
                </tr>
                <tr>
                    <td align="right">Inscricao Estadual: </td>
                    <td><input type="text" name="inscricaoEstadualCliente"/></td>
                </tr>
                <tr>
                    <td align="right">Email: </td>
                    <td><input type="text" name="emailCliente" value="nome@email.com"/></td>
                </tr>
                <tr>
                    <td align="right">Telefone: </td>
                    <td><input type="text" name="telefoneCliente" value="+55 (xx) xxxx-xxxx"/></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><b>Endereco</b> </td>
                </tr>
                <tr>
                    <td align="right">Rua: </td>
                    <td><input type="text" name="ruaCliente"/></td>
                </tr>
                <tr>
                    <td align="right">Numero: </td>
                    <td><input type="text" name="numeroCliente"/></td>
                </tr>
                <tr>
                    <td align="right">Complemento: </td>
                    <td><input type="text" name="complementoCliente"/></td>
                </tr>
                <tr>
                    <td align="right">Bairro: </td>
                    <td><input type="text" name="bairroCliente"/></td>
                </tr>
                <tr>
                    <td align="right">Cidade: </td>
                    <td>
                        <select name="cidadeCliente">
                            <?php listCities(); ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right">Estado: </td>
                    <td><input type="text" name="estadoCliente" value="SP"/></td>
                </tr>
                <tr>
                    <td align="right">Pais: </td>
                    <td><input type="text" name="paisCliente" value="Brasil"/></td>
                </tr>
                <tr>
                    <td align="right">CEP: </td>
                    <td><input type="text" name="cepCliente"/></td>
                </tr>
                <tr>
                    <td align="right"><input type="submit" value="Inserir Cliente"  onClick=<?php insertClient() ?>/></td>
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
