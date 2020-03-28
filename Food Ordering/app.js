

function fdusershow(message){
    var div= document.createElement('div');
    div.classList.add('alert');
    div.appendChild(document.createTextNode(message));
    document.querySelector('.hx').insertAdjacentElement("afterend",div);
}

function signinalert(){
    var div=  document.createElement('div');
    div.classList.add('alert');
    div.appendChild(document.createTextNode('Username or Password not exists'));
 document.querySelector('.bu').insertAdjacentElement("afterend",div);   
}

function forgotalert(){
    var div=document.createElement('div');
    div.classList.add('alert');
    div.appendChild(document.createTextNode('Fill the Email or Phone number'));
    document.querySelector('.hx').insertAdjacentElement("afterend",div);
}