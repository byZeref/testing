<?php

namespace Prueba\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contacto
 *
 * @ORM\Table(name="contacto")
 * @ORM\Entity(repositoryClass="Prueba\AppBundle\Repository\ContactoRepository")
 */
class Contacto
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
     * @ORM\ManyToOne(targetEntity="Trabajador", inversedBy="contactos", cascade={"all"})
     */
    private $trabajador;

    /**
     * @ORM\ManyToOne(targetEntity="TipoContacto", inversedBy="trabajadores")
     */
    private $contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="string", length=255)
     */
    private $valor;

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
     * Set valor
     *
     * @param string $valor
     *
     * @return Contacto
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    
        return $this;
    }

    /**
     * Get valor
     *
     * @return string
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set trabajador
     *
     * @param \Prueba\AppBundle\Entity\Trabajador $trabajador
     *
     * @return Contacto
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
     * Set contacto
     *
     * @param \Prueba\AppBundle\Entity\TipoContacto $contacto
     *
     * @return Contacto
     */
    public function setContacto(\Prueba\AppBundle\Entity\TipoContacto $contacto = null)
    {
        $this->contacto = $contacto;
    
        return $this;
    }

    /**
     * Get contacto
     *
     * @return \Prueba\AppBundle\Entity\TipoContacto
     */
    public function getContacto()
    {
        return $this->contacto;
    }

//    public function __toString()
//    {
//        return $this->contacto;
//    }
}
