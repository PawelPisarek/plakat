<?php

namespace Obrazki\jakoProduktyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * kubek
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class kubek
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
     * @ORM\OneToOne(targetEntity="typy",mappedBy="kubki")
     */
    protected $typ;

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
     * @return kubek
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

    function __toString()
    {
        return $this->getNazwa();
    }



    /**
     * Set kubek
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\typy $kubek
     * @return kubek
     */
    public function setKubek(\Obrazki\jakoProduktyBundle\Entity\typy $kubek = null)
    {
        $this->kubek = $kubek;

        return $this;
    }

    /**
     * Get kubek
     *
     * @return \Obrazki\jakoProduktyBundle\Entity\typy 
     */
    public function getKubek()
    {
        return $this->kubek;
    }

    /**
     * Set typ
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\typy $typ
     * @return kubek
     */
    public function setTyp(\Obrazki\jakoProduktyBundle\Entity\typy $typ = null)
    {
        $this->typ = $typ;

        return $this;
    }

    /**
     * Get typ
     *
     * @return \Obrazki\jakoProduktyBundle\Entity\typy 
     */
    public function getTyp()
    {
        return $this->typ;
    }
}
