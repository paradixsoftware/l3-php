<?php

namespace App\Entity;

use App\Repository\PronosticsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PronosticsRepository::class)
 */
class Pronostics
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $score_domicile;

    /**
     * @ORM\Column(type="integer")
     */
    private $score_exterieur;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $match_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getScoreDomicile(): ?int
    {
        return $this->score_domicile;
    }

    public function setScoreDomicile(int $score_domicile): self
    {
        $this->score_domicile = $score_domicile;

        return $this;
    }

    public function getScoreExterieur(): ?int
    {
        return $this->score_exterieur;
    }

    public function setScoreExterieur(int $score_exterieur): self
    {
        $this->score_exterieur = $score_exterieur;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getMatchId(): ?int
    {
        return $this->match_id;
    }

    public function setMatchId(int $match_id): self
    {
        $this->match_id = $match_id;

        return $this;
    }
}
