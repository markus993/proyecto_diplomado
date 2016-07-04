<?php

namespace Uniajc\sgdepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asignatura
 *
 * @ORM\Table(name="asignatura")
 * @ORM\Entity
 */
class Asignatura
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="asignatura_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_credito", type="integer", nullable=false)
     */
    private $numeroCredito;

    /**
     * @var integer
     *
     * @ORM\Column(name="intensidad_horaria", type="integer", nullable=false)
     */
    private $intensidadHoraria;

    /**
     * @var string
     *
     * @ORM\Column(name="modalidad", type="string", length=1, nullable=false)
     */
    private $modalidad;

    /**
     * @var integer
     *
     * @ORM\Column(name="uniajc", type="smallint", nullable=false)
     */
    private $uniajc;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="smallint", nullable=false)
     */
    private $estado;



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
     * Set nombre
     *
     * @param string $nombre
     * @return Asignatura
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
     * Set numeroCredito
     *
     * @param integer $numeroCredito
     * @return Asignatura
     */
    public function setNumeroCredito($numeroCredito)
    {
        $this->numeroCredito = $numeroCredito;

        return $this;
    }

    /**
     * Get numeroCredito
     *
     * @return integer 
     */
    public function getNumeroCredito()
    {
        return $this->numeroCredito;
    }

    /**
     * Set intensidadHoraria
     *
     * @param integer $intensidadHoraria
     * @return Asignatura
     */
    public function setIntensidadHoraria($intensidadHoraria)
    {
        $this->intensidadHoraria = $intensidadHoraria;

        return $this;
    }

    /**
     * Get intensidadHoraria
     *
     * @return integer 
     */
    public function getIntensidadHoraria()
    {
        return $this->intensidadHoraria;
    }

    /**
     * Set modalidad
     *
     * @param string $modalidad
     * @return Asignatura
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
     * Set uniajc
     *
     * @param integer $uniajc
     * @return Asignatura
     */
    public function setUniajc($uniajc)
    {
        $this->uniajc = $uniajc;

        return $this;
    }

    /**
     * Get uniajc
     *
     * @return integer 
     */
    public function getUniajc()
    {
        return $this->uniajc;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Asignatura
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
}
