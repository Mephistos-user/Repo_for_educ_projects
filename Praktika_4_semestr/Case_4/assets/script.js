let cnt = 0;
document.addEventListener('click', function() {
// function button_click () {
    // let cnt = 0;
    let curCnt = document.querySelector('span');
    let btnOnClck = document.querySelectorAll('button');

    if (btnOnClck.className == 'btn-') {
        // let sp = document.createAttribute('span');
        cnt--;
        curCnt.textContent = cnt;
        // sp.textContent = `${cnt}`;
        // btnOnClck.append(sp);

    }
    else {
        cnt++;
        curCnt.textContent = cnt;
    }
// };
});