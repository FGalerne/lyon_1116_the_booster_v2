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
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, containerAwareInterface
{

    public function load(ObjectManager $manager){
        $generator = new UserGenerator('App.user_generator', 5000);
        $users = $generator->getUsers();
        $increment = 0;
        foreach($users as $user){
            $userEntity = new User;
            $boosterEntity = new Booster;
            $societyEntity = new Society;
            $projectEntity = new Project;

            $userEntity->setEnabled(1);

            $role = rand(0, 1); //role (0 = booster, 1 = project)
            if ($role == 0){
                $role = 'ROLE_BOOSTER';

                $boosterEntity->setPhoto($user->picture->medium);
                $boosterEntity->setCity($user->location->city);
                $boosterEntity->setZipCode($user->location->postcode);
                $boosterEntity->setBirthDate(new \DateTime($user->dob));
                $boosterEntity->setWorkStatus('status');
                $boosterEntity->setCompetence1('competence1');
                $boosterEntity->setCompetence2('competence2');
                $boosterEntity->setCompetence3('competence3');
                $boosterEntity->setCompetence4('competence4');
                $boosterEntity->setCompetence5('competence5');
                $boosterEntity->setCompetence6('competence6');
                $boosterEntity->setPresentation('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at purus nibh. Cras metus nulla, vestibulum in auctor ac, fermentum vitae tellus. Donec sed aliquam nisl. Sed eu leo id est pretium euismod. Nulla id justo at mi venenatis volutpat. Fusce nisi leo, placerat id condimentum a, accumsan vitae tortor. Nunc magna nunc, venenatis nec elementum eu, ultrices in sem. Maecenas tincidunt semper');
                $boosterEntity->setHoursGiven(0);
                $boosterEntity->setProjectDoneNumber(0);
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
                $societyEntity->setHoursTaken(0);
                $societyEntity->setProjectDoneNumber(0);
                $societyEntity->setDeniedBoosters(0);
                $manager->persist($societyEntity);
                unset($societyEntity);

                //project
                $projectEntity->setProjectName($user->login->password);
                $projectEntity->setCategory('category');
                $projectEntity->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at purus nibh. Cras metus nulla, vestibulum in auctor ac, fermentum vitae tellus. Donec sed aliquam nisl. Sed eu leo id est p');

                $creationStatus = rand(0, 2);
                if ($creationStatus == 0) $creationStatus = 'en attente';
                else if ($creationStatus == 1) $creationStatus = 'validé';
                else $creationStatus = 'supprimé';

                $projectEntity->setCreationStatus($creationStatus);

                $Status = rand(0, 2);
                if ($Status == 0) $Status = 'ouvert';
                else if ($Status == 1) $Status = 'en cours';
                else $Status = 'finalisé';

                $projectEntity->setStatus($Status);
                $projectEntity->setGivenTime(0);
                $projectEntity->setCreateTime(new \DateTime());

                $manager->persist($projectEntity);
                unset($projectEntity);
            }
            $userEntity->setRoles(array('ROLE_USER', $role));


            ////////////////////////  BOOSTERS  ////////////////////////////////////
            $userEntity->setTitle($user->name->title);               //title (Mr/Mme)
            $userEntity->setLastName($user->name->last);           //family_name
            $userEntity->setFirstName($user->name->first);             //surname
            $userEntity->setEmail($increment.$user->email);                     //email
            $userEntity->setPassword($user->login->password);        //password
            $userEntity->setSalt($user->login->salt);        //salt

            ////////////////////////  SOCIETY  ////////////////////////////////////
            if($role === 1){

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
                $userEntity->setProfessionalFunction($function);  //function

                //random datetime
                $rand_date = rand(strtotime('2016-01-01 00:00:00'), strtotime('2017-01-01 00:00:00'));
                $date =  date('Y-m-d H:i:s', $rand_date);                //convert to string
                $date = new \DateTime($date);                            //convert to datetime format
                $userEntity->setCreateTime($date);                       //create_time

                $projectType = rand(0, 1);                               //role (0 = society, 1 = project)
                $userEntity->setTypeProject($projectType);               //role (0 = society, 1 = project)
                if($projectType === 0){
                    $siret = rand(10000000000000, 99999999999999);       //siret
                    $userEntity->setSiretNumber($siret);                       //siret
                } else{
                    $userEntity->setPhone(str_replace("-", "", $user->phone));    //phone_number
                }
                $userEntity->setNameProject($user->login->password);        //project_name

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