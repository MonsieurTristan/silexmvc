<?php

namespace App\Computer\Entity;

class Computer
{
    protected $id;

    protected $modele;


    public function __construct($id, $modele)
    {
        $this->id = $id;
        $this->modele = $modele;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setModele($modele)
    {
        $this->modele = $modele;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getModele()
    {
        return $this->modele;
    }

    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['modele'] = $this->modele;

        return $array;
    }
}
