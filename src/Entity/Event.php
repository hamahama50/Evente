<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $descreption;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $localisation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $CreateAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startevent;

    /**
     * @ORM\Column(type="datetime")
     */
    private $endevent;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="events")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Ville", inversedBy="events")
     */
    private $ville;

    public function __construct()
    {
        $this->ville = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescreption(): ?string
    {
        return $this->descreption;
    }

    public function setDescreption(string $descreption): self
    {
        $this->descreption = $descreption;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->CreateAt;
    }

    public function setCreateAt(\DateTimeInterface $CreateAt): self
    {
        $this->CreateAt = $CreateAt;

        return $this;
    }

    public function getStartevent(): ?\DateTimeInterface
    {
        return $this->startevent;
    }

    public function setStartevent(\DateTimeInterface $startevent): self
    {
        $this->startevent = $startevent;

        return $this;
    }

    public function getEndevent(): ?string
    {
        return $this->endevent;
    }

    public function setEndevent(string $endevent): self
    {
        $this->endevent = $endevent;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Ville[]
     */
    public function getVille(): Collection
    {
        return $this->ville;
    }

    public function addVille(Ville $ville): self
    {
        if (!$this->ville->contains($ville)) {
            $this->ville[] = $ville;
        }

        return $this;
    }

    public function removeVille(Ville $ville): self
    {
        if ($this->ville->contains($ville)) {
            $this->ville->removeElement($ville);
        }

        return $this;
    }
}
