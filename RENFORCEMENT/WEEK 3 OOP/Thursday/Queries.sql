-- Exercice 1 — Tableau de bord livraison — Guidé (30 min)

-- 1. LEFT JOIN — Tous les restaurants avec leur nombre de commandes (y compris ceux à 0 commande)

SELECT r.id, r.nom, r.ville, r.note_moy, COUNT(co.*) AS nombre_de_commandes
FROM restaurants r
    LEFT JOIN commandes co ON r.id = co.restaurant_id
GROUP BY
    r.id,
    r.nom,
    r.ville,
    r.note_moy;

-- 2. LEFT JOIN + GROUP BY — Pour chaque livreur, afficher son nom et le nombre de livraisons effectuées (statut = 'livré'), même s'il n'en a aucune

SELECT l.nom, COUNT(co.*) AS nombre_de_livraisons
FROM utilisateurs l
    LEFT JOIN commandes co ON l.id = co.livreur_id
WHERE
    co.statut = 'livré'
    AND l.type = 'livreur'
GROUP BY
    l.nom;

-- 3. Sous-requête IN — Afficher les clients qui ont passé au moins une commande dont le total dépasse 30€

SELECT cl.*
FROM utilisateurs cl
WHERE
    cl.type = 'client'
    AND cl.id IN (
        SELECT DISTINCT
            client_id
        FROM commandes
        WHERE
            total > 30
    );

-- 4. Sous-requête NOT IN — Afficher les restaurants qui n'ont reçu AUCUNE commande

SELECT *
FROM restaurants
WHERE
    AND id NOT IN(
        SELECT DISTINCT
            restaurant_id
        FROM commandes
    );

-- 5. GROUP BY + HAVING — Restaurants ayant reçu plus de 3 commandes ET un chiffre d'affaires total > 80€

SELECT
    r.id,
    r.nom,
    r.ville,
    r.note_moy,
    COUNT(*) AS nombre_de_commandes,
    SUM(co.total) AS total_des_commandes
FROM restaurants r
    INNER JOIN commandes co ON r.id = co.restaurant_id
GROUP BY
    r.id,
    r.nom,
    r.ville,
    r.note_moy
HAVING
    nombre_de_commandes > 3
    AND total_des_commandes > 80;

-- 6. JOIN 3 tables + GROUP BY — Pour chaque client, son nom et la somme totale dépensée, triée du plus gros au plus petit

SELECT cl.nom, SUM(co.total) AS total_depensee
FROM utilisateurs cl
    INNER JOIN commandes co ON cl.id = co.client_id
WHERE
    cl.type = 'client'
GROUP BY
    cl.nom
ORDER BY total_depensee DESC;

-- 7. Sous-requête EXISTS — Livreurs ayant au moins une notation > 4 (via la table notations et commandes)

SELECT l.nom
FROM utilisateurs l
WHERE
    EXISTS (
        SELECT 1
        FROM commandes co
            INNER JOIN notations n ON co.id = n.commande_id
        WHERE
            n.note > 4
            AND l.id = co.livreur_id
    );

-- 8. EXPLAIN — Lancez EXPLAIN sur la requête n°6 et identifiez si un index manque. Créez-le si nécessaire.

EXPLAIN
SELECT cl.nom, SUM(co.total) AS total_depensee
FROM utilisateurs cl
    INNER JOIN commandes co ON cl.id = co.client_id
WHERE
    AND cl.type = 'client'
GROUP BY
    cl.nom
ORDER BY total_depensee DESC;

-- Bonus :
-- a. Trouvez le plat le plus commandé (toutes commandes confondues) en croisant lignes_commande et plats

SELECT pl.id, pl.restaurant_id, pl.nom, pl.prix, pl.categorie, COUNT(*) fois_commande
FROM lignes_commande lc
    INNER JOIN plats pl ON pl.id = lc.plat_id
GROUP BY
    pl.id,
    pl.restaurant_id,
    pl.nom,
    pl.prix,
    pl.categorie
ORDER BY fois_commande DESC
LIMIT 1;

-- b. Calculez le panier moyen par ville en croisant commandes et restaurants, uniquement pour les villes avec plus de 5 commandes

SELECT
    r.ville,
    COUNT(*) nombre_de_commandes,
    AVG(co.total) panier_moyen
FROM restaurants r
    INNER JOIN commandes co ON r.id = co.restaurant_id
GROUP BY
    r.ville
HAVING
    nombre_de_commandes > 5
ORDER BY r.ville DESC;

-- ✏ Exercice 2 — Analyse RH — Semi-autonome (30 min)

-- 9. Pour chaque livreur, afficher : nom, nombre total de livraisons, montant total livré, note moyenne reçue (LEFT JOIN sur notations via commandes)

SELECT
    l.nom,
    COUNT(*) AS nombre_de_livraisons,
    AVG(n.total) note_moyen
FROM
    utilisateurs l
    LEFT JOIN commandes co ON l.id = co.livreur_id
    LEFT JOIN notations n ON co.id = n.commande_id
WHERE
    l.type = 'livreur'
GROUP BY
    l.nom;

-- 10. Identifier les livreurs 'stars' : ceux ayant plus de 2 livraisons effectuées ET une note moyenne >= 4 (GROUP BY + HAVING sur jointure 4 tables)

SELECT
    l.nom,
    COUNT(*) AS nombre_de_livraisons,
    AVG(n.total) note_moyen
FROM
    utilisateurs l
    LEFT JOIN commandes co ON l.id = co.livreur_id
    LEFT JOIN notations n ON co.id = n.commande_id
WHERE
    l.type = 'livreur'
GROUP BY
    l.nom;