<?php

class Task
{
    private $id;
    private $description;
    private $estimatedHours;

    public function __construct($id, $description, $estimatedHours)
    {
        $this->id = $id;
        $this->description = $description;
        $this->estimatedHours = $estimatedHours;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getEstimatedHours()
    {
        return $this->estimatedHours;
    }

    public function isBig($threshold)
    {
        return $this->estimatedHours > $threshold;
    }

    public function afficher()
    {
        echo "{";
        
        echo "Description: ".$this->description;
        echo ",\n";
        echo "Estimated Hours: ".$this->estimatedHours;
        echo ",\n";
        echo "}";
        echo ",\n";


    }    
}
