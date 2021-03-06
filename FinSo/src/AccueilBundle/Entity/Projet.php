<?php

namespace AccueilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Projet
 *
 * @ORM\Table(name="projet")
 * @ORM\Entity(repositoryClass="AccueilBundle\Repository\ProjetRepository")
 * @Vich\Uploadable
 */
class Projet
{   




    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Montant", type="decimal", precision=10, scale=0)
     */
    private $montant;

    /**
     * 
     * @Vich\UploadableField(mapping="projet_image", fileNameProperty="imageName")
     * 
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName;

    /**
     * 
     * @Vich\UploadableField(mapping="projet_video", fileNameProperty="videoName")
     * 
     * @var File
     * @Assert\File(
     *  maxSize = "500M",
     *  mimeTypes = {"video/mpeg", "video/mp4", "video/quicktime", "video/x-ms-wmv", "video/x-msvideo", "video/x-flv"},
     *  mimeTypesMessage = "ce format de video est inconnu",
     *  uploadIniSizeErrorMessage = "uploaded file is larger than the upload_max_filesize PHP.ini setting",
     *  uploadFormSizeErrorMessage = "uploaded file is larger than allowed by the HTML file input field",
     *  uploadErrorMessage = "uploaded file could not be uploaded for some unknown reason",
     *  maxSizeMessage = "fichier trop volumineux"
     * )
     */
    private $videoFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $videoName;


    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
        * @ORM\ManyToOne(targetEntity="Utilisateur", cascade={"persist"})
        * @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
    */
    protected $utilisateur;

    /**
     * @var AccueilBundle\Entity\Categorie
     *
     * @ORM\ManyToOne(targetEntity="AccueilBundle\Entity\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categorie", referencedColumnName="id")
     * })
     */
    private $categorie;

    public function __toString(){
        return $this->getNom();
    }

    public function getUploadRootDir(){

        return __DIR__ . '/../../../web/uploads';
    }



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
     * @return Projet
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
     * Set description
     *
     * @param string $description
     * @return Projet
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set montant
     *
     * @param string $montant
     * @return Projet
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
     * Set utilisateur
     *
     * @param \AccueilBundle\Entity\Utilisateur $utilisateur
     * @return Projet
     */
    public function setUtilisateur(\AccueilBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \AccueilBundle\Entity\Utilisateur 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }


    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Projet
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

        /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Projet
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }


    public function getPathImage(){
        $helper = $this->container->get('vich_uploader.templating.helper.uploader_helper');
        $path = $helper->asset($this, 'image');
        //return $path;
    }




    /**
     * @param string $imageName
     *
     * @return Projet
     */
    public function setImageName($imageName)
    {
        
        $this->imageName = $imageName;
       
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set categorie
     *
     * @param \AccueilBundle\Entity\Category $categorie
     * @return Projet
     */
    public function setCategorie(\AccueilBundle\Entity\Category $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \AccueilBundle\Entity\Category 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $video
     *
     * @return Projet
     */
    public function setVideoFile(File $video = null)
    {
        $this->videoFile = $video;


        if ($video) {
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getVideoFile()
    {
        return $this->videoFile;
    }


    public function getPathVideo(){
        $helper = $this->container->get('vich_uploader.templating.helper.uploader_helper');
        $path = $helper->asset($this, 'video');
        //return $path;
    }

    /**
     * Set videoName
     *
     * @param string $videoName
     * @return Projet
     */
    public function setVideoName($videoName)
    {
        $this->videoName = $videoName;

        return $this;
    }

    /**
     * Get videoName
     *
     * @return string 
     */
    public function getVideoName()
    {
        return $this->videoName;
    }
}
