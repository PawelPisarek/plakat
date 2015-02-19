<?php

namespace Obrazki\pfBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * adres
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class adres
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
     * @Assert\Length(min = 3)
     * @Assert\NotBlank
     *
     * @ORM\Column(name="miasto", type="string", length=255)
     */
    private $miasto;


    /**
     * @var string
     *
     * @Assert\Length(min = 3)
     * @Assert\NotBlank
     * @ORM\Column(name="ulica", type="string", length=255)
     */
    private $ulica;

    /**
     * @var string
     *
     * @ORM\Column(name="kodpocztowy", type="string", length=255)
     */
    private $kodpocztowy;

    /**
     * @var integer
     *
     * @Assert\Length(min="9",max="9")
     * @ORM\Column(name="nrTelefonu", type="integer")
     */
    private $nrTelefonu;

    /**
     * @var string
     *
     * @Assert\Email
     * @Assert\NotBlank
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;




    /**
     * @ORM\OneToOne(targetEntity="klient", mappedBy="adresy")
     */
    protected $klienci;


    function __toString()
    {
        return $this->getEmail().'email adresu';
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
     * Set miasto
     *
     * @param string $miasto
     * @return adres
     */
    public function setMiasto($miasto)
    {
        $this->miasto = $miasto;

        return $this;
    }

    /**
     * Get miasto
     *
     * @return string 
     */
    public function getMiasto()
    {
        return $this->miasto;
    }

    /**
     * Set ulica
     *
     * @param string $ulica
     * @return adres
     */
    public function setUlica($ulica)
    {
        $this->ulica = $ulica;

        return $this;
    }

    /**
     * Get ulica
     *
     * @return string 
     */
    public function getUlica()
    {
        return $this->ulica;
    }

    /**
     * Set kodpocztowy
     *
     * @param string $kodpocztowy
     * @return adres
     */
    public function setKodpocztowy($kodpocztowy)
    {
        $this->kodpocztowy = $kodpocztowy;

        return $this;
    }

    /**
     * Get kodpocztowy
     *
     * @return string 
     */
    public function getKodpocztowy()
    {
        return $this->kodpocztowy;
    }

    /**
     * Set nrTelefonu
     *
     * @param string $nrTelefonu
     * @return adres
     */
    public function setNrTelefonu($nrTelefonu)
    {
        $this->nrTelefonu = $nrTelefonu;

        return $this;
    }

    /**
     * Get nrTelefonu
     *
     * @return string 
     */
    public function getNrTelefonu()
    {
        return $this->nrTelefonu;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return adres
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set klienci
     *
     * @param \Obrazki\pfBundle\Entity\klient $klienci
     * @return adres
     */
    public function setKlienci(\Obrazki\pfBundle\Entity\klient $klienci = null)
    {
        $this->klienci = $klienci;

        return $this;
    }

    /**
     * Get klienci
     *
     * @return \Obrazki\pfBundle\Entity\klient 
     */
    public function getKlienci()
    {
        return $this->klienci;
    }
}
