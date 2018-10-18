<?php

namespace Prueba\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estado
 *
 * @ORM\Table(name="estado")
 * @ORM\Entity(repositoryClass="Prueba\AppBundle\Repository\EstadoRepository")
 */
class Estado
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
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=255)
     */
    private $valor_estado;

    /**
     * @ORM\OneToMany(targetEntity="Registro", mappedBy="estado")
     */
    private $trabajadores;

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
     * @param string $valor_estado
     *
     * @return Estado
     */
    public function setValorEstado($valor_estado)
    {
        $this->valor_estado = $valor_estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getValorEstado()
    {
        return $this->valor_estado;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->trabajadores = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add trabajadore
     *
     * @param \Prueba\AppBundle\Entity\Registro $trabajadore
     *
     * @return Estado
     */
    public function addTrabajadore(\Prueba\AppBundle\Entity\Registro $trabajadore)
    {
        $this->trabajadores[] = $trabajadore;
    
        return $this;
    }

    /**
     * Remove trabajadore
     *
     * @param \Prueba\AppBundle\Entity\Registro $trabajadore
     */
    public function removeTrabajadore(\Prueba\AppBundle\Entity\Registro $trabajadore)
    {
        $this->trabajadores->removeElement($trabajadore);
    }

    /**
     * Get trabajadores
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTrabajadores()
    {
        return $this->trabajadores;
    }

    public function __toString()
    {
        return $this->getValorEstado();
    }
}
