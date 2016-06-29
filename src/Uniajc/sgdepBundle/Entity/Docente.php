<?php

namespace Uniajc\sgdepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Docente
 *
 * @ORM\Table(name="docente", indexes={@ORM\Index(name="IDX_FD9FCFA48F781FEBE37D9644", columns={"id_persona", "identificacion_persona"})})
 * @ORM\Entity
 */
class Docente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="docente_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="smallint", nullable=false)
     */
    private $estado;

    /**
     * @var \Persona
     *
     * @ORM\ManyToOne(targetEntity="Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_persona", referencedColumnName="id"),
     *   @ORM\JoinColumn(name="identificacion_persona", referencedColumnName="identificacion")
     * })
     */
    private $idPersona;



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
     * Set estado
     *
     * @param integer $estado
     * @return Docente
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
     * @return Docente
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
