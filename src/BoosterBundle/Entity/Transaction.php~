<?php

namespace BoosterBundle\Entity;

/**
 * Transaction
 */
class Transaction
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $createTime = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     */
    private $projectLeft;

    /**
     * @var integer
     */
    private $projectMonthLeft;

    /**
     * @var \DateTime
     */
    private $validityDate;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \BoosterBundle\Entity\Society
     */
    private $society;


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
     * Set createTime
     *
     * @param \DateTime $createTime
     *
     * @return Transaction
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
     * Set projectLeft
     *
     * @param integer $projectLeft
     *
     * @return Transaction
     */
    public function setProjectLeft($projectLeft)
    {
        $this->projectLeft = $projectLeft;

        return $this;
    }

    /**
     * Get projectLeft
     *
     * @return integer
     */
    public function getProjectLeft()
    {
        return $this->projectLeft;
    }

    /**
     * Set projectMonthLeft
     *
     * @param integer $projectMonthLeft
     *
     * @return Transaction
     */
    public function setProjectMonthLeft($projectMonthLeft)
    {
        $this->projectMonthLeft = $projectMonthLeft;

        return $this;
    }

    /**
     * Get projectMonthLeft
     *
     * @return integer
     */
    public function getProjectMonthLeft()
    {
        return $this->projectMonthLeft;
    }

    /**
     * Set validityDate
     *
     * @param \DateTime $validityDate
     *
     * @return Transaction
     */
    public function setValidityDate($validityDate)
    {
        $this->validityDate = $validityDate;

        return $this;
    }

    /**
     * Get validityDate
     *
     * @return \DateTime
     */
    public function getValidityDate()
    {
        return $this->validityDate;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Transaction
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
     * Set society
     *
     * @param \BoosterBundle\Entity\Society $society
     *
     * @return Transaction
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
}
