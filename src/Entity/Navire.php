<?php

namespace App\Entity;

use App\Repository\NavireRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=NavireRepository::class)
 */
class Navire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=7, unique=true)
     * @Assert\Regex(
     *      pattern="/[1-9]{7}/",
     *      message="Le numéro IMOdoit comporter 7 chiffres"
     * )
     */
    private $imo;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Length(
     *                  min=3,
     *                  max=100
     *                  )
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=9)
     * @Assert\Length(
     *                  min=1,
     *                  max=9
     *                  )
     */
    private $mmsi;

    /**
     * @ORM\Column(type="string", length=10, name="indicatifappel", unique=true)
     */
    private $indicatifAppel;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $eta;

    /**
     * @ORM\Column(name="letype")
     * @ORM\ManyToOne(targetEntity=AisShipType::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $leType;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class)
     * @ORM\JoinColumn(nullable=false, name="idpays")
     */
    private $lePavillon;

    /**
     * @ORM\ManyToOne(targetEntity=Port::class, inversedBy="naviresAttendus", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true, name="idportdestination")
     */
    private $portDestination;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImo(): ?string
    {
        return $this->imo;
    }

    public function setImo(string $imo): self
    {
        $this->imo = $imo;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMmsi(): ?string
    {
        return $this->mmsi;
    }

    public function setMmsi(string $mmsi): self
    {
        $this->mmsi = $mmsi;

        return $this;
    }

    public function getIndicatifAppel(): ?\DateTimeInterface
    {
        return $this->indicatifAppel;
    }

    public function setIndicatifAppel(\DateTimeInterface $indicatifAppel): self
    {
        $this->indicatifAppel = $indicatifAppel;

        return $this;
    }

    public function getYes(): ?string
    {
        return $this->eta;
    }

    public function setYes(string $yes): self
    {
        $this->eta = $yes;

        return $this;
    }

    public function getLeType(): ?AisShipType
    {
        return $this->leType;
    }

    public function setLeType(?AisShipType $leType): self
    {
        $this->leType = $leType;

        return $this;
    }

    public function getLePavillon(): ?Pays
    {
        return $this->lePavillon;
    }

    public function setLePavillon(?Pays $lePavillon): self
    {
        $this->lePavillon = $lePavillon;

        return $this;
    }

    public function getPortDestination(): ?Port
    {
        return $this->portDestination;
    }

    public function setPortDestination(?Port $portDestination): self
    {
        $this->portDestination = $portDestination;

        return $this;
    }
}
