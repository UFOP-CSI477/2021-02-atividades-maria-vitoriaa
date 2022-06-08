var valor = document.getElementById('valor');
var de = document.getElementById('de');
var para = document.getElementById('para');
var resultado = document.getElementById('resultado');

async function carregarMoedas() {
    await fetch('https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/Moedas?$top=100&$format=json')
    .then(response => response.json())
    .then(data => preencherSelect(data.value, "de"))
    .catch(error => console.error(error));

    await fetch('https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/Moedas?$top=100&$format=json')
    .then(response => response.json())
    .then(data => preencherSelect(data.value, "para"))
    .catch(error => console.error(error));
}

function preencherSelect(data, campo) {
    let select = document.getElementById(campo);

    data.sort((a, b) => a.nomeFormatado.localeCompare(b.nomeFormatado));

    for (let index in data) {
        const { simbolo, nomeFormatado } = data[index];

        let option = document.createElement("option");
        option.value = simbolo;
        option.innerHTML = `${nomeFormatado} (${simbolo})`;

        select.appendChild(option);
    }
    
}

function limparCampos() {
    valor.value = "";
    resultado.value = "";
    de.value = "selecione";
    para.value = "selecione";
}

