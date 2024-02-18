// создание контейнеров с контентом из localstorage
function createDivNote(keyIndex, index) {
    // родительский контейнер
    let note = document.querySelector('.list-notes');
    let value = localStorage.getItem(keyIndex);

    // вложенный контейнер
    let divCont = document.createElement('div');
    divCont.className = 'note-container';
    divCont.id = 'div-cont' + keyIndex;
    divCont.classList.add('p-animation');
    // divCont.classList.remove('show');

    // контейнер с кнопками
    let divBtn = document.createElement('div');
    divBtn.className = 'btn-container';

    // параграф
    let p = document.createElement('p');
    p.id = 'paragraf' + keyIndex;
    p.textContent = `${Number(index) + 1}: ${value}`;

    // скрытое поле для ввода
    let inp = document.createElement('input');
    inp.style = 'display: none';                
    inp.id = 'inp-area' + keyIndex;

    // кнопки редактировать, удалить, скрытая сохранить
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

    // сортируем массив по возрастанию
    keysArr = keysArr.sort(function(a, b) {
        return a - b;
        });

    // вызываем последовательно циклично функцию создания контейнера
    for (let i = 0; i < localStorage.length; i++) {
        createDivNote(keysArr[i], i);

        animation(keysArr[i]);
    };
};
// вызываем функцию вывода
outputNote();

// функция анимации
function animation(keyIndex) {   
    
    let div_cont = document.getElementById('div-cont' + keyIndex);

    if(div_cont.classList.contains('show')) {

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
        // вызываем функцию анимации через таймаут
        setTimeout(()=> animation(l), 500);
        // обновим страницу для корректного отображения порядковых номеров
        setTimeout(()=> location.reload(), 2200);
    };
});