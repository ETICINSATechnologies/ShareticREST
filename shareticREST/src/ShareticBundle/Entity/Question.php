<?php

namespace ShareticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="ShareticBundle\Repository\QuestionRepository")
 */
class Question
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
     * @ORM\Column(name="statement", type="string", length=255)
     */
    private $statement;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=25)
     */
    private $type;

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
     * Set statement
     *
     * @param string $statement
     *
     * @return Question
     */
    public function setStatement($statement)
    {
        $this->statement = $statement;

        return $this;
    }

    /**
     * Get statement
     *
     * @return string
     */
    public function getStatement()
    {
        return $this->statement;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Question
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param MCQ $mcq
     *
     * @return Question
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

