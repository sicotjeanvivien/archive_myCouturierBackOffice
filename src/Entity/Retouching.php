<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RetouchingRepository")
 */
class Retouching
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\RetouchingType", inversedBy="retouchings")
     */
    private $retouchingType;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\UserApp", inversedBy="retouchings")
     */
    private $userAppCouturier;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Prestation", mappedBy="retouching")
     */
    private $prestations;

    public function __construct()
    {
        $this->retouchingType = new ArrayCollection();
        $this->userAppCouturier = new ArrayCollection();
        $this->prestations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|RetouchingType[]
     */
    public function getRetouchingType(): Collection
    {
        return $this->retouchingType;
    }

    public function addRetouchingType(RetouchingType $retouchingType): self
    {
        if (!$this->retouchingType->contains($retouchingType)) {
            $this->retouchingType[] = $retouchingType;
        }

        return $this;
    }

    public function removeRetouchingType(RetouchingType $retouchingType): self
    {
        if ($this->retouchingType->contains($retouchingType)) {
            $this->retouchingType->removeElement($retouchingType);
        }

        return $this;
    }

    /**
     * @return Collection|UserApp[]
     */
    public function getUserAppCouturier(): Collection
    {
        return $this->userAppCouturier;
    }

    public function addUserAppCouturier(UserApp $userAppCouturier): self
    {
        if (!$this->userAppCouturier->contains($userAppCouturier)) {
            $this->userAppCouturier[] = $userAppCouturier;
        }

        return $this;
    }

    public function removeUserAppCouturier(UserApp $userAppCouturier): self
    {
        if ($this->userAppCouturier->contains($userAppCouturier)) {
            $this->userAppCouturier->removeElement($userAppCouturier);
        }

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|Prestation[]
     */
    public function getPrestations(): Collection
    {
        return $this->prestations;
    }

    public function addPrestation(Prestation $prestation): self
    {
        if (!$this->prestations->contains($prestation)) {
            $this->prestations[] = $prestation;
            $prestation->addRetouching($this);
        }

        return $this;
    }

    public function removePrestation(Prestation $prestation): self
    {
        if ($this->prestations->contains($prestation)) {
            $this->prestations->removeElement($prestation);
            $prestation->removeRetouching($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->userAppCouturier;
    }

}
