<?php

namespace Obrazki\pfBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * zamowienie
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class zamowienie
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
     * @var \DateTime
     *
     * @ORM\Column(name="dataZlozenia", type="datetime")
     */
    private $dataZlozenia;

    /**
     * @var boolean
     *
     * @ORM\Column(name="zaplacono", type="boolean")
     */
    private $zaplacono;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataWysylki", type="datetime")
     */
    private $dataWysylki;


    /**
     * @ORM\ManyToMany(targetEntity="klient", mappedBy="zamowienia")
     */
    protected $klienci;

    function __toString()
    {
        return $this->getZaplacono().'zamowienie';
    }


   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->klienci = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set dataZlozenia
     *
     * @param \DateTime $dataZlozenia
     * @return zamowienie
     */
    public function setDataZlozenia($dataZlozenia)
    {
        $this->dataZlozenia = $dataZlozenia;

        return $this;
    }

    /**
     * Get dataZlozenia
     *
     * @return \DateTime 
     */
    public function getDataZlozenia()
    {
        return $this->dataZlozenia;
    }

    /**
     * Set zaplacono
     *
     * @param boolean $zaplacono
     * @return zamowienie
     */
    public function setZaplacono($zaplacono)
    {
        $this->zaplacono = $zaplacono;

        return $this;
    }

    /**
     * Get zaplacono
     *
     * @return boolean 
     */
    public function getZaplacono()
    {
        return $this->zaplacono;
    }

    /**
     * Set dataWysylki
     *
     * @param \DateTime $dataWysylki
     * @return zamowienie
     */
    public function setDataWysylki($dataWysylki)
    {
        $this->dataWysylki = $dataWysylki;

        return $this;
    }

    /**
     * Get dataWysylki
     *
     * @return \DateTime 
     */
    public function getDataWysylki()
    {
        return $this->dataWysylki;
    }

    /**
     * Add klienci
     *
     * @param \Obrazki\pfBundle\Entity\klient $klienci
     * @return zamowienie
     */
    public function addKlienci(\Obrazki\pfBundle\Entity\klient $klienci)
    {
        $this->klienci[] = $klienci;

        return $this;
    }

    /**
     * Remove klienci
     *
     * @param \Obrazki\pfBundle\Entity\klient $klienci
     */
    public function removeKlienci(\Obrazki\pfBundle\Entity\klient $klienci)
    {
        $this->klienci->removeElement($klienci);
    }

    /**
     * Get klienci
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getKlienci()
    {
        return $this->klienci;
    }
}
