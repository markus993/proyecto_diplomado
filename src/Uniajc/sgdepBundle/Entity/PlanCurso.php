<?php

namespace Uniajc\sgdepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanCurso
 *
 * @ORM\Table(name="plan_curso", indexes={@ORM\Index(name="IDX_999D051080E812A6", columns={"id_asignacion"})})
 * @ORM\Entity
 */
class PlanCurso
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_plan", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="plan_curso_id_plan_seq", allocationSize=1, initialValue=1)
     */
    private $idPlan;

    /**
     * @var integer
     *
     * @ORM\Column(name="sesion", type="integer", nullable=false)
     */
    private $sesion;

    /**
     * @var string
     *
     * @ORM\Column(name="trabajo_dirigido", type="string", length=255, nullable=false)
     */
    private $trabajoDirigido;

    /**
     * @var string
     *
     * @ORM\Column(name="trabajo_independiente_dirigido", type="string", length=255, nullable=false)
     */
    private $trabajoIndependienteDirigido;

    /**
     * @var string
     *
     * @ORM\Column(name="trabajo_independiente", type="string", length=255, nullable=false)
     */
    private $trabajoIndependiente;

    /**
     * @var \Asignacion
     *
     * @ORM\ManyToOne(targetEntity="Asignacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_asignacion", referencedColumnName="id_asignacion")
     * })
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
