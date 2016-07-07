<?php

namespace Uniajc\sgdepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * "actividadRecurso"
 */
class "actividadRecurso"
{
    /**
     * @var integer
     */
    private $idRecursos;

    /**
     * @var string
     */
    private $recursos;

    /**
     * @var \Uniajc\sgdepBundle\Entity\Asignatura
     */
    private $idAsignatura;


    /**
     * Get idRecursos
     *
     * @return integer 
     */
    public function getIdRecursos()
    {
        return $this->idRecursos;
    }

    /**
     * Set recursos
     *
     * @param string $recursos
     * @return "actividadRecurso"
     */
    public function setRecursos($recursos)
    {
        $this->recursos = $recursos;

        return $this;
    }

    /**
     * Get recursos
     *
     * @return string 
     */
    public function getRecursos()
    {
        return $this->recursos;
    }

    /**
     * Set idAsignatura
     *
     * @param \Uniajc\sgdepBundle\Entity\Asignatura $idAsignatura
     * @return "actividadRecurso"
     */
    public function setIdAsignatura(\Uniajc\sgdepBundle\Entity\Asignatura $idAsignatura = null)
    {
        $this->idAsignatura = $idAsignatura;

        return $this;
    }

    /**
     * Get idAsignatura
     *
     * @return \Uniajc\sgdepBundle\Entity\Asignatura 
     */
    public function getIdAsignatura()
    {
        return $this->idAsignatura;
    }
}
