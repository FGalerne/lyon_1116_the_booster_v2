<?php

namespace BoosterBundle\Entity;

/**
 * ProjectSubsciption
 */
class ProjectSubsciption
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
     * @var \BoosterBundle\Entity\Booster
     */
    private $booster;

    /**
     * @var \BoosterBundle\Entity\Project
     */
    private $project;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return ProjectSubsciption
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set message
     *
     * @param string $message
     *
     * @return ProjectSubsciption
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
     * @return ProjectSubsciption
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
     * Set booster
     *
     * @param \BoosterBundle\Entity\Booster $booster
     *
     * @return ProjectSubsciption
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
     * @return ProjectSubsciption
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
}

