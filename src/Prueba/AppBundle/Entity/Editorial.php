<?php

namespace Prueba\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Editorial
 *
 * @ORM\Table(name="editorial")
 * @ORM\Entity(repositoryClass="Prueba\AppBundle\Repository\EditorialRepository")
 */
class Editorial
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
     * @ORM\OneToMany(targetEntity="Libro", mappedBy="editorial")
     */
    private $libros;

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
     * @return Editorial
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
     * Constructor
     */
    public function __construct()
    {
        $this->libros = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add libro
     *
     * @param \Prueba\AppBundle\Entity\Libro $libro
     *
     * @return Editorial
     */
    public function addLibro(\Prueba\AppBundle\Entity\Libro $libro)
    {
        $this->libros[] = $libro;
    
        return $this;
    }

    /**
     * Remove libro
     *
     * @param \Prueba\AppBundle\Entity\Libro $libro
     */
    public function removeLibro(\Prueba\AppBundle\Entity\Libro $libro)
    {
        $this->libros->removeElement($libro);
    }

    /**
     * Get libros
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLibros()
    {
        return $this->libros;
    }

    public function __toString()
    {
        return $this->nombre;
    }
}
