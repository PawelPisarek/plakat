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



//    skromna Uwaga
//    jeśli zwórci błąd że nie można dodać itp to jest dobrze bo dzięki temu mamy różne typy

    /**
     * @ORM\OneToOne(targetEntity="atrybuty", inversedBy="plotno",cascade={"all"})
     * @ORM\JoinColumn(name="plotno",referencedColumnName="id")
     */
    protected $atrybut;

    /**
     * @ORM\OneToOne(targetEntity="koszulka",inversedBy="rozmiar",cascade={"all"})
     * @ORM\JoinColumn(name="kubek_id",referencedColumnName="id")
     */
    protected $koszulki;

    /**
     * @ORM\OneToMany(targetEntity="Obrazki\pfBundle\Entity\Produkt",mappedBy="id_typu")
     */
    protected $typys;


    /**
     * @var string
     *
     * @ORM\Column(name="nazwa", type="string", length=255)
     */
    private $nazwa;



//skromna Uwaga
//    jeśli zwórci błąd że nie można dodać itp to jest dobrze bo dzięki temu mamy różne typy

    function __toString()
    {
        return $this->getAtrybut().' '.$this->getKoszulki();
    }



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->typys = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set nazwa
     *
     * @param string $nazwa
     * @return typy
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
     * Set atrybut
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\atrybuty $atrybut
     * @return typy
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

    /**
     * Set koszulki
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\koszulka $koszulki
     * @return typy
     */
    public function setKoszulki(\Obrazki\jakoProduktyBundle\Entity\koszulka $koszulki = null)
    {
        $this->koszulki = $koszulki;

        return $this;
    }

    /**
     * Get koszulki
     *
     * @return \Obrazki\jakoProduktyBundle\Entity\koszulka 
     */
    public function getKoszulki()
    {
        return $this->koszulki;
    }

    /**
     * Add typys
     *
     * @param \Obrazki\pfBundle\Entity\Produkt $typys
     * @return typy
     */
    public function addTypy(\Obrazki\pfBundle\Entity\Produkt $typys)
    {
        $this->typys[] = $typys;

        return $this;
    }

    /**
     * Remove typys
     *
     * @param \Obrazki\pfBundle\Entity\Produkt $typys
     */
    public function removeTypy(\Obrazki\pfBundle\Entity\Produkt $typys)
    {
        $this->typys->removeElement($typys);
    }

    /**
     * Get typys
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTypys()
    {
        return $this->typys;
    }
}
