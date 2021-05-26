<?php

namespace App\Entity;

use App\Repository\PhilosophyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PhilosophyRepository::class)
 */
class Philosophy
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
    private $leftPicture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rightPicture;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLeftPicture(): ?string
    {
        return $this->leftPicture;
    }

    public function setLeftPicture(?string $leftPicture): self
    {
        $this->leftPicture = $leftPicture;

        return $this;
    }

    public function getRightPicture(): ?string
    {
        return $this->rightPicture;
    }

    public function setRightPicture(string $rightPicture): self
    {
        $this->rightPicture = $rightPicture;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }
}
