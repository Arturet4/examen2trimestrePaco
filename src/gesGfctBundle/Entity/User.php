<?php

namespace gesGfctBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="gesGfctBundle\Repository\UserRepository")
 */
class User implements UserInterface
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
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     * @Assert\Length(
     *      min = 4,
     *      max = 32,
     *      minMessage = "El campo Username debe tener como minimo 4 caracteres.",
     *      maxMessage = "El campo username debe tener como maximo 16 caracteres."
     * )
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * @var string
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "El email '{{ value }}' no es valido.",
     *     checkMX = true
     * )
     */
    private $email;

    /**
   * @Assert\NotBlank()
   * @Assert\Length(
   *      min = 8,
   *      max=4096,
   *      minMessage = "Debe tener como minimo 8 caracteres",
   * )
   * @Assert\Regex(
   *     pattern="/\d/",
   *     match=true,
   *     message="Debe contener algún número"
   * )
   *
   * @Assert\Regex(
   *     pattern     = "/^[a-z]+.+$/i",
   *     htmlPattern = "^[a-z]+$",
   *     message="Debe contener alguna letra"
   * )
   * @Assert\Regex(
   *     pattern     = "/^[A-Z]+.+$/",
   *     htmlPattern = "^[a-zA-Z]+$",
   *     message="Debe contener alguna letra mayúscula"
   * )
   */
    private $plainPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="roles", type="json_array")
     */
    private $roles = array();

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=64)
     */
    private $password;



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function setRoles(array $roles)
    {
        $this->roles = $roles;


        return $this;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }



    public function getPlainPassword()
    {
    return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
    $this->plainPassword = $password;
  }
    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    //Metodos que debe implementar el entity por UserInterface

    public function getSalt()
    {
        // The bcrypt algorithm doesn't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }

    public function getRoles(){
      return $this->roles;
    }

    public function eraseCredentials(){}
}
