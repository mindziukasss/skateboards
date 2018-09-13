<?php

namespace App\Entity\Skateboard;

use App\Entity\Traits\WithMedia;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkateboardRepository")
 */
class Skateboard
{
    use WithMedia;

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
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    private $length;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    private $width;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $weight;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $maxUserWeight;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $likeCount;

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
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Skateboard
     */
    public function setTitle(string $title): Skateboard
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Skateboard
     */
    public function setDescription(string $description): Skateboard
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return Skateboard
     */
    public function setPrice(float $price): Skateboard
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getLength(): ?float
    {
        return $this->length;
    }

    /**
     * @param float $length
     *
     * @return Skateboard
     */
    public function setLength(float $length): Skateboard
    {
        $this->length = $length;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getWidth(): ?float
    {
        return $this->width;
    }

    /**
     * @param float $width
     *
     * @return Skateboard
     */
    public function setWidth(float $width): Skateboard
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getWeight(): ?int
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     *
     * @return Skateboard
     */
    public function setWeight(int $weight): Skateboard
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxUserWeight(): ?int
    {
        return $this->maxUserWeight;
    }

    /**
     * @param int $maxUserWeight
     *
     * @return Skateboard
     */
    public function setMaxUserWeight(int $maxUserWeight): Skateboard
    {
        $this->maxUserWeight = $maxUserWeight;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getLikeCount(): ?int
    {
        return $this->likeCount;
    }

    /**
     * @param int|null $likeCount
     *
     * @return Skateboard
     */
    public function setLikeCount(?int $likeCount): Skateboard
    {
        $this->likeCount = $likeCount;

        return $this;
    }
}