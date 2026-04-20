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
let {
  client: { nom },
} = commande;
let { total: montant, livree: estLivree } = commande;

function resumeCommande({ id, client, total }) {
  return `Commande ${id} - ${client.nom} - ${total} EUR`;
}

// Exercice 4 -- CRUD sur un tableau d'objets
let catalogue = [
  { id: 1, nom: "Stylo bille", prix: 1.2, stock: 150 },
  { id: 2, nom: "Cahier A4", prix: 3.5, stock: 45 },
  { id: 3, nom: "Surligneur", prix: 2.1, stock: 80 },
  { id: 4, nom: "Post-it", prix: 3.8, stock: 60 },
  { id: 5, nom: "Ciseaux", prix: 6.3, stock: 20 },
];

function ajouterProduit(catalogue, produit) {
  let { id } = [...catalogue].sort((a, b) => b.id - a.id)[0];
  id++;
  let updatedCatalogue = [...catalogue, { id, ...produit }];
  return updatedCatalogue;
}

function rechercherParNom(catalogue, terme) {
  let found = catalogue.filter((item) =>
    item.nom.toLowerCase().includes(terme.toLowerCase()),
  );
  return found;
}

function modifierPrix(catalogue, id, nouveauPrix) {
  let produit = catalogue.find((produit) => produit.id === id);
  let updatedCatalogue = catalogue.map((produit) =>
    produit.id == id ? { ...produit, prix: nouveauPrix } : produit,
  );
  // let updatedCatalogue = [...catalogue, { ...produit, prix: nouveauPrix }];
  return updatedCatalogue;
}

function supprimerProduit(catalogue, id) {
  let updatedCatalogue = catalogue.filter((item) => item.id !== id);
  return updatedCatalogue;
}

let catalogue1 = ajouterProduit(catalogue, { nom: "it", prix: 3.5, stock: 70 });
let catalogue2 = modifierPrix(catalogue, 2, 5.6);
let catalogue3 = supprimerProduit(catalogue, 1);

console.table(catalogue);
console.table(catalogue1);
console.table(catalogue2);
console.table(catalogue3);

console.log(rechercherParNom(catalogue, "tylo"));

// PARTIE 2 -- Challenges Intermédiaires

// Exercice I1 -- Fusionner des objets sans écrasement
function fusionProfonde(obj1, obj2) {
  let obj = {};
  for (key in obj1) {
    if (!obj[key]) {
      obj[key] = {};
    }
    if (typeof obj1[key] !== "object") {
      if (typeof obj2[key] !== "object" && obj2[key]) {
        obj[key] = obj2[key];
      } else {
        obj[key] = obj1[key];
      }
    } else {
      if (typeof obj2[key] === "object" && obj2[key]) {
        obj[key] = fusionProfonde(obj1[key], obj2[key]);
      } else if (obj2[key]) {
        obj[key] = obj1[key];
      }
    }
  }
  for (key in obj2) {
    if (!obj[key]) {
      obj[key] = obj2[key];
    }
  }
  return obj;
}

console.log(
  fusionProfonde({ a: 1, b: { x: {z:14, e: {t:13} }, y: 2 } }, { b: {x : {z: 15, e:12}, y: 99, z: 3 }, c: 4 }),
);
console.log(fusionProfonde({ nom: "Alice",age:{num:14} }, { age: 30 }));
