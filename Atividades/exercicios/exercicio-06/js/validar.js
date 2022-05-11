function validar(campo){

    let n = campo.value;

    if(n.length == 0 || n == ""){
        window.alert("Informe os dados corretamente!");
        campo.value = "";
        campo.focus();
        return false;
    }
    return true;
}

function validaForm(){
    let nome = document.dados.nome;
    let endereco = document.dados.endereco;
    let cpf = document.dados.cpf;
    let telefone = document.dados.telefone;

    if(validar(nome) && validar(endereco) && validar(cpf) && validar(telefone)){
        window.alert("Dados corretamente preenchidos! Formulário enviado com sucesso.");
    }
}