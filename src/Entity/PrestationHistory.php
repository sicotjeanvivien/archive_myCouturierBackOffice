<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PrestationHistory
 *
 * @ORM\Table(name="prestation_history", indexes={@ORM\Index(name="IDX_E42C83D29E45C554", columns={"prestation_id"}), @ORM\Index(name="IDX_E42C83D2F6203804", columns={"statut_id"})})
 * @ORM\Entity
 */
class PrestationHistory
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var \Prestations
     *
     * @ORM\ManyToOne(targetEntity="Prestations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prestation_id", referencedColumnName="id")
     * })
     */
    private $prestation;

    /**
     * @var \StatutHistory
     *
     * @ORM\ManyToOne(targetEntity="StatutHistory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="statut_id", referencedColumnName="id")
     * })
     */
    private $statut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPrestation(): ?Prestations
    {
        return $this->prestation;
    }

    public function setPrestation(?Prestations $prestation): self
    {
        $this->prestation = $prestation;

        return $this;
    }

    public function getStatut(): ?StatutHistory
    {
        return $this->statut;
    }

    public function setStatut(?StatutHistory $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

   // Magic Methods
   public function __toString()
   {
       return $this->type;
   }

}
