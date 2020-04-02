<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatutHistory
 *
 * @ORM\Table(name="statut_history")
 * @ORM\Entity
 */
class StatutHistory
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
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255, nullable=false)
     */
    private $statut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
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
