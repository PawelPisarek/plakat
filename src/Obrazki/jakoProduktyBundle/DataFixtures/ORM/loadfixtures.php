<?php
namespace Obrazki\jakoProduktyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Obrazki\jakoProduktyBundle\Entity\filtr;
use Obrazki\jakoProduktyBundle\Entity\Grupa;
use Obrazki\jakoProduktyBundle\Entity\kubek;
use Obrazki\jakoProduktyBundle\Entity\margines;
use Obrazki\jakoProduktyBundle\Entity\PodGrupa;
use Doctrine\Common\Persistence\ObjectManager;
use Obrazki\jakoProduktyBundle\Entity\typy;
use Obrazki\jakoProduktyBundle\Entity\wymiary;
use Obrazki\wbazieBundle\Entity\Przed;
use Proxies\__CG__\Obrazki\jakoProduktyBundle\Entity\wrap;


class loadgrupy implements FixtureInterface
{
    function  load(ObjectManager $manager)
    {
        $xml = simplexml_load_file('data/grupy.xml');
        foreach ($xml->grupa as $g) {
            $grupa = new Grupa();
            $grupa->setNazwa($g->nazwa);
            $manager->persist($grupa);


        }
        $manager->flush();
    }
}


class loadzdjecia implements FixtureInterface
{
    function  load(ObjectManager $manager)
    {
        $xml = simplexml_load_file('data/zdjecia.xml');
        foreach ($xml->zdjecie as $z) {
            $zdjecie = new Przed();
            $zdjecie->setNazwaObrazka($z->nazwa);

            $grupa = $manager->getRepository('ObrazkijakoProduktyBundle:Grupa')->findOneBy(array('nazwa' => $z->grupa));


            $zdjecie->setGrupa($grupa);


            $manager->persist($zdjecie);


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

class loadtypy implements FixtureInterface
{
    function  load(ObjectManager $manager)
    {
        $wrap = new typy();
        $wrap->setNazwa('płótno');
        $manager->persist($wrap);
        $manager->flush();

        $wrap = new typy();
        $wrap->setNazwa('kubek');
        $manager->persist($wrap);
        $manager->flush();

        $wrap = new typy();
        $wrap->setNazwa('koszulka');
        $manager->persist($wrap);
        $manager->flush();

    }
}

class loadwymairy implements FixtureInterface
{
    function  load(ObjectManager $manager)
    {

        $wymiary=file('data/wymiary.txt');

        foreach($wymiary as $wiatr)
        {
            $wrap = new wymiary();
            $wrap->setNazwa($wiatr);
            $manager->persist($wrap);
        }

        $manager->flush();

    }
}

class loadmargines implements FixtureInterface
{
    function  load(ObjectManager $manager)
    {

        $marginesy=array('18mm','25mm','32mm','52mm');
        foreach ($marginesy as $marg)
        {
            $magi= new margines();
            $magi->setNazwa($marg);
            $manager->persist($magi);

        }

        $manager->flush();

    }
}

class loadkubek implements FixtureInterface
{
    function  load(ObjectManager $manager)
    {
        $wrap = new kubek();
        $wrap->setNazwa('rozmiar koszulki lub inne atrybuty kubka');
        $manager->persist($wrap);
        $manager->flush();

    }
}

class loadfiltr implements FixtureInterface
{
    function  load(ObjectManager $manager)
    {
        $wrap = new filtr();
        $wrap->setNazwa('czarno biały');
        $manager->persist($wrap);
        $manager->flush();

        $wrap = new filtr();
        $wrap->setNazwa('sepia');
        $manager->persist($wrap);
        $manager->flush();

        $wrap = new filtr();
        $wrap->setNazwa('orginalny');
        $manager->persist($wrap);
        $manager->flush();


    }
}




