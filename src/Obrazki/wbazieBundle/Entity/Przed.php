<?php

namespace Obrazki\wbazieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 *
 * @ORM\Entity
 */
class Przed
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nazwaObrazka;

    /**
     * @Assert\File(maxSize="6000000")
     */
    public $file;

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    public  function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'poObrobce/';
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
     * Set nazwaObrazka
     *
     * @param string $nazwaObrazka
     * @return Przed
     */
    public function setNazwaObrazka($nazwaObrazka)
    {
        $this->nazwaObrazka = $nazwaObrazka;

        return $this;
    }

    /**
     * Get nazwaObrazka
     *
     * @return string 
     */
    public function getNazwaObrazka()
    {
        return $this->nazwaObrazka;
    }

    public function upload()
    {
        // zmienna file może być pusta jeśli pole nie jest wymagane
        if (null === $this->file) {
            return;
        }

        // używamy oryginalnej nazwy pliku ale nie powinieneś tego robić
        // aby zabezpieczyć się przed ewentualnymi problemami w bezpieczeństwie

        // metoda move jako atrybuty przyjmuje ścieżkę docelową gdzie trafi przenoszony plik
        // oraz ścieżkę z której ma przenieś plik





        $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());

        // ustaw zmienną patch ścieżką do zapisanego pliku
        $this->setNazwaObrazka($this->file->getClientOriginalName());

        // wyczyść zmienną file ponieważ już jej nie potrzebujemy
        $this->file = null;
    }

}
