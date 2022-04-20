<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement", indexes={@ORM\Index(name="fkIdExpert", columns={"IdExpert"}), @ORM\Index(name="fkIdPatient", columns={"IdPatient"})})
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_event", type="string", length=30, nullable=false)
     */
    private $nomEvent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="description_event", type="string", length=100, nullable=false)
     */
    private $descriptionEvent;

    /**
     * @var int
     *
     * @ORM\Column(name="prix_event", type="integer", nullable=false)
     */
    private $prixEvent;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_place", type="integer", nullable=false)
     */
    private $nbrPlace;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="valide", type="string", length=255, nullable=false)
     */
    private $valide;

    /**
     * @var int
     *
     * @ORM\Column(name="participants", type="integer", nullable=false)
     */
    private $participants;

    /**
     * @var int
     *
     * @ORM\Column(name="IdPatient", type="integer", nullable=false)
     */
    private $idpatient;

    /**
     * @var \Expert
     *
     * @ORM\ManyToOne(targetEntity="Expert")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdExpert", referencedColumnName="IdExpert")
     * })
     */
    private $idexpert;


}
