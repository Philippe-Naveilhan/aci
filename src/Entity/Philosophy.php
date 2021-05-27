<?php

namespace App\Entity;

use App\Repository\PhilosophyRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=PhilosophyRepository::class)
 * @Vich\Uploadable
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
     * @var string
     */
    private $leftPicture;

    /**
     * @Vich\UploadableField(mapping="site", fileNameProperty="leftPicture")
     * @var File|null
     */
    private $leftPictureFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $leftUpdatedAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rightPicture;

    /**
     * @Vich\UploadableField(mapping="site", fileNameProperty="rightPicture")
     * @var File|null
     */
    private $rightPictureFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $rightUpdatedAt;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text;

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @param File|null $leftPictureFile
     */
    public function setLeftPictureFile(?File $leftPictureFile)
    {
        $this->leftPictureFile = $leftPictureFile;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($leftPictureFile) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->leftUpdatedAt = new \DateTime('now');
        }
    }

    /**
     * @return File|null
     */
    public function getLeftPictureFile(): ?File
    {
        return $this->leftPictureFile;
    }

    public function setLeftPicture($leftPicture)
    {
        $this->leftPicture = $leftPicture;
    }

    public function getLeftPicture()
    {
        return $this->leftPicture;
    }

    public function getLeftUpdatedAt(): ?\DateTimeInterface
    {
        return $this->leftUpdatedAt;
    }

    public function setLeftUpdatedAt(?\DateTimeInterface $leftUpdatedAt): self
    {
        $this->leftUpdatedAt = $leftUpdatedAt;

        return $this;
    }

    /**
     * @param File|null $rightPictureFile
     */
    public function setRightPictureFile(?File $rightPictureFile)
    {
        $this->rightPictureFile = $rightPictureFile;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($rightPictureFile) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->rightUpdatedAt = new \DateTime('now');
        }
    }

    /**
     * @return File|null
     */
    public function getRightPictureFile(): ?File
    {
        return $this->rightPictureFile;
    }

    public function setRightPicture($rightPicture)
    {
        $this->rightPicture = $rightPicture;
    }

    public function getRightPicture()
    {
        return $this->rightPicture;
    }

    public function getRightUpdatedAt(): ?\DateTimeInterface
    {
        return $this->rightUpdatedAt;
    }

    public function setRightUpdatedAt(?\DateTimeInterface $rightUpdatedAt): self
    {
        $this->rightUpdatedAt = $rightUpdatedAt;

        return $this;
    }
}
