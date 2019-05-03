//Esta função edita as informações do hospede da tabela detalhes do hospede
function editarHospede(id){
    //seleciondo os td da tabela detalhes-hospede
    var objNome = document.getElementById('tdNome');
    var objCPF = document.getElementById('tdCPF');
    var objEmail = document.getElementById('tdEmail');
    var objTelefone = document.getElementById('tdTelefone');
    var objCelular = document.getElementById('tdCelular');
    
    //pegando os valores hospede na tabela detalhes-hospede
    var nome = objNome.innerHTML;
    var CPF = objCPF.innerHTML;
    var email = objEmail.innerHTML;
    var telefone = objTelefone.innerHTML;
    var celular = objCelular.innerHTML;
    
    //deixando a tabela editavel 
    var tdNome = objNome.innerHTML = '<input class="input-td" type="text" name="nome_completo" value="'+nome+'">';
    var tdCPF = objCPF.innerHTML = '<input class="input-td" type="text" name="CPF" value="'+CPF+'">';
    var tdEmail = objEmail.innerHTML = '<input class="input-td" type="email" name="email" value="'+email+'">';
    var tdTelefone = objTelefone.innerHTML = '<input class="input-td" type="text" name="telefone" value="'+telefone+'">';
    var tdCelular = objCelular.innerHTML = '<input class="input-td" type="text" name="celular" value="'+celular+'">';
    
    //escondendo os botoes editar e excluir da tabela
    document.getElementById('editarHospede').style.display = 'none';
    document.getElementById('excluirHospede').style.display = 'none';
    
    //criando o botao salvar
    var botao = document.createElement('button');
    botao.innerHTML = 'Salvar';
    var atributoClass = document.createAttribute("class");       // Create a "class" attribute
    atributoClass.value = "BotaoSalvarEdit";                           // Set the value of the class attribute
    botao.setAttributeNode(atributoClass);
    var tabela = document.getElementsByClassName('detalhes-hospede')[0];
    tabela.insertBefore(botao, tabela.childNodes[0]);
    
    //criando botao cancelar 
    var botaoCancelar = document.createElement('button');
    botaoCancelar.innerHTML = 'Cancel';
    var atributoClass = document.createAttribute("class");       // Create a "class" attribute
    atributoClass.value = "BotaoSalvarEdit";                           // Set the value of the class attribute
    botaoCancelar.setAttributeNode(atributoClass);
    var tabela = document.getElementsByClassName('detalhes-hospede')[0];
    tabela.insertBefore(botaoCancelar, tabela.childNodes[0]);
    
    //carregando a pagina após clicar em cancelar
    botaoCancelar.onclick = function(){
        location.reload();
    }
    
    //salvando alterações
    botao.onclick = function(){
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
            ajax.open('GET', 'server/editar-hospede.php?id='+id+'&nome='+novoNome+'&cpf='+novoCPF+'&email='+novoEmail+'&telefone='+novoTelefone+'&celular='+novoCelular, true);
            ajax.send();
            
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
        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var resposta = JSON.parse(this.response);
                if(resposta.deucerto){
                    alert(resposta.mensagem);
                    window.location.href = "http://localhost/projeto-gestao-hoteleira/lista-hospedes.php";
                }else{
                    alert(resposta.mensagem);
                }
            }
        };
        ajax.open('GET', 'server/excluir-hospede-submit.php?id='+id, true);
        ajax.send();
    }else{
        alert('Exclusão cancelada');
    }
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
