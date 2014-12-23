<?php

namespace Obrazki\jakoProduktyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * atrybuty
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class atrybuty
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @ORM\ManyToOne(targetEntity="wrap",inversedBy="atrybut")
     */
    protected $wrapy;

    /**
     * @ORM\ManyToOne(targetEntity="wymiary",inversedBy="atrybut")
     *
     */
    protected $wymiar;

    /**
     * @ORM\ManyToOne(targetEntity="margines",inversedBy="atrybut")
     */
    protected $margines;

    function __toString()
    {
        return 'płótno margines:'.$this->getMargines()->getNazwa().' wymiar: '.$this->getWymiar()->getNazwa().' wrap: '.$this->getWrapy()->getNazwa();
    }


    /**
     * @ORM\OneToOne(targetEntity="typy",mappedBy="atrybut")
     */
    protected $plotno;




    /**
     * Set wrapy
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\wrap $wrapy
     * @return atrybuty
     */
    public function setWrapy(\Obrazki\jakoProduktyBundle\Entity\wrap $wrapy = null)
    {
        $this->wrapy = $wrapy;

        return $this;
    }

    /**
     * Get wrapy
     *
     * @return \Obrazki\jakoProduktyBundle\Entity\wrap 
     */
    public function getWrapy()
    {
        return $this->wrapy;
    }

    /**
     * Set wymiar
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\wymiary $wymiar
     * @return atrybuty
     */
    public function setWymiar(\Obrazki\jakoProduktyBundle\Entity\wymiary $wymiar = null)
    {
        $this->wymiar = $wymiar;

        return $this;
    }

    /**
     * Get wymiar
     *
     * @return \Obrazki\jakoProduktyBundle\Entity\wymiary 
     */
    public function getWymiar()
    {
        return $this->wymiar;
    }

    /**
     * Set margines
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\margines $margines
     * @return atrybuty
     */
    public function setMargines(\Obrazki\jakoProduktyBundle\Entity\margines $margines = null)
    {
        $this->margines = $margines;

        return $this;
    }

    /**
     * Get margines
     *
     * @return \Obrazki\jakoProduktyBundle\Entity\margines 
     */
    public function getMargines()
    {
        return $this->margines;
    }

    /**
     * Set plotno
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\typy $plotno
     * @return atrybuty
     */
    public function setPlotno(\Obrazki\jakoProduktyBundle\Entity\typy $plotno = null)
    {
        $this->plotno = $plotno;

        return $this;
    }

    /**
     * Get plotno
     *
     * @return \Obrazki\jakoProduktyBundle\Entity\typy 
     */
    public function getPlotno()
    {
        return $this->plotno;
    }
}
