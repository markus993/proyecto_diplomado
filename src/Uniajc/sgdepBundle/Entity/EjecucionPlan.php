<?php

namespace Uniajc\sgdepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EjecucionPlan
 */
class EjecucionPlan
{
    /**
     * @var integer
     */
    private $idEjecucion;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var boolean
     */
    private $checkboxDocente;

    /**
     * @var boolean
     */
    private $checkboxEstudiante;

    /**
     * @var string
     */
    private $observacionDocente;

    /**
     * @var string
     */
    private $observacionFacultad;

    /**
     * @var \Uniajc\sgdepBundle\Entity\Asignacion
     */
    private $idAsignacion;

    /**
     * @var \Uniajc\sgdepBundle\Entity\Facultad
     */
    private $idFacultad;

    /**
     * @var \Uniajc\sgdepBundle\Entity\PlanCurso
     */
    private $idPlan;


    /**
     * Get idEjecucion
     *
     * @return integer 
     */
    public function getIdEjecucion()
    {
        return $this->idEjecucion;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return EjecucionPlan
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set checkboxDocente
     *
     * @param boolean $checkboxDocente
     * @return EjecucionPlan
     */
    public function setCheckboxDocente($checkboxDocente)
    {
        $this->checkboxDocente = $checkboxDocente;

        return $this;
    }

    /**
     * Get checkboxDocente
     *
     * @return boolean 
     */
    public function getCheckboxDocente()
    {
        return $this->checkboxDocente;
    }

    /**
     * Set checkboxEstudiante
     *
     * @param boolean $checkboxEstudiante
     * @return EjecucionPlan
     */
    public function setCheckboxEstudiante($checkboxEstudiante)
    {
        $this->checkboxEstudiante = $checkboxEstudiante;

        return $this;
    }

    /**
     * Get checkboxEstudiante
     *
     * @return boolean 
     */
    public function getCheckboxEstudiante()
    {
        return $this->checkboxEstudiante;
    }

    /**
     * Set observacionDocente
     *
     * @param string $observacionDocente
     * @return EjecucionPlan
     */
    public function setObservacionDocente($observacionDocente)
    {
        $this->observacionDocente = $observacionDocente;

        return $this;
    }

    /**
     * Get observacionDocente
     *
     * @return string 
     */
    public function getObservacionDocente()
    {
        return $this->observacionDocente;
    }

    /**
     * Set observacionFacultad
     *
     * @param string $observacionFacultad
     * @return EjecucionPlan
     */
    public function setObservacionFacultad($observacionFacultad)
    {
        $this->observacionFacultad = $observacionFacultad;

        return $this;
    }

    /**
     * Get observacionFacultad
     *
     * @return string 
     */
    public function getObservacionFacultad()
    {
        return $this->observacionFacultad;
    }

    /**
     * Set idAsignacion
     *
     * @param \Uniajc\sgdepBundle\Entity\Asignacion $idAsignacion
     * @return EjecucionPlan
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
     * Set idFacultad
     *
     * @param \Uniajc\sgdepBundle\Entity\Facultad $idFacultad
     * @return EjecucionPlan
     */
    public function setIdFacultad(\Uniajc\sgdepBundle\Entity\Facultad $idFacultad = null)
    {
        $this->idFacultad = $idFacultad;

        return $this;
    }

    /**
     * Get idFacultad
     *
     * @return \Uniajc\sgdepBundle\Entity\Facultad 
     */
    public function getIdFacultad()
    {
        return $this->idFacultad;
    }

    /**
     * Set idPlan
     *
     * @param \Uniajc\sgdepBundle\Entity\PlanCurso $idPlan
     * @return EjecucionPlan
     */
    public function setIdPlan(\Uniajc\sgdepBundle\Entity\PlanCurso $idPlan = null)
    {
        $this->idPlan = $idPlan;

        return $this;
    }

    /**
     * Get idPlan
     *
     * @return \Uniajc\sgdepBundle\Entity\PlanCurso 
     */
    public function getIdPlan()
    {
        return $this->idPlan;
    }
}
