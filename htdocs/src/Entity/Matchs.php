<?php

namespace App\Entity;

use App\Repository\MatchsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatchsRepository::class)
 */
class Matchs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $domicile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $exterieur;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $score_domicile;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $score_exterieur;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $tiraubut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $winner;

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDomicile(): ?string
    {
        return $this->domicile;
    }

    public function setDomicile(?string $domicile): self
    {
        $this->domicile = $domicile;

        return $this;
    }

    public function getExterieur(): ?string
    {
        return $this->exterieur;
    }

    public function setExterieur(?string $exterieur): self
    {
        $this->exterieur = $exterieur;

        return $this;
    }

    public function getScoreDomicile(): ?int
    {
        return $this->score_domicile;
    }

    public function setScoreDomicile(?int $score_domicile): self
    {
        $this->score_domicile = $score_domicile;

        return $this;
    }

    public function getScoreExterieur(): ?int
    {
        return $this->score_exterieur;
    }

    public function setScoreExterieur(?int $score_exterieur): self
    {
        $this->score_exterieur = $score_exterieur;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTiraubut(): ?bool
    {
        return $this->tiraubut;
    }

    public function setTiraubut(bool $tiraubut): self
    {
        $this->tiraubut = $tiraubut;

        return $this;
    }

    public function getWinner(): ?string
    {
        return $this->winner;
    }

    public function setWinner(string $winner): self
    {
        $this->winner = $winner;

        return $this;
    }
}
