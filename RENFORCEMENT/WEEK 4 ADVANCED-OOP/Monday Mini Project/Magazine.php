<?php
require_once "Document.php";
class Magazine extends Document
{
    private $numero;

    public function __construct($titre, $auteur, $prix, $numero)
    {
        parent::__construct($titre, $auteur, $prix, true);
        $this->numero = $numero;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getDescription()
    {
        return "[Livre] $this->titre — $this->auteur ($this->prix €) | N°$this->numero \n";
    }
}
