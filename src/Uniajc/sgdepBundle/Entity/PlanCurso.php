<?php

namespace Uniajc\sgdepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanCurso
 */
class PlanCurso
{
    /**
     * @var integer
     */
    private $idPlan;

    /**
     * @var integer
     */
    private $sesion;

    /**
     * @var string
     */
    private $trabajoDirigido;

    /**
     * @var string
     */
    private $trabajoIndependienteDirigido;

    /**
     * @var string
     */
    private $trabajoIndependiente;

    /**
     * @var \DateTime
     */
    private $fechaSesion;

    /**
     * @var \Uniajc\sgdepBundle\Entity\Asignacion
     */
    private $idAsignacion;


    /**
     * Get idPlan
     *
     * @return integer 
     */
    public function getIdPlan()
    {
        return $this->idPlan;
    }

    /**
     * Set sesion
     *
     * @param integer $sesion
     * @return PlanCurso
     */
    public function setSesion($sesion)
    {
        $this->sesion = $sesion;

        return $this;
    }

    /**
     * Get sesion
     *
     * @return integer 
     */
    public function getSesion()
    {
        return $this->sesion;
    }

    /**
     * Set trabajoDirigido
     *
     * @param string $trabajoDirigido
     * @return PlanCurso
     */
    public function setTrabajoDirigido($trabajoDirigido)
    {
        $this->trabajoDirigido = $trabajoDirigido;

        return $this;
    }

    /**
     * Get trabajoDirigido
     *
     * @return string 
     */
    public function getTrabajoDirigido()
    {
        return $this->trabajoDirigido;
    }

    /**
     * Set trabajoIndependienteDirigido
     *
     * @param string $trabajoIndependienteDirigido
     * @return PlanCurso
     */
    public function setTrabajoIndependienteDirigido($trabajoIndependienteDirigido)
    {
        $this->trabajoIndependienteDirigido = $trabajoIndependienteDirigido;

        return $this;
    }

    /**
     * Get trabajoIndependienteDirigido
     *
     * @return string 
     */
    public function getTrabajoIndependienteDirigido()
    {
        return $this->trabajoIndependienteDirigido;
    }

    /**
     * Set trabajoIndependiente
     *
     * @param string $trabajoIndependiente
     * @return PlanCurso
     */
    public function setTrabajoIndependiente($trabajoIndependiente)
    {
        $this->trabajoIndependiente = $trabajoIndependiente;

        return $this;
    }

    /**
     * Get trabajoIndependiente
     *
     * @return string 
     */
    public function getTrabajoIndependiente()
    {
        return $this->trabajoIndependiente;
    }

    /**
     * Set fechaSesion
     *
     * @param \DateTime $fechaSesion
     * @return PlanCurso
     */
    public function setFechaSesion($fechaSesion)
    {
        $this->fechaSesion = $fechaSesion;

        return $this;
    }

    /**
     * Get fechaSesion
     *
     * @return \DateTime 
     */
    public function getFechaSesion()
    {
        return $this->fechaSesion;
    }

    /**
     * Set idAsignacion
     *
     * @param \Uniajc\sgdepBundle\Entity\Asignacion $idAsignacion
     * @return PlanCurso
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
}
