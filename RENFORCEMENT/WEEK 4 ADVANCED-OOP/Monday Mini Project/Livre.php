<?php
require_once "Document.php";
class Livre extends Document
{
    private $isbn;

    public function __construct($titre, $auteur, $prix, $isbn)
    {
        parent::__construct($titre, $auteur, $prix, true);
        $this->isbn = $isbn;
    }

    public function getISBN()
    {
        return $this->isbn;
    }

    public function getDescription()
    {
        return "[Livre] $this->titre — $this->auteur ($this->prix €) | ISBN: $this->isbn \n";
    }
}

