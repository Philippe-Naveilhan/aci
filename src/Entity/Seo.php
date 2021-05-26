<?php

namespace App\Entity;

use App\Repository\SeoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeoRepository::class)
 */
class Seo
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
    private $words;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sentences;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWords(): ?string
    {
        return $this->words;
    }

    public function setWords(?string $words): self
    {
        $this->words = $words;

        return $this;
    }

    public function getSentences(): ?string
    {
        return $this->sentences;
    }

    public function setSentences(?string $sentences): self
    {
        $this->sentences = $sentences;

        return $this;
    }
}
