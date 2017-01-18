<?php

namespace BoosterBundle\Entity;

/**
 * Project
 */
class Project
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $projectName;

    /**
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $creationStatus;

    /**
     * @var string
     */
    private $status;

    /**
     * @var integer
     */
    private $givenTime;

    /**
     * @var \DateTime
     */
    private $createTime = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     */
    private $endTime;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $project_subscriptions;

    /**
     * @var \BoosterBundle\Entity\Society
     */
    private $society;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $boosters;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->project_subscriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->boosters = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set projectName
     *
     * @param string $projectName
     *
     * @return Project
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
     * Set category
     *
     * @param string $category
     *
     * @return Project
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set creationStatus
     *
     * @param string $creationStatus
     *
     * @return Project
     */
    public function setCreationStatus($creationStatus)
    {
        $this->creationStatus = $creationStatus;

        return $this;
    }

    /**
     * Get creationStatus
     *
     * @return string
     */
    public function getCreationStatus()
    {
        return $this->creationStatus;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Project
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set givenTime
     *
     * @param integer $givenTime
     *
     * @return Project
     */
    public function setGivenTime($givenTime)
    {
        $this->givenTime = $givenTime;

        return $this;
    }

    /**
     * Get givenTime
     *
     * @return integer
     */
    public function getGivenTime()
    {
        return $this->givenTime;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     *
     * @return Project
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
     * Set endTime
     *
     * @param \DateTime $endTime
     *
     * @return Project
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * Get endTime
     *
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Add projectSubscription
     *
     * @param \BoosterBundle\Entity\ProjectSubscription $projectSubscription
     *
     * @return Project
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
     * Set society
     *
     * @param \BoosterBundle\Entity\Society $society
     *
     * @return Project
     */
    public function setSociety(\BoosterBundle\Entity\Society $society = null)
    {
        $this->society = $society;

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
     * Add booster
     *
     * @param \BoosterBundle\Entity\Booster $booster
     *
     * @return Project
     */
    public function addBooster(\BoosterBundle\Entity\Booster $booster)
    {
        $this->boosters[] = $booster;

        return $this;
    }

    /**
     * Remove booster
     *
     * @param \BoosterBundle\Entity\Booster $booster
     */
    public function removeBooster(\BoosterBundle\Entity\Booster $booster)
    {
        $this->boosters->removeElement($booster);
    }

    /**
     * Get boosters
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoosters()
    {
        return $this->boosters;
    }
}

