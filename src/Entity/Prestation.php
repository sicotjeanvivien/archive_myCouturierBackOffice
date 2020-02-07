<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PrestationRepository")
 */
class Prestation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PrestationStatus", inversedBy="prestations")
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserApp", inversedBy="prestationsClient")
     */
    private $userAppClient;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Retouching", inversedBy="prestations")
     */
    private $retouching;

    public function __construct()
    {
        $this->retouching = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatut(): ?PrestationStatus
    {
        return $this->statut;
    }

    public function setStatut(?PrestationStatus $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getUserAppClient(): ?UserApp
    {
        return $this->userAppClient;
    }

    public function setUserAppClient(?UserApp $userAppClient): self
    {
        $this->userAppClient = $userAppClient;

        return $this;
    }

    /**
     * @return Collection|Retouching[]
     */
    public function getRetouching(): Collection
    {
        return $this->retouching;
    }

    public function addRetouching(Retouching $retouching): self
    {
        if (!$this->retouching->contains($retouching)) {
            $this->retouching[] = $retouching;
        }

        return $this;
    }

    public function removeRetouching(Retouching $retouching): self
    {
        if ($this->retouching->contains($retouching)) {
            $this->retouching->removeElement($retouching);
        }

        return $this;
    }

    public function __toString()
    {
        if (is_null($this->retouchings)) {
            return NULL;
        }
        return $this->retouchings;
    }
}
