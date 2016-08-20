<?php

namespace Uniajc\sgdepBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notificacion
 */
class Notificacion
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $cuerpoCorreo;

    /**
     * @var string
     */
    private $destinatarios;

    /**
     * @var \Uniajc\sgdepBundle\Entity\EjecucionPlan
     */
    private $idEjecucion;


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
     * Set cuerpoCorreo
     *
     * @param string $cuerpoCorreo
     * @return Notificacion
     */
    public function setCuerpoCorreo($cuerpoCorreo)
    {
        $this->cuerpoCorreo = $cuerpoCorreo;

        return $this;
    }

    /**
     * Get cuerpoCorreo
     *
     * @return string 
     */
    public function getCuerpoCorreo()
    {
        return $this->cuerpoCorreo;
    }

    /**
     * Set destinatarios
     *
     * @param string $destinatarios
     * @return Notificacion
     */
    public function setDestinatarios($destinatarios)
    {
        $this->destinatarios = $destinatarios;

        return $this;
    }

    /**
     * Get destinatarios
     *
     * @return string 
     */
    public function getDestinatarios()
    {
        return $this->destinatarios;
    }

    /**
     * Set idEjecucion
     *
     * @param \Uniajc\sgdepBundle\Entity\EjecucionPlan $idEjecucion
     * @return Notificacion
     */
    public function setIdEjecucion(\Uniajc\sgdepBundle\Entity\EjecucionPlan $idEjecucion = null)
    {
        $this->idEjecucion = $idEjecucion;

        return $this;
    }

    /**
     * Get idEjecucion
     *
     * @return \Uniajc\sgdepBundle\Entity\EjecucionPlan 
     */
    public function getIdEjecucion()
    {
        return $this->idEjecucion;
    }
}
