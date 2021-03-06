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
     * @ORM\Column(name="description", type="text", nullable=true))
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="isDraft", type="boolean")
     */
    private $isDraft;

    /**
     * @ManyToOne(targetEntity="Pole")
     * @ORM\JoinColumn(nullable=false)
     **/
    private $pole;

    /**
     * @ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(nullable=false)
     **/
    private $author;


    /**
     * @ORM\OneToOne(targetEntity="Icon", cascade={"persist"})
     */
    private $image;

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
     * @param Icon $image
     *
     * @return Formation
     */
    public function setImage(Icon $image){
        $this->image=$image;

        return $this;
    }

    /**
     * @return Icon
     */
    public function getImage(){
        return $this->image;
    }

    /**
     * @param Pole $pole
     *
     * @return Formation
     */
    public function setPole(Pole $pole){
        $this->pole=$pole;

        return $this;
    }

    /**
     * @return Pole
     */
    public function getPole(){
        return $this->pole;
    }

    /**
     * @param User $user
     *
     * @return Formation
     */
    public function setAuthor(User $user){
        $this->author=$user;

        return $this;
    }

    /**
     * @return User
     */
    public function getAuthor(){
        return $this->author;
    }
}

