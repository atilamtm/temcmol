/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function validateData()
{
    var f=document.forms["insertProductForm"];

    var value=f["idProduto"].value;
    if (fieldNull("Codigo do Produto",value)){ return false; }

    value=f["nomeProduto"].value;
    if (fieldNull("Nome do Produto",value)){ return false; }
    
    value=f["codigoBarrasProduto"].value;
    if (fieldNull("Codigo de Barras",value)){ return false; }

    value=f["unidadeComercialProduto"].value;
    if (fieldNull("Unidade Comerciavel",value)){ return false; }

    value=f["precoComercialProduto"].value;
    if (fieldNull("Preco do Produto",value)){ return false; }

    return true;
}
function fieldNull(field,value)
{
    if (value==null || value=="")
    {
        var str = "O campo '" + field + "' tem que ser preenchido";
        alert(str);
        return true;
    }
    return false;
}


