<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExerciseRepository")
 */
class Exercise
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $title;

    /**
     * @ORM\Column(type="smallint")
     */
    private $time;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $img_path;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $score;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Hint")
     */
    private $hints;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Prerequisite", inversedBy="exercises")
     */
    private $prerequisites;

    public function __construct()
    {
        $this->hints = new ArrayCollection();
        $this->prerequisites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTime(): ?int
    {
        return $this->time;
    }

    public function setTime(int $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getImgPath(): ?string
    {
        return $this->img_path;
    }

    public function setImgPath(string $img_path): self
    {
        $this->img_path = $img_path;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection|Hint[]
     */
    public function getHints(): Collection
    {
        return $this->hints;
    }

    public function addHint(Hint $hint): self
    {
        if (!$this->hints->contains($hint)) {
            $this->hints[] = $hint;
        }

        return $this;
    }

    public function removeHint(Hint $hint): self
    {
        if ($this->hints->contains($hint)) {
            $this->hints->removeElement($hint);
        }

        return $this;
    }

    /**
     * @return Collection|Prerequisite[]
     */
    public function getPrerequisites(): Collection
    {
        return $this->prerequisites;
    }

    public function addPrerequisite(Prerequisite $prerequisite): self
    {
        if (!$this->prerequisites->contains($prerequisite)) {
            $this->prerequisites[] = $prerequisite;
        }

        return $this;
    }

    public function removePrerequisite(Prerequisite $prerequisite): self
    {
        if ($this->prerequisites->contains($prerequisite)) {
            $this->prerequisites->removeElement($prerequisite);
        }

        return $this;
    }
}