let btnMinus = document.querySelector('.btn-minus');
let btnPlus = document.querySelector('.btn-plus');

btnMinus.addEventListener('click', () => counter(-1));
btnPlus.addEventListener('click', () => counter(1));

function counter (count) {

    console.log(count);
    let curCnt = document.getElementById('sp-style');
    let cnt = Number(curCnt.textContent);
    cnt = cnt + count;
    curCnt.textContent = cnt;

    let buttonPlus = document.querySelector('.btn-plus');
    let buttonMinus = document.querySelector('.btn-minus');

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
