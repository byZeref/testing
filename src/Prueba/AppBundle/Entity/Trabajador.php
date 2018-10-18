<?php

namespace Prueba\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trabajador
 *
 * @ORM\Table(name="trabajador")
 * @ORM\Entity(repositoryClass="Prueba\AppBundle\Repository\TrabajadorRepository")
 */
class Trabajador
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
     * @var int
     *
     * @ORM\Column(name="ci", type="bigint", unique=true)
     */
    private $ci;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255)
     */
    private $apellidos;

    /**
     * @ORM\OneToMany(targetEntity="Contacto", mappedBy="trabajador", cascade={"all"})
     */
    private $contactos;

    /**
     * @ORM\OneToMany(targetEntity="Registro", mappedBy="trabajador", cascade={"all"})
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
     * Set ci
     *
     * @param integer $ci
     *
     * @return Trabajador
     */
    public function setCi($ci)
    {
        $this->ci = $ci;
    
        return $this;
    }

    /**
     * Get ci
     *
     * @return integer
     */
    public function getCi()
    {
        return $this->ci;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Trabajador
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
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return Trabajador
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    
        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contactos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->estado = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add contacto
     *
     * @param \Prueba\AppBundle\Entity\Contacto $contacto
     *
     * @return Trabajador
     */
    public function addContacto(\Prueba\AppBundle\Entity\Contacto $contacto)
    {
        $this->contactos[] = $contacto;
    
        return $this;
    }

    /**
     * Remove contacto
     *
     * @param \Prueba\AppBundle\Entity\Contacto $contacto
     */
    public function removeContacto(\Prueba\AppBundle\Entity\Contacto $contacto)
    {
        $this->contactos->removeElement($contacto);
    }

    /**
     * Get contactos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContactos()
    {
        return $this->contactos;
    }

    public function __toString()
    {
        return $this->nombre . ' ' . $this->apellidos;
    }

    /**
     * Add estado
     *
     * @param \Prueba\AppBundle\Entity\Registro $estado
     *
     * @return Trabajador
     */
    public function addEstado(\Prueba\AppBundle\Entity\Registro $estado)
    {
        $this->estado[] = $estado;
    
        return $this;
    }

    /**
     * Remove estado
     *
     * @param \Prueba\AppBundle\Entity\Registro $estado
     */
    public function removeEstado(\Prueba\AppBundle\Entity\Registro $estado)
    {
        $this->estado->removeElement($estado);
    }

    /**
     * Get estado
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEstado()
    {
        return $this->estado;
    }
}
