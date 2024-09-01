function counter (count) {
    let curCnt = document.getElementById('sp-style');
    curCnt.textContent = +(curCnt.textContent) + count;

    let buttonPlus = document.getElementById('btn+');
    let buttonMinus = document.getElementById('btn-');

    let limitDiv = document.getElementById('limited');

    if (curCnt.textContent > 0) {
        curCnt.style.backgroundColor = 'yellow';
    }
    else if (curCnt.textContent < 0) {
        curCnt.style.backgroundColor = 'green';
    }
    else curCnt.style.backgroundColor = 'red';


    if (curCnt.textContent > 9) {
        buttonPlus.setAttribute('disabled', true);
        limitDiv.classList.remove('dspl-none');
    }
    else if (curCnt.textContent < -9) {
        buttonMinus.setAttribute('disabled', true);
        limitDiv.classList.remove('dspl-none');
    }
    else {
        buttonMinus.removeAttribute('disabled');
        buttonPlus.removeAttribute('disabled');
        limitDiv.classList.add('dspl-none');
    }
};
