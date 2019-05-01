function editarHospede(id){
    
            
    
    
    
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
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
