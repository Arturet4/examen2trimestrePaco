<?php

namespace gesGfctBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * alumno
 *
 * @ORM\Table(name="alumno")
 * @ORM\Entity(repositoryClass="gesGfctBundle\Repository\alumnoRepository")
 */
class alumno
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
     * @ORM\Column(name="apellido1", type="string", length=255)
     */
    private $apellido1;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido2", type="string", length=255)
     */
    private $apellido2;

    /**
     * @var string
     *
     * @ORM\Column(name="ciclo", type="string", length=255)
     */
    private $ciclo;
    /**
    *@ORM\ManyToOne(targetEntity="empresa",inversedBy="alumnosEmp")
    *@ORM\JoinColumn(name="empresa_id",referencedColumnName="id")

    */
    private $empresaAlumnos;

    /**
     * Get id
     *
     * @return int
     */

     // ...

   /**
    * @ORM\ManyToOne(targetEntity="Empresa", inversedBy="alumno")
    * @ORM\JoinColumn(name="empresa_id", referencedColumnName="id")
    */
   private $empresa;


    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return alumno
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
     * Set apellido1
     *
     * @param string $apellido1
     *
     * @return alumno
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    /**
     * Get apellido1
     *
     * @return string
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * Set apellido2
     *
     * @param string $apellido2
     *
     * @return alumno
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    /**
     * Get apellido2
     *
     * @return string
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * Set ciclo
     *
     * @param string $ciclo
     *
     * @return alumno
     */
    public function setCiclo($ciclo)
    {
        $this->ciclo = $ciclo;

        return $this;
    }

    /**
     * Get ciclo
     *
     * @return string
     */
    public function getCiclo()
    {
        return $this->ciclo;
    }

    /**
     * Set empresaAlumnos
     *
     * @param \gesGfctBundle\Entity\empresa $empresaAlumnos
     *
     * @return alumno
     */
    public function setEmpresaAlumnos(\gesGfctBundle\Entity\empresa $empresaAlumnos = null)
    {
        $this->empresaAlumnos = $empresaAlumnos;

        return $this;
    }

    /**
     * Get empresaAlumnos
     *
     * @return \gesGfctBundle\Entity\empresa
     */
    public function getEmpresaAlumnos()
    {
        return $this->empresaAlumnos;
    }

    /**
     * Set empresa
     *
     * @param \gesGfctBundle\Entity\Empresa $empresa
     *
     * @return alumno
     */
    public function setEmpresa(\gesGfctBundle\Entity\Empresa $empresa = null)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return \gesGfctBundle\Entity\Empresa
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }
}
