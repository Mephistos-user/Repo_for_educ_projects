function counter (count) {
    let curCnt = document.querySelector('span');
    let cnt = Number(curCnt.textContent);
    cnt = cnt + count;
    curCnt.textContent = cnt;
    // span_style_change();

    if (elem.textContent > 0) {
        elem.style.backgroundColor = 'green';
    }
    else if (elem.textContent < 0) {
        elem.style.backgroundColor = 'yellow';
    }
    else elem.style.backgroundColor = 'white';


};

function span_style_change () {
    let elem = document.getElementsById('sp-style').Number(textContent);
    // elem.textContent = 'span_func';


    if (elem.textContent > 0) {
        elem.style.backgroundColor = 'green';
    }
    else if (elem.textContent < 0) {
        elem.style.backgroundColor = 'yellow';
    }
    else elem.style.backgroundColor = 'white';
};
// document.addEventListener('DOMContentLoaded', span_style_change());
