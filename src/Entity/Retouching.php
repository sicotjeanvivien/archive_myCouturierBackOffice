<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Retouching
 *
 * @ORM\Table(name="retouching", indexes={@ORM\Index(name="IDX_466756207FE0A8F4", columns={"category_retouching_id"})})
 * @ORM\Entity
 */
class Retouching
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

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=true)
     */
    private $description;

    /**
     * @var \CategoryRetouching
     *
     * @ORM\ManyToOne(targetEntity="CategoryRetouching")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_retouching_id", referencedColumnName="id")
     * })
     */
    private $categoryRetouching;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCategoryRetouching(): ?CategoryRetouching
    {
        return $this->categoryRetouching;
    }

    public function setCategoryRetouching(?CategoryRetouching $categoryRetouching): self
    {
        $this->categoryRetouching = $categoryRetouching;

        return $this;
    }

    // Magic Methods
    public function __toString()
    {
        return $this->type;
    }

}
