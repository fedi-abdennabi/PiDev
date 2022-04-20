<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Messagerie
 *
 * @ORM\Table(name="messagerie", indexes={@ORM\Index(name="fkIdPatient", columns={"IdPatient"}), @ORM\Index(name="fkIdExpert", columns={"IdExpert"})})
 * @ORM\Entity
 */
class Messagerie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_message", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMessage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_envoi", type="date", nullable=false)
     */
    private $dateEnvoi;

    /**
     * @var string
     * @Assert\NotBlank(message="Message vide")
	 * @Assert\Length(
	 *     min=1,
	 *     max=100,
	 *     minMessage=" le message doit comporter au moins {{ limit }} caractères ",
	 *     maxMessage=" le message doit comporter au plus {{ limit }} caractères "
	 *
	 * )
	 * @ORM\Column(name="contenu", type="string", length=100)
	 */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_recep", type="date", nullable=false)
     */
    private $dateRecep;

    /**
     * @var int
     *
     * @ORM\Column(name="IdExpert", type="integer", nullable=false)
     */
    private $idexpert;

    /**
     * @var int
     *
     * @ORM\Column(name="IdPatient", type="integer", nullable=false)
     */
    private $idpatient;

	/**
	 * @return int
	 */
	public function getIdMessage(): int
	{
		return $this->idMessage;
	}

	/**
	 * @param int $idMessage
	 */
	public function setIdMessage(int $idMessage): void
	{
		$this->idMessage = $idMessage;
	}

	/**
	 * @return \DateTime
	 */
	public function getDateEnvoi(): \DateTime
	{
		return $this->dateEnvoi;
	}

	/**
	 * @param \DateTime $dateEnvoi
	 */
	public function setDateEnvoi(\DateTime $dateEnvoi): void
	{
		$this->dateEnvoi = $dateEnvoi;
	}

	/**
	 * @return string
	 */
	public function getContenu(): ?string
	{
		return $this->contenu;
	}

	/**
	 * @param string $contenu
	 */
	public function setContenu(string $contenu): void
	{
		$this->contenu = $contenu;
	}

	/**
	 * @return \DateTime
	 */
	public function getDateRecep(): \DateTime
	{
		return $this->dateRecep;
	}

	/**
	 * @param \DateTime $dateRecep
	 */
	public function setDateRecep(\DateTime $dateRecep): void
	{
		$this->dateRecep = $dateRecep;
	}

	/**
	 * @return int
	 */
	public function getIdexpert(): int
	{
		return $this->idexpert;
	}

	/**
	 * @param int $idexpert
	 */
	public function setIdexpert(int $idexpert): void
	{
		$this->idexpert = $idexpert;
	}

	/**
	 * @return int
	 */
	public function getIdpatient(): int
	{
		return $this->idpatient;
	}

	/**
	 * @param int $idpatient
	 */
	public function setIdpatient(int $idpatient): void
	{
		$this->idpatient = $idpatient;
	}


}
