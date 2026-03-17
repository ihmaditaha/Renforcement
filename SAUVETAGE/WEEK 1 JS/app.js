// EXERCICE 1
let fruits = ["pomme","banane","orange"];
console.log(fruits[1]);

// EXERCICE 2
let couleurs = ["rouge", "bleu", "vert"];
couleurs.push('violet');
console.log(couleurs.length);

// EXERCICE 3
let personne ={
    nom:'Alice',
    age:25,
    ville:'Paris',
}
console.log(personne.nom);

// EXERCICE 4
let animaux = ["chat", "chien", "lapin", "tortue"];
for (let i = 0;i<animaux.length;i++) {
    console.log(animaux[i]);
}
// EXERCICE 5
let courses = [
{ nom: "Pain", prix: 14 },
{ nom: "Lait", prix: 11 },
{ nom: "Oeufs", prix: 45 }
];
let total = 0;
for (let i = 0; i < courses.length; i++) {
    total += courses[i].prix;
}
// BONUS
let produit = {
    nom:'Café',
    prix:3.5,
    categorie:'boisson',
}
console.log(`Le produit ${produit.nom} coûte ${produit.prix} euros (catégorie : ${produit.categorie})`);
