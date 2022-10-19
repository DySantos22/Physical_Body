const block = document.querySelector("#nome");

block.addEventListener("keypress", function(e){

    if(!checkChar(e)){
        e.preventDefault();
    }


});

function checkChar(e){

    const char = String.fromCharCode(e.keyCode);

    const pattern = '[a-zA-ZãÃ´`áàÁÀúõÂâôÔíÍÊêç ]';

    if(char.match(pattern)){
        return true;
    }

}