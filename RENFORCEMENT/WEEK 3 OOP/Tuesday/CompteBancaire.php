<?php

class CompteBancaire
{
    private $titulaire;
    private $iban;
    private $solde;


    public function __construct($titulaire, $iban, $solde=0)
    {
        $this->titulaire = $titulaire;
        $this->iban = $iban;
        $this->solde = $solde;
    }

    public function getTitulaire()
    {
        return $this->titulaire;
    }

    public function getIban()
    {
        return $this->iban;
    }

    public function getSolde()
    {
        return $this->solde;
    }

    public function deposer($montant)
    {
        if ($montant < 0) {
            echo "Les mantant négatifs sont invalides\n";
            return;
        }
        $this->solde += $montant;
    }

    public function retirer($montant)
    {
        if ($montant < 0 || ($this->solde - $montant)<0) {
            echo "Solde insuffisant\n";
            return;
        }
        $this->solde -= $montant;
    }

    public function afficherInfos()
    {
        echo "Titulaire: $this->titulaire \nIBAN:  $this->iban \nSolde: $this->solde €\n";
    }
}

$compte1 = new CompteBancaire("taha", "7815389721536987");
$compte2 = new CompteBancaire("test", "6593452734925976",1000);

$compte1->afficherInfos();
$compte2->afficherInfos();

$compte1->deposer(-2);
$compte1->deposer(100);
$compte1->deposer(300);
$compte1->deposer(-500);
$compte1->retirer(-200);
$compte1->retirer(100);
$compte1->retirer(3200);
$compte1->deposer(3200);
$compte1->retirer(-200);
$compte1->retirer(400);

$compte1->afficherInfos();
$compte2->afficherInfos();


