<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StudentRepository")
 * @Serializer\ExclusionPolicy("ALL")
 */
class Student
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Serializer\Expose
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     * @Serializer\Expose
     * @Assert\NotBlank
     * @Assert\Length(
     *      max = 25,
     * )
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     * @Serializer\Expose
     * @Assert\NotBlank
     * @Assert\Length(
     *      max = 25,
     * )
     */
    private $lastname;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Serializer\Expose
     * @Assert\NotBlank
     * @Assert\Length(
     *      max = 10,
     * )
     */
    private $numEtud;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Departement", inversedBy="students")
     * @Assert\NotBlank
     */
    private $departement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getNumEtud(): ?int
    {
        return $this->numEtud;
    }

    public function setNumEtud(?int $numEtud): self
    {
        $this->numEtud = $numEtud;

        return $this;
    }

    public function getDepartement(): ?Departement
    {
        return $this->departement;
    }

    public function setDepartement(?Departement $departement): self
    {
        $this->departement = $departement;

        return $this;
    }
}
