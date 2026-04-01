<?php

class Produit
{
    private $nom;
    private $prix;
    private $stock;


    public function __construct($nom, $prix, $stock)
    {
        $this->nom = $nom;
        $this->prix = $prix;
        $this->stock = $stock;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setPrix($prix)
    {
        if ($prix < 0) {
            echo "Les prix négatifs sont invalides\n";
            return;
        }
        $this->prix = $prix;
    }

    public function setStock($stock)
    {
        if ($stock < 0) {
            echo "Le stock ne peut pas etre négatif\n";
            return;
        }
        $this->stock = $stock;
    }

    public function afficher()
    {
        echo "$this->nom — $this->prix € (stock : $this->stock)\n";
    }
}

$produit1 = new Produit("phone", 14000, 11);
$produit2 = new Produit("Stylo", 1.5, 1400);

$produit1->afficher();
$produit2->afficher();

$produit2->setPrix(-2);

echo $produit2->getNom();
echo "\n";
echo $produit2->getPrix();
