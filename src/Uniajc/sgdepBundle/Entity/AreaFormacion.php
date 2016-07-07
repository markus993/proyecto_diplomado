<?php

namespace Uniajc\sgdepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AreaFormacion
 */
class AreaFormacion
{
    /**
     * @var integer
     */
    private $idArea;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var integer
     */
    private $estado;


    /**
     * Get idArea
     *
     * @return integer 
     */
    public function getIdArea()
    {
        return $this->idArea;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return AreaFormacion
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
     * Set estado
     *
     * @param integer $estado
     * @return AreaFormacion
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
