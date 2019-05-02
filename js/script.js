function editarHospede(id){
    
    //pegando os valores hospede na tabela 
    var nome = document.getElementById('tdNome').innerHTML;
    var CPF = document.getElementById('tdCPF').innerHTML;
    var email = document.getElementById('tdEmail').innerHTML;
    var telefone = document.getElementById('tdTelefone').innerHTML;
    var celular = document.getElementById('tdCelular').innerHTML;
    
    //deixando a tabela editavel 
    
    var tdNome = document.getElementById('tdNome').innerHTML = '<input style="width:100%;height:100%;" type="text" name="nome_completo" value="'+nome+'">';
    var tdCPF = document.getElementById('tdCPF').innerHTML = '<input style="width:100%;height:100%;" type="text" name="CPF" value="'+CPF+'">';
    var tdEmail = document.getElementById('tdEmail').innerHTML = '<input style="width:100%;height:100%;" type="text" name="email" value="'+email+'">';
    var tdTelefone = document.getElementById('tdTelefone').innerHTML = '<input style="width:100%;height:100%;" type="text" name="telefone" value="'+telefone+'">';
    var tdCelular = document.getElementById('tdCelular').innerHTML = '<input style="width:100%;height:100%;" type="text" name="celular" value="'+celular+'">';
    
    document.getElementById('editarHospede').style.display = 'none';
    document.getElementById('excluirHospede').style.display = 'none';
    
    var botao = document.createElement('button');
    botao.innerHTML = 'Salvar';
    var atributo = document.createAttribute("class");       // Create a "class" attribute
    atributo.value = "BotaoSalvarEdit";                           // Set the value of the class attribute
    botao.setAttributeNode(atributo);
    var tabela = document.getElementsByClassName('detalhes-hospede')[0];
    
    tabela.insertBefore(botao, tabela.childNodes[0]);
    
    
    
    
    
    
    
    
    
    
}

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
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
