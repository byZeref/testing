<?php

namespace Prueba\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoContacto
 *
 * @ORM\Table(name="tipo_contacto")
 * @ORM\Entity(repositoryClass="Prueba\AppBundle\Repository\TipoContactoRepository")
 */
class TipoContacto
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
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    private $tipo;

    /**
     * @ORM\OneToMany(targetEntity="Contacto", mappedBy="contacto", cascade={"all"})
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
     * Set tipo
     *
     * @param string $tipo
     *
     * @return TipoContacto
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
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
     * @param \Prueba\AppBundle\Entity\Contacto $trabajadore
     *
     * @return TipoContacto
     */
    public function addTrabajadore(\Prueba\AppBundle\Entity\Contacto $trabajadore)
    {
        $this->trabajadores[] = $trabajadore;
    
        return $this;
    }

    /**
     * Remove trabajadore
     *
     * @param \Prueba\AppBundle\Entity\Contacto $trabajadore
     */
    public function removeTrabajadore(\Prueba\AppBundle\Entity\Contacto $trabajadore)
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
        return $this->tipo;
    }
}
