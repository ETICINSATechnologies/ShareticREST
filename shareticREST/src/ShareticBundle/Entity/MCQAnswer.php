<?php

namespace ShareticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * MCQAnswer
 *
 * @ORM\Table(name="m_c_q_answer")
 * @ORM\Entity(repositoryClass="ShareticBundle\Repository\MCQAnswerRepository")
 */
class MCQAnswer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime")
     */
    private $timestamp;

    /**
     * @ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(nullable=false)
     **/
    private $user;

    /**
     * @ManyToOne(targetEntity="MCQ")
     * @ORM\JoinColumn(nullable=false)
     **/
    private $mcq;

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
     * Set timestamp
     *
     * @param \DateTime $timestamp
     *
     * @return MCQAnswer
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }


    /**
     * @param User $user
     *
     * @return MCQAnswer
     */
    public function setUser(User $user){
        $this->user=$user;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser(){
        return $this->user;
    }


    /**
     * @param MCQ $mcq
     *
     * @return MCQAnswer
     */
    public function setMCQ($mcq)
    {
        $this->mcq = $mcq;

        return $this;
    }

    /**
     * @return MCQ
     */
    public function getMCQ()
    {
        return $this->mcq;
    }
}

