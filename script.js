document.querySelectorAll('input[name=page]').forEach(r => {
    r.addEventListener('click', e => {
        let pageCheck = e.target.attributes['value'].value;
        if(pageCheck == 1){
            document.querySelectorAll('.p1').forEach(p => p.classList.remove('sleep'));
            document.querySelectorAll('.p2').forEach(p => p.classList.add('sleep'));
        }
        if(pageCheck == 2){
            document.querySelectorAll('.p2').forEach(p => p.classList.remove('sleep'));
            document.querySelectorAll('.p1').forEach(p => p.classList.add('sleep'));
        }
    })
})

document.querySelectorAll('#profile tbody tr').forEach(r => {
    r.addEventListener('mouseenter', e => {
        document.querySelector('#details').innerHTML = "";
        let headers = document.querySelectorAll('#profile thead tr:first-child th');
        let stock = e.target.children;
        for(let i = 1; i < stock.length; i++){
            document.querySelector('#details').innerHTML += headers[i].innerHTML + ' : ' + stock[i].innerHTML + "</br>";
        }
    })
})