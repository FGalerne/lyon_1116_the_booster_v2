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
     * @var \BoosterBundle\Entity\Society
     */
    private $transaction_id;

    public function __toString() {
        return $this->transaction_id->getSocietyName();
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
     * Set transactionId
     *
     * @param \BoosterBundle\Entity\Society $transactionId
     *
     * @return Transaction
     */
    public function setTransactionId(\BoosterBundle\Entity\Society $transactionId = null)
    {
        $this->transaction_id = $transactionId;

        return $this;
    }

    /**
     * Get transactionId
     *
     * @return \BoosterBundle\Entity\Society
     */
    public function getTransactionId()
    {
        return $this->transaction_id;
    }
    /**
     * @var \BoosterBundle\Entity\Society
     */
    private $society;


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
    /**
     * @var \DateTime
     */
    private $duration;


    /**
     * Set duration
     *
     * @param \DateTime $duration
     *
     * @return Transaction
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return \DateTime
     */
    public function getDuration()
    {
        return $this->duration;
    }
    /**
     * @var \DateTime
     */
    private $endTime;


    /**
     * Set endTime
     *
     * @param \DateTime $endTime
     *
     * @return Transaction
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
}
