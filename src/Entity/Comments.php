<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentsRepository")
 */
class Comments
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserApp", inversedBy="commentsClient")
     */
    private $userAppCouturier;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserApp", inversedBy="commentsCouturier")
     */
    private $userAppClient;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $datePublished;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rating;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getUserAppCouturier(): ?UserApp
    {
        return $this->userAppCouturier;
    }

    public function setUserAppCouturier(?UserApp $userAppCouturier): self
    {
        $this->userAppCouturier = $userAppCouturier;

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

    public function getDatePublished(): ?\DateTimeInterface
    {
        return $this->datePublished;
    }

    public function setDatePublished(?\DateTimeInterface $datePublished): self
    {
        $this->datePublished = $datePublished;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }
}
