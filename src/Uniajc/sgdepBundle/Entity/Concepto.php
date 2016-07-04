<?php

namespace Uniajc\sgdepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Concepto
 *
 * @ORM\Table(name="concepto", indexes={@ORM\Index(name="IDX_648388D0FCA5BA52", columns={"id_informacion"})})
 * @ORM\Entity
 */
class Concepto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_concepto", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="concepto_id_concepto_seq", allocationSize=1, initialValue=1)
     */
    private $idConcepto;

    /**
     * @var string
     *
     * @ORM\Column(name="concepto", type="string", length=255, nullable=false)
     */
    private $concepto;

    /**
     * @var \InformacionAsignatura
     *
     * @ORM\ManyToOne(targetEntity="InformacionAsignatura")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_informacion", referencedColumnName="id_informacion")
     * })
     */
    private $idInformacion;



    /**
     * Get idConcepto
     *
     * @return integer 
     */
    public function getIdConcepto()
    {
        return $this->idConcepto;
    }

    /**
     * Set concepto
     *
     * @param string $concepto
     * @return Concepto
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Get concepto
     *
     * @return string 
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set idInformacion
     *
     * @param \Uniajc\sgdepBundle\Entity\InformacionAsignatura $idInformacion
     * @return Concepto
     */
    public function setIdInformacion(\Uniajc\sgdepBundle\Entity\InformacionAsignatura $idInformacion = null)
    {
        $this->idInformacion = $idInformacion;

        return $this;
    }

    /**
     * Get idInformacion
     *
     * @return \Uniajc\sgdepBundle\Entity\InformacionAsignatura 
     */
    public function getIdInformacion()
    {
        return $this->idInformacion;
    }
}
