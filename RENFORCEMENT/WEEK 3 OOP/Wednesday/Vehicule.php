<?php
abstract class Vehicule
{
    protected $marque;
    protected $modele;
    protected $annee;
    protected $prixBase;

    public function __construct($marque, $modele, $annee, $prixBase)
    {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
        $this->prixBase = $prixBase;
    }

    public function getMarque()
    {
        return $this->marque;
    }

    public function getModele()
    {
        return $this->modele;
    }

    public function getAnnee()
    {
        return $this->annee;
    }

    public function getPrixBase()
    {
        return $this->prixBase;
    }

    abstract function getPrixFinal(): float;
    
    abstract function getDescription(): string;
}
