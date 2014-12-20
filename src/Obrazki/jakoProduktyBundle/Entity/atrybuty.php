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
     * @ORM\OneToOne(targetEntity="wrap",inversedBy="atrybut",cascade={"all"})
     * @ORM\JoinColumn(name="wrap_id",referencedColumnName="id")
     */
    protected $wrap;

    /**
     * @ORM\OneToOne(targetEntity="wymiary",inversedBy="atrybut",cascade={"all"})
     * @ORM\JoinColumn(name="wymiary_id",referencedColumnName="id")
     */
    protected $wymaiary;

    /**
     * @ORM\OneToOne(targetEntity="margines",inversedBy="atrybut",cascade={"all"})
     * @ORM\JoinColumn(name="margines_id",referencedColumnName="id")
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
}
