<?php

namespace ShareticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="ShareticBundle\Repository\FormationRepository")
 */
class Formation
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
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="isDraft", type="boolean")
     */
    private $isDraft;

    /**
     * @ManyToOne(targetEntity="ShareticBundle\Entity\Pole")
     * @JoinColumn(name="pole_id", referencedColumnName="id")
     **/
    private $pole_id;


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
     * @return formation
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
     * @return formation
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
     * Set isDraft
     *
     * @param boolean $isDraft
     *
     * @return formation
     */
    public function setIsDraft($isDraft)
    {
        $this->isDraft = $isDraft;

        return $this;
    }

    /**
     * Get isDraft
     *
     * @return bool
     */
    public function getIsDraft()
    {
        return $this->isDraft;
    }

    /**
     * Get pole_id
     *
     * @return int
     */
    public function getPoleId()
    {
        return $this->pole_id;
    }

    /**
     * Get pole name
     *
     * @return string
     */
    public function getPoleName()
    {
        $em = $this->get('doctrine.orm.entity_manager');

        $repo_pole = $em->getRepository('ShareticBundle:Pole');

        $product = $repo_pole->findOneBy(array('id'=>$this->pole_id));

        return $product->getName();
    }
}

