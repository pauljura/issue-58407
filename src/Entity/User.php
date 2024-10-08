<?php declare(strict_types=1);

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity()]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'id', type: Types::INTEGER, nullable: false)]
    private ?int $id = null;

    #[ORM\Column(name: 'email', type: Types::STRING, length: 255, nullable: false)]
    #[Assert\NotBlank(groups: [Constraint::DEFAULT_GROUP, 'Registration'])]
    #[Assert\Email(groups: [Constraint::DEFAULT_GROUP, 'Registration'])]
    private ?string $email = null;

    #[ORM\Column(name: 'first_name', type: Types::STRING, length: 255, nullable: false)]
    #[Assert\NotBlank(groups: [Constraint::DEFAULT_GROUP, 'Registration'])]
    private ?string $firstName = null;

    #[ORM\Column(name: 'last_name', type: Types::STRING, length: 255, nullable: false)]
    #[Assert\NotBlank(groups: ['Other'])]
    private ?string $lastName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }


}
