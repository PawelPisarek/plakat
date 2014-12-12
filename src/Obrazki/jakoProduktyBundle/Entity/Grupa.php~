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
     * Constructor
     */
    public function __construct()
    {
        $this->podgrupy = new \Doctrine\Common\Collections\ArrayCollection();
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
}
