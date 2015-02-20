<?php
/**
 * Created by PhpStorm.
 * User: Paweł
 * Date: 20-02-2015
 * Time: 16:28
 */

namespace Obrazki\pfBundle\DataFixtures\ORM;



use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Obrazki\jakoProduktyBundle\Entity\atrybuty;
use Obrazki\jakoProduktyBundle\Entity\typy;
use Obrazki\pfBundle\Entity\Produkt;

class loadzamowienia implements FixtureInterface
{
    function load(ObjectManager $manager)
    {
//        $xml= simplexml_load_file()
    }

}

class loadProdukty implements FixtureInterface
{
    function load(ObjectManager $manager)
    {


    }
}

class loadatrybuty implements FixtureInterface
{
    function load(ObjectManager $manager)
    {
        $xml= simplexml_load_file('data/BAD/atrybuty.xml');

//        shuffle($marginesy);

//        var_dump($marginesy);


        for ($i = 1; $i <= 10; $i++) {

            $tab=array('18mm','25mm','32mm','52mm');
            $atrybut =new atrybuty();
//            var_dump(array_rand($tab,1));
            $marginesy=$manager->getRepository('ObrazkijakoProduktyBundle:margines')->findOneBy(array('nazwa'=>$tab[array_rand($tab,1)]));

            $atrybut->setMargines($marginesy);

            $tab=file('data/wymiary.txt');
////            $atrybut =new atrybuty();
////            var_dump(array_rand($tab,1));
            $marginesy=$manager->getRepository('ObrazkijakoProduktyBundle:wymiar')->findOneBy(array('nazwa'=>$tab[array_rand($tab,1)]));

            $atrybut->setWymiar($marginesy);




            $tab=array('Blank','Stretch','Mirror','Custom','Mirror 2');

            $marginesy=$manager->getRepository('ObrazkijakoProduktyBundle:wrap')->findOneBy(array('nazwa'=>$tab[array_rand($tab,1)]));
            $atrybut->setWrapy($marginesy);


//            var_dump(rand(0, 1));

            $typ =new typy();

            $typy=array('płótno','wizytówka','koszulka');

            $typ->setNazwa($typy[0]);

            if($i==8)
            { //kouszulka
//echo true;
                $tab=array('S','L','XL','XXL');
                $marginesy=$manager->getRepository('ObrazkijakoProduktyBundle:koszulka')->findOneBy(array('nazwa'=>$tab[array_rand($tab,1)]));

                $typ->setNazwa($typy[2]);
                $typ->setKoszulki($marginesy);
                unset($atrybut);
            }
            if($i==9)

            {
                //wizytówka
                $typ->setNazwa($typy[1]);
                unset($atrybut);

            }

            if(isset($atrybut))
            $typ->setAtrybut($atrybut);

            $produkt=new Produkt();
            $produkt->getTypu($typ);


            $tab=array('orginalny','grayscale','sepia');
            $marginesy=$manager->getRepository('ObrazkijakoProduktyBundle:filtr')->findOneBy(array('nazwa'=>$tab[array_rand($tab,1)]));
            $produkt->setFiltru($marginesy);


            $marginesy=$manager->getRepository('ObrazkiwbazieBundle:Przed')->findOneBy(array('nazwaObrazka'=>rand(1, 10).'.jpg'));
//           var_dump($marginesy);
            $produkt->setZdjecia($marginesy);
            $produkt->setBrutto(rand(50,200));
            $produkt->setProcVat(rand(50,200));
            $produkt->setNetto(rand(50,200));
            $produkt->setRabat(rand(50,200));
            $produkt->setTypu($typ);





            $manager->persist($produkt);
        }
        $manager->flush();
    }

}