<?php

namespace App\Entity;

use App\Repository\StreamRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StreamRepository::class)
 */
class Stream
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $Titre;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $Sous_titre;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $Image;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $Source;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $Type;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $Categorie;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $Description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getSousTitre(): ?string
    {
        return $this->Sous_titre;
    }

    public function setSousTitre(string $Sous_titre): self
    {
        $this->Sous_titre = $Sous_titre;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->Source;
    }

    public function setSource(string $Source): self
    {
        $this->Source = $Source;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->Categorie;
    }

    public function setCategorie(string $Categorie): self
    {
        $this->Categorie = $Categorie;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }
}
