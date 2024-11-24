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

function validaForm(){
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    const erroUsername = document.getElementById('erro_username');
    const erroPassword = document.getElementById('erro_password');

    erroUsername.textContent = '';
    erroPassword.textContent = '';

    let cadValid = true; 

    if (username === ''){
        erroUsername.textContent = '*Campo Obrigatório';
        cadValid = false;
    } else if (password === ''){
        erroPassword.textContent = '*Campo Obrigatório';
        cadValid = false;
    }

    return cadValid;
}

// function escolhaGenre(){
//     var result = '';
//     const items = document.getElementsByName('genre');
//     for (var i = 0; i < items.length; i++){
//         if (items[i].checked){
//             result = items[i].value;
//             break;
//         }
//     }
//     return result;
// }

// function cadastraForm(){
//     const name = document.getElementById('name').value;
//     const surname = document.getElementById('surname').value;
//     const cadEmail = document.getElementById('cademail').value;
//     const password = document.getElementById('cad_password').value;
//     const password2 = document.getElementById('cad_password_2').value;
//     const age = document.getElementById('age_cad').value;
//     const genre = document.getElementsByName('genre').value;

//     const erroName = document.getElementById('erro_name');
//     const erroSurname = document.getElementById('erro_surname');
//     const erroCadEmail = document.getElementById('erro_cademail');
//     const erroPwd = document.getElementById('erro_cadpassword');
//     const erroPwd2 = document.getElementById('erro_cadpassword2');
//     const erroAge = document.getElementById('erro_age');
//     const erroGenre = document.getElementById('errogenre');

//     erroName.textContent = '';
//     erroSurname.textContent = '';
//     erroCadEmail.textContent = '';
//     erroPwd.textContent = '';
//     erroPwd2.textContent = '';
//     erroAge.textContent = '';
//     erroGenre.textContent = '';


    
//     const msg = escolhaGenre();
//     let cadValid = true; 

//     if (name === '' || /\d/.test(name)){
//         erroName.textContent = '*Campo Obrigatório';
//         cadValid = false;
//     } else if (surname === '' || /\d/.test(surname)){
//         erroSurname.textContent = '*Campo Obrigatório';
//         cadValid = false;
//     } else if (cadEmail === ''){
//         erroCadEmail.textContent = '*Campo Obrigatório';
//         cadValid = false;
//     } else if (password === ''){
//         erroPwd.textContent = '*Campo Obrigatório';
//         cadValid = false;
//     } else if (password2 === ''){
//         erroPwd2.textContent = '*Campo Obrigatório';
//         cadValid = false;
//     } else if (age === ''){
//         erroAge.textContent = '*Campo Obrigatório';
//         cadValid = false;
//     } else if (password != password2){
//         erroPwd2.textContent = '*Senhas Diferentes!';
//         cadValid = false;
//     } else if (msg == ''){
//         erroGenre.textContent = '*Campo Obrigatório!';
//         cadValid = false;
//     }

//     return cadValid;
// }
