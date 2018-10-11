<?php

namespace Prueba\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entrenador
 *
 * @ORM\Table(name="entrenador")
 * @ORM\Entity(repositoryClass="Prueba\AppBundle\Repository\EntrenadorRepository")
 */
class Entrenador
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var int
     *
     * @ORM\Column(name="edad", type="integer")
     */
    private $edad;

    /**
     * @ORM\ManyToMany(targetEntity="Equipo", mappedBy="entrenadores")
     */
    private $equipos;

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
     *
     * @return Entrenador
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
     * Set edad
     *
     * @param integer $edad
     *
     * @return Entrenador
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;
    
        return $this;
    }

    /**
     * Get edad
     *
     * @return integer
     */
    public function getEdad()
    {
        return $this->edad;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->equipos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add equipo
     *
     * @param \Prueba\AppBundle\Entity\Equipo $equipo
     *
     * @return Entrenador
     */
    public function addEquipo(\Prueba\AppBundle\Entity\Equipo $equipo)
    {
        $this->equipos[] = $equipo;
    
        return $this;
    }

    /**
     * Remove equipo
     *
     * @param \Prueba\AppBundle\Entity\Equipo $equipo
     */
    public function removeEquipo(\Prueba\AppBundle\Entity\Equipo $equipo)
    {
        $this->equipos->removeElement($equipo);
    }

    /**
     * Get equipos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEquipos()
    {
        return $this->equipos;
    }

    public function __toString()
    {
        return $this->nombre;
    }
}
