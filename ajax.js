var xmlhttp;

function loadXMLDoc(url,cfunc)
{
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=cfunc;
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}

function selectClient(str)
{
    if (str=="" || str=="0")
    {
        document.getElementById("mostrarDadosCliente").innerHTML="<td>-</td><td>-</td>";
        document.getElementById("mostrarEnderecoCliente").innerHTML="<td>_</td><td>_</td><td>_</td><td>_</td>";
    }
    else
    {
        loadXMLDoc("findClientByID.php?q="+str,function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("mostrarDadosCliente").innerHTML=xmlhttp.responseText;
                selectClientAddress(str);
            }
        });
    }
    
}

function selectClientAddress(str)
{
    if (str=="" || str=="0")
    {
        document.getElementById("mostrarEnderecoCliente").innerHTML="<td>Cidade</td><td>Rua</td><td>Numero</td><td>CEP</td>";
    }
    else
    {
        loadXMLDoc("findClientAddressByID.php?q="+str,function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("mostrarEnderecoCliente").innerHTML=xmlhttp.responseText;
            }
        });
    }
}

function selectProduct(prodId,prodNumber)
{
    if (prodId=="" || prodId=="0")
    {
        document.getElementById("precoProduto" + prodNumber).value="0.00";
        document.getElementById("quantidadeProduto" + prodNumber).value=0;
        document.getElementById("descontoProduto" + prodNumber).value=0;
        document.getElementById("totalProduto" + prodNumber).value="0.00";
    }
    else
    {
        loadXMLDoc("findProductDataByID.php?q="+prodId,function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                var ret = xmlhttp.responseText.split("|");

                var preco = ret[0];
                var quantidade = document.getElementById("quantidadeProduto" + prodNumber).value;
                var desconto = document.getElementById("descontoProduto" + prodNumber).value;
                var totalProduto = preco*quantidade*(100-desconto)/100;

                document.getElementById("idPrimeira" + prodNumber).value = prodId;
                document.getElementById("idProduto" + prodNumber).value = prodId;
                document.getElementById("precoProduto" + prodNumber).value = parseFloat(preco).toFixed(2);
                document.getElementById("totalProduto" + prodNumber).value = totalProduto.toFixed(2);

                document.getElementById("CFOP" + prodNumber).value = ret[1];
                document.getElementById("CST" + prodNumber).value = ret[2];
                document.getElementById("origem" + prodNumber).value = ret[3];
                document.getElementById("situacaoTributaria" + prodNumber).value = ret[4];
                document.getElementById("regime" + prodNumber).value = ret[5];
                document.getElementById("PIS" + prodNumber).value = ret[6];
                document.getElementById("cofins" + prodNumber).value = ret[7];
				document.getElementById("NCM" + prodNumber).value = ret[8];
            }
        });
    }

}

function getProductList(element)
{
    loadXMLDoc("getProductList.php",function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            element.innerHTML = xmlhttp.responseText;
        }
    });
}

