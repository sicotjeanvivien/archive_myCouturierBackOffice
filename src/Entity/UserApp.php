<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserAppRepository")
 */
class UserApp
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userAppName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $bio;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ratingClient;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ratingCouturier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $geoLoc;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastLog;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comments", mappedBy="userAppCouturier")
     */
    private $commentsClient;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comments", mappedBy="userAppClient")
     */
    private $commentsCouturier;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Retouching", mappedBy="userAppCouturier")
     */
    private $retouchings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Prestation", mappedBy="userAppClient")
     */
    private $prestationsClient;

    public function __construct()
    {
        $this->commentsClient = new ArrayCollection();
        $this->commentsCouturier = new ArrayCollection();
        $this->retouchings = new ArrayCollection();
        $this->prestationsClient = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUserAppName(): ?string
    {
        return $this->userAppName;
    }

    public function setUserAppName(string $userAppName): self
    {
        $this->userAppName = $userAppName;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getRatingClient(): ?int
    {
        return $this->ratingClient;
    }

    public function setRatingClient(?int $ratingClient): self
    {
        $this->ratingClient = $ratingClient;

        return $this;
    }

    public function getRatingCouturier(): ?int
    {
        return $this->ratingCouturier;
    }

    public function setRatingCouturier(?int $ratingCouturier): self
    {
        $this->ratingCouturier = $ratingCouturier;

        return $this;
    }

    public function getGeoLoc(): ?string
    {
        return $this->geoLoc;
    }

    public function setGeoLoc(?string $geoLoc): self
    {
        $this->geoLoc = $geoLoc;

        return $this;
    }

    public function getLastLog(): ?\DateTimeInterface
    {
        return $this->lastLog;
    }

    public function setLastLog(?\DateTimeInterface $lastLog): self
    {
        $this->lastLog = $lastLog;

        return $this;
    }

    /**
     * @return Collection|Comments[]
     */
    public function getCommentsClient(): Collection
    {
        return $this->commentsClient;
    }

    public function addCommentsClient(Comments $commentsClient): self
    {
        if (!$this->commentsClient->contains($commentsClient)) {
            $this->commentsClient[] = $commentsClient;
            $commentsClient->setUserAppCouturier($this);
        }

        return $this;
    }

    public function removeCommentsClient(Comments $commentsClient): self
    {
        if ($this->commentsClient->contains($commentsClient)) {
            $this->commentsClient->removeElement($commentsClient);
            // set the owning side to null (unless already changed)
            if ($commentsClient->getUserAppCouturier() === $this) {
                $commentsClient->setUserAppCouturier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comments[]
     */
    public function getCommentsCouturier(): Collection
    {
        return $this->commentsCouturier;
    }

    public function addCommentsCouturier(Comments $commentsCouturier): self
    {
        if (!$this->commentsCouturier->contains($commentsCouturier)) {
            $this->commentsCouturier[] = $commentsCouturier;
            $commentsCouturier->setUserAppClient($this);
        }

        return $this;
    }

    public function removeCommentsCouturier(Comments $commentsCouturier): self
    {
        if ($this->commentsCouturier->contains($commentsCouturier)) {
            $this->commentsCouturier->removeElement($commentsCouturier);
            // set the owning side to null (unless already changed)
            if ($commentsCouturier->getUserAppClient() === $this) {
                $commentsCouturier->setUserAppClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Retouching[]
     */
    public function getRetouchings(): Collection
    {
        return $this->retouchings;
    }

    public function addRetouching(Retouching $retouching): self
    {
        if (!$this->retouchings->contains($retouching)) {
            $this->retouchings[] = $retouching;
            $retouching->addUserAppCouturier($this);
        }

        return $this;
    }

    public function removeRetouching(Retouching $retouching): self
    {
        if ($this->retouchings->contains($retouching)) {
            $this->retouchings->removeElement($retouching);
            $retouching->removeUserAppCouturier($this);
        }

        return $this;
    }

    /**
     * @return Collection|Prestation[]
     */
    public function getPrestationsClient(): Collection
    {
        return $this->prestationsClient;
    }

    public function addPrestationsClient(Prestation $prestationsClient): self
    {
        if (!$this->prestationsClient->contains($prestationsClient)) {
            $this->prestationsClient[] = $prestationsClient;
            $prestationsClient->setUserAppClient($this);
        }

        return $this;
    }

    public function removePrestationsClient(Prestation $prestationsClient): self
    {
        if ($this->prestationsClient->contains($prestationsClient)) {
            $this->prestationsClient->removeElement($prestationsClient);
            // set the owning side to null (unless already changed)
            if ($prestationsClient->getUserAppClient() === $this) {
                $prestationsClient->setUserAppClient(null);
            }
        }

        return $this;
    }

}
