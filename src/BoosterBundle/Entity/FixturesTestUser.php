<?php

namespace BoosterBundle\Entity;

/**
 * FixturesTestUser
 */
class FixturesTestUser
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $familyName;

    /**
     * @var string
     */
    private $surname;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var string
     */
    private $function;

    /**
     * @var \DateTime
     */
    private $createTime;

    /**
     * @var boolean
     */
    private $projectType;

    /**
     * @var string
     */
    private $siret;

    /**
     * @var string
     */
    private $projectName;

    /**
     * @var boolean
     */
    private $role;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return FixturesTestUser
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set familyName
     *
     * @param string $familyName
     *
     * @return FixturesTestUser
     */
    public function setFamilyName($familyName)
    {
        $this->familyName = $familyName;

        return $this;
    }

    /**
     * Get familyName
     *
     * @return string
     */
    public function getFamilyName()
    {
        return $this->familyName;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return FixturesTestUser
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return FixturesTestUser
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return FixturesTestUser
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return FixturesTestUser
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set function
     *
     * @param string $function
     *
     * @return FixturesTestUser
     */
    public function setFunction($function)
    {
        $this->function = $function;

        return $this;
    }

    /**
     * Get function
     *
     * @return string
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     *
     * @return FixturesTestUser
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;

        return $this;
    }

    /**
     * Get createTime
     *
     * @return \DateTime
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * Set projectType
     *
     * @param boolean $projectType
     *
     * @return FixturesTestUser
     */
    public function setProjectType($projectType)
    {
        $this->projectType = $projectType;

        return $this;
    }

    /**
     * Get projectType
     *
     * @return boolean
     */
    public function getProjectType()
    {
        return $this->projectType;
    }

    /**
     * Set siret
     *
     * @param string $siret
     *
     * @return FixturesTestUser
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * Get siret
     *
     * @return string
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Set projectName
     *
     * @param string $projectName
     *
     * @return FixturesTestUser
     */
    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;

        return $this;
    }

    /**
     * Get projectName
     *
     * @return string
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * Set role
     *
     * @param boolean $role
     *
     * @return FixturesTestUser
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return boolean
     */
    public function getRole()
    {
        return $this->role;
    }
}

