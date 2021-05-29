<?php

namespace App\Entity;

use App\Repository\HouseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HouseRepository::class)
 */
class House
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
    private $name;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $zipcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity=HouseCharacteristics::class, mappedBy="house", orphanRemoval=true)
     */
    private $houseCharacteristics;

    public function __construct()
    {
        $this->pictures = new ArrayCollection();
        $this->houseCharacteristics = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(?string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection|HouseCharacteristics[]
     */
    public function getHouseCharacteristics(): Collection
    {
        return $this->houseCharacteristics;
    }

    public function addHouseCharacteristic(HouseCharacteristics $houseCharacteristic): self
    {
        if (!$this->houseCharacteristics->contains($houseCharacteristic)) {
            $this->houseCharacteristics[] = $houseCharacteristic;
            $houseCharacteristic->setHouse($this);
        }

        return $this;
    }

    public function removeHouseCharacteristic(HouseCharacteristics $houseCharacteristic): self
    {
        if ($this->houseCharacteristics->removeElement($houseCharacteristic)) {
            // set the owning side to null (unless already changed)
            if ($houseCharacteristic->getHouse() === $this) {
                $houseCharacteristic->setHouse(null);
            }
        }

        return $this;
    }
}
