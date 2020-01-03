<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Nb_personnes;

    /**
     * @ORM\Column(type="date")
     */
    private $date_debut;

    /**
     * @ORM\Column(type="date")
     */
    private $date_fin;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Pack", cascade={"persist", "remove"})
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client")
     */
    private $pack;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbPersonnes(): ?int
    {
        return $this->Nb_personnes;
    }

    public function setNbPersonnes(int $Nb_personnes): self
    {
        $this->Nb_personnes = $Nb_personnes;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getClient(): ?Pack
    {
        return $this->client;
    }

    public function setClient(?Pack $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getPack(): ?Client
    {
        return $this->pack;
    }

    public function setPack(?Client $pack): self
    {
        $this->pack = $pack;

        return $this;
    }
}
