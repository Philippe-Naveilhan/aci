<?php

namespace App\Entity;

use App\Repository\HouseCharacteristicsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HouseCharacteristicsRepository::class)
 */
class HouseCharacteristics
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=House::class, inversedBy="houseCharacteristics")
     * @ORM\JoinColumn(nullable=false)
     */
    private $house;

    /**
     * @ORM\ManyToOne(targetEntity=Characteristic::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $characteristic;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHouse(): ?House
    {
        return $this->house;
    }

    public function setHouse(?House $house): self
    {
        $this->house = $house;

        return $this;
    }

    public function getCharacteristic(): ?Characteristic
    {
        return $this->characteristic;
    }

    public function setCharacteristic(?Characteristic $characteristic): self
    {
        $this->characteristic = $characteristic;

        return $this;
    }
}
