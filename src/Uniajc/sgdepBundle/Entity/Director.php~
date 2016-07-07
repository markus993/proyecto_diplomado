<?php

namespace Uniajc\sgdepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Director
 */
class Director
{
    /**
     * @var integer
     */
    private $estado;

    /**
     * @var \Uniajc\sgdepBundle\Entity\Persona
     */
    private $idPersona;


    /**
     * Set estado
     *
     * @param integer $estado
     * @return Director
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
     * Set idPersona
     *
     * @param \Uniajc\sgdepBundle\Entity\Persona $idPersona
     * @return Director
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
