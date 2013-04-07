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
class Payment {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="Amea", inversedBy="payments")
     * @ORM\JoinColumn(name="amea_id", referencedColumnName="id")
     */
    protected $amea;
    /**
     * @ORM\Column(type="integer")
     */
    protected $year;
    /**
     * @ORM\Column(type="string")
     */
    protected $receiptnum; // Αριθμός απόδειξης
    /**
     * @ORM\Column(type="boolean")
     */
    protected $municipalcharge; // Δημοτικά τέλη
    /**
     * @ORM\Column(type="boolean")
     */
    protected $poor; // Άπορος
    /**
     * @ORM\Column(type="boolean")
     */
    protected $centerservices; // Υπηρεσίες κέντρου
    /**
     * @ORM\Column(type="boolean")
     */
    protected $sportprogrammes; // Αθλητικά προγράμματα

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

    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function getReceiptnum() {
        return $this->receiptnum;
    }

    public function setReceiptnum($receiptnum) {
        $this->receiptnum = $receiptnum;
    }

    public function getMunicipalcharge() {
        return $this->municipalcharge;
    }

    public function setMunicipalcharge($municipalcharge) {
        $this->municipalcharge = $municipalcharge;
    }

    public function getPoor() {
        return $this->poor;
    }

    public function setPoor($poor) {
        $this->poor = $poor;
    }

    public function getCenterservices() {
        return $this->centerservices;
    }

    public function setCenterservices($centerservices) {
        $this->centerservices = $centerservices;
    }

    public function getSportprogrammes() {
        return $this->sportprogrammes;
    }

    public function setSportprogrammes($sportprogrammes) {
        $this->sportprogrammes = $sportprogrammes;
    }

    public function __toString() {
        return $this->getReceiptnum();
    }
}