<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactUs
 *
 * @ORM\Table(name="contact_us", indexes={@ORM\Index(name="IDX_8205FDD01CD53A10", columns={"user_app_id"})})
 * @ORM\Entity
 */
class ContactUs
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
     * @ORM\Column(name="message", type="text", length=0, nullable=true)
     */
    private $message;

    /**
     * @var string|null
     *
     * @ORM\Column(name="response", type="text", length=0, nullable=true)
     */
    private $response;

    /**
     * @var string|null
     *
     * @ORM\Column(name="subject", type="string", length=255, nullable=true)
     */
    private $subject;

    /**
     * @var \UserApp
     *
     * @ORM\ManyToOne(targetEntity="UserApp")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_app_id", referencedColumnName="id")
     * })
     */
    private $userApp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getResponse(): ?string
    {
        return $this->response;
    }

    public function setResponse(?string $response): self
    {
        $this->response = $response;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(?string $subject): self
    {
        $this->subject = $subject;

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

    // Magic Methods
   public function __toString()
   {
       return $this->type;
   }

}
