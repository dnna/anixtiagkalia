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
class Amea extends Member {
    /**
     * @ORM\Column(type="date")
     */
    protected $birthday;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $representativename;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $representativesurname;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $sports;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $medication; // Φαρμακευτική αγωγή
    /**
     * @ORM\ManyToOne(targetEntity="Disability")
     * @ORM\JoinColumn(name="disability_id", referencedColumnName="id")
     */
    protected $disability;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $otherpeculiarities; // Άλλες ιδιαιτερότητες (πχ. αλλεργία/επιληψία)
    /**
     * @ORM\OneToMany(targetEntity="Payment", mappedBy="amea", cascade={"all"}, orphanRemoval=true)
     */
    protected $payments;
    /**
     * @ORM\OneToMany(targetEntity="Appointment", mappedBy="amea", cascade={"all"}, orphanRemoval=true)
     */
    protected $appointments;

    public function __construct() {
        parent::__construct();
        $this->payments = new ArrayCollection();
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    public function getRepresentativename() {
        return $this->representativename;
    }

    public function setRepresentativename($representativename) {
        $this->representativename = $representativename;
    }

    public function getRepresentativesurname() {
        return $this->representativesurname;
    }

    public function setRepresentativesurname($representativesurname) {
        $this->representativesurname = $representativesurname;
    }

    public function getSports() {
        return $this->sports;
    }

    public function setSports($sports) {
        $this->sports = $sports;
    }

    public function getMedication() {
        return $this->medication;
    }

    public function setMedication($medication) {
        $this->medication = $medication;
    }

    public function getDisability() {
        return $this->disability;
    }

    public function setDisability($disability) {
        $this->disability = $disability;
    }

    public function getOtherpeculiarities() {
        return $this->otherpeculiarities;
    }

    public function setOtherpeculiarities($otherpeculiarities) {
        $this->otherpeculiarities = $otherpeculiarities;
    }

    public function getPayments() {
        return $this->payments;
    }

    public function setPayments($payments) {
        $this->payments = $payments;
    }

    public function addPayment(Payment $payment) {
        $this->payments->add($payment);
    }

    public function removePayment(Payment $payment) {
        $this->payments->removeElement($payment);
    }

    public function getAppointments() {
        return $this->appointments;
    }

    public function setAppointments($appointments) {
        $this->appointments = $appointments;
    }
}