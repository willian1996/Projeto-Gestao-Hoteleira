const urlHostServer = 'http://localhost/Projeto-Gestao-Hoteleira/';


//selecinando os td da tabela detalhes-hospede
const objNomeTd = document.getElementById('tdNome');
const objCPFTd = document.getElementById('tdCPF');
const objEmailTd = document.getElementById('tdEmail');
const objTelefoneTd = document.getElementById('tdTelefone');
const objCelularTd = document.getElementById('tdCelular');

//selecionando os input do formulario form_cadastrar_hospede
const objfnome = document.getElementById('fnome_completo');
const objfCPF = document.getElementById('fCPF');
const objfemail = document.getElementById('femail');
const objfcelular = document.getElementById('fcelular');
const objftelefone = document.getElementById('ftelefone');
const botaoCadastrar = document.getElementById('botaoCadastrar');

var spanfCPF = document.getElementById('spancpf');
var spanfNome = document.getElementById('spannome');
var spanfEmail = document.getElementById('spanemail');
var spanfCelular = document.getElementById('spancelular');
var spanfTelefone = document.getElementById('spantelefone');


//validando input nome 
function validarNome(){
    if(objfnome.value == ''){
        objfnome.style.borderColor = '#f00';
        objfnome.focus();
        botaoCadastrar.disabled = true;
        spanfNome.innerHTML = ' O campo Nome não pode estar vazio';
    }else if(objfnome.value.length < 10){
        objfnome.style.borderColor = '#f00';
        objfnome.focus();
        botaoCadastrar.disabled = true;
        spanfNome.innerHTML = ' Digite seu Nome completo';
    }else{
        botaoCadastrar.disabled = false;
        objfnome.style.borderColor = '#F8F8FF';
        spanfNome.innerHTML = '';
    }
}

//validando input CPF
function validarCPF(){
    //testando CPF válido
    function testaCPF(strCPF){
        var Soma;
        var Resto;
        Soma = 0;
        if (strCPF == "00000000000") return false;
        for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;
        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
        Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;
        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
        return true;
    }
    
    //verificando se o CPF já existe no banco de dados
    function existeCPF(strCPF){
        if(window.XMLHttpRequest){
            var ajax = new XMLHttpRequest();
        }else{
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var resposta = JSON.parse(this.response);
                if(resposta.existe){
                    spanfCPF.innerHTML = ' '+resposta.mensagem;
                    objfCPF.style.borderColor = '#f00';
                    objfCPF.focus();
                    botaoCadastrar.disabled = true;
                }else{
                    spanfCPF.innerHTML = '';
                    botaoCadastrar.disabled = false;
                    objfCPF.style.borderColor = '#F8F8FF'; 
                } 
            }
        };
        ajax.open('GET', 'server/existe-cpf.php?cpf='+strCPF, true);
        ajax.send(); 
    }
    
    //validando CPF 
    if(objfCPF.value == ''){
        objfCPF.style.borderColor = '#f00';
        objfCPF.focus();
        spanfCPF.innerHTML = ' O campo CPF não pode estar vazio';
        botaoCadastrar.disabled = true;
    }else if(!testaCPF(objfCPF.value)){
        objfCPF.style.borderColor = '#f00';
        objfCPF.focus();
        spanfCPF.innerHTML =' CPF inválido';
        botaoCadastrar.disabled = true;
    }else{
        existeCPF(objfCPF.value);
    }
}

//validando input Email
function validarEmail(){
    //verificando se e-mail ja está cadastrado no banco
    function existeEmail(strEmail){
    if(window.XMLHttpRequest){
            var ajax = new XMLHttpRequest();
        }else{
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var resposta = JSON.parse(this.response);
                if(resposta.existe){
                    spanfEmail.innerHTML = ' '+resposta.mensagem;
                    objfemail.style.borderColor = '#f00';
                    objfemail.focus();
                    botaoCadastrar.disabled = true;
                }else{
                    spanfEmail.innerHTML = '';
                    botaoCadastrar.disabled = false;
                    objfemail.style.borderColor = '#F8F8FF'; 
                } 
            }
        };
        ajax.open('GET', 'server/existe-email.php?email='+strEmail, true);
        ajax.send();
    }
    //validando email
    if(objfemail.value == ""){
        objfemail.style.borderColor = '#f00';
        spanfEmail.innerHTML = " O campo E-mail não pode estar vazio!";
        botaoCadastrar.disabled = true;
    }else if(objfemail.value.indexOf('@')==-1 || objfemail.value.indexOf('.')==-1){
        objfemail.style.borderColor = '#f00';
        objfemail.focus();
        spanfEmail.innerHTML = " Preencha campo E-mail corretamente!";  
        botaoCadastrar.disabled = true;
    }else{
        existeEmail(objfemail.value);
    }
}

//validando celular 
function validarCelular(){
    if(objfcelular.value == ''){
        objfcelular.style.borderColor = '#f00';
        objfcelular.focus();
        spanfCelular.innerHTML = ' O campo Celular não pode estar vazio';
        botaoCadastrar.disabled = true;
    }else if(objfcelular.value.length != 11){
        objfcelular.style.borderColor = '#f00';
        objfcelular.focus();
        spanfCelular.innerHTML = ' Preencha o campo celular corretamente com o DDD';
        botaoCadastrar.disabled = true;
    }else{
        objfcelular.style.borderColor = '#F8F8FF';
        spanfCelular.innerHTML = '';
        botaoCadastrar.disabled = false;
    }
    
}
//validando celular 
function validarTelefone(){
    if(objftelefone.value == ''){
        objftelefone.style.borderColor = '#f00';
        objftelefone.focus();
        spanfTelefone.innerHTML = ' O campo Telefone não pode estar vazio';
        botaoCadastrar.disabled = true;
    }else if(objftelefone.value.length != 10){
        objftelefone.style.borderColor = '#f00';
        objftelefone.focus();
        spanfTelefone.innerHTML = ' Preencha o campo Telefone corretamente com o DDD';
        botaoCadastrar.disabled = true;
    }else{
        objftelefone.style.borderColor = '#F8F8FF';
        spanfTelefone.innerHTML = '';
        botaoCadastrar.disabled = false;
    }
}

//criando cadastro de hospede
function cadastrarHospede(){
    const fnome = objfnome.value;
    const fCPF = objfCPF.value;
    const femail = objfemail.value;
    const fcelular = objfcelular.value;
    const ftelefone = objftelefone.value;
    
    if(fnome == '' || fCPF == '' || femail == '' || fcelular == '' || ftelefone == ''){
        validarNome();
        validarCPF();
        validarEmail();
        validarCelular();
        validarTelefone();
        return false;
    }
    
    if(window.XMLHttpRequest){
        var ajax = new XMLHttpRequest();
    }else{
        var ajax = new ActiveXObject("Microsoft.XMLHTTP");
    }
    ajax.open('POST', 'server/cadastrar-hospede.php', true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var resposta = JSON.parse(this.response);
            if(resposta.deucerto){
                alert(resposta.mensagem);
                window.location.href = urlHostServer+'detalhes-hospede.php?id='+resposta.idHosped;
            }else{
                console.log(resposta.mensagem);
            }
        }
    };
    ajax.send('nome='+fnome+'&cpf='+fCPF+'&email='+femail+'&telefone='+ftelefone+'&celular='+fcelular);
}


//Esta função edita as informações do hospede da tabela detalhes do hospede
function editarHospede(id){
    //pegando os valores hospede na tabela detalhes-hospede
    const nome = objNomeTd.innerHTML;
    const CPF = objCPFTd.innerHTML;
    const email = objEmailTd.innerHTML;
    const telefone = objTelefoneTd.innerHTML;
    const celular = objCelularTd.innerHTML;
    
    //deixando a tabela editavel 
    const tdNome = objNomeTd.innerHTML = '<input class="input-td" type="text" name="nome_completo" value="'+nome+'">';
    const tdCPF = objCPFTd.innerHTML = '<input class="input-td" type="text" name="CPF" value="'+CPF+'">';
    const tdEmail = objEmailTd.innerHTML = '<input class="input-td" type="email" name="email" value="'+email+'">';
    const tdTelefone = objTelefoneTd.innerHTML = '<input class="input-td" type="text" name="telefone" value="'+telefone+'">';
    const tdCelular = objCelularTd.innerHTML = '<input class="input-td" type="text" name="celular" value="'+celular+'">';
    
    //escondendo os botoes editar e excluir da tabela
    const botaoEditar = document.getElementById('editarHospede').style.display = 'none';
    const botaoExcluir = document.getElementById('excluirHospede').style.display = 'none';
    
    //criando o botao salvar
    const botaoSalvar = document.createElement('button');
    botaoSalvar.innerHTML = 'Salvar';
    var atributoClass = document.createAttribute("class");       
    atributoClass.value = "BotaoSalvarEdit";                          
    botaoSalvar .setAttributeNode(atributoClass);
    var tabela = document.getElementsByClassName('detalhes-hospede')[0];
    tabela.insertBefore(botaoSalvar , tabela.childNodes[2]);
    
    //criando botao cancelar 
    const botaoCancelar = document.createElement('button');
    botaoCancelar.innerHTML = 'Cancel';
    var atributoClass = document.createAttribute("class");       
    atributoClass.value = "BotaoSalvarEdit";                           
    botaoCancelar.setAttributeNode(atributoClass);
    var tabela = document.getElementsByClassName('detalhes-hospede')[0];
    tabela.insertBefore(botaoCancelar, tabela.childNodes[2]);
    
    //carregando a pagina após clicar em cancelar
    botaoCancelar.onclick = function(){
        location.reload();
    }
    //salvando alterações
    botaoSalvar.onclick = function(){
        const tdValor = document.getElementsByClassName('input-td');
        const novoNome = tdValor[0].value;
        const novoCPF = tdValor[1].value;
        const novoEmail = tdValor[2].value;
        const novoTelefone = tdValor[3].value;
        const novoCelular = tdValor[4].value;
        const resposta = confirm("Deseja salvar alterações?");
        if(resposta == true){
            if(window.XMLHttpRequest){
                var ajax = new XMLHttpRequest();
            }else{
                var ajax = new ActiveXObject("Microsoft.XMLHTTP");
            }
            ajax.open('POST', 'server/editar-hospede.php', true);
            ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            ajax.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    var resposta = JSON.parse(this.response);
                    if(resposta.deucerto){
                        alert(resposta.mensagem);
                        location.reload();
                    }else{
                        alert(resposta.mensagem);
                    }
                }
            };
            ajax.send('id='+id+'&nome='+novoNome+'&cpf='+novoCPF+'&email='+novoEmail+'&telefone='+novoTelefone+'&celular='+novoCelular);
        }else{
            alert('Alterações cancelada');
            location.reload();
        }
    }
}

//Esta função desativa o hospede para não ser mostrado mais na lista de hospedes 
function excluirHospede(id){
    var resposta = confirm("Deseja excluir este hospede?");
    if(resposta == true){
        if(window.XMLHttpRequest){
                var ajax = new XMLHttpRequest();
            }else{
                var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
        ajax.open('POST', 'server/excluir-hospede-submit.php', true);
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var resposta = JSON.parse(this.response);
                if(resposta.deucerto){
                    alert(resposta.mensagem);
                    window.location.href = urlHostServer+'lista-hospedes.php';
                }else{
                    alert(resposta.mensagem);
                }
            }
        };
        ajax.send('id='+id);
    }else{
        alert('Exclusão cancelada');
    }
}