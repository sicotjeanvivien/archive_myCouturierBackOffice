<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoryRetouching
 *
 * @ORM\Table(name="category_retouching")
 * @ORM\Entity
 */
class CategoryRetouching
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
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    // Magic Methods
    public function __toString()
    {
        return $this->type;
    }
}
