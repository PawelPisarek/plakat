<?php

namespace Obrazki\jakoProduktyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * margines
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class margines
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
     * @return margines
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
     * @ORM\OneToMany(targetEntity="atrybuty", mappedBy="margines",cascade={"all"})
     */
    protected $atrybut;


    /**
     * Set atrybut
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\atrybuty $atrybut
     * @return margines
     */
    public function setAtrybut(\Obrazki\jakoProduktyBundle\Entity\atrybuty $atrybut = null)
    {
        $this->atrybut = $atrybut;

        return $this;
    }

    /**
     * Get atrybut
     *
     * @return \Obrazki\jakoProduktyBundle\Entity\atrybuty 
     */
    public function getAtrybut()
    {
        return $this->atrybut;
    }

    function __toString()
    {
        return $this->getNazwa();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->atrybut = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add atrybut
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\atrybuty $atrybut
     * @return margines
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
}
