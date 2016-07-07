<?php

namespace Uniajc\sgdepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estudiante
 */
class Estudiante
{
    /**
     * @var integer
     */
    private $estado;

    /**
     * @var boolean
     */
    private $vocero;

    /**
     * @var \Uniajc\sgdepBundle\Entity\Persona
     */
    private $idPersona;


    /**
     * Set estado
     *
     * @param integer $estado
     * @return Estudiante
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set vocero
     *
     * @param boolean $vocero
     * @return Estudiante
     */
    public function setVocero($vocero)
    {
        $this->vocero = $vocero;

        return $this;
    }

    /**
     * Get vocero
     *
     * @return boolean 
     */
    public function getVocero()
    {
        return $this->vocero;
    }

    /**
     * Set idPersona
     *
     * @param \Uniajc\sgdepBundle\Entity\Persona $idPersona
     * @return Estudiante
     */
    public function setIdPersona(\Uniajc\sgdepBundle\Entity\Persona $idPersona = null)
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    /**
     * Get idPersona
     *
     * @return \Uniajc\sgdepBundle\Entity\Persona 
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }
}
