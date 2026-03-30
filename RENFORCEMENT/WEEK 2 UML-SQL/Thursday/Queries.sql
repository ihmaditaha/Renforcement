-- ✏ Exercice 1 — Requêtes simples — Application de livraison (guidé)

-- Contexte :
-- En utilisant le schéma de la base de données de l'application de livraison présenté en section 1, écrivez les requêtes SQL suivantes. Testez chaque requête dans MySQL Workbench.

-- Requêtes à écrire :

-- 1. Afficher le nom et l'email de tous les utilisateurs de type 'client'
SELECT nom, email FROM utilisateurs WHERE type = 'client';

-- 2. Afficher tous les plats dont le prix est inférieur à 15€, triés du moins cher au plus cher
SELECT * FROM plats WHERE prix < 15 ORDER BY prix ASC;

-- 3. Compter le nombre de commandes par statut ('livré', 'en cours', 'annulé')
SELECT statut, COUNT(*) FROM commandes GROUP BY statut;

-- 4. Afficher les 3 restaurants avec la meilleure note moyenne (ORDER BY + LIMIT)
SELECT * FROM restaurants ORDER BY note_moy DESC LIMIT 3;

-- 5. Calculer le chiffre d'affaires total et le panier moyen de toutes les commandes livrées
SELECT SUM(total), AVG(total) FROM commandes WHERE statut = 'livré';

-- 6. Afficher tous les plats dont le nom contient le mot 'poulet' (LIKE)
SELECT * FROM plats WHERE nom LIKE '%poulet%';

-- ✏ Exercice 2 — Jointures — Application de livraison (semi-autonome)

-- Contexte :
-- Ces requêtes nécessitent de croiser plusieurs tables. Utilisez les alias de tables (c, u, r, p, lc) pour rendre les requêtes lisibles. Référez-vous au schéma de la section 1.

-- Requêtes à écrire :

-- 7. Afficher le nom du client et le total pour chaque commande (INNER JOIN commandes + utilisateurs)
SELECT u.nom, co.total
FROM commandes co
    INNER JOIN utilisateurs u ON co.client_id = u.id;

-- 8. Afficher le nom du restaurant et le nombre de commandes reçues, même pour les restaurants sans commande (LEFT JOIN)
SELECT r.nom, COUNT(co.id)
FROM restaurants r
    LEFT JOIN commandes co ON co.restaurant_id = r.id
GROUP BY
    r.nom;

-- 9. Lister toutes les commandes livrées avec le nom du client, le nom du livreur et le nom du restaurant
SELECT co.*, u.nom client_nom, l.nom livreur_nom, r.nom
FROM
    commandes co
    INNER JOIN utilisateurs u ON co.client_id = u.id
    INNER JOIN utilisateurs l ON co.livreur_id = l.id
    INNER JOIN restaurants r ON co.restaurant_id = r.id
WHERE
    co.statut = 'livré';

-- 10. Afficher les plats commandés au moins une fois avec leur quantité totale vendue (JOIN + GROUP BY + SUM)
SELECT pl.nom, pl.prix, pl.categorie, SUM(lc.quantité)
FROM lignes_commande lc
    INNER JOIN plats pl ON lc.plat_id = pl.id
GROUP BY
    pl.nom,
    pl.prix,
    pl.categorie;

-- 11. Trouver les clients qui ont commandé plus de 3 fois, avec leur nombre de commandes (JOIN + GROUP BY + HAVING)
SELECT u.*, COUNT(*) nombre_de_commandes
FROM commandes co
    INNER JOIN utilisateurs u ON co.client_id = u.id
HAVING
    nombre_de_commandes > 3;

-- 12. BONUS : Afficher le top 3 des livreurs les mieux notés (jointure sur notations + commandes + utilisateurs)
SELECT l.nom, AVG(n.note) avg_note
FROM
    commandes co
    INNER JOIN utilisateurs l ON co.livreur_id = l.id
    INNER JOIN notations n ON co.id = n.commande_id
GROUP BY
    l.nom
ORDER BY avg_note DESC
LIMIT 3;