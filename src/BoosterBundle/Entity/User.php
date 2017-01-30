<?php
/**
 * Created by PhpStorm.
 * User: LaurieGandon
 * Date: 22/11/2016
 * Time: 5:22 PM
 */
namespace BoosterBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class User
 * @package BoosterBundle\Entity
 */
class User extends BaseUser
{
    /**
     * @Recaptcha\IsTrue
     */
    public $recaptcha;

    /**
     * @var integer
     */
    protected $id;
    /**
     * @var integer
     */
    protected $title;
    /**
     * @var string
     */
    protected $lastName;
    /**
     * @var string
     */
    protected $firstName;
    /**
     * @var integer
     */
    protected $phone;
    /**
     * @var integer
     */
    protected $createTime;
    /**
     * @var string
     */
    protected $siretNumber;
    /**
     * @var boolean
     */
    protected $typeProject;
    /**
     * @var boolean
     */
    protected $typeSociety;
    /**
     * @var string
     */
    protected $professionalFunction;
    /**
     * @var
     */
    protected $nameProject;
    /**
     * @var boolean
     */
    protected $validationSociety = true;
    /**
     * @var \BoosterBundle\Entity\Society
     */
    private $society;
    /**
     * @var \BoosterBundle\Entity\Booster
     */
    private $booster;


    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    /**
     * @return integer
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }
    /**
     * @param integer $createtime
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;
    }
    /**
     * @return integer
     */
    public function getSiretNumber()
    {
        return $this->siretNumber;
    }
    /**
     * @param integer $siretnumber
     */
    public function setSiretNumber($siretNumber)
    {
        $this->siretNumber = $siretNumber;
    }
    /**
     * @return boolean
     */
    public function getTypeProject()
    {
        return $this->typeProject;
    }
    /**
     * @param boolean $typeproject
     */
    public function setTypeProject($typeProject)
    {
        $this->typeProject = $typeProject;
    }
    /**
     * @return string
     */
    public function getProfessionalFunction()
    {
        return $this->professionalFunction;
    }
    /**
     * @param string $professionalFunction
     */
    public function setProfessionalFunction($professionalFunction)
    {
        $this->professionalFunction = $professionalFunction;
    }
    /**
     * @return string
     */
    public function getNameProject()
    {
        return $this->nameProject;
    }
    /**
     * @param string $nameProject
     */
    public function setNameProject($nameProject)
    {
        $this->nameProject = $nameProject;
    }
    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $email = is_null($email) ? '' : $email;
        parent::setEmail($email);
        $this->setUsername($email);
        return $this;
    }

    /**
     * Set validationSociety
     *
     * @param boolean $validationSociety
     *
     * @return User
     */
    public function setValidationSociety($validationSociety)
    {
        $this->validationSociety = $validationSociety;

        return $this;
    }

    /**
     * Set society
     *
     * @param \BoosterBundle\Entity\Society $society
     *
     * @return User
     */
    public function setSociety(\BoosterBundle\Entity\Society $society = null)
    {
        $this->society = $society;

    }


    /**
     * Set booster
     *
     * @param \BoosterBundle\Entity\Booster $booster
     *
     * @return User
     */
    public function setBooster(\BoosterBundle\Entity\Booster $booster = null)
    {
        $this->booster = $booster;
        return $this;
    }

    /**
     * Get society
     *
     * @return \BoosterBundle\Entity\Society
     */
    public function getSociety()
    {
        return $this->society;
    }


    /**
     * Get booster
     * @return \BoosterBundle\Entity\Booster
     */
    public function getBooster()
    {
        return $this->booster;
    }

    /** Get validationSociety
     *
     * @return boolean
     */

    public function getValidationSociety()
    {
        return $this->validationSociety;
    }
}
