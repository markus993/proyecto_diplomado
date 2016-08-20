<?php

namespace Uniajc\sgdepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * "diagnostico"
 */
class "diagnostico"
{
    /**
     * @var integer
     */
    private $idDiagnostico;

    /**
     * @var \Uniajc\sgdepBundle\Entity\Hallazgo
     */
    private $idHallazgo;

    /**
     * @var \Uniajc\sgdepBundle\Entity\Asignacion
     */
    private $idAsignacion;

    /**
     * @var \Uniajc\sgdepBundle\Entity\Accion
     */
    private $idAccion;

    /**
     * @var \Uniajc\sgdepBundle\Entity\Concepto
     */
    private $idConcepto;


    /**
     * Get idDiagnostico
     *
     * @return integer 
     */
    public function getIdDiagnostico()
    {
        return $this->idDiagnostico;
    }

    /**
     * Set idHallazgo
     *
     * @param \Uniajc\sgdepBundle\Entity\Hallazgo $idHallazgo
     * @return "diagnostico"
     */
    public function setIdHallazgo(\Uniajc\sgdepBundle\Entity\Hallazgo $idHallazgo = null)
    {
        $this->idHallazgo = $idHallazgo;

        return $this;
    }

    /**
     * Get idHallazgo
     *
     * @return \Uniajc\sgdepBundle\Entity\Hallazgo 
     */
    public function getIdHallazgo()
    {
        return $this->idHallazgo;
    }

    /**
     * Set idAsignacion
     *
     * @param \Uniajc\sgdepBundle\Entity\Asignacion $idAsignacion
     * @return "diagnostico"
     */
    public function setIdAsignacion(\Uniajc\sgdepBundle\Entity\Asignacion $idAsignacion = null)
    {
        $this->idAsignacion = $idAsignacion;

        return $this;
    }

    /**
     * Get idAsignacion
     *
     * @return \Uniajc\sgdepBundle\Entity\Asignacion 
     */
    public function getIdAsignacion()
    {
        return $this->idAsignacion;
    }

    /**
     * Set idAccion
     *
     * @param \Uniajc\sgdepBundle\Entity\Accion $idAccion
     * @return "diagnostico"
     */
    public function setIdAccion(\Uniajc\sgdepBundle\Entity\Accion $idAccion = null)
    {
        $this->idAccion = $idAccion;

        return $this;
    }

    /**
     * Get idAccion
     *
     * @return \Uniajc\sgdepBundle\Entity\Accion 
     */
    public function getIdAccion()
    {
        return $this->idAccion;
    }

    /**
     * Set idConcepto
     *
     * @param \Uniajc\sgdepBundle\Entity\Concepto $idConcepto
     * @return "diagnostico"
     */
    public function setIdConcepto(\Uniajc\sgdepBundle\Entity\Concepto $idConcepto = null)
    {
        $this->idConcepto = $idConcepto;

        return $this;
    }

    /**
     * Get idConcepto
     *
     * @return \Uniajc\sgdepBundle\Entity\Concepto 
     */
    public function getIdConcepto()
    {
        return $this->idConcepto;
    }
}
