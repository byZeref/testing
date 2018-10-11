<?php

namespace Prueba\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipo
 *
 * @ORM\Table(name="equipo")
 * @ORM\Entity(repositoryClass="Prueba\AppBundle\Repository\EquipoRepository")
 */
class Equipo
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
     * @var string
     *
     * @ORM\Column(name="division", type="string", length=64)
     */
    private $division;

    /**
     * @ORM\ManyToMany(targetEntity="Entrenador", inversedBy="equipos")
     * @ORM\JoinTable(name="equipo_entrenador")
     */
    private $entrenadores;

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
     * @return Equipo
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
     * Set division
     *
     * @param string $division
     *
     * @return Equipo
     */
    public function setDivision($division)
    {
        $this->division = $division;
    
        return $this;
    }

    /**
     * Get division
     *
     * @return string
     */
    public function getDivision()
    {
        return $this->division;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->entrenadores = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add entrenadore
     *
     * @param \Prueba\AppBundle\Entity\Entrenador $entrenadore
     *
     * @return Equipo
     */
    public function addEntrenadore(\Prueba\AppBundle\Entity\Entrenador $entrenadore)
    {
        $this->entrenadores[] = $entrenadore;
    
        return $this;
    }

    /**
     * Remove entrenadore
     *
     * @param \Prueba\AppBundle\Entity\Entrenador $entrenadore
     */
    public function removeEntrenadore(\Prueba\AppBundle\Entity\Entrenador $entrenadore)
    {
        $this->entrenadores->removeElement($entrenadore);
    }

    /**
     * Get entrenadores
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEntrenadores()
    {
        return $this->entrenadores;
    }

    public function __toString()
    {
        return $this->nombre;
    }
}
