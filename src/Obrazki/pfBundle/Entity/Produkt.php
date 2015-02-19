<?php

namespace Obrazki\pfBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produkt
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Produkt
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
     * @var integer
     *
     * @ORM\Column(name="netto", type="integer")
     */
    private $netto;

    /**
     * @var integer
     *
     * @ORM\Column(name="brutto", type="integer")
     */
    private $brutto;

    /**
     * @var integer
     *
     * @ORM\Column(name="rabat", type="integer")
     */
    private $rabat;

    /**
     * @var integer
     *
     * @ORM\Column(name="procVat", type="integer")
     */
    private $procVat;

    /**
     * @ORM\ManyToMany(targetEntity="zamowienie",mappedBy="produkty")
     */
    protected $zamowienia;
//////////////////////////////////////////////////////////////////////////////

    /**
     * @ORM\ManyToOne(targetEntity="Obrazki\wbazieBundle\Entity\Przed",inversedBy="zdjecieprod",cascade={"persist"})
     */
    protected  $zdjecia;

//////////////////////////////////////////////////////////////////////////////////////

    /**
     * @ORM\ManyToOne(targetEntity="Obrazki\jakoProduktyBundle\Entity\filtr",inversedBy="filtry",cascade={"persist"})
     */
    protected $filtru;
//////////////////////////////////////////////////////////

    /**
     * @ORM\ManyToOne(targetEntity="Obrazki\jakoProduktyBundle\Entity\typy",inversedBy="typys",cascade={"all"})
     */
    protected $typu;

    function __toString()
    {


        return $this->getZdjecia().'';

    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->zamowienia = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set netto
     *
     * @param integer $netto
     * @return Produkt
     */
    public function setNetto($netto)
    {
        $this->netto = $netto;

        return $this;
    }

    /**
     * Get netto
     *
     * @return integer 
     */
    public function getNetto()
    {
        return $this->netto;
    }

    /**
     * Set brutto
     *
     * @param integer $brutto
     * @return Produkt
     */
    public function setBrutto($brutto)
    {
        $this->brutto = $brutto;

        return $this;
    }

    /**
     * Get brutto
     *
     * @return integer 
     */
    public function getBrutto()
    {
        return $this->brutto;
    }

    /**
     * Set rabat
     *
     * @param integer $rabat
     * @return Produkt
     */
    public function setRabat($rabat)
    {
        $this->rabat = $rabat;

        return $this;
    }

    /**
     * Get rabat
     *
     * @return integer 
     */
    public function getRabat()
    {
        return $this->rabat;
    }

    /**
     * Set procVat
     *
     * @param integer $procVat
     * @return Produkt
     */
    public function setProcVat($procVat)
    {
        $this->procVat = $procVat;

        return $this;
    }

    /**
     * Get procVat
     *
     * @return integer 
     */
    public function getProcVat()
    {
        return $this->procVat;
    }

    /**
     * Add zamowienia
     *
     * @param \Obrazki\pfBundle\Entity\zamowienie $zamowienia
     * @return Produkt
     */
    public function addZamowienium(\Obrazki\pfBundle\Entity\zamowienie $zamowienia)
    {
        $this->zamowienia[] = $zamowienia;

        return $this;
    }

    /**
     * Remove zamowienia
     *
     * @param \Obrazki\pfBundle\Entity\zamowienie $zamowienia
     */
    public function removeZamowienium(\Obrazki\pfBundle\Entity\zamowienie $zamowienia)
    {
        $this->zamowienia->removeElement($zamowienia);
    }

    /**
     * Get zamowienia
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getZamowienia()
    {
        return $this->zamowienia;
    }

    /**
     * Set zdjecia
     *
     * @param \Obrazki\wbazieBundle\Entity\Przed $zdjecia
     * @return Produkt
     */
    public function setZdjecia(\Obrazki\wbazieBundle\Entity\Przed $zdjecia = null)
    {
        $this->zdjecia = $zdjecia;

        return $this;
    }

    /**
     * Get zdjecia
     *
     * @return \Obrazki\wbazieBundle\Entity\Przed 
     */
    public function getZdjecia()
    {
        return $this->zdjecia;
    }

    /**
     * Set filtru
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\filtr $filtru
     * @return Produkt
     */
    public function setFiltru(\Obrazki\jakoProduktyBundle\Entity\filtr $filtru = null)
    {
        $this->filtru = $filtru;

        return $this;
    }

    /**
     * Get filtru
     *
     * @return \Obrazki\jakoProduktyBundle\Entity\filtr 
     */
    public function getFiltru()
    {
        return $this->filtru;
    }

    /**
     * Set typu
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\typy $typu
     * @return Produkt
     */
    public function setTypu(\Obrazki\jakoProduktyBundle\Entity\typy $typu = null)
    {
        $this->typu = $typu;

        return $this;
    }

    /**
     * Get typu
     *
     * @return \Obrazki\jakoProduktyBundle\Entity\typy 
     */
    public function getTypu()
    {
        return $this->typu;
    }
}
