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
    private $title;

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
    private $boosterComentaries;

    /**
     * @var string
     */
    private $socityComentaries;

    /**
     * @var integer
     */
    private $boosterNote;

    /**
     * @var integer
     */
    private $socityNote;

    /**
     * @var \BoosterBundle\Entity\Society
     */
    private $society;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Project
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
     * Set title
     *
     * @param string $title
     *
     * @return Project
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
     * Set boosterComentaries
     *
     * @param string $boosterComentaries
     *
     * @return Project
     */
    public function setBoosterComentaries($boosterComentaries)
    {
        $this->boosterComentaries = $boosterComentaries;

        return $this;
    }

    /**
     * Get boosterComentaries
     *
     * @return string
     */
    public function getBoosterComentaries()
    {
        return $this->boosterComentaries;
    }

    /**
     * Set socityComentaries
     *
     * @param string $socityComentaries
     *
     * @return Project
     */
    public function setSocityComentaries($socityComentaries)
    {
        $this->socityComentaries = $socityComentaries;

        return $this;
    }

    /**
     * Get socityComentaries
     *
     * @return string
     */
    public function getSocityComentaries()
    {
        return $this->socityComentaries;
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
     * Get boosterNote
     *
     * @return integer
     */
    public function getBoosterNote()
    {
        return $this->boosterNote;
    }

    /**
     * Set socityNote
     *
     * @param integer $socityNote
     *
     * @return Project
     */
    public function setSocityNote($socityNote)
    {
        $this->socityNote = $socityNote;

        return $this;
    }

    /**
     * Get socityNote
     *
     * @return integer
     */
    public function getSocityNote()
    {
        return $this->socityNote;
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
}

