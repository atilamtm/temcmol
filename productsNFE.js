/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 
 var prodNumber = 1;

function insertNewProductIntoList()
{

    var cellNumber=0;
    var tbl = document.getElementById("productsList");

    var row = tbl.insertRow(prodNumber);
    
    var cell = row.insertCell(cellNumber)
    var cellContent = document.createElement("input");
    cellContent.setAttribute("type","text");
    cellContent.setAttribute("id","idPrimeira" + prodNumber);
    cellContent.setAttribute("name","idPrimeira" + prodNumber);
    cellContent.setAttribute("onchange", "selectProduct(this.value," + prodNumber + ")");
    cellContent.setAttribute("size","7");
    cellContent.setAttribute("maxLength", "7");
    cell.appendChild(cellContent);

    cellNumber++;
    cell = row.insertCell(cellNumber);
    cellContent = document.createElement("select");
    cellContent.setAttribute("id", "idProduto" + prodNumber);
    cellContent.setAttribute("name", "idProduto" + prodNumber);
    cellContent.setAttribute("value", "");
    cellContent.setAttribute("onchange", "selectProduct(this.value," + prodNumber + ")");
    getProductList(cellContent);
    cell.appendChild(cellContent);

    cellNumber++;
    cell = row.insertCell(cellNumber);
    cellContent = document.createElement("input");
    cellContent.setAttribute("type","text");
    cellContent.setAttribute("id","precoProduto" + prodNumber);
    cellContent.setAttribute("name","precoProduto" + prodNumber);
    cellContent.setAttribute("value","0.00");
    cellContent.setAttribute("onchange","calculatePrice(" + prodNumber + ")");
    cellContent.setAttribute("size","7");
    cellContent.setAttribute("maxLength", "7");
    cell.appendChild(cellContent);

    cellNumber++;
    cell = row.insertCell(cellNumber);
    cellContent = document.createElement("input");
    cellContent.setAttribute("type","text");
    cellContent.setAttribute("id","quantidadeProduto" + prodNumber);
    cellContent.setAttribute("name","quantidadeProduto" + prodNumber);
    cellContent.setAttribute("value","0");
    cellContent.setAttribute("onchange","calculatePrice(" + prodNumber + ")");
    cellContent.setAttribute("size","4");
    cellContent.setAttribute("maxLength", "4");
    cell.appendChild(cellContent);

    cellNumber++;
    cell = row.insertCell(cellNumber);
    cellContent = document.createElement("input");
    cellContent.setAttribute("type","text");
    cellContent.setAttribute("id","descontoProduto" + prodNumber);
    cellContent.setAttribute("name","descontoProduto" + prodNumber);
    cellContent.setAttribute("value","0");
    cellContent.setAttribute("onchange","calculatePrice(" + prodNumber + ")");
    cellContent.setAttribute("size","3");
    cellContent.setAttribute("maxLength", "3");
    cell.appendChild(cellContent);

    cellNumber++;
    cell = row.insertCell(cellNumber);
    cellContent = document.createElement("input");
    cellContent.setAttribute("type","text");
    cellContent.setAttribute("id","totalProduto" + prodNumber);
    cellContent.setAttribute("name","totalProduto" + prodNumber);
    cellContent.setAttribute("value","0.00");
    cellContent.setAttribute("onchange","calculateTotal()");
    cellContent.setAttribute("size","10");
    cellContent.setAttribute("maxLength", "20");
    cell.appendChild(cellContent);

    cellNumber++;
    cell = row.insertCell(cellNumber);
    cellContent = document.createElement("input");
    cellContent.setAttribute("id", "excluirProduto" + prodNumber);
    cellContent.setAttribute("name", "excluirProduto" + prodNumber);
    cellContent.setAttribute("type", "button");
    cellContent.setAttribute("value", "X");
    cellContent.setAttribute("onClick", "excludeProductFromList(" + prodNumber + ")");
    cell.appendChild(cellContent);

    cellNumber++;
    cell = row.insertCell(cellNumber);
    cellContent = document.createElement("input");
    cellContent.setAttribute("id", "CFOP" + prodNumber);
    cellContent.setAttribute("name", "CFOP" + prodNumber);
    cellContent.setAttribute("type", "text");
    cellContent.setAttribute("size","4");
    cellContent.setAttribute("maxLength", "10");
    cell.appendChild(cellContent);

    cellNumber++;
    cell = row.insertCell(cellNumber);
    cellContent = document.createElement("input");
    cellContent.setAttribute("id", "CST" + prodNumber);
    cellContent.setAttribute("name", "CST" + prodNumber);
    cellContent.setAttribute("type", "text");
    cellContent.setAttribute("size","4");
    cellContent.setAttribute("maxLength", "10");
    cell.appendChild(cellContent);

    cellNumber++;
    cell = row.insertCell(cellNumber);
    cellContent = document.createElement("input");
    cellContent.setAttribute("id", "origem" + prodNumber);
    cellContent.setAttribute("name", "origem" + prodNumber);
    cellContent.setAttribute("type", "text");
    cellContent.setAttribute("size","3");
    cellContent.setAttribute("maxLength", "3");
    cell.appendChild(cellContent);

    cellNumber++;
    cell = row.insertCell(cellNumber);
    cellContent = document.createElement("input");
    cellContent.setAttribute("id", "situacaoTributaria" + prodNumber);
    cellContent.setAttribute("name", "situacaoTributaria" + prodNumber);
    cellContent.setAttribute("type", "text");
    cellContent.setAttribute("size","4");
    cellContent.setAttribute("maxLength", "4");
    cell.appendChild(cellContent);

    cellNumber++;
    cell = row.insertCell(cellNumber);
    cellContent = document.createElement("input");
    cellContent.setAttribute("id", "regime" + prodNumber);
    cellContent.setAttribute("name", "regime" + prodNumber);
    cellContent.setAttribute("type", "text");
    cellContent.setAttribute("size","4");
    cellContent.setAttribute("maxLength", "3");
    cell.appendChild(cellContent);

    cellNumber++;
    cell = row.insertCell(cellNumber);
    cellContent = document.createElement("input");
    cellContent.setAttribute("id", "PIS" + prodNumber);
    cellContent.setAttribute("name", "PIS" + prodNumber);
    cellContent.setAttribute("type", "text");
    cellContent.setAttribute("value", "0");
    cellContent.setAttribute("size","4");
    cellContent.setAttribute("maxLength", "3");
    cell.appendChild(cellContent);

    cellNumber++;
    cell = row.insertCell(cellNumber);
    cellContent = document.createElement("input");
    cellContent.setAttribute("id", "cofins" + prodNumber);
    cellContent.setAttribute("name", "cofins" + prodNumber);
    cellContent.setAttribute("type", "text");
    cellContent.setAttribute("value", "0");
    cellContent.setAttribute("size","4");
    cellContent.setAttribute("maxLength", "3");
    cell.appendChild(cellContent);
	
	cellNumber++;
    cell = row.insertCell(cellNumber);
    cellContent = document.createElement("input");
    cellContent.setAttribute("id", "NCM" + prodNumber);
    cellContent.setAttribute("name", "NCM" + prodNumber);
    cellContent.setAttribute("type", "text");
    cellContent.setAttribute("value", "0");
    cellContent.setAttribute("size","10");
    cellContent.setAttribute("maxLength", "10");
    cell.appendChild(cellContent);

    prodNumber++;

}

function excludeProductFromList(prodIndex)
{
    
    if (confirm("Excluir este produto?"))
    {
        var tbl = document.getElementById("productsList");
        tbl.deleteRow(prodIndex);
        prodNumber--;
        var i,id;
        var element;
        for(i=prodIndex; i <= prodNumber; i++)
        {
            id = i+1;
            element = document.getElementById("idPrimeira"+id);
            element.setAttribute("id", "idPrimeira"+i);
            element.setAttribute("name", "idPrimeira"+i);
            element.setAttribute("onchange", "selectProduct(this.value," + i + ")");

            element = document.getElementById("idProduto"+id);
            element.setAttribute("id", "idProduto"+i);
            element.setAttribute("name", "idProduto"+i);
            element.setAttribute("onchange", "selectProduct(this.value," + i + ")");

            element = document.getElementById("precoProduto"+id);
            element.setAttribute("id", "precoProduto"+i);
            element.setAttribute("name", "precoProduto"+i);
            element.setAttribute("onchange","calculatePrice(" + i + ")");

            element = document.getElementById("quantidadeProduto"+id);
            element.setAttribute("id", "quantidadeProduto"+i);
            element.setAttribute("name", "quantidadeProduto"+i);
            element.setAttribute("onchange","calculatePrice(" + i + ")");

            element = document.getElementById("descontoProduto"+id);
            element.setAttribute("id", "descontoProduto"+i);
            element.setAttribute("name", "descontoProduto"+i);
            element.setAttribute("onchange","calculatePrice(" + i + ")");

            element = document.getElementById("totalProduto"+id);
            element.setAttribute("id", "totalProduto"+i);
            element.setAttribute("name", "totalProduto"+i);

            element = document.getElementById("excluirProduto"+id);
            element.setAttribute("id", "excluirProduto"+i);
            element.setAttribute("name", "excluirProduto"+i);
            element.setAttribute("onClick", "excludeProductFromList(" + i + ")");

            element = document.getElementById("CFOP"+id);
            element.setAttribute("id", "CFOP"+i);
            element.setAttribute("name", "CFOP"+i);

            element = document.getElementById("CST"+id);
            element.setAttribute("id", "CST"+i);
            element.setAttribute("name", "CST"+i);

            element = document.getElementById("origem"+id);
            element.setAttribute("id", "origem"+i);
            element.setAttribute("name", "origem"+i);

            element = document.getElementById("situacaoTributaria"+id);
            element.setAttribute("id", "situacaoTributaria"+i);
            element.setAttribute("name", "situacaoTributaria"+i);

            element = document.getElementById("regime"+id);
            element.setAttribute("id", "regime"+i);
            element.setAttribute("name", "regime"+i);

            element = document.getElementById("PIS"+id);
            element.setAttribute("id", "PIS"+i);
            element.setAttribute("name", "PIS"+i);

            element = document.getElementById("cofins"+id);
            element.setAttribute("id", "cofins"+i);
            element.setAttribute("name", "cofins"+i);
			
			element = document.getElementById("NCM"+id);
            element.setAttribute("id", "NCM"+i);
            element.setAttribute("name", "NCM"+i);
        }
    }
}