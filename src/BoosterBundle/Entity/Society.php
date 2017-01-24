<?php

namespace BoosterBundle\Entity;

/**
 * Society
 */
class Society
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $photo;

    /**
     * @var string
     */
    private $societyName;

    /**
     * @var string
     */
    private $punchLine;

    /**
     * @var string
     */
    private $presentation;

    /**
     * @var string
     */
    private $linkedin;

    /**
     * @var string
     */
    private $facebook;

    /**
     * @var string
     */
    private $twitter;

    /**
     * @var string
     */
    private $youtube;

    /**
     * @var string
     */
    private $websiteLink;

    /**
     * @var integer
     */
    private $hoursTaken;

    /**
     * @var integer
     */
    private $averageNotation;

    /**
     * @var integer
     */
    private $projectDoneNumber;

    /**
     * @var integer
     */
    private $deniedBoosters;

    /**
     * @var string
     */
    private $oneToMany;


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
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Society
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get societyName
     *
     * @return string
     */
    public function getSocietyName()
    {
        return $this->societyName;
    }

    /**
     * Set societyName
     *
     * @param string $societyName
     *
     * @return Society
     */
    public function setSocietyName($societyName)
    {
        $this->societyName = $societyName;

        return $this;
    }

    /**
     * Get punchLine
     *
     * @return string
     */
    public function getPunchLine()
    {
        return $this->punchLine;
    }

    /**
     * Set punchLine
     *
     * @param string $punchLine
     *
     * @return Society
     */
    public function setPunchLine($punchLine)
    {
        $this->punchLine = $punchLine;

        return $this;
    }

    /**
     * Get presentation
     *
     * @return string
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * Set presentation
     *
     * @param string $presentation
     *
     * @return Society
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * Get linkedin
     *
     * @return string
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * Set linkedin
     *
     * @param string $linkedin
     *
     * @return Society
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     *
     * @return Society
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     *
     * @return Society
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get youtube
     *
     * @return string
     */
    public function getYoutube()
    {
        return $this->youtube;
    }

    /**
     * Set youtube
     *
     * @param string $youtube
     *
     * @return Society
     */
    public function setYoutube($youtube)
    {
        $this->youtube = $youtube;

        return $this;
    }

    /**
     * Get websiteLink
     *
     * @return string
     */
    public function getWebsiteLink()
    {
        return $this->websiteLink;
    }

    /**
     * Set websiteLink
     *
     * @param string $websiteLink
     *
     * @return Society
     */
    public function setWebsiteLink($websiteLink)
    {
        $this->websiteLink = $websiteLink;

        return $this;
    }

    /**
     * Get hoursTaken
     *
     * @return integer
     */
    public function getHoursTaken()
    {
        return $this->hoursTaken;
    }

    /**
     * Set hoursTaken
     *
     * @param integer $hoursTaken
     *
     * @return Society
     */
    public function setHoursTaken($hoursTaken)
    {
        $this->hoursTaken = $hoursTaken;

        return $this;
    }

    /**
     * Get averageNotation
     *
     * @return integer
     */
    public function getAverageNotation()
    {
        return $this->averageNotation;
    }

    /**
     * Set averageNotation
     *
     * @param integer $averageNotation
     *
     * @return Society
     */
    public function setAverageNotation($averageNotation)
    {
        $this->averageNotation = $averageNotation;

        return $this;
    }

    /**
     * Get projectDoneNumber
     *
     * @return integer
     */
    public function getProjectDoneNumber()
    {
        return $this->projectDoneNumber;
    }

    /**
     * Set projectDoneNumber
     *
     * @param integer $projectDoneNumber
     *
     * @return Society
     */
    public function setProjectDoneNumber($projectDoneNumber)
    {
        $this->projectDoneNumber = $projectDoneNumber;

        return $this;
    }

    /**
     * Get deniedBoosters
     *
     * @return integer
     */
    public function getDeniedBoosters()
    {
        return $this->deniedBoosters;
    }

    /**
     * Set deniedBoosters
     *
     * @param integer $deniedBoosters
     *
     * @return Society
     */
    public function setDeniedBoosters($deniedBoosters)
    {
        $this->deniedBoosters = $deniedBoosters;

        return $this;
    }

    /**
     * Get oneToMany
     *
     * @return string
     */
    public function getOneToMany()
    {
        return $this->oneToMany;
    }

    /**
     * Set oneToMany
     *
     * @param string $oneToMany
     *
     * @return Society
     */
    public function setOneToMany($oneToMany)
    {
        $this->oneToMany = $oneToMany;

        return $this;
    }
    
    /**
     * @return string
     */
    public function __toString()
    {
    	return strval($this->id);
    }

    /**
     * @var \BoosterBundle\Entity\User
     */
    private $users;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $project_names;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->project_names = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set users
     *
     * @param \BoosterBundle\Entity\User $users
     *
     * @return Society
     */
    public function setUsers(\BoosterBundle\Entity\User $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \BoosterBundle\Entity\User
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add projectName
     *
     * @param \BoosterBundle\Entity\Project $projectName
     *
     * @return Society
     */
    public function addProjectName(\BoosterBundle\Entity\Project $projectName)
    {
        $this->project_names[] = $projectName;

        return $this;
    }

    /**
     * Remove projectName
     *
     * @param \BoosterBundle\Entity\Project $projectName
     */
    public function removeProjectName(\BoosterBundle\Entity\Project $projectName)
    {
        $this->project_names->removeElement($projectName);
    }

    /**
     * Get projectNames
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjectNames()
    {
        return $this->project_names;
    }

    /**
     * @var \BoosterBundle\Entity\User
     */
    private $user;


    /**
     * Set user
     *
     * @param \BoosterBundle\Entity\User $user
     *
     * @return Society
     */
    public function setUser(\BoosterBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \BoosterBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @var \BoosterBundle\Entity\Transaction
     */
    private $transaction;


    /**
     * Set transaction
     *
     * @param \BoosterBundle\Entity\Transaction $transaction
     *
     * @return Society
     */
    public function setTransaction(\BoosterBundle\Entity\Transaction $transaction = null)
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * Get transaction
     *
     * @return \BoosterBundle\Entity\Transaction
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @var \BoosterBundle\Entity\Transaction
     */
    private $society_id;


    /**
     * Set transactionId
     *
     * @param \BoosterBundle\Entity\Transaction $societyId
     *
     * @return Society
     */
    public function setSocietyId(\BoosterBundle\Entity\Transaction $societyId = null)
    {
        $this->society_id = $societyId;

        return $this;
    }

    /**
     * Get societyId
     *
     * @return \BoosterBundle\Entity\Transaction
     */
    public function getSocietyId()
    {
        return $this->society_id;
    }
    /**
     * @var string
     */
    private $slug;


    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Society
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
