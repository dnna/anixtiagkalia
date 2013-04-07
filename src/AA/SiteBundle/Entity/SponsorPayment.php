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
 * @ORM\Table()
 */
class SponsorPayment {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="Friend", inversedBy="sponsorpayments")
     * @ORM\JoinColumn(name="friend_id", referencedColumnName="id")
     */
    protected $friend;
    /**
     * @ORM\Column(type="date")
     */
    protected $date;
    /**
     * @ORM\Column(type="integer")
     */
    protected $year;
    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    protected $amount;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFriend() {
        return $this->friend;
    }

    public function setFriend($friend) {
        $this->friend = $friend;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
        $this->setYear($date->format('Y'));
    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function __toString() {
        return $this->getName();
    }
}