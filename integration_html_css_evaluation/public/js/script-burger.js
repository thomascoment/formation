const burgerElt = document.getElementById('burger')
const navElt = document.getElementById('hidden')
const arianneElt = document.getElementById('fil-arianne')
const chapoElt = document.getElementById('chapo')

burgerElt.addEventListener('click', function(){
    navElt.classList.toggle('hidden');
    arianneElt.classList.toggle('hidden');
    chapoElt.classList.toggle('hidden');

})