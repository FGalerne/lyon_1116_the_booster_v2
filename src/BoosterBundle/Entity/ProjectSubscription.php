<?php

namespace BoosterBundle\Entity;

/**
 * ProjectSubscription
 */
class ProjectSubscription
{

	public function __toString()
	{
		return ProjectSubscription::get;
	}
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
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
     * @return ProjectSubscription
     */
    public function setStatus($status)
    {
        $this->status = $status;

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
     * Get project
     *
     * @return \BoosterBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
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
}
