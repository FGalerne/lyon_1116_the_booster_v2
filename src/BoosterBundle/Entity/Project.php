<?php

namespace BoosterBundle\Entity;

/**
 * Project
 */
class Project
{
	public function __toString()
	{
		return $this->projectName;
	}
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
     * @var string
     */
    private $boosterCommentaries;

    /**
     * @var string
     */
    private $societyCommentaries;

    /**
     * @var integer
     */
    private $boosterNote;

    /**
     * @var integer
     */
    private $societyNote;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $project_subscriptions;

    /**
     * @var \BoosterBundle\Entity\Society
     */
    private $society;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->project_subscriptions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get projectName
     *
     * @return string
     */
    public function getProjectName()
    {
        return $this->projectName;
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
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
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
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
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
     * Get creationStatus
     *
     * @return string
     */
    public function getCreationStatus()
    {
        return $this->creationStatus;
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
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
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
     * Get givenTime
     *
     * @return integer
     */
    public function getGivenTime()
    {
        return $this->givenTime;
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
     * Get createTime
     *
     * @return \DateTime
     */
    public function getCreateTime()
    {
        return $this->createTime;
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
     * Get endTime
     *
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->endTime;
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
     * Get boosterCommentaries
     *
     * @return string
     */
    public function getBoosterCommentaries()
    {
        return $this->boosterCommentaries;
    }

    /**
     * Set boosterCommentaries
     *
     * @param string $boosterCommentaries
     *
     * @return Project
     */
    public function setBoosterCommentaries($boosterCommentaries)
    {
        $this->boosterCommentaries = $boosterCommentaries;

        return $this;
    }

    /**
     * Get societyCommentaries
     *
     * @return string
     */
    public function getSocietyCommentaries()
    {
        return $this->societyCommentaries;
    }

    /**
     * Set societyCommentaries
     *
     * @param string $societyCommentaries
     *
     * @return Project
     */
    public function setSocietyCommentaries($societyCommentaries)
    {
        $this->societyCommentaries = $societyCommentaries;

        return $this;
    }

    /**
     * Get boosterNote
     *
     * @return integer
     */
    public function getBoosterNote()
    {
        return $this->boosterNote;
    }

    /**
     * Set boosterNote
     *
     * @param integer $boosterNote
     *
     * @return Project
     */
    public function setBoosterNote($boosterNote)
    {
        $this->boosterNote = $boosterNote;

        return $this;
    }

    /**
     * Get societyNote
     *
     * @return integer
     */
    public function getSocietyNote()
    {
        return $this->societyNote;
    }

    /**
     * Set societyNote
     *
     * @param integer $societyNote
     *
     * @return Project
     */
    public function setSocietyNote($societyNote)
    {
        $this->societyNote = $societyNote;

        return $this;
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
     * Get society
     *
     * @return \BoosterBundle\Entity\Society
     */
    public function getSociety()
    {
        return $this->society;
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
     * @var \BoosterBundle\Entity\Booster
     */
    private $booster;


    /**
     * Set booster
     *
     * @param \BoosterBundle\Entity\Booster $booster
     *
     * @return Project
     */
    public function setBooster(\BoosterBundle\Entity\Booster $booster = null)
    {
        $this->booster = $booster;

        return $this;
    }

    /**
     * Get booster
     *
     * @return \BoosterBundle\Entity\Booster
     */
    public function getBooster()
    {
        return $this->booster;
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
        $this->booster[] = $booster;

        return $this;
    }

    /**
     * Remove booster
     *
     * @param \BoosterBundle\Entity\Booster $booster
     */
    public function removeBooster(\BoosterBundle\Entity\Booster $booster)
    {
        $this->booster->removeElement($booster);
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $boosters;


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
