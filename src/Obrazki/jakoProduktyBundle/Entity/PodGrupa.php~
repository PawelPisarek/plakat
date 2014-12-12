<?php

namespace Obrazki\jakoProduktyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PodGrupa
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class PodGrupa
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
     * @ORM\ManyToOne(targetEntity="Grupa", inversedBy="podgrupy")
     */
    protected  $grupy;

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
     * @return PodGrupa
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
     * Set grupy
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\Grupa $grupy
     * @return PodGrupa
     */
    public function setGrupy(\Obrazki\jakoProduktyBundle\Entity\Grupa $grupy = null)
    {
        $this->grupy = $grupy;

        return $this;
    }

    /**
     * Get grupy
     *
     * @return \Obrazki\jakoProduktyBundle\Entity\Grupa 
     */
    public function getGrupy()
    {
        return $this->grupy;
    }
}
