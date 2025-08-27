/**
 * Ce programme est un jeu inspiré du "plus ou moins".
 * Le programme va choisir un chiffre aléatoirement entre 1 et 100
 *  et l'utilisateur aura 10 essais pour trouver le bon chiffre.
 * Le programme répondra avec des instructions pour guider l'utilisateur dans sa recherche.
 * @author  Thomas
 */


while (true) {

    let nombre = Math.floor(Math.random() * 100) + 1;
    let choixNombre;
    let compteur = 0;
    console.log("Un nouveau nombre a été généré")

    while (true) {
        choixNombre = Number(prompt("Devinez le nombre"));
        console.log(choixNombre)

        compteur++
        if (choixNombre < nombre) {
            console.log("C'est plus !");
        } else if (choixNombre > nombre) {
            console.log("C'est moins !");
        } else if (choixNombre = nombre) {
            console.log(`C'est gagné ! Vous avez réussi en ${compteur} essais`);
            break;
        }
    }
}