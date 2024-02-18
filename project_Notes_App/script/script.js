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
    btnEdit.textContent = '\u270F\uFE0F';
    btnEdit.id = 'btn-edit' + keyIndex;
    btnEdit.setAttribute('onclick', 'editNote(this.id)');
    btnEdit.classList.add('btn-edit');

    let btnDelete = document.createElement('button');
    btnDelete.textContent = '\u274C';
    btnDelete.id = 'btn-del' + keyIndex;
    // btnDelete.onclick = "delNote()"; // способ не работает
    btnDelete.setAttribute('onclick', 'delNote(this.id)');
    btnDelete.classList.add('btn-del');

    let btnOk = document.createElement('button');
    btnOk.textContent = '\u2714\uFE0F';
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
    let keysArr = keyArrAndSort();
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

// функция получения массива ключей и его сортировки
function keyArrAndSort() {
    // получаем массив ключей
    // let keysArr = Object.keys(localStorage);

    // // сортируем массив по возрастанию
    // keysArr = keysArr.sort(function(a, b) {
    //     return a - b;
    //     });
    // return keysArr;

    // другой вариант
    return Object.keys(localStorage).sort(function(a, b) {
        return a - b;
        });
}

document.addEventListener('DOMContentLoaded', function(){

    // функция добавления записи
    const addBtn = document.querySelector('.btn-add');

    addBtn.addEventListener('click', add_note);

    function add_note() {
        const inputValue = document.querySelector('#areaAdd').value;

        let keyAdd; // значение ключа добавляемой записи

        if (inputValue == '') {
            alert('Вы ничего не написали. Запись не сохранена.');
            return 0;
        } else {
            if (localStorage.length == 0) {
                keyAdd = 0;
            } else {
                // вызов функции получения массива ключей
                let keysArr = keyArrAndSort();

                keyAdd = +(keysArr[localStorage.length - 1]) + 1;
            };
            localStorage.setItem(keyAdd, inputValue);

            createDivNote(keyAdd, localStorage.length - 1);

            // вызываем функцию анимации через таймаут
            setTimeout(()=> animation(keyAdd), 500);

            // обновим страницу для корректного отображения порядковых номеров
            setTimeout(()=> location.reload(), 2200);  
        };
    };
});