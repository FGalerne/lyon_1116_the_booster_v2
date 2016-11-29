<?php

namespace BoosterBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FrontControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        //index page
        $this->assertContains('DÉCOUVREZ', $client->getResponse()->getContent());

        //society links//
        $this->assertCount(6, $crawler->filter('div#home_startup_list a'));
        $count   = $crawler->filter('div#home_startup_list a')->count();
        for($i = 0; $i < $count; $i++){
            $societyLink   = $crawler->filter('div#home_startup_list a')->eq($i);
            $crawler    = $client->click($societyLink->link());
        $this->assertFalse($client->getResponse()->isNotFound());
        }

        //Header and Footer links//

        //'comment ça marche'
        $link = $crawler->filter('a:contains("Comment ça marche")')->link();
        $crawler = $client->click($link);
        $this->assertContains('Comment ça marche?', $client->getResponse()->getContent());

        //'CGV/CGU'
        $link = $crawler->filter('a:contains("CGV/CGU")')->link();
        $crawler = $client->click($link);
        $this->assertContains('CGV/CGU', $client->getResponse()->getContent());

        //FAQ
        $link = $crawler->filter('a:contains("FAQ")')->link();
        $crawler = $client->click($link);
        $this->assertContains('FAQ', $client->getResponse()->getContent());

        //La charte
        $link = $crawler->filter('a:contains("La charte")')->link();
        $crawler = $client->click($link);
        $this->assertContains('La charte', $client->getResponse()->getContent());

        //l'equipe
        $link = $crawler->filter('a:contains("L\'équipe")')->link();
        $crawler = $client->click($link);
        $this->assertContains('QUI SOMMES-NOUS ?', $client->getResponse()->getContent());

        //Nous contacter
        $link = $crawler->filter('a:contains("Nous contacter")')->link();
        $crawler = $client->click($link);
        $this->assertContains('Contactez-nous !', $client->getResponse()->getContent());

    }
    public function testCommentCaMarche()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/comment-ca-marche');

        $this->assertContains('Comment ça marche?', $client->getResponse()->getContent());
    }
    public function testCGV()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/cgv');

        $this->assertContains('CGU/CGV', $client->getResponse()->getContent());
    }
    public function testFAQ()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/faq');

        $this->assertContains('FAQ', $client->getResponse()->getContent());
    }
    public function testCharte()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/charte');

        $this->assertContains('La charte', $client->getResponse()->getContent());
    }
    public function testEquipe()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/equipe');

        $this->assertContains('QUI SOMMES-NOUS ?', $client->getResponse()->getContent());
    }
    public function testContact()
    {
        $client = static::createClient();

        //page contact
        $crawler = $client->request('GET', '/contact');
        $this->assertContains('Contactez-nous !', $client->getResponse()->getContent());

        //validation du formulaire
        $form = $crawler->selectButton('Envoyer')->form();
        $form['contactForm[name]'] = 'TestContact: Nom';
        $form['contactForm[surname]'] = 'TestContact: Prénom';
        $form['contactForm[email]'] = 'test.contact@email.com';
        $form['contactForm[type]']->select('Infos générales');
        $form['contactForm[message]'] = 'Ce mail à été envoyé pour vérifier le bon fonctionnement du formulaire de contact';

        $crawler = $client->submit($form);
        $this->assertTrue(
            $client->getResponse()->isRedirect(
                '/contact?send=invalide'
            )
        );

    }
}
