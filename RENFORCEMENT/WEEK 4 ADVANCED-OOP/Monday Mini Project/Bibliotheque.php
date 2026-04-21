<?php
require_once "Livre.php";
require_once "Magazine.php";

class Bibliotheque
{
    private $documents = [];
    private $tarifRetardJour;

    public function __construct($tarifRetardJour)
    {
        $this->tarifRetardJour = $tarifRetardJour;
    }

    public function ajouterDocument($d)
    {
        $this->documents[] = $d;
    }

    public function getDisponibles()
    {
        return array_filter($this->documents, fn($d) => $d->estDisponible() === true);
    }

    public function calculerRetard($d, $joursRetard)
    {
        if ($d->estDisponible()) {
            return 0;
        }
        return $joursRetard * $this->tarifRetardJour;
    }

    public function getResume()
    {
        $total = count($this->documents);
        $totalDispo = count($this->getDisponibles());
        return "$total doc(s) au total, $totalDispo disponible(s)";
    }
}

$l1 = new Livre('1984', 'Orwell', 12.50, '978-2070368228');
$l2 = new Livre('1985', 'Orwell', 12.50, '978-2070368228');

$m1 = new Magazine('Nat. Geographic Ed 1', 'NGS', 5.99, 312);
$m2 = new Magazine('Nat. Geographic Ed 2', 'NGS', 5.99, 312);

$bib = new Bibliotheque(0.5);
$bib->ajouterDocument($l1);
$bib->ajouterDocument($l2);
$bib->ajouterDocument($m1);
$bib->ajouterDocument($m2);

var_dump($bib->getDisponibles());

$m2->emprunter();

var_dump($bib->getDisponibles());

echo $bib->calculerRetard($m2, 5);
echo "\n";
echo $bib->calculerRetard($l1, 25);
echo "\n";
echo $bib->getResume();
