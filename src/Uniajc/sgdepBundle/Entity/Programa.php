<?php

namespace Uniajc\sgdepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Programa
 */
class Programa
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $codigo;

    /**
     * @var string
     */
    private $codigoSnies;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var integer
     */
    private $numeroCreditos;

    /**
     * @var integer
     */
    private $numeroAsignaturas;

    /**
     * @var string
     */
    private $modalidad;

    /**
     * @var string
     */
    private $jornada;

    /**
     * @var integer
     */
    private $estado;

    /**
     * @var \Uniajc\sgdepBundle\Entity\Facultad
     */
    private $idFacultad;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Programa
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set codigoSnies
     *
     * @param string $codigoSnies
     * @return Programa
     */
    public function setCodigoSnies($codigoSnies)
    {
        $this->codigoSnies = $codigoSnies;

        return $this;
    }

    /**
     * Get codigoSnies
     *
     * @return string 
     */
    public function getCodigoSnies()
    {
        return $this->codigoSnies;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Programa
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set numeroCreditos
     *
     * @param integer $numeroCreditos
     * @return Programa
     */
    public function setNumeroCreditos($numeroCreditos)
    {
        $this->numeroCreditos = $numeroCreditos;

        return $this;
    }

    /**
     * Get numeroCreditos
     *
     * @return integer 
     */
    public function getNumeroCreditos()
    {
        return $this->numeroCreditos;
    }

    /**
     * Set numeroAsignaturas
     *
     * @param integer $numeroAsignaturas
     * @return Programa
     */
    public function setNumeroAsignaturas($numeroAsignaturas)
    {
        $this->numeroAsignaturas = $numeroAsignaturas;

        return $this;
    }

    /**
     * Get numeroAsignaturas
     *
     * @return integer 
     */
    public function getNumeroAsignaturas()
    {
        return $this->numeroAsignaturas;
    }

    /**
     * Set modalidad
     *
     * @param string $modalidad
     * @return Programa
     */
    public function setModalidad($modalidad)
    {
        $this->modalidad = $modalidad;

        return $this;
    }

    /**
     * Get modalidad
     *
     * @return string 
     */
    public function getModalidad()
    {
        return $this->modalidad;
    }

    /**
     * Set jornada
     *
     * @param string $jornada
     * @return Programa
     */
    public function setJornada($jornada)
    {
        $this->jornada = $jornada;

        return $this;
    }

    /**
     * Get jornada
     *
     * @return string 
     */
    public function getJornada()
    {
        return $this->jornada;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Programa
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
     * Set idFacultad
     *
     * @param \Uniajc\sgdepBundle\Entity\Facultad $idFacultad
     * @return Programa
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
}
