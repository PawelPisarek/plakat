<?php
namespace Obrazki\jakoProduktyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Obrazki\jakoProduktyBundle\Entity\Grupa;
use Obrazki\jakoProduktyBundle\Entity\margines;
use Obrazki\jakoProduktyBundle\Entity\PodGrupa;
use Doctrine\Common\Persistence\ObjectManager;
use Obrazki\jakoProduktyBundle\Entity\wymiary;
use Proxies\__CG__\Obrazki\jakoProduktyBundle\Entity\wrap;


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

class loadwrap implements FixtureInterface
{
    function  load(ObjectManager $manager)
    {
        $wrap = new wrap();
        $wrap->setNazwa('custom');
        $manager->persist($wrap);
        $manager->flush();

        $wrap = new wrap();
        $wrap->setNazwa('costam');
        $manager->persist($wrap);
        $manager->flush();

        $wrap = new wrap();
        $wrap->setNazwa('mirror');
        $manager->persist($wrap);
        $manager->flush();

    }
}

class loadwymairy implements FixtureInterface
{
    function  load(ObjectManager $manager)
    {
        $wrap = new wymiary();
        $wrap->setNazwa('a1');
        $manager->persist($wrap);
        $manager->flush();

        $wrap = new wymiary();
        $wrap->setNazwa('a2');
        $manager->persist($wrap);
        $manager->flush();

        $wrap = new wymiary();
        $wrap->setNazwa('a3');
        $manager->persist($wrap);
        $manager->flush();

    }
}

class loadmargines implements FixtureInterface
{
    function  load(ObjectManager $manager)
    {
        $wrap = new margines();
        $wrap->setNazwa('18mm');
        $manager->persist($wrap);
        $manager->flush();

        $wrap = new margines();
        $wrap->setNazwa('22mm');
        $manager->persist($wrap);
        $manager->flush();

        $wrap = new margines();
        $wrap->setNazwa('25mm');
        $manager->persist($wrap);
        $manager->flush();

    }
}




