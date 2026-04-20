<?php

class Voiture extends Vehicule
{
    private $fraisMiseEnRoute = 150;

    public function __construct($marque, $modele, $annee, $prixBase)
    {
        parent::__construct($marque, $modele, $annee, $prixBase);
    }

    public function getPrixFinal(): float
    {
        return $this->prixBase + $this->fraisMiseEnRoute;
    }
    public function getDescription(): string
    {
        return "Marque: $this->marque \nModele: $this->modele \nAnnee: $this->annee \nPrix de Base: $this->prixBase \nFrais de Mise En Route: $this->fraisMiseEnRoute \nPrix Finale: ".$this->getPrixFinal();
    }
}
