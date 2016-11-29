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
     * @param string $nameProject
     */
    public function setNameProject($nameProject)
    {
        $this->nameProject = $nameProject;
    }

    /**
     * @return string
     */
    public function getNameProject()
    {
        return $this->nameProject;
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
	 * @Assert\Regex(
	 *  pattern="/(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{7,}/",
	 *  message="Password must be seven or more characters long and contain at least one digit, one upper- and one lowercase character."
	 * )
	 */
	protected $plainPassword;

}
