<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 * @ApiResource(
 *      normalizationContext={"groups"={"read:collection"}}
 * )
 * 
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("read:collection")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("read:collection")
     * 
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("read:collection")
     * 
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="date")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="posts")
     */
    private $category;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
