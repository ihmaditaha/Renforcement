<?php
class Camionnette extends Vehicule
{
    private $chargeUtile;

    public function __construct($marque, $modele, $annee, $prixBase,$chargeUtile)
    {
        parent::__construct($marque, $modele, $annee, $prixBase);
        $this->chargeUtile = $chargeUtile;
    }

    public function getPrixFinal(): float
    {
        return $this->prixBase + $this->chargeUtile*0.1;
    }

    public function getDescription(): string
    {
        return "Marque: $this->marque \nModele: $this->modele \nAnnee: $this->annee \nPrix de Base: $this->prixBase \nPourcentage de remise d'ancienité: $this->chargeUtile \nPrix Finale: ".$this->getPrixFinal();
    }
}
