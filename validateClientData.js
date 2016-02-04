/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function validateData()
{
    var f=document.forms["insertClientForm"];

    var value=f["estabelecimentoCliente"].value;
    if (fieldNull("Estabelecimento",value)){ return false; }

    value=f["nomeCliente"].value;
    if (fieldNull("Cliente",value)){ return false; }
    
    value=f["numeroDocumentoCliente"].value;
    if (fieldNull("Numero",value)){ return false; }

    value=f["telefoneCliente"].value;
    if (fieldNull("Telefone",value)){ return false; }

    value=f["ruaCliente"].value;
    if (fieldNull("Rua",value)){ return false; }

    value=f["numeroCliente"].value;
    if (fieldNull("Numero",value)){ return false; }

    value=f["bairroCliente"].value;
    if (fieldNull("Bairro",value)){ return false; }

    value=f["cidadeCliente"].value;
    if (fieldNull("Cidade",value)){ return false; }

    value=f["estadoCliente"].value;
    if (fieldNull("Estado",value)){ return false; }

    value=f["cepCliente"].value;
    if (fieldNull("CEP",value)){ return false; }

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


