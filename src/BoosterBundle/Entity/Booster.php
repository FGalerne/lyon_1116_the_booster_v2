<?php

namespace BoosterBundle\Entity;

/**
 * Booster
 */
class Booster
{
    public function __toString()
    {
        return 'Booster';
    }

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
    private $city;

    /**
     * @var integer
     */
    private $zipCode;

    /**
     * @var \DateTime
     */
    private $birthDate;

    /**
     * @var string
     */
    private $workStatus;

    /**
     * @var string
     */
    private $competence1;

    /**
     * @var string
     */
    private $competence2;

    /**
     * @var string
     */
    private $competence3;

    /**
     * @var string
     */
    private $competence4;

    /**
     * @var string
     */
    private $competence5;

    /**
     * @var string
     */
    private $competence6;

    /**
     * @var string
     */
    private $presentation;

    /**
     * @var integer
     */
    private $hoursGiven;

    /**
     * @var integer
     */
    private $projectDoneNumber;

    /**
     * @var integer
     */
    private $averageNotation;

    /**
     * @var \BoosterBundle\Entity\User
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $project_subscriptions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $projects;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->project_subscriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projects = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Booster
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
     * Set city
     *
     * @param string $city
     *
     * @return Booster
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set zipCode
     *
     * @param integer $zipCode
     *
     * @return Booster
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return integer
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return Booster
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set workStatus
     *
     * @param string $workStatus
     *
     * @return Booster
     */
    public function setWorkStatus($workStatus)
    {
        $this->workStatus = $workStatus;

        return $this;
    }

    /**
     * Get workStatus
     *
     * @return string
     */
    public function getWorkStatus()
    {
        return $this->workStatus;
    }

    /**
     * Set competence1
     *
     * @param string $competence1
     *
     * @return Booster
     */
    public function setCompetence1($competence1)
    {
        $this->competence1 = $competence1;

        return $this;
    }

    /**
     * Get competence1
     *
     * @return string
     */
    public function getCompetence1()
    {
        return $this->competence1;
    }

    /**
     * Set competence2
     *
     * @param string $competence2
     *
     * @return Booster
     */
    public function setCompetence2($competence2)
    {
        $this->competence2 = $competence2;

        return $this;
    }

    /**
     * Get competence2
     *
     * @return string
     */
    public function getCompetence2()
    {
        return $this->competence2;
    }

    /**
     * Set competence3
     *
     * @param string $competence3
     *
     * @return Booster
     */
    public function setCompetence3($competence3)
    {
        $this->competence3 = $competence3;

        return $this;
    }

    /**
     * Get competence3
     *
     * @return string
     */
    public function getCompetence3()
    {
        return $this->competence3;
    }

    /**
     * Set competence4
     *
     * @param string $competence4
     *
     * @return Booster
     */
    public function setCompetence4($competence4)
    {
        $this->competence4 = $competence4;

        return $this;
    }

    /**
     * Get competence4
     *
     * @return string
     */
    public function getCompetence4()
    {
        return $this->competence4;
    }

    /**
     * Set competence5
     *
     * @param string $competence5
     *
     * @return Booster
     */
    public function setCompetence5($competence5)
    {
        $this->competence5 = $competence5;

        return $this;
    }

    /**
     * Get competence5
     *
     * @return string
     */
    public function getCompetence5()
    {
        return $this->competence5;
    }

    /**
     * Set competence6
     *
     * @param string $competence6
     *
     * @return Booster
     */
    public function setCompetence6($competence6)
    {
        $this->competence6 = $competence6;

        return $this;
    }

    /**
     * Get competence6
     *
     * @return string
     */
    public function getCompetence6()
    {
        return $this->competence6;
    }

    /**
     * Set presentation
     *
     * @param string $presentation
     *
     * @return Booster
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
     * Set hoursGiven
     *
     * @param integer $hoursGiven
     *
     * @return Booster
     */
    public function setHoursGiven($hoursGiven)
    {
        $this->hoursGiven = $hoursGiven;

        return $this;
    }

    /**
     * Get hoursGiven
     *
     * @return integer
     */
    public function getHoursGiven()
    {
        return $this->hoursGiven;
    }

    /**
     * Set projectDoneNumber
     *
     * @param integer $projectDoneNumber
     *
     * @return Booster
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
     * Set averageNotation
     *
     * @param integer $averageNotation
     *
     * @return Booster
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
     * Set user
     *
     * @param \BoosterBundle\Entity\User $user
     *
     * @return Booster
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
     * Add projectSubscription
     *
     * @param \BoosterBundle\Entity\ProjectSubscription $projectSubscription
     *
     * @return Booster
     */
    public function addProjectSubscription(\BoosterBundle\Entity\ProjectSubscription $projectSubscription)
    {
        $this->project_subscriptions[] = $projectSubscription;

        return $this;
    }

    /**
     * Remove projectSubscription
     *
     * @param \BoosterBundle\Entity\ProjectSubscription $projectSubscription
     */
    public function removeProjectSubscription(\BoosterBundle\Entity\ProjectSubscription $projectSubscription)
    {
        $this->project_subscriptions->removeElement($projectSubscription);
    }

    /**
     * Get projectSubscriptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjectSubscriptions()
    {
        return $this->project_subscriptions;
    }

    /**
     * Add project
     *
     * @param \BoosterBundle\Entity\Project $project
     *
     * @return Booster
     */
    public function addProject(\BoosterBundle\Entity\Project $project)
    {
        $this->projects[] = $project;

        return $this;
    }

    /**
     * Remove project
     *
     * @param \BoosterBundle\Entity\Project $project
     */
    public function removeProject(\BoosterBundle\Entity\Project $project)
    {
        $this->projects->removeElement($project);
    }

    /**
     * Get projects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjects()
    {
        return $this->projects;
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
     * @return Booster
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
