<?php
/**
 * Created by PhpStorm.
 * User: moimeme
 * Date: 24/10/16
 * Time: 11:14
 */

namespace BoosterBundle\DataFixtures\ORM;

use BoosterBundle\Entity\FixturesTestUser;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, containerAwareInterface
{

    private $container;

    public function load(ObjectManager $manager){
        $users = $this->container->get('App.user_generator')->getUsers();
        foreach($users as $user){
            $userEntity = new FixturesTestUser;

            $role = rand(0, 1);                                      //role (0 = booster, 1 = project)
            $userEntity->setRole($role);                             //role (0 = booster, 1 = project)

            ////////////////////////  BOOSTERS  ////////////////////////////////////
            $userEntity->setTitle($user->name->title);               //title (Mr/Mme)
            $userEntity->setFamilyName($user->name->last);           //family_name
            $userEntity->setSurname($user->name->first);             //surname
            $userEntity->setEmail($user->email);                     //email
            $userEntity->setPassword($user->login->password);        //password

            ////////////////////////  SOCIETY  ////////////////////////////////////
            if($role === 1){
                $userEntity->setPhoneNumber($user->phone);    //phone_number

                $function = rand(0, 3); //roles -> 0 for 'CO', 1 for CTO, 2 for Founder, 3 for Business Manager
                switch ($function) {
                    case 0:
                        $function = 'CO';
                        break;
                    case 1:
                        $function = 'CTO';
                        break;
                    case 2:
                        $function = 'Founder';
                        break;
                    case 3:
                        $function = 'Business Manager';
                        break;
                }
                $userEntity->setFunction($function);  //function

                //random datetime
                $rand_date = rand(strtotime('2016-01-01 00:00:00'), strtotime('2017-01-01 00:00:00'));
                $date =  date('Y-m-d H:i:s', $rand_date);                //convert to string
                $date = new \DateTime($date);                            //convert to datetime format
                $userEntity->setCreateTime($date);                       //create_time

                $projectType = rand(0, 1);                               //role (0 = society, 1 = project)
                $userEntity->setProjectType($projectType);               //role (0 = society, 1 = project)
                if($projectType === 1){
                    $siret = rand(10000000000000, 99999999999999);       //siret
                    $userEntity->setSiret($siret);                       //siret
                }
                $userEntity->setProjectName($user->login->password);        //project_name
            }
            $manager->persist($userEntity);
            unset($userEntity);
        }
        $manager->flush();
    }
    /**
     * Get the order of this fixture (we want the Users to be generated 1st)
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}