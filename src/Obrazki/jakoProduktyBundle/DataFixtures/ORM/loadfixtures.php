<?php
namespace Obrazki\jakoProduktyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Obrazki\jakoProduktyBundle\Entity\Grupa;
use Obrazki\jakoProduktyBundle\Entity\PodGrupa;
use Doctrine\Common\Persistence\ObjectManager;


class loadkontynenty implements FixtureInterface
{
    function  load(ObjectManager $manager)
    {
        $xml=simplexml_load_file('data/grupy.xml');
        foreach($xml->grupa as $g)
        {
            $grupa= new Grupa();
            $grupa->setNazwa($g->nazwa);
            $manager->persist($grupa);
            foreach($g->podgrupy->podgrupa as $podgrupa)
            {
                $Podgrupa =new PodGrupa();
                $Podgrupa->setNazwa($podgrupa->nazwa);
                $Podgrupa->setGrupy($grupa);
                $manager->persist($Podgrupa);

            }

        }
        $manager->flush();
    }
}



