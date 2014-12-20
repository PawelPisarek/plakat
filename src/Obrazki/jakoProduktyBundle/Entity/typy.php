<?php

namespace Obrazki\jakoProduktyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * typy
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class typy
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
     * @ORM\OneToOne(targetEntity="atrybuty", inversedBy="plotno",cascade={"all"})
     * @ORM\JoinColumn(name="plotno",referencedColumnName="id")
     */
    protected $atrybuty;



    /**
     * Set atrybuty
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\atrybuty $atrybuty
     * @return typy
     */
    public function setAtrybuty(\Obrazki\jakoProduktyBundle\Entity\atrybuty $atrybuty = null)
    {
        $this->atrybuty = $atrybuty;

        return $this;
    }

    /**
     * Get atrybuty
     *
     * @return \Obrazki\jakoProduktyBundle\Entity\atrybuty 
     */
    public function getAtrybuty()
    {
        return $this->atrybuty;
    }
}
