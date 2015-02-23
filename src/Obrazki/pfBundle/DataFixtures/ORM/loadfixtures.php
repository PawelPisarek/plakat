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
use Obrazki\pfBundle\Entity\adres;
use Obrazki\pfBundle\Entity\klient;
use Obrazki\pfBundle\Entity\Produkt;
use Obrazki\pfBundle\Entity\zamowienie;

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
        $xml = simplexml_load_file('data/BAD/atrybuty.xml');

//        shuffle($marginesy);

//        var_dump($marginesy);


        for ($i = 1; $i <= 20; $i++) {

            $tab = array('18mm', '25mm', '32mm', '52mm');
            $atrybut = new atrybuty();
//            var_dump(array_rand($tab,1));
            $marginesy = $manager->getRepository('ObrazkijakoProduktyBundle:margines')->findOneBy(
                array('nazwa' => $tab[array_rand($tab, 1)])
            );

            $atrybut->setMargines($marginesy);

            $tab = file('data/wymiary.txt');
////            $atrybut =new atrybuty();
////            var_dump(array_rand($tab,1));
            $marginesy = $manager->getRepository('ObrazkijakoProduktyBundle:wymiar')->findOneBy(
                array('nazwa' => $tab[array_rand($tab, 1)])
            );

            $atrybut->setWymiar($marginesy);


            $tab = array('Blank', 'Stretch', 'Mirror', 'Custom', 'Mirror 2');

            $marginesy = $manager->getRepository('ObrazkijakoProduktyBundle:wrap')->findOneBy(
                array('nazwa' => $tab[array_rand($tab, 1)])
            );
            $atrybut->setWrapy($marginesy);


//            var_dump(rand(0, 1));

            $typ = new typy();

            $typy = array('płótno', 'wizytówka', 'koszulka');

            $typ->setNazwa($typy[0]);

            if ($i == 8) { //kouszulka
//echo true;
                $tab = array('S', 'L', 'XL', 'XXL');
                $marginesy = $manager->getRepository('ObrazkijakoProduktyBundle:koszulka')->findOneBy(
                    array('nazwa' => $tab[array_rand($tab, 1)])
                );

                $typ->setNazwa($typy[2]);
                $typ->setKoszulki($marginesy);
                unset($atrybut);
            }
            if ($i == 9) {
                //wizytówka
                $typ->setNazwa($typy[1]);
                unset($atrybut);

            }

            if (isset($atrybut)) {
                $typ->setAtrybut($atrybut);
            }

            $produkt = new Produkt();
            $produkt->getTypu($typ);


            $tab = array('orginalny', 'grayscale', 'sepia');
            $marginesy = $manager->getRepository('ObrazkijakoProduktyBundle:filtr')->findOneBy(
                array('nazwa' => $tab[array_rand($tab, 1)])
            );
            $produkt->setFiltru($marginesy);


            $marginesy = $manager->getRepository('ObrazkiwbazieBundle:Przed')->findOneBy(
                array('nazwaObrazka' => rand(1, 10) . '.jpg')
            );
//           var_dump($marginesy);
            $produkt->setZdjecia($marginesy);
            $produkt->setProcVat(23);
            $cena=rand(50, 200);
            $produkt->setNetto($cena);
            $produkt->setBrutto($cena*23/100+$cena);
            $produkt->setRabat(rand(0, 50));
            $produkt->setTypu($typ);

//            $zamowienie = new zamowienie();
//            if($i==1 and $i==2)
            $adres = new adres();
//
            $tab = array('losowy@gmail.com', 'stokrotka@gmail.com', 'loasdaswy@gmail.com');

            $adres->setEmail($tab[array_rand($tab, 1)]);
            $adres->setKodpocztowy(rand(10, 99) . '-' . rand(100, 999));
            $tab = array('Warszawa', 'Poznań', 'Włocławek');

            $adres->setMiasto($tab[array_rand($tab, 1)]);
            $adres->setNrTelefonu(
                rand(1, 9) . rand(1, 9) . rand(1, 9) . rand(1, 9) . rand(1, 9) . rand(1, 9) . rand(1, 9) . rand(
                    1,
                    9
                ) . rand(1, 9)
            );
            $tab = array('świętego spokoju 6', 'Warszawska', 'Poznańska');


            $adres->setUlica($tab[array_rand($tab, 1)]);


            $zamowienie = new Zamowienie();
            $zamowienie->setDataZlozenia();
//            $zamowienie->setZaplacono(rand(0, 1));


            $klient = new klient();


            $tab = array('stokrotka', 'Bolek', 'Świerzak');
            $kNazwa = $tab[array_rand($tab, 1)];

            $klient->setLogin($kNazwa);


            $marginesy = $manager->getRepository('ObrazkipfBundle:klient')->findOneBy(array('login' => $kNazwa));
//
//            var_dump($marginesy);

            $zamowienie->addProdukty($produkt);
            if ($marginesy == null) {
                $klient->addZamowienium($zamowienie);
                $klient->setAdresy($adres);
                $manager->persist($klient);
                $manager->flush();

            } else {
                $marginesy->addZamowienium($zamowienie);

            }




        }
        $manager->flush();

    }

}