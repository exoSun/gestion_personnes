<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="personne__base")
 */
class Personne
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @Assert\NotNull
     * @ORM\Column(type="string")
     */
    public $nom;

    /**
     * @Assert\NotNull
     * @ORM\Column(type="string")
     */
    public $prenom;

    /**
     * @Assert\GreaterThanOrEqual("-150 years")
     * @ORM\Column(type="date")
     */
    public $dateAnniverssaire;

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getDateAnniverssaire()
    {
        return $this->dateAnniverssaire;
    }

    public function setDateAnniverssaire($dateAnniverssaire)
    {
        $this->dateAnniverssaire = $dateAnniverssaire;
    }
}
