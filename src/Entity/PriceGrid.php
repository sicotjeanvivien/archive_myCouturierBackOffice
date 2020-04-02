<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PriceGrid
 *
 * @ORM\Table(name="price_grid")
 * @ORM\Entity
 */
class PriceGrid
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
     * @var int
     *
     * @ORM\Column(name="min", type="integer", nullable=false)
     */
    private $min;

    /**
     * @var int
     *
     * @ORM\Column(name="max", type="integer", nullable=false)
     */
    private $max;

    /**
     * @var int
     *
     * @ORM\Column(name="commission", type="integer", nullable=false)
     */
    private $commission;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMin(): ?int
    {
        return $this->min;
    }

    public function setMin(int $min): self
    {
        $this->min = $min;

        return $this;
    }

    public function getMax(): ?int
    {
        return $this->max;
    }

    public function setMax(int $max): self
    {
        $this->max = $max;

        return $this;
    }

    public function getCommission(): ?int
    {
        return $this->commission;
    }

    public function setCommission(int $commission): self
    {
        $this->commission = $commission;

        return $this;
    }

    // Magic Methods
    public function __toString()
    {
        return $this->type;
    }
}
