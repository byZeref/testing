<?php

namespace Prueba\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Libro
 *
 * @ORM\Table(name="libro")
 * @ORM\Entity(repositoryClass="Prueba\AppBundle\Repository\LibroRepository")
 */
class Libro
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
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="genero", type="string", length=64)
     */
    private $genero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_lanzamiento", type="date")
     */
    private $fechaLanzamiento;

    /**
     * @var int
     *
     * @ORM\Column(name="cant_unidades", type="integer", nullable=true)
     */
    private $cantUnidades;

    /**
     * @var string
     *
     * @ORM\Column(name="nomb_autor", type="string", length=255)
     */
    private $nombAutor;

    /**
     * @ORM\ManyToOne(targetEntity="Editorial", inversedBy="libros")
     * @ORM\JoinColumn(name="editorial_id", referencedColumnName="id")
     */
    private $editorial;

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
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Libro
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    
        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set genero
     *
     * @param string $genero
     *
     * @return Libro
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;
    
        return $this;
    }

    /**
     * Get genero
     *
     * @return string
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set fechaLanzamiento
     *
     * @param \DateTime $fechaLanzamiento
     *
     * @return Libro
     */
    public function setFechaLanzamiento($fechaLanzamiento)
    {
        $this->fechaLanzamiento = $fechaLanzamiento;
    
        return $this;
    }

    /**
     * Get fechaLanzamiento
     *
     * @return \DateTime
     */
    public function getFechaLanzamiento()
    {
        return $this->fechaLanzamiento;
    }

    /**
     * Set cantUnidades
     *
     * @param integer $cantUnidades
     *
     * @return Libro
     */
    public function setCantUnidades($cantUnidades)
    {
        $this->cantUnidades = $cantUnidades;

        return $this;
    }

    /**
     * Get cantUnidades
     *
     * @return integer
     */
    public function getCantUnidades()
    {
        return $this->cantUnidades;
    }

    /**
     * Set nombAutor
     *
     * @param string $nombAutor
     *
     * @return Libro
     */
    public function setNombAutor($nombAutor)
    {
        $this->nombAutor = $nombAutor;

        return $this;
    }

    /**
     * Get nombAutor
     *
     * @return string
     */
    public function getNombAutor()
    {
        return $this->nombAutor;
    }

    /**
     * Set editorial
     *
     * @param \Prueba\AppBundle\Entity\Editorial $editorial
     *
     * @return Libro
     */
    public function setEditorial(\Prueba\AppBundle\Entity\Editorial $editorial = null)
    {
        $this->editorial = $editorial;
    
        return $this;
    }

    /**
     * Get editorial
     *
     * @return \Prueba\AppBundle\Entity\Editorial
     */
    public function getEditorial()
    {
        return $this->editorial;
    }
}
