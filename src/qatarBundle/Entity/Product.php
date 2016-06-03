<?php

namespace qatarBundle\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table("name=product")
 * @ORM\Entity(repositoryClass="qatarBundle\Entity\ProductRepository")
 * @Vich\Uploadable
 */
class Product
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $marque;

    /**
     * @var string
     */
    private $prix;

    /**
     * @var string
     */
    private $kilometre;

    /**
     * @var string
     */
    private $transmission;

    /**
     * @var string
     */
    private $puissance;

    /**
     * @var string
     */
    private $anne;

    /**
     * @var string
     */
    private $energie;

    /**
     * @var string
     */
    private $portes;

    /**
     *
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @var string
     */
    private $description;


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
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set marque
     *
     * @param string $marque
     * @return Product
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set prix
     *
     * @param string $prix
     * @return Product
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set kilometre
     *
     * @param string $kilometre
     * @return Product
     */
    public function setKilometre($kilometre)
    {
        $this->kilometre = $kilometre;

        return $this;
    }

    /**
     * Get kilometre
     *
     * @return string
     */
    public function getKilometre()
    {
        return $this->kilometre;
    }

    /**
     * Set transmission
     *
     * @param string $transmission
     * @return Product
     */
    public function setTransmission($transmission)
    {
        $this->transmission = $transmission;

        return $this;
    }

    /**
     * Get transmission
     *
     * @return string
     */
    public function getTransmission()
    {
        return $this->transmission;
    }

    /**
     * Set puissance
     *
     * @param string $puissance
     * @return Product
     */
    public function setPuissance($puissance)
    {
        $this->puissance = $puissance;

        return $this;
    }

    /**
     * Get puissance
     *
     * @return string
     */
    public function getPuissance()
    {
        return $this->puissance;
    }

    /**
     * Set anne
     *
     * @param string $anne
     * @return Product
     */
    public function setAnne($anne)
    {
        $this->anne = $anne;

        return $this;
    }

    /**
     * Get anne
     *
     * @return string
     */
    public function getAnne()
    {
        return $this->anne;
    }

    /**
     * Set energie
     *
     * @param string $energie
     * @return Product
     */
    public function setEnergie($energie)
    {
        $this->energie = $energie;

        return $this;
    }

    /**
     * Get energie
     *
     * @return string
     */
    public function getEnergie()
    {
        return $this->energie;
    }

    /**
     * Set portes
     *
     * @param string $portes
     * @return Product
     */
    public function setPortes($portes)
    {
        $this->portes = $portes;

        return $this;
    }

    /**
     * Get portes
     *
     * @return string
     */
    public function getPortes()
    {
        return $this->portes;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Product
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
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
}
