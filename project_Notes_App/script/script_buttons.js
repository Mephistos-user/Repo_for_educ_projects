// функция удаления
function delNote(id) {
    // получаем число из idName
    let cn = id.match(/\d/g).join('');
    
    if(confirm('Вы уверены, что хотите удалить запись?')) {
        animation(cn);
        setTimeout(()=> document.getElementById(id).parentElement.parentElement.remove(), 1500);
        localStorage.removeItem(cn);
        // обновим страницу для корректного отображения порядковых номеров
        setTimeout(()=> location.reload(), 1500);
    };
};

// функция редактирования
function editNote(id) {
    // получаем число из idName
    let cn = id.match(/\d/g).join('');

    // получаем родительский контейнер
    let parent = document.getElementById(id).parentElement.parentElement;

    let paragrafDel = parent.firstChild;
    let btnDivDel = parent.lastChild;

    // прячем параграф и кнопки
    paragrafDel.style = 'display: none;';
    btnDivDel.firstChild.style = 'display: none;';
    btnDivDel.lastChild.style = 'display: none;';

    // "достаем" поле для ввода и кнопку "Ок"
    let inp = document.getElementById('inp-area' + cn);
    inp.style = 'display: block;'
    inp.value = localStorage.getItem(cn);

    let btnOk = document.getElementById('btn-ok' + cn);
    btnOk.style = 'display: block; color: #FFFFFF; background-color: #47a12c;'
};

// функция сохранения
function saveNote(id) {

    let cn = id.match(/\d/g).join('');

    let btnOk = document.querySelector('#btn-ok' + cn);
    btnOk.style = 'display: none;';

    let btnEdit = document.querySelector('#btn-edit' + cn);
    btnEdit.style = 'display: block;';

    let btnDelete = document.querySelector('#btn-del' + cn);
    btnDelete.style = 'display: block;';

    let inputArea = document.querySelector('#inp-area' + cn);
    inputArea.style = 'display: none;';

    localStorage.setItem(cn, inputArea.value);

    let p = document.querySelector('#paragraf' + cn);
    p.style = 'display: block;';
    p.textContent = `${+cn - 2}: ` + localStorage.getItem(cn);

    location.reload();
};

