<?php

namespace Obrazki\jakoProduktyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grupa
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Grupa
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
     * @ORM\OneToMany(targetEntity="PodGrupa", mappedBy="grupy")
     */
    protected  $podgrupy;

    /**
     * @ORM\OneToMany(targetEntity="Obrazki\wbazieBundle\Entity\Przed", mappedBy="grupa")
     */
    protected $zdjecie;




    function __toString()
    {
            return $this->getNazwa();
            }



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->podgrupy = new \Doctrine\Common\Collections\ArrayCollection();
        $this->zdjecie = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Grupa
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
     * Add podgrupy
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\PodGrupa $podgrupy
     * @return Grupa
     */
    public function addPodgrupy(\Obrazki\jakoProduktyBundle\Entity\PodGrupa $podgrupy)
    {
        $this->podgrupy[] = $podgrupy;

        return $this;
    }

    /**
     * Remove podgrupy
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\PodGrupa $podgrupy
     */
    public function removePodgrupy(\Obrazki\jakoProduktyBundle\Entity\PodGrupa $podgrupy)
    {
        $this->podgrupy->removeElement($podgrupy);
    }

    /**
     * Get podgrupy
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPodgrupy()
    {
        return $this->podgrupy;
    }

    /**
     * Add zdjecie
     *
     * @param \Obrazki\wbazieBundle\Entity\Przed $zdjecie
     * @return Grupa
     */
    public function addZdjecie(\Obrazki\wbazieBundle\Entity\Przed $zdjecie)
    {
        $this->zdjecie[] = $zdjecie;

        return $this;
    }

    /**
     * Remove zdjecie
     *
     * @param \Obrazki\wbazieBundle\Entity\Przed $zdjecie
     */
    public function removeZdjecie(\Obrazki\wbazieBundle\Entity\Przed $zdjecie)
    {
        $this->zdjecie->removeElement($zdjecie);
    }

    /**
     * Get zdjecie
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getZdjecie()
    {
        return $this->zdjecie;
    }
}
