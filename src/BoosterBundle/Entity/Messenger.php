<?php

namespace BoosterBundle\Entity;

/**
 * Messenger
 */
class Messenger
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $user1;

    /**
     * @var string
     */
    private $user2;

    /**
     * @var string
     */
    private $message;

    /**
     * @var \DateTime
     */
    private $createTime;

    /**
     * @var bool
     */
    private $user1Read;

    /**
     * @var bool
     */
    private $user2Read;


    /**
     * Get id
     *
     * @return int
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
     * Set user1
     *
     * @param string $user1
     *
     * @return Messenger
     */
    public function setUser1($user1)
    {
        $this->user1 = $user1;

        return $this;
    }

    /**
     * Get user1
     *
     * @return string
     */
    public function getUser1()
    {
        return $this->user1;
    }

    /**
     * Set user2
     *
     * @param string $user2
     *
     * @return Messenger
     */
    public function setUser2($user2)
    {
        $this->user2 = $user2;

        return $this;
    }

    /**
     * Get user2
     *
     * @return string
     */
    public function getUser2()
    {
        return $this->user2;
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
     * @return bool
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
     * @return bool
     */
    public function getUser2Read()
    {
        return $this->user2Read;
    }
}

