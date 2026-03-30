<?php

class Animal
{
    public $nom;
    public $race;
    public function __construct($nom, $race)
    {
        $this->race = $race;
        $this->nom = $nom;
    }
    public function parler()
    {
        echo "$this->nom dit: Grr !\n";
    }
}

$animal1 = new Animal("Rex", "Chien");
$animal2 = new Animal("Mimi", "Chat");

$animal1->parler();
$animal2->parler();

echo $animal1->nom;
