<?php

namespace BoosterBundle\Entity;

/**
 * Messenger
 */
class Messenger
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $message;

    /**
     * @var \DateTime
     */
    private $createTime;

    /**
     * @var boolean
     */
    private $user1Read = false;

    /**
     * @var boolean
     */
    private $user2Read = false;

    /**
     * @var \BoosterBundle\Entity\User
     */
    private $user1;

    /**
     * @var \BoosterBundle\Entity\User
     */
    private $user2;


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
     * Set title
     *
     * @param string $title
     *
     * @return Messenger
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Messenger
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
     * Set createTime
     *
     * @param \DateTime $createTime
     *
     * @return Messenger
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
     * Set user1Read
     *
     * @param boolean $user1Read
     *
     * @return Messenger
     */
    public function setUser1Read($user1Read)
    {
        $this->user1Read = $user1Read;

        return $this;
    }

    /**
     * Get user1Read
     *
     * @return boolean
     */
    public function getUser1Read()
    {
        return $this->user1Read;
    }

    /**
     * Set user2Read
     *
     * @param boolean $user2Read
     *
     * @return Messenger
     */
    public function setUser2Read($user2Read)
    {
        $this->user2Read = $user2Read;

        return $this;
    }

    /**
     * Get user2Read
     *
     * @return boolean
     */
    public function getUser2Read()
    {
        return $this->user2Read;
    }

    /**
     * Set user1
     *
     * @param \BoosterBundle\Entity\User $user1
     *
     * @return Messenger
     */
    public function setUser1(\BoosterBundle\Entity\User $user1 = null)
    {
        $this->user1 = $user1;

        return $this;
    }

    /**
     * Get user1
     *
     * @return \BoosterBundle\Entity\User
     */
    public function getUser1()
    {
        return $this->user1;
    }

    /**
     * Set user2
     *
     * @param \BoosterBundle\Entity\User $user2
     *
     * @return Messenger
     */
    public function setUser2(\BoosterBundle\Entity\User $user2 = null)
    {
        $this->user2 = $user2;

        return $this;
    }

    /**
     * Get user2
     *
     * @return \BoosterBundle\Entity\User
     */
    public function getUser2()
    {
        return $this->user2;
    }
}

