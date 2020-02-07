<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RetouchingTypeRepository")
 */
class RetouchingType
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
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Retouching", mappedBy="retouchingType")
     */
    private $retouchings;

    public function __construct()
    {
        $this->retouchings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Retouching[]
     */
    public function getRetouchings(): Collection
    {
        return $this->retouchings;
    }

    public function addRetouching(Retouching $retouching): self
    {
        if (!$this->retouchings->contains($retouching)) {
            $this->retouchings[] = $retouching;
            $retouching->addRetouchingType($this);
        }

        return $this;
    }

    public function removeRetouching(Retouching $retouching): self
    {
        if ($this->retouchings->contains($retouching)) {
            $this->retouchings->removeElement($retouching);
            $retouching->removeRetouchingType($this);
        }

        return $this;
    }

}
