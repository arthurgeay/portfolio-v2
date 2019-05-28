var input = document.querySelector('#dateBirth');


input.addEventListener('focus', function () {
    input.setAttribute('type', 'date');
});

document.querySelector('#dateBirth').addEventListener('blur', function() {
    if(input.value == '') {
        input.setAttribute('type', 'text');
    }
});