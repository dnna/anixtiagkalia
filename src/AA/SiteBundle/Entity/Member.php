<?php
namespace AA\SiteBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OrderBy;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\SerializerBundle\Annotation\Expose;
use JMS\SerializerBundle\Annotation\Accessor;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type_id", type="integer")
 * @ORM\DiscriminatorMap({
 *   "0" = "Amea",
 *   "1" = "Friend"
 * })
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
abstract class Member {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $am;
    /**
     * @ORM\Column(type="string")
     */
    protected $name;
    /**
     * @ORM\Column(type="string")
     */
    protected $surname;
    /**
     * @ORM\Column(type="string")
     */
    protected $address;
    /**
     * @ORM\Column(type="string")
     */
    protected $tel;
    /**
     * @ORM\Column(type="string")
     */
    protected $email;
    /**
     * @ORM\Column(type="date")
     */
    protected $regdate;
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $removaldate;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $comments;

    public function __construct() {

    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getAm() {
        return $this->am;
    }

    public function setAm($am) {
        $this->am = $am;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getFullName() {
        return $this->getName().' '.$this->getSurname();
    }

    public function getSurname() {
        return $this->surname;
    }

    public function setSurname($surname) {
        $this->surname = $surname;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getTel() {
        return $this->tel;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getRegdate() {
        return $this->regdate;
    }

    public function setRegdate($regdate) {
        $this->regdate = $regdate;
    }

    public function getRemovaldate() {
        return $this->removaldate;
    }

    public function setRemovaldate($removaldate) {
        $this->removaldate = $removaldate;
    }

    public function getComments() {
        return $this->comments;
    }

    public function setComments($comments) {
        $this->comments = $comments;
    }

    public function __toString() {
        return $this->getFullName();
    }
}