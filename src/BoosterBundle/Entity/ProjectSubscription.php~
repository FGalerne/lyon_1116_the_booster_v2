<?php

namespace BoosterBundle\Entity;

/**
 * ProjectSubscription
 */
class ProjectSubscription
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $message;

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
     * @var \BoosterBundle\Entity\Booster
     */
    private $booster;

    /**
     * @var \BoosterBundle\Entity\Project
     */
    private $project;


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
     * Set message
     *
     * @param string $message
     *
     * @return ProjectSubscription
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return ProjectSubscription
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
     * @return ProjectSubscription
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
     * @return ProjectSubscription
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
     * Set boosterCommentaries
     *
     * @param string $boosterCommentaries
     *
     * @return ProjectSubscription
     */
    public function setBoosterCommentaries($boosterCommentaries)
    {
        $this->boosterCommentaries = $boosterCommentaries;

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
     * Set societyCommentaries
     *
     * @param string $societyCommentaries
     *
     * @return ProjectSubscription
     */
    public function setSocietyCommentaries($societyCommentaries)
    {
        $this->societyCommentaries = $societyCommentaries;

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
     * Set boosterNote
     *
     * @param integer $boosterNote
     *
     * @return ProjectSubscription
     */
    public function setBoosterNote($boosterNote)
    {
        $this->boosterNote = $boosterNote;

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
     * Set societyNote
     *
     * @param integer $societyNote
     *
     * @return ProjectSubscription
     */
    public function setSocietyNote($societyNote)
    {
        $this->societyNote = $societyNote;

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
     * Set booster
     *
     * @param \BoosterBundle\Entity\Booster $booster
     *
     * @return ProjectSubscription
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
     * Set project
     *
     * @param \BoosterBundle\Entity\Project $project
     *
     * @return ProjectSubscription
     */
    public function setProject(\BoosterBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \BoosterBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @var boolean
     */
    private $boosterValidation = false;

    /**
     * @var boolean
     */
    private $societyValidation = false;


    /**
     * Set boosterValidation
     *
     * @param boolean $boosterValidation
     *
     * @return ProjectSubscription
     */
    public function setBoosterValidation($boosterValidation)
    {
        $this->boosterValidation = $boosterValidation;

        return $this;
    }

    /**
     * Get boosterValidation
     *
     * @return boolean
     */
    public function getBoosterValidation()
    {
        return $this->boosterValidation;
    }

    /**
     * Set societyValidation
     *
     * @param boolean $societyValidation
     *
     * @return ProjectSubscription
     */
    public function setSocietyValidation($societyValidation)
    {
        $this->societyValidation = $societyValidation;

        return $this;
    }

    /**
     * Get societyValidation
     *
     * @return boolean
     */
    public function getSocietyValidation()
    {
        return $this->societyValidation;
    }

}
