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
class Friend extends Member {
    /**
     * @ORM\Column(type="integer")
     */
    protected $capacity; // Ιδιότητα: Μέλος, Χορηγός
    const CAPACITY_MEMBER = 0;
    const CAPACITY_SPONSOR = 1;

    /**
     * @ORM\OneToMany(targetEntity="SponsorPayment", mappedBy="friend", cascade={"all"}, orphanRemoval=true)
     */
    protected $sponsorpayments;

    public function __construct() {
        parent::__construct();
        $this->sponsorpayments = new ArrayCollection();
    }

    public function getCapacity() {
        return $this->capacity;
    }

    public function getCapacityAsString() {
        $capacities = self::getCapacities();
        return $capacities[$this->capacity];
    }

    public function setCapacity($capacity) {
        $this->capacity = $capacity;
    }

    public static function getCapacities() {
        return array(
            self::CAPACITY_MEMBER => 'member',
            self::CAPACITY_SPONSOR => 'sponsor',
        );
    }

    public function getSponsorpayments() {
        return $this->sponsorpayments;
    }

    public function setSponsorpayments($sponsorpayments) {
        $this->sponsorpayments = $sponsorpayments;
    }

    public function addSponsorpayment(SponsorPayment $sponsorpayment) {
        $this->sponsorpayments->add($sponsorpayment);
    }

    public function removeSponsorpayment(SponsorPayment $sponsorpayment) {
        $this->sponsorpayments->removeElement($sponsorpayment);
    }
}