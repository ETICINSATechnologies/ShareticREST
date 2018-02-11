<?php

namespace ShareticBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="ShareticBundle\Repository\UserRepository")
 */
class User
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
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true))
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;


    /**
     * @ManyToOne(targetEntity="Pole")
     * @ORM\JoinColumn(nullable=false)
     **/
    private $pole;

    /**
     * @ORM\OneToOne(targetEntity="Icon", cascade={"persist"})
     */
    private $image;


    /**
     * @ORM\ManyToMany(targetEntity="Badge")
     */
    private $badges;

    /**
     * User constructor.
     */
    public function __construct(){
        $this->badges = new ArrayCollection();
    }

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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return User
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
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->isActive;
    }


    /**
     * @param Pole $pole
     *
     * @return User
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
     * @param Icon $image
     *
     * @return User
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
     * @param Badge $badge
     * @return User
     */
    public function addBadge(Badge $badge){
        $this->badges[] = $badge;
        return $this;
    }

    /**
     * @param Badge $badge
     */
    public function removeBadge(Badge $badge){
        $this->badges->removeElement($badge);
    }

    /**
     * @return Badge
     */
    public function getBadges(){
        return $this->badges;
    }
}

