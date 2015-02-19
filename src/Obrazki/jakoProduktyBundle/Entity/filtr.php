<?php

namespace Obrazki\jakoProduktyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * filtr
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class filtr
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nazwa", type="string", length=255)
     */
    private $nazwa;


    /**
     * @ORM\OneToMany(targetEntity="Obrazki\pfBundle\Entity\Produkt",mappedBy="filtru")
     */
    protected $filtry;


    /**
     *
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nazwa
     *
     * @param string $nazwa
     * @return filtr
     */
    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;

        return $this;
    }

    /**
     * Get nazwa
     *
     * @return string 
     */
    public function getNazwa()
    {
        return $this->nazwa;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->filtry = new \Doctrine\Common\Collections\ArrayCollection();
    }

    function __toString()
    {
        return $this->getNazwa();

    }


    /**
     *
     * Add filtry
     *
     * @param \Obrazki\pfBundle\Entity\Produkt $filtry
     * @return filtr
     */
    public function addFiltry(\Obrazki\pfBundle\Entity\Produkt $filtry)
    {
        $this->filtry[] = $filtry;

        return $this;
    }

    /**
     * Remove filtry
     *
     * @param \Obrazki\pfBundle\Entity\Produkt $filtry
     */
    public function removeFiltry(\Obrazki\pfBundle\Entity\Produkt $filtry)
    {
        $this->filtry->removeElement($filtry);
    }

    /**
     * Get filtry
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFiltry()
    {
        return $this->filtry;
    }
}
