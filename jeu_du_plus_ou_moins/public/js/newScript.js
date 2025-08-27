/**
 * Ce programme est un jeu inspiré du "plus ou moins".
 * Le programme va choisir un chiffre aléatoirement entre 1 et 100
 * et l'utilisateur aura 10 essais pour trouver le bon chiffre.
 * Le programme répondra avec des instructions pour guider l'utilisateur dans sa recherche.
 * @author  Thomas
 * @param {1} min 
 * @param {100} max 
 * @returns 
 */

const genererNombre = (min, max) => {
    return Math.floor(Math.random() * (max - min * 1)) + min
}
const gagne = (nombre) => {
    console.log("Vous avez gagné. C'était bien le nombre " + nombreATrouver + " !")
}
const reponseElt = document.querySelector('.message .reponse')
const nombreATrouver = genererNombre(1, 100)
const historiqueElt = document.querySelector('historique-list')



console.log(nombreATrouver)

document.querySelector('form').addEventListener('submit', function (e) {
    e.preventDefault()
    const saisie = parseInt(e.target.saisie.value)

    let msg = ""

    if (saisie === nombreATrouver) {
        msg = 'Vous avez gagné'
        reponseElt.textContent = msg
    } else if (saisie > nombreATrouver) {
        reponseElt.textContent = saisie + ", est trop grand"
        let liElt = document.createElement('li')
        liElt.textContent = saisie + ", est trop grand"
    } else {
        reponseElt.textContent = saisie + ", est trop petit"
        let liElt = document.createElement('li')
        liElt.textContent = saisie + ", est trop grand"
        historiqueElt.prepend(liElt)
    }
})