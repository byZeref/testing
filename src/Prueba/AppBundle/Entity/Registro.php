<?php

namespace Prueba\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Registro
 *
 * @ORM\Table(name="registro")
 * @ORM\Entity(repositoryClass="Prueba\AppBundle\Repository\RegistroRepository")
 */
class Registro
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Trabajador", inversedBy="estado", cascade={"all"})
     */
    private $trabajador;

    /**
     * @ORM\ManyToOne(targetEntity="Estado", inversedBy="trabajadores")
     */
    private $estado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicial", type="date")
     */
    private $fechaInicial;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_final", type="date")
     */
    private $fechaFinal;


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
     * Set fechaInicial
     *
     * @param \DateTime $fechaInicial
     *
     * @return Registro
     */
    public function setFechaInicial($fechaInicial)
    {
        $this->fechaInicial = $fechaInicial;
    
        return $this;
    }

    /**
     * Get fechaInicial
     *
     * @return \DateTime
     */
    public function getFechaInicial()
    {
        return $this->fechaInicial;
    }

    /**
     * Set fechaFinal
     *
     * @param \DateTime $fechaFinal
     *
     * @return Registro
     */
    public function setFechaFinal($fechaFinal)
    {
        $this->fechaFinal = $fechaFinal;
    
        return $this;
    }

    /**
     * Get fechaFinal
     *
     * @return \DateTime
     */
    public function getFechaFinal()
    {
        return $this->fechaFinal;
    }

    /**
     * Set trabajador
     *
     * @param \Prueba\AppBundle\Entity\Trabajador $trabajador
     *
     * @return Registro
     */
    public function setTrabajador(\Prueba\AppBundle\Entity\Trabajador $trabajador = null)
    {
        $this->trabajador = $trabajador;
    
        return $this;
    }

    /**
     * Get trabajador
     *
     * @return \Prueba\AppBundle\Entity\Trabajador
     */
    public function getTrabajador()
    {
        return $this->trabajador;
    }

    /**
     * Set estado
     *
     * @param \Prueba\AppBundle\Entity\Estado $estado
     *
     * @return Registro
     */
    public function setEstado(\Prueba\AppBundle\Entity\Estado $estado = null)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return \Prueba\AppBundle\Entity\Estado
     */
    public function getEstado()
    {
        return $this->estado;
    }
}
