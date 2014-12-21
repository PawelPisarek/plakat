<?php

namespace Obrazki\pfBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * klient
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class klient
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
     * @ORM\Column(name="login", type="string", length=255)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="haslo", type="string", length=255)
     */
    private $haslo;



    /**
     *@ORM\OneToOne(targetEntity="adres",inversedBy="klienci",cascade={"all"})
     *@ORM\JoinColumn(name="adresy_id",referencedColumnName="id")
     */
    protected $adresy;


    /**
     * @ORM\ManyToMany(targetEntity="zamowienie", inversedBy="klienci")
     * @ORM\JoinTable(name="klient_zamowienie")
     */
    private $zamowienia;



    function __toString()
    {
        return $this->getLogin().'login kolesia';
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
     * Set login
     *
     * @param string $login
     * @return klient
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set haslo
     *
     * @param string $haslo
     * @return klient
     */
    public function setHaslo($haslo)
    {
        $this->haslo = $haslo;

        return $this;
    }

    /**
     * Get haslo
     *
     * @return string 
     */
    public function getHaslo()
    {
        return $this->haslo;
    }

    /**
     * Set adresy
     *
     * @param \Obrazki\pfBundle\Entity\adres $adresy
     * @return klient
     */
    public function setAdresy(\Obrazki\pfBundle\Entity\adres $adresy = null)
    {
        $this->adresy = $adresy;

        return $this;
    }

    /**
     * Get adresy
     *
     * @return \Obrazki\pfBundle\Entity\adres 
     */
    public function getAdresy()
    {
        return $this->adresy;
    }

    /**
     * Add zamowienia
     *
     * @param \Obrazki\pfBundle\Entity\zamowienie $zamowienia
     * @return klient
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
}
