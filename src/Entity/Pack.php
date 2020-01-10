<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PackRepository")
 */
class Pack
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Pays", inversedBy="pack")
     */
    private $pays;

    public function __construct()
    {
        $this->pays = new ArrayCollection();
        $this->type = new ArrayCollection();
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Type", mappedBy="pack")
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $Nb_personnes;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }


    /**
     * @return Collection|Type[]
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(Type $type): self
    {
        if (!$this->type->contains($type)) {
            $this->type[] = $type;
            $type->setPack($this);
        }

        return $this;
    }

    public function removeType(Type $type): self
    {
        if ($this->type->contains($type)) {
            $this->type->removeElement($type);
            // set the owning side to null (unless already changed)
            if ($type->getPack() === $this) {
                $type->setPack(null);
            }
        }

        return $this;
    }






    /**
     * @return Collection|Pays[]
     */
    public function getPays(): Collection
    {
        return $this->pays;
    }

    public function addPays(Pays $pays): self
    {
        if (!$this->pays->contains($pays)) {
            $this->pays[] = $pays;
            $pays->setPack($this);
        }

        return $this;
    }

    public function removePays(Pays $pays): self
    {
        if ($this->pays->contains($pays)) {
            $this->pays->removeElement($pays);
            // set the owning side to null (unless already changed)
            if ($pays->getPack() === $this) {
                $pays->setPack(null);
            }
        }

        return $this;
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


}
