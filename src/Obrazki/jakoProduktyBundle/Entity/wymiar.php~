<?php

namespace Obrazki\jakoProduktyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * wymiary
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class wymiar
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
     * @ORM\OneToMany(targetEntity="atrybuty",mappedBy="wymiar",cascade={"all"})
     */
    protected $atrybut;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->atrybut = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nazwa
     *
     * @param string $nazwa
     * @return wymiar
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
     * Add atrybut
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\atrybuty $atrybut
     * @return wymiar
     */
    public function addAtrybut(\Obrazki\jakoProduktyBundle\Entity\atrybuty $atrybut)
    {
        $this->atrybut[] = $atrybut;

        return $this;
    }

    /**
     * Remove atrybut
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\atrybuty $atrybut
     */
    public function removeAtrybut(\Obrazki\jakoProduktyBundle\Entity\atrybuty $atrybut)
    {
        $this->atrybut->removeElement($atrybut);
    }

    /**
     * Get atrybut
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAtrybut()
    {
        return $this->atrybut;
    }

    function __toString()
    {

    return $this->getNazwa();

    }


}
