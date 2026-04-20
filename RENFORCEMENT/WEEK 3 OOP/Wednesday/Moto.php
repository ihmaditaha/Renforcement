<?php

class Moto extends Vehicule
{
    private $remiseAncienne = 0.05;
    public function __construct($marque, $modele, $annee, $prixBase)
    {
        parent::__construct($marque, $modele, $annee, $prixBase);
    }



    public function getPrixFinal(): float
    {
        if ($this->annee < 2020)
            return $this->prixBase * 0.95;
        return $this->prixBase;
    }
    public function getDescription(): string
    {
        return "Marque: $this->marque \nModele: $this->modele \nAnnee: $this->annee \nPrix de Base: $this->prixBase \nPourcentage de remise d'ancienité: ".($this->remiseAncienne*100)."\nPrix Finale: ".$this->getPrixFinal();
    }
}
