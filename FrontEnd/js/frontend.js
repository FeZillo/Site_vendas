function vava() {
    window.location.href = "jogos/valorant.php";
}

function lol() {
    window.location.href = "jogos/leagueoflegends.php";
}

function cs() {
    window.location.href = "jogos/counterstrike.php";
}

function dbd() {
    window.location.href = 'jogos/deadbydaylight.php';
}


// --------------------------------------

function vavaen() {
    window.location.href = "jogos/valorant.php?lang=en";
}

function lolen() {
    window.location.href = "jogos/leagueoflegends.php?lang=en";
}

function csen() {
    window.location.href = "jogos/counterstrike.php?lang=en";
}

function dbden() {
    window.location.href = 'jogos/deadbydaylight.php?lang=en';
}


// -----------------------------------
//Elo Job

function leagueoflegends(valor, tipo, select){
    lolelos(valor, tipo);
    changeColor('lol', valor, select);
}

function csgopatente(valor, id) {
    if(id == 'a'){
        var span = document.getElementById('opcoes');
        var name = 'numero_atual';
    }else if(id == 'd'){
        var span = document.getElementById('opcoes_d');
        var name = 'numero_desejado';
    }else if(id == 'c'){
        var span = document.getElementById('opt');
        var name = 'numero';
    }
    let input;
    span.innerHTML = '';
    switch(valor){
        case 'prata':
            for(let i = 0; i < 6; i++){
                input = document.createElement('input');
                input.name = name;
                input.required = 'true';
                input.type = 'radio';
                input.className = 'mr-1 ml-2';
                input.value = (i + 1);
                span.appendChild(input);
                span.innerHTML += (i + 1);
            }
            break;
        
        case 'ouro':
            for(let i = 0; i < 4; i++) {
                input = document.createElement('input');
                input.name = name;
                input.required = 'true';
                input.type = 'radio';
                input.className = 'mr-1 ml-2';
                input.value = (i + 1);
                span.appendChild(input);
                span.innerHTML += (i + 1);
            }
            break;
        
        case 'ak':
            for(let i = 0; i < 3; i++){
                input = document.createElement('input');
                input.name = name;
                input.required = 'true';
                input.type = 'radio';
                input.className = 'mr-1 ml-2';
                if(i == 2){
                    input.value = '3'
                    span.appendChild(input);
                    span.innerHTML += 'Cruzada';
                }else {
                    input.value = (i + 1);
                    span.appendChild(input);
                    span.innerHTML += (i + 1);
                }
            }
            break;
        
        case 'xerife':
            break;

        case 'aguia':
            for(let i = 0; i < 2; i++){
                input = document.createElement('input');
                input.name = name;
                input.required = 'true';
                input.type = 'radio';
                input.className = 'mr-1 ml-2';
                input.value = (i + 1);
                span.appendChild(input);
                span.innerHTML += (i + 1);
            }        
        
        case 'supremo':
            break;

        case 'global':
            break;
        
    }
}

function lolelos(valor, id) {
    if(id == 'a') {
        var i1 = document.getElementById('1a');
        var i2 = document.getElementById('2a');
        var i3 = document.getElementById('3a');
        var i4 = document.getElementById('4a');
        var span = document.getElementById('lolElosA');
    }else if(id == 'd') {
        var i1 = document.getElementById('1d');
        var i2 = document.getElementById('2d');
        var i3 = document.getElementById('3d');
        var i4 = document.getElementById('4d');
        var span = document.getElementById('lolElosD');
    }

    if(valor == 'master' || valor == 'grandmaster') {
        i1.required = false;
        i2.required = false;
        i3.required = false;
        i4.required = false;
        span.hidden = true;
    }else {
        i1.required = true;
        i2.required = true;
        i3.required = true;
        i4.required = true;
        span.hidden = false;
    }

}

function changeColor(jogo, rank, select) {
    let string = " form-select mt-2";
    if(jogo == 'valorant'){
        switch(rank){
            case 'iron':
                select.className = "bg-white" + string;
                break;
            case 'bronze':
                select.className = "bronze" + string;
                break;
            case 'silver':
                select.className = "silver" + string;
                break;
            case 'gold':
                select.className = "gold" + string;
                break;
            case "platinum":
                select.className = "platinum" + string;
                break;
            case "diamond":
                select.className = "diamond" + string;
                break;
            case "ascendant":
                select.className = "ascendant" + string;
                break;
            case "immortal":
                select.className = "immortal" + string;
                break;
            default:
                select.className = "bg-danger" + string;
                break;
        }
    }else if(jogo == 'lol') {
        switch(rank){
            case 'iron':
                select.className = "bg-white" + string;
                break;
            case 'bronze':
                select.className = "bronze" + string;
                break;
            case 'silver':
                select.className = "silver" + string;
                break;
            case 'gold':
                select.className = "gold" + string;
                break;
            case "platinum":
                select.className = "platinum" + string;
                break;
            case "diamond":
                select.className = "diamond-lol" + string;
                break;
            case "master":
                select.className = "diamond" + string;
                break;
            case "grandmaster":
                select.className = "immortal" + string;
                break;
            default:
                select.className = "bg-danger" + string;
                break;
        }
    }else if(jogo == 'dbd') {
        switch(rank){
            case 'ash':
                select.className = "bg-white" + string;
                break;
            case 'bronze':
                select.className = "bronze" + string;
                break;
            case 'silver':
                select.className = "silver" + string;
                break;
            case 'gold':
                select.className = "gold" + string;
                break;
            case "iridescent":
                select.className = "iri" + string;
                break;
            default:
                select.className = "bg-danger" + string;
                break;
        }
    }
}

// Cadastro:
function verificaEmail(email){
    if(!email.endsWith('@gmail.com')){
        document.getElementById('email_sem_gmail').hidden = false;
        document.getElementById('cadastrar').disabled = true;
    }else{
        document.getElementById('email_sem_gmail').hidden = true;
        document.getElementById('cadastrar').disabled = false;
    }
}

function confirmarSenha(senha) {
    let pss = document.getElementById('senha');
    if(pss.value == senha) {
        document.getElementById('passwordHelp').hidden = true;
    }else {
        document.getElementById('passwordHelp').hidden = false;
    }
}

function comprar(jogo, id, preco, saldo){
    if(id == 1){
        if(checkSaldo(preco, saldo)){
            window.location.href = 'http://localhost/FrontEnd/hidden/controle_compras.php?action=elojob&jogo=' + jogo.toLowerCase();
        }else{
            saldoInsuficiente(jogo);
        }
    }else {
        switch(jogo){
            case 'valorant':
                document.getElementById('bt-buy-vava').className += ' disabled';
                break;
            case 'leagueOfLegends':
                document.getElementById('bt-buy-lol').className += ' disabled';
                break;
            case 'counterStrike':
                document.getElementById('bt-buy-cs').className += ' disabled';
                break;
            case 'deadByDaylight':
                document.getElementById('bt-buy-dbd').className += ' disabled';
                break;
        }
        let alerts = document.getElementsByClassName('alert-danger');
        for(let alert of alerts){
            alert.hidden = false;
        }
    }
}

function checkSaldo(preco, saldo){
    if(saldo >= preco){
        return true;
    }
    return false;
}

function saldoInsuficiente(jogo){
    switch(jogo){
        case 'valorant':
            var btn = document.getElementById('bt-buy-vava');
            break;
        case "leagueOfLegends":
            var btn = document.getElementById('bt-buy-lol');
            break;
        case "counterStrike":
            var btn = document.getElementById('bt-buy-cs');
            break;
        case "deadByDaylight":
            var btn = document.getElementById('bt-buy-dbd');
            break;
    }
    btn.className += 'disabled';
    let alerts = document.getElementsByClassName('alert-warning');
    for(let alert of alerts){
        alert.hidden = false;
    }
}

//---------- Pefil: ------------

function alterarDados() {
    document.getElementById('email').disabled = false;
    document.getElementById('username').disabled = false;
    document.getElementById('b1').remove();
    document.getElementById('b2').remove();

    let btn = document.createElement('button');
    btn.className = "btn btn-info btn-block";
    btn.innerHTML = 'Salvar';
    btn.type = 'submit';
    btn.id = 'cadastrar'

    document.getElementById('botoes').appendChild(btn);
}

function adicionarSaldo() {
    let x = document.getElementById('x');
    x.innerHTML = "";

    let form = document.createElement('form');
    let formGroup = document.createElement('div');
    let label = document.createElement('label');
    let input = document.createElement('input');
    let submit = document.createElement('button');

    //EstilizaÇão:
    formGroup.className = 'form-group';
    label.for = 'adicionar-saldo';
    label.innerHTML = 'Quantidade:';

    submit.className = "btn btn-info";

    //Necessidade: 
    form.action = "hidden/adicionar_saldo.php";
    form.method = "post";

    input.id = "adicionar-saldo";
    input.name = "quantidade";
    input.className = "form-control";
    input.type = "number";
    input.value = "5";
    input.step = "15";
    input.min = "5";
    input.max = "10000";

    submit.type = "submit";
    submit.innerHTML = "Adicionar";

    //Adicionando os elementos:
    formGroup.appendChild(label);
    formGroup.appendChild(input);
    form.appendChild(formGroup);
    form.appendChild(submit);
    x.appendChild(form);
}

function alterarSenha() {
    let senha_antiga = document.getElementById('email');
    let nova_senha = document.getElementById('username');
    let senha_antiga_label = document.getElementById('lmail');
    let nova_senha_label = document.getElementById('luser')
    let confirmacao_senha = document.getElementById('confirmacao-senha');
    
    senha_antiga_label.innerHTML = "Senha Atual: ";
    nova_senha_label.innerHTML = "Nova Senha: ";


    senha_antiga.name = 'atual';
    senha_antiga.value = '';
    senha_antiga.type = 'password';
    senha_antiga.onblur = "";
    senha_antiga.disabled = false;

    nova_senha.id = "senha";
    nova_senha.name = 'nova';
    nova_senha.value = '';
    nova_senha.type = 'password';
    nova_senha.disabled = false;

    confirmacao_senha.className = "form-group"

    let confirma = document.createElement('input');
    let confirma_label = document.createElement('label');

    confirma_label.for = 'confirma';
    confirma.id = 'confirma';

    confirma_label.innerHTML = "Confirme sua senha:";
    confirma.type = "password";
    confirma.className = "form-control"
    confirma.name = 'confirma';
    confirma.onblur = "confirmarSenha(this.value);"

    document.getElementById('b1').remove();
    document.getElementById('b2').remove();

    confirmacao_senha.appendChild(confirma_label);
    confirmacao_senha.appendChild(confirma);

    let form = document.getElementById('form');

    form.action = "hidden/controle.php?action=mudarSenha";
    form.method = "post";

    let btn = document.createElement('button');
    btn.type  = 'submit';
    btn.className = "btn btn-info btn-block";
    btn.innerHTML = "Atualizar Senha";

    let small = document.createElement('small');
    small.innerHTML = 'As senhas devem ser iguais.';
    small.className = "text-danger";
    small.id = "passwordHelp";
    small.hidden = true;
    confirma.appendChild(small);

    document.getElementById('botoes').appendChild(btn);
}

function copyToClipboard() {
    let copy = document.getElementById('copy');

    navigator.clipboard.writeText(copy.innerHTML);
}