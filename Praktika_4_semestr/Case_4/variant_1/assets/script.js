let btnMinus = document.querySelector('.btn-minus');
let btnPlus = document.querySelector('.btn-plus');

btnMinus.addEventListener('click', () => counter(-1));
btnPlus.addEventListener('click', () => counter(1));

function counter (count) {

    let spanElement = document.getElementById('sp-style');
    let spanElementContextNumber = Number(spanElement.textContent);
    spanElementContextNumber = spanElementContextNumber + count;
    spanElement.textContent = spanElementContextNumber;

    let limitDiv = document.getElementById('limited');

    if (spanElementContextNumber > 0) {
        spanElement.style.backgroundColor = 'yellow';
    }
    else if (spanElementContextNumber < 0) {
        spanElement.style.backgroundColor = 'green';
    }
    else spanElement.style.backgroundColor = 'red';


    if (spanElementContextNumber > 9) {
        btnPlus.setAttribute('disabled', true);
        limitDiv.classList.remove('dspl-none');
    }
    else if (spanElementContextNumber < -9) {
        btnMinus.setAttribute('disabled', true);
        limitDiv.classList.remove('dspl-none');
    }
    else {
        btnMinus.removeAttribute('disabled');
        btnPlus.removeAttribute('disabled');
        limitDiv.classList.add('dspl-none');
    }
};
