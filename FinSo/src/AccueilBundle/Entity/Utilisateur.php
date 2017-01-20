<?php

namespace AccueilBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="AccueilBundle\Repository\UtilisateurRepository")
 */
class Utilisateur extends BaseUser
{ 
   /**
   * @ORM\ManyToOne(targetEntity="Structure", cascade={"persist", "remove"})
   * @ORM\JoinColumn(name="structure_id", referencedColumnName="id")
   */
    protected $structure;
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="Motsdepasse", type="string", length=255)
     */
    private $motsdepasse;


    /**
     * @var string
     *
     * @ORM\Column(name="Telephone", type="string", length=255)
     */
    protected $telephone;


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
     * Set nom
     *
     * @param string $nom
     * @return Utilisateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set motsdepasse
     *
     * @param string $motsdepasse
     * @return Utilisateur
     */
    public function setMotsdepasse($motsdepasse)
    {
        $this->motsdepasse = $motsdepasse;

        return $this;
    }

    /**
     * Get motsdepasse
     *
     * @return string 
     */
    public function getMotsdepasse()
    {
        return $this->motsdepasse;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Utilisateur
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set structure
     *
     * @param \AccueilBundle\Entity\Structure $structure
     * @return Utilisateur
     */
    public function setStructure(\AccueilBundle\Entity\Structure $structure)
    {
        $this->structure = $structure;

        return $this;
    }

    /**
     * Get structure
     *
     * @return \AccueilBundle\Entity\Structure 
     */
    public function getStructure()
    {
        return $this->structure;
    }    

}
