<?php

namespace AccueilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contribution
 *
 * @ORM\Table(name="contribution")
 * @ORM\Entity(repositoryClass="AccueilBundle\Repository\ContributionRepository")
 */
class Contribution
{   

    /**
   * @ORM\Id
   * @ORM\ManyToOne(targetEntity="Projet")
   */
    private $projet;


    /**
   * @ORM\Id
   * @ORM\ManyToOne(targetEntity="Contributeur")
   */
    private $Contributeur;


    /**
     * @var string
     *
     * @ORM\Column(name="Montant", type="decimal", precision=10, scale=0)
     */
    private $montant;

    /**
     * @var string
     *
     * @ORM\Column(name="Typepayement", type="string", length=255)
     */
    private $typepayement;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set montant
     *
     * @param string $montant
     * @return Contribution
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return string 
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set typepayement
     *
     * @param string $typepayement
     * @return Contribution
     */
    public function setTypepayement($typepayement)
    {
        $this->typepayement = $typepayement;

        return $this;
    }

    /**
     * Get typepayement
     *
     * @return string 
     */
    public function getTypepayement()
    {
        return $this->typepayement;
    }

    /**
     * Set projet
     *
     * @param \AccueilBundle\Entity\Projet $projet
     * @return Contribution
     */
    public function setProjet(\AccueilBundle\Entity\Projet $projet)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return \AccueilBundle\Entity\Projet 
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * Set Contributeur
     *
     * @param \AccueilBundle\Entity\Contributeur $contributeur
     * @return Contribution
     */
    public function setContributeur(\AccueilBundle\Entity\Contributeur $contributeur)
    {
        $this->Contributeur = $contributeur;

        return $this;
    }

    /**
     * Get Contributeur
     *
     * @return \AccueilBundle\Entity\Contributeur 
     */
    public function getContributeur()
    {
        return $this->Contributeur;
    }
}
