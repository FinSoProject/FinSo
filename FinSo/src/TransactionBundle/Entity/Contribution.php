<?php

namespace TransactionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contribution
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TransactionBundle\Entity\ContributionRepository")
 */
class Contribution
{   


   /**
   * @ORM\Id
   * @ORM\ManyToOne(targetEntity="Membre")
   */

    private $membre;

   /**
   * @ORM\Id
   * @ORM\ManyToOne(targetEntity="Projet")
   */

    private $projet;


    /**
     * @var string
     *
     * @ORM\Column(name="Montant", type="decimal")
     */
    private $montant;

    /**
     * @var string
     *
     * @ORM\Column(name="Typepayement", type="string", length=255)
     */
    private $typepayement;


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
     * @param \src\TransactionBundle\Entity\Projet $projet
     * @return Contribution
     */
    public function setProjet(\src\TransactionBundle\Entity\Projet $projet)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return \src\TransactionBundle\Entity\Projet 
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * Set membre
     *
     * @param \src\TransactionBundle\Entity\Membre $membre
     * @return Contribution
     */
    public function setMembre(\src\TransactionBundle\Entity\Membre $membre)
    {
        $this->membre = $membre;

        return $this;
    }

    /**
     * Get membre
     *
     * @return \src\TransactionBundle\Entity\Membre 
     */
    public function getMembre()
    {
        return $this->membre;
    }
}
