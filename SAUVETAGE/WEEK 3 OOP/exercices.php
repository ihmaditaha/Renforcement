<?php
// 1. PHP — Syntaxe de base
// 1.1 Exercices guidés (20 min)

// Exercice 1 — Variables & echo
// 1. Déclarez une variable $prenom avec votre prénom
$prenom = "taha";
// 2. Déclarez une variable $age avec votre âge
$age = 22;
// 3. Affichez : "Bonjour, je m'appelle [prénom] et j'ai [âge] ans."
echo "Bonjour, je m'appelle $prenom et j'ai $age ans.\n";

// Exercice 2 — Condition if/else
$age = 16;
if ($age >= 18) {
    echo "Majeur.\n";
} else {
    echo "Mineur.\n";
}

// Exercice 3 — Boucle for
for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}
// Résultat attendu : 1 2 3 4 5 6 7 8 9 10