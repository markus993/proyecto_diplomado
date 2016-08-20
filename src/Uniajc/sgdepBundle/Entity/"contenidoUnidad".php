<?php

namespace Uniajc\sgdepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * "contenidoUnidad"
 */
class "contenidoUnidad"
{
    /**
     * @var integer
     */
    private $idContenido;

    /**
     * @var integer
     */
    private $contenido;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var \Uniajc\sgdepBundle\Entity\UnidadTematica
     */
    private $idUnidad;


    /**
     * Get idContenido
     *
     * @return integer 
     */
    public function getIdContenido()
    {
        return $this->idContenido;
    }

    /**
     * Set contenido
     *
     * @param integer $contenido
     * @return "contenidoUnidad"
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return integer 
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return "contenidoUnidad"
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set idUnidad
     *
     * @param \Uniajc\sgdepBundle\Entity\UnidadTematica $idUnidad
     * @return "contenidoUnidad"
     */
    public function setIdUnidad(\Uniajc\sgdepBundle\Entity\UnidadTematica $idUnidad = null)
    {
        $this->idUnidad = $idUnidad;

        return $this;
    }

    /**
     * Get idUnidad
     *
     * @return \Uniajc\sgdepBundle\Entity\UnidadTematica 
     */
    public function getIdUnidad()
    {
        return $this->idUnidad;
    }
}
