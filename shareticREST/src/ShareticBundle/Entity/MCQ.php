<?php

namespace ShareticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * MCQ
 *
 * @ORM\Table(name="m_c_q")
 * @ORM\Entity(repositoryClass="ShareticBundle\Repository\MCQRepository")
 */
class MCQ
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="rewardMax", type="integer")
     */
    private $rewardMax;

    /**
     * @ManyToOne(targetEntity="Chapter")
     * @ORM\JoinColumn(nullable=false)
     **/
    private $chapter;

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
     * Set name
     *
     * @param string $name
     *
     * @return MCQ
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return MCQ
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
     * Set rewardMax
     *
     * @param integer $rewardMax
     *
     * @return MCQ
     */
    public function setRewardMax($rewardMax)
    {
        $this->rewardMax = $rewardMax;

        return $this;
    }

    /**
     * Get rewardMax
     *
     * @return int
     */
    public function getRewardMax()
    {
        return $this->rewardMax;
    }

    /**
     * @param Chapter $chapter
     *
     * @return MCQ
     */
    public function setChapter($chapter)
    {
        $this->chapter = $chapter;

        return $this;
    }

    /**
     * @return Chapter
     */
    public function getChapter()
    {
        return $this->chapter;
    }
}

