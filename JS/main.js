// Natanael: Página X-Men Children of the Athon
function openPopup() {
    document.getElementById('popup').style.display = 'flex';
    document.getElementById('overlay').style.display = 'block';
}

function openPopup1() {
    document.getElementById('popup1').style.display = 'flex';
    document.getElementById('overlay1').style.display = 'block';
}

function openPopup2() {
    document.getElementById('popup2').style.display = 'flex';
    document.getElementById('overlay2').style.display = 'block';
}

function openPopup3() {
    document.getElementById('popup3').style.display = 'flex';
    document.getElementById('overlay3').style.display = 'block';
}

function openPopup4() {
    document.getElementById('popup4').style.display = 'flex';
    document.getElementById('overlay4').style.display = 'block';
}

function openPopup5() {
    document.getElementById('popup5').style.display = 'flex';
    document.getElementById('overlay5').style.display = 'block';
}

function openPopup6() {
    document.getElementById('popup6').style.display = 'flex';
    document.getElementById('overlay6').style.display = 'block';
}

function openPopup7() {
    document.getElementById('popup7').style.display = 'flex';
    document.getElementById('overlay7').style.display = 'block';
}

function openPopup8() {
    document.getElementById('popup8').style.display = 'flex';
    document.getElementById('overlay8').style.display = 'block';
}

function openPopup9() {
    document.getElementById('popup9').style.display = 'flex';
    document.getElementById('overlay9').style.display = 'block';
}

function openPopup10() {
    document.getElementById('popup10').style.display = 'flex';
    document.getElementById('overlay10').style.display = 'block';
}

function openPopup11() {
    document.getElementById('popup11').style.display = 'flex';
    document.getElementById('overlay11').style.display = 'block';
}

function openPopup12() {
    document.getElementById('popup12').style.display = 'flex';
    document.getElementById('overlay12').style.display = 'block';
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

function closePopup1() {
    document.getElementById('popup1').style.display = 'none';
    document.getElementById('overlay1').style.display = 'none';
}

function closePopup2() {
    document.getElementById('popup2').style.display = 'none';
    document.getElementById('overlay2').style.display = 'none';
}

function closePopup3() {
    document.getElementById('popup3').style.display = 'none';
    document.getElementById('overlay3').style.display = 'none';
}

function closePopup4() {
    document.getElementById('popup4').style.display = 'none';
    document.getElementById('overlay4').style.display = 'none';
}

function closePopup5() {
    document.getElementById('popup5').style.display = 'none';
    document.getElementById('overlay5').style.display = 'none';
}

function closePopup6() {
    document.getElementById('popup6').style.display = 'none';
    document.getElementById('overlay6').style.display = 'none';
}

function closePopup7() {
    document.getElementById('popup7').style.display = 'none';
    document.getElementById('overlay7').style.display = 'none';
}

function closePopup8() {
    document.getElementById('popup8').style.display = 'none';
    document.getElementById('overlay8').style.display = 'none';
}

function closePopup9() {
    document.getElementById('popup9').style.display = 'none';
    document.getElementById('overlay9').style.display = 'none';
}

function closePopup10() {
    document.getElementById('popup10').style.display = 'none';
    document.getElementById('overlay10').style.display = 'none';
}

function closePopup11() {
    document.getElementById('popup11').style.display = 'none';
    document.getElementById('overlay11').style.display = 'none';
}

function closePopup12() {
    document.getElementById('popup12').style.display = 'none';
    document.getElementById('overlay12').style.display = 'none';
}

// Natanael: Página de Login
function validaForm(){
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    const erroUsername = document.getElementById('erro_username');
    const erroPassword = document.getElementById('erro_password');

    erroUsername.textContent = '';
    erroPassword.textContent = '';

    const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\w+([-.]\w+)*$/;
    let cadValid = true; 

    if (username === '') {
        erroUsername.textContent = '*Campo Obrigatório';
        cadValid = false;
    } else if (!emailRegex.test(username)) {
        erroUsername.textContent = '*Formato Inválido';
        cadValid = false;
    } else if (password === '') {
        erroPassword.textContent = '*Campo Obrigatório';
        cadValid = false;
    } else if (password.length < 6) {
        erroPassword.textContent = '*Digite no mínimo 6 caracteres';
        cadValid = false;
    }

    return cadValid;
}

// Rogério: Página de Cadastro
function escolhaGenre(){
    var result = '';
    const items = document.getElementsByClassName('genre');
    for (var i = 0; i < items.length; i++){
        if (items[i].checked){
            result = items[i].value;
            break;
        }
    }
    return result;
}

function cadastraForm(){
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const phone = document.getElementById('phone').value;
    const genre = escolhaGenre();

    const erroName = document.getElementById('erro_name');
    const erroEmail = document.getElementById('erro_email');
    const erroPassword = document.getElementById('erro_password');
    const erroPhone = document.getElementById('erro_phone');
    const erroGenre = document.getElementById('erro_genre');

    erroName.textContent = '';
    erroEmail.textContent = '';
    erroPassword.textContent = '';
    erroPhone.textContent = '';
    erroGenre.textContent = '';

    const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\w+([-.]\w+)*$/;
    const telRegex = /^\d{11}$/;
    let cadValid = true; 

    if (name === '' || /\d/.test(name)){
        erroName.textContent = '*Campo Obrigatório';
        cadValid = false;
    } else if (name.length < 3){
        erroName.textContent = '*Digite ao menos 3 caracteres';
        cadValid = false;
    } else if (email === ''){
        erroEmail.textContent = '*Campo Obrigatório';
        cadValid = false;
    } else if (!emailRegex.test(email)){
        erroEmail.textContent = '*Formato Inválido';
        cadValid = false;
    } else if (password === ''){
        erroPassword.textContent = '*Campo Obrigatório';
        cadValid = false;
    } else if (password.length < 6){
        erroPassword.textContent = '*Digite no mínimo 6 caracteres';
        cadValid = false;
    } else if (phone == ''){
        erroPhone.textContent = '*Campo Obrigatório';
        cadValid = false;
    } else if (!telRegex.test(phone)){
        erroPhone.textContent = '*Valor Inválido';
        cadValid = false;
    } else if (genre === '') {
        erroGenre.textContent = '*Campo Obrigatório';
        cadValid = false;
    }

    return cadValid;
}
