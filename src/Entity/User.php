<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'user')]
class User implements UserInterface, PasswordAuthenticatedUserInterface, EquatableInterface
{
    #[ORM\Column(
        name: 'id',
        type: Types::INTEGER
    )]
    #[ORM\Id, ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id;

    #[ORM\Column(
        name: 'name',
        type: Types::STRING,
        length: 120
    )]
    private string $name;

    #[ORM\Column(
        name: 'username',
        type: Types::STRING,
        length: 120,
        unique: true
    )]
    private string $username;

    #[ORM\Column(
        name: 'password_hash',
        type: Types::STRING,
        length: 255
    )]
    private string $passwordHash;

    #[ORM\Column(
        name: 'created_at',
        type: Types::INTEGER
    )]
    private int $createdAt;

    #[ORM\Column(
        name: 'updated_at',
        type: Types::INTEGER,
        nullable: true
    )]
    private ?int $updatedAt;

    #[ORM\Column(
        name: 'last_login_at',
        type: Types::INTEGER,
        nullable: true
    )]
    private ?int $lastLoginAt;

    public function __construct()
    {
        $this->createdAt = \time();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function setPasswordHash(string $passwordHash): self
    {
        $this->passwordHash = $passwordHash;

        return $this;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getLastLoginAt(): ?int
    {
        return $this->lastLoginAt;
    }

    public function setLastLoginAt(?int $lastLoginAt): self
    {
        $this->lastLoginAt = $lastLoginAt;

        return $this;
    }

    public function getRoles(): array
    {
        $roles[] = 'ROLE_USER';

        return \array_unique($roles);
    }

    public function eraseCredentials()
    {
        $this->passwordHash = '';
    }

    public function getUserIdentifier(): string
    {
        return $this->username;
    }

    public function getPassword(): ?string
    {
        return $this->getPasswordHash();
    }

    public function isEqualTo(UserInterface $user): bool
    {
        if ($user->getUserIdentifier() === $this->getUserIdentifier()) {
            return true;
        }

        foreach ($user->getRoles() as $role) {
            if (!\in_array($role, $this->getRoles(), true)) {
                return false;
            }
        }

        return true;
    }
}
