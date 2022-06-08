const transacao = document.getElementById('select-transacao');
const bancos = document.getElementById('bancos');
const tChave = document.getElementById('select-chave');
const chave = document.getElementById('chave');
const valor = document.getElementById('valor');
const data = document.getElementById('data');
const qntdPixEnviados = document.getElementById('enviados');
const qntdPixRecebidos = document.getElementById('recebidos');
const saldoEnv = document.getElementById('saldoFinalEnv');
const saldoRec = document.getElementById('saldoFinalRec');
const operacoes = [];

function verificaChave() {
  let today = new Date().toDateString();
  if (transacao.value == "selecione" || bancos.value == "selecione" || tChave.value == "selecione" ||
    chave.value == 0 || valor.value == 0 || data.value == 0) {
    window.alert('Todos os dados devem ser preencidos!');
    return false;
  }

  else if (tChave.value == "cpf" && chave.value.length < 11 || chave.value.length > 14) {
    window.alert('O CPF ou CNPJ deve conter entre 11 e 14 dígitos');
    return false;
  }

  else if (tChave.value == "c" && chave.value.length != 11) {
    window.alert('Insira o número de celular corretamente');
    return false;
  }

  else if (data.value > today) {
    window.alert('O pix deve ser realizado na data de hoje ou agendado para data posterior. Verifique a data inserida!');
    return false;
  }
  return true;
}


function finalizarPix() {
  var qntdEnviados = 0, qntdRecebidos = 0, totalEnviados = 0, totalRecebidos = 0;
  for (i in operacoes) {

    if (operacoes[i].selectTransacao == 'Enviar') {
      qntdEnviados++;
      qntdPixEnviados.innerHTML = `Transações: ${qntdEnviados}`;

      totalEnviados += Number(operacoes[i].inputValor);
      saldoEnv.innerHTML = `Saldo final: ${totalEnviados}`;
    }
    else if (operacoes[i].selectTransacao == 'Receber') {
      qntdRecebidos++;
      qntdPixRecebidos.innerHTML = `Transações: ${qntdRecebidos}`;

      totalRecebidos += Number(operacoes[i].inputValor)
      saldoRec.innerHTML = `Saldo final: ${totalRecebidos}`;
    }
  }

  var saldo = document.getElementById('saldo');
  var saldoFinal = totalRecebidos - totalEnviados;
  saldo.innerHTML = ` <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
  <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
  <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
  <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
</svg>Saldo Total: R$${saldoFinal}`;
  limparCampos(transacao, bancos, tChave, chave, valor, data);
}

function realizarPix() {
  if (verificaChave()) {
    const tranf = {
      selectTransacao: transacao.value,
      inputValor: valor.value,
    }
    operacoes.push(tranf);
    if (transacao.value == 'Enviar') {
      window.alert('Pix enviado!');
    }
    else if (transacao.value == 'Receber') {
      window.alert('Pix recebido!');
    }
    limparCampos(transacao, bancos, tChave, chave, valor, data);
  }
}

function limparCampos(transacao, bancos, tChave, chave, valor, data) {
  transacao.value = "selecione";
  bancos.value = "selecione";
  tChave.value = "selecione";
  chave.value = "";
  valor.value = "";
  data.value = "";
}

function preencherBancos(data) {
  let bancos = document.getElementById("bancos");

  for (i in data) {

    const { name } = data[i];

    let option = document.createElement("option");
    option.value = name;
    option.innerHTML = `${name}`;

    bancos.appendChild(option);
  }
}

function carregarBancos() {
  fetch("https://brasilapi.com.br/api/banks/v1")
    .then(response => response.json())
    .then(data => preencherBancos(data))
    .catch(error => console.error(error));
}

/*function limparSelect(campo) {
  const select = document.getElementById(campo);

  while (select.length > 1) {
    select.remove(1);
  }
}*/