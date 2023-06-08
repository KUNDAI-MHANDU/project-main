let text = document.getElementById('text');
let bird1 = document.getElementById('bird1');
let bird2 = document.getElementById('bird2');
let rocks = document.getElementById('rocks');
let forest = document.getElementById('forest');
let scroll = document.querySelector('.scroll');

rocks.style.transform = 'translateY(-8%)';

window.addEventListener('scroll', function(){

    let value = window.scrollY;

    if (value < 150) {
        text.style.marginBottom = value * -0.5 + '%';
        rocks.style.top = value * 1.5 + 'px';
        forest.style.top = value * 1.25 + 'px';
    }
    bird1.style.top = value * -0.5 + 'px';
    bird1.style.left = value * 0.5 + 'px';
    bird2.style.top = value * -0.5 + 'px';
    bird2.style.left = value * -1.5 + 'px';
    
    // rocks.style.left = value1 * 1.5 + 'px';
})