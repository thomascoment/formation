<?php

namespace App\Entity;

use App\Repository\AuthorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthorRepository::class)]
class Author
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 63)]
    private ?string $Author = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Biography = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $birthday = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $deathday = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $created_at;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at;

    /**
     * @var Collection<int, Citations>
     */
    #[ORM\OneToMany(targetEntity: Citations::class, mappedBy: 'author')]
    private Collection $citations;

    public function __construct()
    {
        $this->citations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?string
    {
        return $this->Author;
    }

    public function setAuthor(string $Author): static
    {
        $this->Author = $Author;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->Biography;
    }

    public function setBiography(?string $Biography): static
    {
        $this->Biography = $Biography;

        return $this;
    }

    public function getBirthday(): ?\DateTimeImmutable
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeImmutable $birthday): static
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getDeathday(): ?\DateTimeImmutable
    {
        return $this->deathday;
    }

    public function setDeathday(?\DateTimeImmutable $deathday): static
    {
        $this->deathday = $deathday;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection<int, Citations>
     */
    public function getCitations(): Collection
    {
        return $this->citations;
    }

    public function addCitation(Citations $citation): static
    {
        if (!$this->citations->contains($citation)) {
            $this->citations->add($citation);
            $citation->setAuthor($this);
        }

        return $this;
    }

    public function removeCitation(Citations $citation): static
    {
        if ($this->citations->removeElement($citation)) {
            // set the owning side to null (unless already changed)
            if ($citation->getAuthor() === $this) {
                $citation->setAuthor(null);
            }
        }

        return $this;
    }
}
