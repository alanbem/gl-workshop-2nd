<?php

namespace GoldenLine\WorkshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PublicBenefitOrganization
 *
 * @ORM\Table(name="pbo")
 * @ORM\Entity(repositoryClass="GoldenLine\WorkshopBundle\Entity\PublicBenefitOrganizationRepository")
 */
class PublicBenefitOrganization
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * National Court Register
     *
     * @var string
     *
     * @ORM\Column(name="ncr", type="string", length=10, unique=true)
     */
    private $ncr;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128)
     */
    private $name;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ncr
     *
     * @param string $ncr
     * @return PublicBenefitOrganization
     */
    public function setNcr($ncr)
    {
        $this->ncr = $ncr;

        return $this;
    }

    /**
     * Get ncr
     *
     * @return string 
     */
    public function getNcr()
    {
        return $this->ncr;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return PublicBenefitOrganization
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
}
