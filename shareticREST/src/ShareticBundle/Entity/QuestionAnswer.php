<?php

namespace ShareticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * QuestionAnswer
 *
 * @ORM\Table(name="question_answer")
 * @ORM\Entity(repositoryClass="ShareticBundle\Repository\QuestionAnswerRepository")
 */
class QuestionAnswer
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
     * @ManyToOne(targetEntity="Question")
     * @ORM\JoinColumn(nullable=false)
     **/
    private $question;

    /**
     * @ManyToOne(targetEntity="PossibleAnswer")
     * @ORM\JoinColumn(nullable=false)
     **/
    private $answer;


    /**
     * @ManyToOne(targetEntity="MCQAnswer")
     * @ORM\JoinColumn(nullable=false)
     **/
    private $submission;


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
     * @param Question $question
     *
     * @return QuestionAnswer
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * @return Question
     */
    public function getQuestion()
    {
        return $this->question;
    }


    /**
     * @param PossibleAnswer $answer
     *
     * @return QuestionAnswer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * @return PossibleAnswer
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param MCQAnswer $submission
     *
     * @return QuestionAnswer
     */
    public function setSubmission($submission)
    {
        $this->submission = $submission;

        return $this;
    }

    /**
     * @return MCQAnswer
     */
    public function getSubmission()
    {
        return $this->submission;
    }
}

