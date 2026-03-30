// PARTIE 1 -- Documentation & Exercices Debutants

// Exercice 1 -- Ma premiere liste

let taches = [];
taches.push("Coder", "Tester", "Deployer");
taches.unshift("Analyser");
console.log(taches.pop());
console.log(taches.shift());
taches.splice(1, 0, "Documenter");
taches.splice(2, 1, "Revue de code");
console.log(taches);

// Exercice 2 -- Affichage d'une liste

const prenoms = ["Alice", "Bob", "Clara", "David", "Eva"];
prenoms.forEach((element, index) => console.log(index + 1 + ". " + element));

// Exercice 3 -- Transformation de donnees

const temperatures = [0, 15, 22, 35, -5, 100];
let fahrenheit = temperatures.map((temp) => (temp * 9) / 5 + 32);
let descriptions = temperatures.map((temp) => {
  if (temp >= 30) {
    return "Chaud";
  } else if (temp <= 0) {
    return "Froid";
  }
  return "Tempere";
});
let statuses = temperatures.map((temp, index) => {
  return { celsius: temp, statut: descriptions[index] };
});
console.log(statuses);

// Exercice 4 -- Filtrage simple

const mots = [
  "chat",
  "cheval",
  "chien",
  "lion",
  "chameau",
  "cobra",
  "loup",
  "chevre",
];
console.log(mots.filter((element) => element.startsWith("ch")));
console.log(mots.filter((element) => element.length > 5));
console.log(
  mots.filter((element) => element.startsWith("ch") && element.length > 5),
);

// Exercice 5 -- Recherche dans un catalogue

const catalogue = [
  { ref: "A01", nom: "Stylo bille", prix: 1.2 },
  { ref: "A02", nom: "Cahier A4", prix: 3.5 },
  { ref: "A03", nom: "Surligneur", prix: 2.1 },
  { ref: "A04", nom: "Post-it", prix: 3.8 },
  { ref: "A05", nom: "Ciseaux", prix: 6.3 },
];

console.log(catalogue.find((element) => element.ref == "A03"));
console.log(catalogue.findIndex((element) => element.nom == "Cahier A4"));

// Exercice 6 -- Premiers calculs avec reduce

const notes = [14, 8, 17, 11, 15, 9, 18, 12];
let sum = notes.reduce((sum, val) => sum + val, 0);
let avrg = notes.reduce((sum, val) => sum + val, 0) / notes.length;
let max = notes.reduce((max, val) => (val > max ? val : max), notes[0]);
console.log(notes.reduce((n, val) => (val < avrg ? n + 1 : n), 0));

// PARTIE 2 -- Challenges Intermediaires

// Exercice I1 -- Nettoyeur de tableau

function nettoyer(tableau) {
  let cleanedArray = tableau.filter((element) => element).sort((a, b) => a - b);
  console.log(cleanedArray);
  cleanedArray.indexOf();
  cleanedArray.forEach((element, index) => {
    if (element == cleanedArray[index + 1]) {
      cleanedArray.splice(index, 1);
    }
  });
  console.log(cleanedArray);
  return cleanedArray;
}

nettoyer([3, 1, 2, 1, 3, 0, "", 5, null, 2]);
nettoyer([false, 7, 7, "", 8, undefined, 8]);
nettoyer([0, 0, 0]);

// Exercice I2 -- Rotation de tableau

function rotate(tableau, n) {
  let number = n % tableau.length;
  console.log("mod " + number);
  return [...tableau.slice(-number), ...tableau.slice(0, -number)];
}
console.log(rotate([1, 2, 3, 4, 5], 2));
console.log(rotate([1, 2, 3, 4, 5, 6, 7, 8], 5));
console.log(rotate([1, 2, 3, 4, 5], 0));
console.log(rotate(["a", "b", "c"], 1));
console.log(rotate([1, 2, 3, 4, 5, 6, 7, 8, 9, 10], 6));

// Exercice I3 -- Aplatisseur

function flatten(tableau) {
  let flattened = [];
  tableau.forEach((item) => {
    if (Array.isArray(item)) {
      flattened = flattened.concat(flatten(item));
    } else {
      flattened.push(item);
    }
  });

  return flattened;
}

let arr = flatten([1, [2, 3,[1, [2, 3,]]]]);
console.log(arr);
// PARTIE 3 -- Challenges Avances
