<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfigApp
 *
 * @ORM\Table(name="config_app")
 * @ORM\Entity
 */
class ConfigApp
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
     * @ORM\Column(name="cgv", type="text", length=0, nullable=true)
     */
    private $cgv;

    /**
     * @var int|null
     *
     * @ORM\Column(name="default_commission", type="integer", nullable=true)
     */
    private $defaultCommission;

    /**
     * @var string
     *
     * @ORM\Column(name="site", type="string", length=255, nullable=false)
     */
    private $site;

    /**
     * @var string|null
     *
     * @ORM\Column(name="host_mailer", type="string", length=255, nullable=true)
     */
    private $hostMailer;

    /**
     * @var string|null
     *
     * @ORM\Column(name="username_mailer", type="string", length=255, nullable=true)
     */
    private $usernameMailer;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password_mailer", type="string", length=255, nullable=true)
     */
    private $passwordMailer;

    /**
     * @var string|null
     *
     * @ORM\Column(name="port_mailer", type="string", length=255, nullable=true)
     */
    private $portMailer;

    /**
     * @var string|null
     *
     * @ORM\Column(name="protocole_mailer", type="string", length=255, nullable=true)
     */
    private $protocoleMailer;

    /**
     * @var string|null
     *
     * @ORM\Column(name="admin_email", type="string", length=255, nullable=true)
     */
    private $adminEmail;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCgv(): ?string
    {
        return $this->cgv;
    }

    public function setCgv(?string $cgv): self
    {
        $this->cgv = $cgv;

        return $this;
    }

    public function getDefaultCommission(): ?int
    {
        return $this->defaultCommission;
    }

    public function setDefaultCommission(?int $defaultCommission): self
    {
        $this->defaultCommission = $defaultCommission;

        return $this;
    }

    public function getSite(): ?string
    {
        return $this->site;
    }

    public function setSite(string $site): self
    {
        $this->site = $site;

        return $this;
    }

    public function getHostMailer(): ?string
    {
        return $this->hostMailer;
    }

    public function setHostMailer(?string $hostMailer): self
    {
        $this->hostMailer = $hostMailer;

        return $this;
    }

    public function getUsernameMailer(): ?string
    {
        return $this->usernameMailer;
    }

    public function setUsernameMailer(?string $usernameMailer): self
    {
        $this->usernameMailer = $usernameMailer;

        return $this;
    }

    public function getPasswordMailer(): ?string
    {
        return $this->passwordMailer;
    }

    public function setPasswordMailer(?string $passwordMailer): self
    {
        $this->passwordMailer = $passwordMailer;

        return $this;
    }

    public function getPortMailer(): ?string
    {
        return $this->portMailer;
    }

    public function setPortMailer(?string $portMailer): self
    {
        $this->portMailer = $portMailer;

        return $this;
    }

    public function getProtocoleMailer(): ?string
    {
        return $this->protocoleMailer;
    }

    public function setProtocoleMailer(?string $protocoleMailer): self
    {
        $this->protocoleMailer = $protocoleMailer;

        return $this;
    }

    public function getAdminEmail(): ?string
    {
        return $this->adminEmail;
    }

    public function setAdminEmail(?string $adminEmail): self
    {
        $this->adminEmail = $adminEmail;

        return $this;
    }

    // Magic Methods
    public function __toString()
    {
        return $this->type;
    }
}
