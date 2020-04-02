<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserPriceRetouching
 *
 * @ORM\Table(name="user_price_retouching", indexes={@ORM\Index(name="IDX_8FFA1BF9613B8DBF", columns={"retouching_id"}), @ORM\Index(name="IDX_8FFA1BF91CD53A10", columns={"user_app_id"})})
 * @ORM\Entity
 */
class UserPriceRetouching
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
     * @ORM\Column(name="price_couturier", type="integer", nullable=false)
     */
    private $priceCouturier;

    /**
     * @var int
     *
     * @ORM\Column(name="price_show_client", type="integer", nullable=false)
     */
    private $priceShowClient;

    /**
     * @var \UserApp
     *
     * @ORM\ManyToOne(targetEntity="UserApp")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_app_id", referencedColumnName="id")
     * })
     */
    private $userApp;

    /**
     * @var \Retouching
     *
     * @ORM\ManyToOne(targetEntity="Retouching")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="retouching_id", referencedColumnName="id")
     * })
     */
    private $retouching;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPriceCouturier(): ?int
    {
        return $this->priceCouturier;
    }

    public function setPriceCouturier(int $priceCouturier): self
    {
        $this->priceCouturier = $priceCouturier;

        return $this;
    }

    public function getPriceShowClient(): ?int
    {
        return $this->priceShowClient;
    }

    public function setPriceShowClient(int $priceShowClient): self
    {
        $this->priceShowClient = $priceShowClient;

        return $this;
    }

    public function getUserApp(): ?UserApp
    {
        return $this->userApp;
    }

    public function setUserApp(?UserApp $userApp): self
    {
        $this->userApp = $userApp;

        return $this;
    }

    public function getRetouching(): ?Retouching
    {
        return $this->retouching;
    }

    public function setRetouching(?Retouching $retouching): self
    {
        $this->retouching = $retouching;

        return $this;
    }


    // Magic Methods
    public function __toString()
    {
        return $this->priceCouturier;
    }
}
