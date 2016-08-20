<?php

namespace Uniajc\sgdepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * "objetivoCurso"
 */
class "objetivoCurso"
{
    /**
     * @var integer
     */
    private $idObjetivoCurso;

    /**
     * @var string
     */
    private $objetivoCurso;

    /**
     * @var \Uniajc\sgdepBundle\Entity\InformacionAsignatura
     */
    private $idInformacion;


    /**
     * Get idObjetivoCurso
     *
     * @return integer 
     */
    public function getIdObjetivoCurso()
    {
        return $this->idObjetivoCurso;
    }

    /**
     * Set objetivoCurso
     *
     * @param string $objetivoCurso
     * @return "objetivoCurso"
     */
    public function setObjetivoCurso($objetivoCurso)
    {
        $this->objetivoCurso = $objetivoCurso;

        return $this;
    }

    /**
     * Get objetivoCurso
     *
     * @return string 
     */
    public function getObjetivoCurso()
    {
        return $this->objetivoCurso;
    }

    /**
     * Set idInformacion
     *
     * @param \Uniajc\sgdepBundle\Entity\InformacionAsignatura $idInformacion
     * @return "objetivoCurso"
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
