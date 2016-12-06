<?php
/**
 * Created by PhpStorm.
 * User: moimeme
 * Date: 24/10/16
 * Time: 11:14
 */

namespace BoosterBundle\DataFixtures\ORM;

use BoosterBundle\Entity\Booster;
use BoosterBundle\Entity\Project;
use BoosterBundle\Entity\Society;
use BoosterBundle\Entity\User;
use BoosterBundle\Services\UserGenerator;
use BoosterBundle\Util\Random;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, containerAwareInterface
{

    public function load(ObjectManager $manager){
        $random = new Random();
        $generator = new UserGenerator('App.user_generator', 5000);
        $users = $generator->getUsers();
        $increment = 0;
        foreach($users as $user){
            $userEntity = new User;
            $boosterEntity = new Booster;
            $societyEntity = new Society;
            $projectEntity = new Project;

            $userEntity->setEnabled(1);

            $randRole = rand(0, 1); //role (0 = booster, 1 = project)
            if ($randRole == 0){
                $role = 'ROLE_BOOSTER';

                $boosterEntity->setPhoto($user->picture->medium);
                $boosterEntity->setCity($user->location->city);
                $boosterEntity->setZipCode($user->location->postcode);
                $boosterEntity->setBirthDate(new \DateTime($user->dob));
                $boosterEntity->setWorkStatus($random->randomWorkStatus());
                $boosterEntity->setCompetence1($random->randomComp());
                $boosterEntity->setCompetence2($random->randomComp());
                $boosterEntity->setCompetence3($random->randomComp());
                $boosterEntity->setCompetence4($random->randomComp());
                $boosterEntity->setCompetence5($random->randomComp());
                $boosterEntity->setCompetence6($random->randomComp());
                $boosterEntity->setPresentation('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at purus nibh. Cras metus nulla, vestibulum in auctor ac, fermentum vitae tellus. Donec sed aliquam nisl. Sed eu leo id est pretium euismod. Nulla id justo at mi venenatis volutpat. Fusce nisi leo, placerat id condimentum a, accumsan vitae tortor. Nunc magna nunc, venenatis nec elementum eu, ultrices in sem. Maecenas tincidunt semper');
                $boosterEntity->setHoursGiven(rand(0, 500));
                $boosterEntity->setProjectDoneNumber(rand(0, 20));
                $boosterEntity->setAverageNotation(rand(0, 5));
                $manager->persist($boosterEntity);
                unset($boosterEntity);

            }
            else{
                $role = 'ROLE_BOOSTE';
                $societyEntity->setPhoto($user->picture->large);
                $societyEntity->setSocietyName($user->login->password);
                $societyEntity->setPunchLine('Lorem ipsum dolor sit amet, consectetur adipisc');
                $societyEntity->setPresentation('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at purus nibh. Cras metus nulla, vestibulum in auctor ac, fermentum vitae tellus. Donec sed aliquam nisl. Sed eu leo id est pretium euismod. Nulla id justo at mi venenatis volutpat. Fusce nisi leo, placerat id condimentum a, accumsan vitae tortor. Nunc magna nunc, venenatis nec elementum eu, ultrices in sem. Maecenas tincidunt semper molestie. Nulla nec neque sit amet libero molestie feugiat. Cras id metus velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lobortis arcu non leo porta ut euismod ante luctus. Praesent elementum sodales dolor id scelerisque. Nam vitae cursus massa. Nunc ut arcu a mi convallis feugiat. Sed ante sem, sollicitudin sed porta et, molestie in turpis. Nulla lacinia lacus nec l');
                $societyEntity->setLinkedin('https://fr.linkedin.com/');
                $societyEntity->setFacebook('https://fr-fr.facebook.com/');
                $societyEntity->setTwitter('https://twitter.com/');
                $societyEntity->setYoutube('https://www.youtube.com/');
                $societyEntity->setWebsiteLink('https://www.codingame.com');
                $societyEntity->setHoursTaken(rand(0, 500));
                $societyEntity->setProjectDoneNumber(rand(0, 20));
                $societyEntity->setDeniedBoosters(rand(0, 50));
                $societyEntity->setAverageNotation(rand(0, 5));
                $manager->persist($societyEntity);
                unset($societyEntity);

                //project
                $projectEntity->setProjectName($user->login->password);
                $projectEntity->setCategory($random->randomComp());
                $projectEntity->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at purus nibh. Cras metus nulla, vestibulum in auctor ac, fermentum vitae tellus. Donec sed aliquam nisl. Sed eu leo id est p');

                $projectEntity->setCreationStatus($random->randomCreationStatus());

                $projectEntity->setGivenTime(rand(0, 500));
                $projectEntity->setCreateTime($random->randomDate());
                $status = $random->randomProjectStatus();
                $projectEntity->setStatus($status);
                if ($status == "Finalisé"){
                    $projectEntity->setEndTime($random->randomDate());
                    $projectEntity->setBoosterNote(rand(0, 5));
                    $projectEntity->setSocietyNote(rand(0, 5));
                }

                $manager->persist($projectEntity);
                unset($projectEntity);
            }
            $userEntity->setRoles(array('ROLE_USER', $role));


            ////////////////////////  BOOSTERS  ////////////////////////////////////
            $userEntity->setTitle($user->name->title);   //title (Mr/Mme)
            $userEntity->setLastName($user->name->last);   //family_name
            $userEntity->setFirstName($user->name->first);    //surname
            $userEntity->setEmail($increment.$user->email);     //email
            $userEntity->setPassword($user->login->password);     //password
            $userEntity->setSalt($user->login->salt);               //salt
            $userEntity->setCreateTime($random->randomDate());          //creation time

            ////////////////////////  SOCIETY  ////////////////////////////////////
            if($randRole === 1){

                $userEntity->setProfessionalFunction($random->randomFunction());  //function

                $userEntity->setCreateTime($random->randomDate());                       //create_time

                $projectType = rand(0, 1);                               //role (0 = society, 1 = project)
                $userEntity->setTypeProject($projectType);               //role (0 = society, 1 = project)
                if($projectType === 0){
                    $siret = rand(10000000000000, 99999999999999);       //siret
                    $userEntity->setSiretNumber($siret);                       //siret
                } else{
                    $userEntity->setPhone(str_replace("-", "", $user->phone));    //phone_number
                }
                $userEntity->setNameProject($user->login->password);        //project_name
                $userEntity->setValidationSociety(0); //pending status for siret or phone validation
            }
            $manager->persist($userEntity);
            unset($userEntity);

            $increment ++;
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