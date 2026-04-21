<?php
require_once "Empruntable.php";

abstract class Document implements Empruntable
{
    protected $titre;
    protected $auteur;
    protected $prix;
    protected $disponible;

    public function __construct($titre,$auteur,$prix,$disponible)
    {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->prix = $prix;
        $this->disponible = $disponible;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getAuteur()
    {
        return $this->auteur;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function estDisponible()
    {
        return $this->disponible;
    }

    public function emprunter()
    {
        $this->disponible = false;
    }

    abstract public function getDescription();
}
