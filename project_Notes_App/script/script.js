//  window.addEventListener('load', function(){
    // вывод заметок из localStorage в документ
    function createDivNote(keyIndex, index) {
        let note = document.querySelector('.list-notes');
        let value = localStorage.getItem(keyIndex);

        let divCont = document.createElement('div');
        divCont.className = 'note-container';
        divCont.id = 'div-cont' + keyIndex;
        divCont.classList.add('p-animation');
        divCont.classList.remove('show');

        let divBtn = document.createElement('div');
        divBtn.className = 'btn-container';

        let p = document.createElement('p');
        p.id = 'paragraf' + keyIndex;
        p.textContent = `${Number(index) + 1}: ${value}`;

        let inp = document.createElement('input');
        inp.style = 'display: none';                
        inp.id = 'inp-area' + keyIndex;

        let btnEdit = document.createElement('button');
        btnEdit.textContent = 'Edit';
        btnEdit.id = 'btn-edit' + keyIndex;
        btnEdit.setAttribute('onclick', 'editNote(this.id)');

        let btnDelete = document.createElement('button');
        btnDelete.textContent = 'Del';
        btnDelete.id = 'btn-del' + keyIndex;
        // btnDelete.onclick = "delNote()"; // способ не работает
        btnDelete.setAttribute('onclick', 'delNote(this.id)');

        let btnOk = document.createElement('button');
        btnOk.textContent = 'Ok';
        btnOk.id = 'btn-ok' + keyIndex;
        btnOk.style = 'display: none;';
        btnOk.setAttribute('onclick', 'saveNote(this.id)');

        // создаем контейнер с вложенными элементами
        note.appendChild(divCont)
            .append(p, inp, divBtn)
            divBtn.append(btnEdit, btnOk, btnDelete);
    };




    






    // функция вывода
    function outputNote() { 

        // получаем массив ключей и сортируем
        let keysArr = Object.keys(localStorage);
        // сортируем массив
        keysArr = keysArr.sort(function(a, b) {
            return a - b;
            });
        // вызываем последовательно циклично функцию создания контейнера
        
        for (let i = 0; i < localStorage.length; i++) {
            // setTimeout(()=> createDivNote(keysArr[i], i), 500);
            createDivNote(keysArr[i], i);

            // let div_cont = document.getElementById('div-cont' + keysArr[i]);
            // div_cont.classList.add = 'show';
            // setTimeout(()=> animation(keysArr[i]), 1500);
            animation(keysArr[i])
        };

    };
    // setTimeout(()=> outputNote(), 500);
    outputNote();

function animation(keyIndex) {   
    console.log('animation function');
    
    let div_cont = document.getElementById('div-cont' + keyIndex);

    if(div_cont.classList.contains('show')) {
        // setTimeout(()=> div_cont.classList.remove('show'), 500);

        div_cont.classList.remove('show');

    } else {

        div_cont.classList.add('show');
    };
};

document.addEventListener('DOMContentLoaded', function(){

// функция добавления записи
const addBtn = document.querySelector('.btn-add');

addBtn.addEventListener('click', add_note);

function add_note() {
    const inputValue = document.querySelector('#areaAdd').value;

    console.log(inputValue);
    let l;    

    if (inputValue == '') {
        alert('Вы ничего не написали. Запись не сохранена.');
    } else {

        if (localStorage.length == 0) {
            l = 0;
        } else {
            let keysArr = Object.keys(localStorage);
            keysArr = keysArr.sort(function(a, b) {
                return b - a;
            });
            l = +(keysArr[0]) + 1;
        };
        localStorage.setItem(l, inputValue);

        createDivNote(l, localStorage.length - 1);


    };
    setTimeout(()=> animation(l), 500);
};

 // функция анимации
//  function animation() {   
//     // получаем массив ключей и сортируем
//     console.log('animation function');
//     let keysArr = Object.keys(localStorage);
//     console.log(keysArr);
//     // сортируем массив
//     keysArr = keysArr.sort(function(a, b) {
//         return a - b;
//         });
//     console.log(keysArr);

//     // вызываем последовательно циклично функцию создания контейнера
//     for (let i = 0; i < localStorage.length; i++) { 
//         // createDivNote(keysArr[i], i);
//         console.log(i);
//         let div_cont = document.getElementById('div-cont' + keysArr[i]);
//         // let div_cont = document.querySelector('#div-cont' + keysArr[i]);
//         console.log('div-cont' + keysArr[i]);
//         // div_cont.classList.add('p-animation');

//         // div_cont.classList.remove('show');
//         div_cont.classList.add('show');
//     };
// };

// animation();


// function animation(keyIndex) {   
//     console.log('animation function');
    
//     // let div_cont = document.getElementById('div-cont' + keysArr[i]);
//     let div_cont = document.getElementById('div-cont' + keyIndex);
//     // let div_cont = document.querySelector('#div-cont' + keysArr[i]);

//     // console.log('div-cont' + keysArr[i]);
//     console.log('div-cont' + keyIndex);
//     if('show' in div_cont.classList) {
//         div_cont.classList.remove('show');

//     } else {
//         div_cont.classList.add('show');

//     };


// };


// let keysArr = Object.keys(localStorage);
// // сортируем массив
// keysArr = keysArr.sort(function(a, b) {
//     return a - b;
//     });


// for (let i = 0; i < localStorage.length; i++) {
//     setTimeout(()=> animation(keysArr[i]), 1500);
//     // animation(keysArr[i]);
// };




});