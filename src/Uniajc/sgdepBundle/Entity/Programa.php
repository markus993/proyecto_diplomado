<?php

namespace Uniajc\sgdepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Programa
 *
 * @ORM\Table(name="programa", indexes={@ORM\Index(name="IDX_2F0140DA5DFB84A", columns={"id_facultad"})})
 * @ORM\Entity
 */
class Programa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="programa_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=255, nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_snies", type="string", length=255, nullable=false)
     */
    private $codigoSnies;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_creditos", type="integer", nullable=false)
     */
    private $numeroCreditos;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_asignaturas", type="integer", nullable=false)
     */
    private $numeroAsignaturas;

    /**
     * @var string
     *
     * @ORM\Column(name="modalidad", type="string", length=1, nullable=false)
     */
    private $modalidad;

    /**
     * @var string
     *
     * @ORM\Column(name="jornada", type="string", length=1, nullable=false)
     */
    private $jornada;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="smallint", nullable=false)
     */
    private $estado;

    /**
     * @var \Facultad
     *
     * @ORM\ManyToOne(targetEntity="Facultad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_facultad", referencedColumnName="id")
     * })
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
