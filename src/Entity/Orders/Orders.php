<?php

namespace App\Entity\Orders;

use App\Entity\Skateboard\Skateboard;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrdersRepository")
 */
class Orders
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=125)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=125)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @var Skateboard
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Skateboard\Skateboard")
     */
    private $skateboard;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Orders
     */
    public function setName(string $name): Orders
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     *
     * @return Orders
     */
    public function setSurname(string $surname): Orders
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return Orders
     */
    public function setEmail(string $email): Orders
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPhone(): ?int
    {
        return $this->phone;
    }

    /**
     * @param int $phone
     *
     * @return Orders
     */
    public function setPhone(int $phone): Orders
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return Orders
     */
    public function setCity(string $city): Orders
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string $address
     *
     * @return Orders
     */
    public function setAddress(string $address): Orders
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Skateboard
     */
    public function getSkateboard(): ?Skateboard
    {
        return $this->skateboard;
    }

    /**
     * @param Skateboard $skateboard
     *
     * @return $this
     */
    public function setSkateboard(Skateboard $skateboard)
    {
        $this->skateboard = $skateboard;

        return $this;
    }
}