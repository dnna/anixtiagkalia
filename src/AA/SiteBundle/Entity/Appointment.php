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
class Appointment {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="Amea", inversedBy="appointments")
     * @ORM\JoinColumn(name="amea_id", referencedColumnName="id")
     */
    protected $amea;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $date;
    /**
     * @ORM\Column(type="string")
     */
    protected $doctorname;
    /**
     * @ORM\Column(type="string")
     */
    protected $doctorsurname; // Δημοτικά τέλη
    /**
     * @ORM\Column(type="string")
     */
    protected $comments;
    /**
     * @ORM\ManyToOne(targetEntity="Specialty")
     * @ORM\JoinColumn(name="specialty_id", referencedColumnName="id")
     */
    protected $specialty;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getAmea() {
        return $this->amea;
    }

    public function setAmea($amea) {
        $this->amea = $amea;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getDoctorname() {
        return $this->doctorname;
    }

    public function setDoctorname($doctorname) {
        $this->doctorname = $doctorname;
    }

    public function getDoctorsurname() {
        return $this->doctorsurname;
    }

    public function setDoctorsurname($doctorsurname) {
        $this->doctorsurname = $doctorsurname;
    }

    public function getComments() {
        return $this->comments;
    }

    public function setComments($comments) {
        $this->comments = $comments;
    }

    public function getSpecialty() {
        return $this->specialty;
    }

    public function setSpecialty($specialty) {
        $this->specialty = $specialty;
    }

    public function __toString() {
        if(isset($this->date)) {
            return $this->getDate()->format('d-m-Y');
        } else {
            return '';
        }
    }
}