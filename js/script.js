const urlHostServ = 'http://localhost/Projeto-Gestao-Hoteleira/lista-hospedes.php';


function criarHospede(){
    
}
//Esta função edita as informações do hospede da tabela detalhes do hospede
function editarHospede(id){
    //seleciondo os td da tabela detalhes-hospede
    const objNome = document.getElementById('tdNome');
    const objCPF = document.getElementById('tdCPF');
    const objEmail = document.getElementById('tdEmail');
    const objTelefone = document.getElementById('tdTelefone');
    const objCelular = document.getElementById('tdCelular');
    
    //pegando os valores hospede na tabela detalhes-hospede
    const nome = objNome.innerHTML;
    const CPF = objCPF.innerHTML;
    const email = objEmail.innerHTML;
    const telefone = objTelefone.innerHTML;
    const celular = objCelular.innerHTML;
    
    //deixando a tabela editavel 
    const tdNome = objNome.innerHTML = '<input class="input-td" type="text" name="nome_completo" value="'+nome+'">';
    const tdCPF = objCPF.innerHTML = '<input class="input-td" type="text" name="CPF" value="'+CPF+'">';
    const tdEmail = objEmail.innerHTML = '<input class="input-td" type="email" name="email" value="'+email+'">';
    const tdTelefone = objTelefone.innerHTML = '<input class="input-td" type="text" name="telefone" value="'+telefone+'">';
    const tdCelular = objCelular.innerHTML = '<input class="input-td" type="text" name="celular" value="'+celular+'">';
    
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
        var tdValor = document.getElementsByClassName('input-td');
        var novoNome = tdValor[0].value;
        var novoCPF = tdValor[1].value;
        var novoEmail = tdValor[2].value;
        var novoTelefone = tdValor[3].value;
        var novoCelular = tdValor[4].value;
        var resposta = confirm("Deseja salvar alterações?");
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
                    window.location.href = urlHostServ;
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
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
