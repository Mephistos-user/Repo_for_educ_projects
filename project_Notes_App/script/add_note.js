// функция добавления записи

function add_note(value) {
    let key = 0;
    this.value = value;
    area.oninput = () => {
        localStorage.setItem(key, this.value);
    }
    key++;
    alert('Заметка добавлена')
    // добавить обновление документа
};


// функция редактирования


// функция удаления
function delNote() {
    localStorage.removeItem(key);
}

// функция вывода

function outputNote() {
    let note = document.querySelector('.list-note');

    for (let i = 0; i < 5; i++) {
        let p = document.createElement('p');
        // let key = localStorage.key(i);
        p.textContent = `${i}`;
        note.appendChild(p);



    // for (let i = 0; i < localStorage.length; i++) {
    //     let p = document.createElement('p');
    //     let key = localStorage.key(i);
    //     p.textContent = `${key}:${localStorage.getItem(key)}`;
        // let key = localStorage.key(i);
        // note.appendChild(p);

        // console.log(`${key}:${localStorage.getItem(key)}`);
    }
}
