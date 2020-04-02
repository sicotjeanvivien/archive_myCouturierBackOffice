<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prestations
 *
 * @ORM\Table(name="prestations", indexes={@ORM\Index(name="IDX_B338D8D119EB6921", columns={"client_id"}), @ORM\Index(name="IDX_B338D8D1613B8DBF", columns={"retouching_id"})})
 * @ORM\Entity
 */
class Prestations
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
     * @var string|null
     *
     * @ORM\Column(name="state", type="string", length=255, nullable=true)
     */
    private $state;

    /**
     * @var \UserApp
     *
     * @ORM\ManyToOne(targetEntity="UserApp")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;

    /**
     * @var \UserPriceRetouching
     *
     * @ORM\ManyToOne(targetEntity="UserPriceRetouching")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="retouching_id", referencedColumnName="id")
     * })
     */
    private $retouching;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getClient(): ?UserApp
    {
        return $this->client;
    }

    public function setClient(?UserApp $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getRetouching(): ?UserPriceRetouching
    {
        return $this->retouching;
    }

    public function setRetouching(?UserPriceRetouching $retouching): self
    {
        $this->retouching = $retouching;

        return $this;
    }

    // Magic Methods
    public function __toString()
    {
        return $this->type;
    }
}
