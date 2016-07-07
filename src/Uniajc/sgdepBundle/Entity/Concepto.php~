<?php

namespace Uniajc\sgdepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Concepto
 */
class Concepto
{
    /**
     * @var integer
     */
    private $idConcepto;

    /**
     * @var string
     */
    private $concepto;

    /**
     * @var \Uniajc\sgdepBundle\Entity\InformacionAsignatura
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
