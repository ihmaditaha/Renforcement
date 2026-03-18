// PARTIE 1 -- Documentation & Exercices Débutants

// Exercice 1 -- Manipulation d'objet
const fiche = { prenom: "Bob", nom: "Dupont", age: 34, ville: "Lyon" };

console.log(fiche.prenom + " " + fiche.nom);

function getProp(obj, cle) {
  return obj[cle] ?? "Inconnu";
}
console.log(getProp(fiche, "ville"));
console.log(getProp(fiche, "salaire"));

function renommerCle(obj, ancienne, nouvelle) {
  let newObj = { ...obj };
  newObj[ancienne] = nouvelle;
  return newObj;
}
console.log(renommerCle(fiche, "ville", "Paris"));
console.log(getProp(fiche, "ville"));

// Exercice 2 -- Parcourir un inventaire
const inventaire = {
  stylo: { prix: 1.5, stock: 200 },
  cahier: { prix: 3.5, stock: 85 },
  regle: { prix: 0.8, stock: 0 },
  compas: { prix: 8.5, stock: 12 },
};

console.log(Object.keys(inventaire));

Object.entries(inventaire).forEach(([produit, info]) => {
  console.log(`${produit} : ${info.prix * info.stock} DH`);
});

let prixSeuls = Object.fromEntries(
  Object.entries(inventaire).map(([produit, info]) => [produit, info.prix]),
);
console.log(prixSeuls);

// Exercice 3 -- Déstructuration en pratique

const commande = {
  id: "CMD-001",
  client: { nom: "Dupont", email: "dupont@mail.com" },
  total: 18.5,
  livree: false,
};

let { id, total } = commande;

// PARTIE 2 -- Challenges Intermédiaires

// Exercice I1 -- Fusionner des objets sans écrasement
function fusionProfonde(obj1, obj2) {
    
}
