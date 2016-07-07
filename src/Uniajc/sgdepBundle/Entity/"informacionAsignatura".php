<?php

namespace Uniajc\sgdepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * "informacionAsignatura"
 */
class "informacionAsignatura"
{
    /**
     * @var integer
     */
    private $idInformacion;

    /**
     * @var string
     */
    private $semestre;

    /**
     * @var string
     */
    private $justificacion;

    /**
     * @var string
     */
    private $objetoEstudio;

    /**
     * @var string
     */
    private $objetivoFormacion;

    /**
     * @var integer
     */
    private $td;

    /**
     * @var integer
     */
    private $ti;

    /**
     * @var \Uniajc\sgdepBundle\Entity\Asignatura
     */
    private $idAsignatura;

    /**
     * @var \Uniajc\sgdepBundle\Entity\Programa
     */
    private $idPrograma;

    /**
     * @var \Uniajc\sgdepBundle\Entity\AreaFormacion
     */
    private $idArea;


    /**
     * Get idInformacion
     *
     * @return integer 
     */
    public function getIdInformacion()
    {
        return $this->idInformacion;
    }

    /**
     * Set semestre
     *
     * @param string $semestre
     * @return "informacionAsignatura"
     */
    public function setSemestre($semestre)
    {
        $this->semestre = $semestre;

        return $this;
    }

    /**
     * Get semestre
     *
     * @return string 
     */
    public function getSemestre()
    {
        return $this->semestre;
    }

    /**
     * Set justificacion
     *
     * @param string $justificacion
     * @return "informacionAsignatura"
     */
    public function setJustificacion($justificacion)
    {
        $this->justificacion = $justificacion;

        return $this;
    }

    /**
     * Get justificacion
     *
     * @return string 
     */
    public function getJustificacion()
    {
        return $this->justificacion;
    }

    /**
     * Set objetoEstudio
     *
     * @param string $objetoEstudio
     * @return "informacionAsignatura"
     */
    public function setObjetoEstudio($objetoEstudio)
    {
        $this->objetoEstudio = $objetoEstudio;

        return $this;
    }

    /**
     * Get objetoEstudio
     *
     * @return string 
     */
    public function getObjetoEstudio()
    {
        return $this->objetoEstudio;
    }

    /**
     * Set objetivoFormacion
     *
     * @param string $objetivoFormacion
     * @return "informacionAsignatura"
     */
    public function setObjetivoFormacion($objetivoFormacion)
    {
        $this->objetivoFormacion = $objetivoFormacion;

        return $this;
    }

    /**
     * Get objetivoFormacion
     *
     * @return string 
     */
    public function getObjetivoFormacion()
    {
        return $this->objetivoFormacion;
    }

    /**
     * Set td
     *
     * @param integer $td
     * @return "informacionAsignatura"
     */
    public function setTd($td)
    {
        $this->td = $td;

        return $this;
    }

    /**
     * Get td
     *
     * @return integer 
     */
    public function getTd()
    {
        return $this->td;
    }

    /**
     * Set ti
     *
     * @param integer $ti
     * @return "informacionAsignatura"
     */
    public function setTi($ti)
    {
        $this->ti = $ti;

        return $this;
    }

    /**
     * Get ti
     *
     * @return integer 
     */
    public function getTi()
    {
        return $this->ti;
    }

    /**
     * Set idAsignatura
     *
     * @param \Uniajc\sgdepBundle\Entity\Asignatura $idAsignatura
     * @return "informacionAsignatura"
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

    /**
     * Set idPrograma
     *
     * @param \Uniajc\sgdepBundle\Entity\Programa $idPrograma
     * @return "informacionAsignatura"
     */
    public function setIdPrograma(\Uniajc\sgdepBundle\Entity\Programa $idPrograma = null)
    {
        $this->idPrograma = $idPrograma;

        return $this;
    }

    /**
     * Get idPrograma
     *
     * @return \Uniajc\sgdepBundle\Entity\Programa 
     */
    public function getIdPrograma()
    {
        return $this->idPrograma;
    }

    /**
     * Set idArea
     *
     * @param \Uniajc\sgdepBundle\Entity\AreaFormacion $idArea
     * @return "informacionAsignatura"
     */
    public function setIdArea(\Uniajc\sgdepBundle\Entity\AreaFormacion $idArea = null)
    {
        $this->idArea = $idArea;

        return $this;
    }

    /**
     * Get idArea
     *
     * @return \Uniajc\sgdepBundle\Entity\AreaFormacion 
     */
    public function getIdArea()
    {
        return $this->idArea;
    }
}
