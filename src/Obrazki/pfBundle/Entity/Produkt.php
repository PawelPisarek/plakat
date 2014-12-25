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
    protected  $id_zdjecia;

//////////////////////////////////////////////////////////////////////////////////////

    /**
     * @ORM\ManyToOne(targetEntity="Obrazki\jakoProduktyBundle\Entity\filtr",inversedBy="filtry",cascade={"persist"})
     */
    protected $id_filtru;
//////////////////////////////////////////////////////////

    /**
     * @ORM\ManyToOne(targetEntity="Obrazki\jakoProduktyBundle\Entity\typy",inversedBy="typys",cascade={"all"})
     */
    protected $id_typu;

    function __toString()
    {


        return $this->getIdZdjecia().'';

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
     * Constructor
     */
    public function __construct()
    {
        $this->zamowienia = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set id_zdjecia
     *
     * @param \Obrazki\wbazieBundle\Entity\Przed $idZdjecia
     * @return Produkt
     */
    public function setIdZdjecia(\Obrazki\wbazieBundle\Entity\Przed $idZdjecia = null)
    {
        $this->id_zdjecia = $idZdjecia;

        return $this;
    }

    /**
     * Get id_zdjecia
     *
     * @return \Obrazki\wbazieBundle\Entity\Przed 
     */
    public function getIdZdjecia()
    {
        return $this->id_zdjecia;
    }

    /**
     * Set id_filtru
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\filtr $idFiltru
     * @return Produkt
     */
    public function setIdFiltru(\Obrazki\jakoProduktyBundle\Entity\filtr $idFiltru = null)
    {
        $this->id_filtru = $idFiltru;

        return $this;
    }

    /**
     * Get id_filtru
     *
     * @return \Obrazki\jakoProduktyBundle\Entity\filtr 
     */
    public function getIdFiltru()
    {
        return $this->id_filtru;
    }

    /**
     * Set id_typu
     *
     * @param \Obrazki\jakoProduktyBundle\Entity\typy $idTypu
     * @return Produkt
     */
    public function setIdTypu(\Obrazki\jakoProduktyBundle\Entity\typy $idTypu = null)
    {
        $this->id_typu = $idTypu;

        return $this;
    }

    /**
     * Get id_typu
     *
     * @return \Obrazki\jakoProduktyBundle\Entity\typy 
     */
    public function getIdTypu()
    {
        return $this->id_typu;
    }
}
