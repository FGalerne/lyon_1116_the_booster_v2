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
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
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
     * Get societyName
     *
     * @return string
     */
    public function getSocietyName()
    {
        return $this->societyName;
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
     * Get punchLine
     *
     * @return string
     */
    public function getPunchLine()
    {
        return $this->punchLine;
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
     * Get presentation
     *
     * @return string
     */
    public function getPresentation()
    {
        return $this->presentation;
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
     * Get linkedin
     *
     * @return string
     */
    public function getLinkedin()
    {
        return $this->linkedin;
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
     * Get facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
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
     * Get twitter
     *
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
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
     * Get youtube
     *
     * @return string
     */
    public function getYoutube()
    {
        return $this->youtube;
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
     * Get websiteLink
     *
     * @return string
     */
    public function getWebsiteLink()
    {
        return $this->websiteLink;
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
     * Get hoursTaken
     *
     * @return integer
     */
    public function getHoursTaken()
    {
        return $this->hoursTaken;
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
     * Get averageNotation
     *
     * @return integer
     */
    public function getAverageNotation()
    {
        return $this->averageNotation;
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
     * Get projectDoneNumber
     *
     * @return integer
     */
    public function getProjectDoneNumber()
    {
        return $this->projectDoneNumber;
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
     * Get deniedBoosters
     *
     * @return integer
     */
    public function getDeniedBoosters()
    {
        return $this->deniedBoosters;
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
     * Get oneToMany
     *
     * @return string
     */
    public function getOneToMany()
    {
        return $this->oneToMany;
    }
}
