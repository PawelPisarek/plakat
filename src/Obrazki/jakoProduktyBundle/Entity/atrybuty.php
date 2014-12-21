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
    protected $wrap;

    /**
     * @ORM\ManyToOne(targetEntity="wymiary",inversedBy="atrybut")
     *
     */
    protected $wymiary;

    /**
     * @ORM\ManyToOne(targetEntity="margines",inversedBy="atrybut")
     */
    protected $margines;


    /**
     * Set wrap
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\wrap $wrap
     * @return atrybuty
     */
    public function setWrap(\Obrazki\jakoProduktyBundle\Entity\wrap $wrap = null)
    {
        $this->wrap = $wrap;

        return $this;
    }

    /**
     * Get wrap
     *
     * @return \Obrazki\jakoProduktyBundle\Entity\wrap 
     */
    public function getWrap()
    {
        return $this->wrap;
    }

    /**
     * Set wymaiary
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\wymiary $wymaiary
     * @return atrybuty
     */
    public function setWymaiary(\Obrazki\jakoProduktyBundle\Entity\wymiary $wymaiary = null)
    {
        $this->wymaiary = $wymaiary;

        return $this;
    }

    /**
     * Get wymaiary
     *
     * @return \Obrazki\jakoProduktyBundle\Entity\wymiary 
     */
    public function getWymaiary()
    {
        return $this->wymaiary;
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
     * Set wymiary
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\wymiary $wymiary
     * @return atrybuty
     */
    public function setWymiary(\Obrazki\jakoProduktyBundle\Entity\wymiary $wymiary = null)
    {
        $this->wymiary = $wymiary;

        return $this;
    }

    /**
     * Get wymiary
     *
     * @return \Obrazki\jakoProduktyBundle\Entity\wymiary 
     */
    public function getWymiary()
    {
        return $this->wymiary;
    }

    function __toString()
    {
        return 'atrybuty płótna '.$this->getMargines()->getNazwa().' '.$this->getWymiary()->getNazwa().' '.$this->getWrap()->getNazwa();
    }


    /**
     * @ORM\OneToOne(targetEntity="typy")
     */
    protected $plotno;

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