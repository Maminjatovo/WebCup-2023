<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomClient = null;

    #[ORM\Column(length: 50)]
    private ?string $phoneCLient = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $cinClient = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $emailClient = null;

    #[ORM\Column(length: 60)]
    private ?string $dateNaissClient = null;

    #[ORM\Column(length: 255)]
    private ?string $adresseClient = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomClient(): ?string
    {
        return $this->nomClient;
    }

    public function setNomClient(string $nomClient): self
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    public function getPhoneCLient(): ?string
    {
        return $this->phoneCLient;
    }

    public function setPhoneCLient(string $phoneCLient): self
    {
        $this->phoneCLient = $phoneCLient;

        return $this;
    }

    public function getCinClient(): ?string
    {
        return $this->cinClient;
    }

    public function setCinClient(?string $cinClient): self
    {
        $this->cinClient = $cinClient;

        return $this;
    }

    public function getEmailClient(): ?string
    {
        return $this->emailClient;
    }

    public function setEmailClient(?string $emailClient): self
    {
        $this->emailClient = $emailClient;

        return $this;
    }

    public function getDateNaissClient(): ?string
    {
        return $this->dateNaissClient;
    }

    public function setDateNaissClient(string $dateNaissClient): self
    {
        $this->dateNaissClient = $dateNaissClient;

        return $this;
    }

    public function getAdresseClient(): ?string
    {
        return $this->adresseClient;
    }

    public function setAdresseClient(string $adresseClient): self
    {
        $this->adresseClient = $adresseClient;

        return $this;
    }
}
