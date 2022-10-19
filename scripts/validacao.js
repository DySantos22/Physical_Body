var nome="", email="", cpf="";
var celular="", nascimento="", termo="";
function validar(){
    
   //validacao dos dados do cadastro
    var x, caixa=false,  erro=false;
    if(document.formulario.nome.value==""){
        alert("Por favor, preencha o seu Nome!");
        document.formulario.nome.focus();
        erro=true;
    }
    else
        nome=document.formulario.nome.value
    
    if(document.formulario.email.value==""){
        alert("Por favor, preencha seu Email!");
        document.formulario.email.focus();
        erro=true;
    }
    else
        email=document.formulario.email.value;

    if(document.formulario.cpf.value==""){
        alert("Por favor, preencha o CPF!");
        document.formulario.cpf.focus();		
       erro=true;
    }else
        cpf=document.formulario.cpf.value;

        if(document.formulario.celular.value==""){
           alert("Por favor, preencha o seu Celular!");
           document.formulario.celular.focus();
           erro=true;
       }
       else
           celular=document.formulario.celular.value;

               if(document.formulario.nascimento.value==""){
                   alert("Por favor, preencha a Data de Nascimento!");
                   document.formulario.nascimento.focus();
                   erro=true;
               }
               else
               nascimento=document.formulario.nascimento.value;
    
    if(!document.formulario.sexo[0].checked && !document.formulario.sexo[1].checked && !document.formulario.sexo[2].checked){
       alert("Por favor, selecione seu Gênero!");
       erro=true;
    }

    //validacao da senha
    senha = document.formulario.senha.value;
    confirma_senha = document.formulario.confirma_senha.value;

    if (confirma_senha != senha){ 
        alert("As senhas não são iguais!");
        erro=true;
        document.getElementById("formulario").reset();
    }
    if(confirma_senha =="" || senha==""){
        alert("Por favor, Preencha sua senha!")
        erro=true;
    }

    //Confere se os termos estão aceitos
     if(document.formulario.termo.checked){
            caixa=true;
            termo=document.formulario.termo.value;
        }else{
        alert("Concorde com os termos para continuar!");
        erro=true;
        }

    if(erro==false){
        document.formulario.submit();
    }
}