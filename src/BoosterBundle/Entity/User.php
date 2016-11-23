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
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer
     */
    private $title;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var integer
     */
    private $phone;

    /**
     * @var integer
     */
    private $createtime;

    /**
     * @var integer
     */
    private $siretnumber;

    /**
     * @var string
     */
    private $tvaintranumber;

    /**
     * @var boolean
     */
    private $typeproject;

    /**
     * @var boolean
     */
    private $typesociety;


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
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $laststname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
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
    public function getCreatetime()
    {
        return $this->createtime;
    }

    /**
     * @param integer $createtime
     */
    public function setCreatetime($createtime)
    {
        $this->createtime = $createtime;
    }

    /**
     * @return integer
     */
    public function getSiretnumber()
    {
        return $this->siretnumber;
    }

    /**
     * @param integer $siretnumber
     */
    public function setSiretnumber($siretnumber)
    {
        $this->siretnumber = $siretnumber;
    }

    /**
     * @return string
     */
    public function getTvaintranumber()
    {
        return $this->tvaintranumber;
    }

    /**
     * @param string $tvaintranumber
     */
    public function setTvaintranumber($tvaintranumber)
    {
        $this->tvaintranumber = $tvaintranumber;
    }

    /**
     * @return boolean
     */
    public function getTypeproject()
    {
        return $this->typeproject;
    }

    /**
     * @param boolean $typeproject
     */
    public function setTypeproject($typeproject)
    {
        $this->typeproject = $typeproject;
    }

    /**
     * @return boolean
     */
    public function getTypesociety()
    {
        return $this->typesociety;
    }

    /**
     * @param boolean $typesociety
     */
    public function setTypesociety($typesociety)
    {
        $this->typesociety = $typesociety;
    }

}