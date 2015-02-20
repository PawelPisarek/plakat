<?php
namespace Obrazki\jakoProduktyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Obrazki\jakoProduktyBundle\Entity\filtr;
use Obrazki\jakoProduktyBundle\Entity\Grupa;
use Obrazki\jakoProduktyBundle\Entity\koszulka;
use Obrazki\jakoProduktyBundle\Entity\margines;
use Obrazki\jakoProduktyBundle\Entity\PodGrupa;
use Doctrine\Common\Persistence\ObjectManager;
use Obrazki\jakoProduktyBundle\Entity\typy;
use Obrazki\jakoProduktyBundle\Entity\wymiar;
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

        $wrapy=array('Blank','Stretch','Mirror','Custom','Mirror 2');
        foreach($wrapy as $wrap)
        {
            $wra = new wrap();
            $wra->setNazwa($wrap);
            $manager->persist($wra);

        }
        $manager->flush();



    }
}

//class loadtypy implements FixtureInterface
//{
//    function  load(ObjectManager $manager)
//    {
//        $wrap = new typy();
//        $wrap->setNazwa('płótno');
//        $manager->persist($wrap);
//        $manager->flush();
//
//        $wrap = new typy();
//        $wrap->setNazwa('kubek');
//        $manager->persist($wrap);
//        $manager->flush();
//
//        $wrap = new typy();
//        $wrap->setNazwa('koszulka');
//        $manager->persist($wrap);
//        $manager->flush();
//
//    }
//}

class loadwymairy implements FixtureInterface
{
    function  load(ObjectManager $manager)
    {

        $wymiary=file('data/wymiary.txt');

//            var_dump($wymiary);
        foreach($wymiary as $wiatr)
        {
            $wrap = new wymiar();
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
        $koszulki=array('S','L','XL','XXL');
        foreach($koszulki as $kosz)
        {
            $koszulka = new koszulka();
            $koszulka->setNazwa($kosz);
            $manager->persist($koszulka);
        }
        $manager->flush();

    }
}

class loadfiltr implements FixtureInterface
{
    function  load(ObjectManager $manager)
    {
        $filtry=array('orginalny','grayscale','sepia');
        foreach($filtry as $fit)
        {
            $wrap = new filtr();
            $wrap->setNazwa($fit);
            $manager->persist($wrap);
        }

        $manager->flush();




    }
}




