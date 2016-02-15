<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
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
   * @ORM\Column(name="username", type="string", nullable=false)
   */
  private $username;

  /**
   * @var string
   *
   * @ORM\Column(name="password", type="string", nullable=false)
   */
  private $password;

  /**
   * @var string
   *
   * @ORM\Column(name="email", type="string", nullable=false)
   */
  private $email;

  /**
   * @var string
   *
   * @ORM\Column(name="role", type="string", length=50)
   */
  private $role;

  /**
   * @ORM\Column(name="is_active", type="boolean")
   */
  private $isActive;

  public function __construct()
  {
      $this->isActive = true;
      // may not be needed, see section on salt below
      // $this->salt = md5(uniqid(null, true));
  }

  public function getId()
  {
     return $this->id;
  }


  public function getUsername()
  {
      return $this->username;
  }

  public function getSalt()
  {
      // you *may* need a real salt depending on your encoder
      // see section on salt below
      return null;
  }

  public function getPassword()
  {
      return $this->password;
  }

  /**
   * Set role
   *
   * @param string $role
   *
   * @return User
   */
  public function setRole($role)
  {
      $this->role = $role;
      return $this;
  }
  /**
   * Get role
   *
   * @return string
   */
  public function getRole()
  {
      return $this->role;
  }

  public function getRoles()
  {
      return array($this->role);
  }

  public function eraseCredentials()
  {
  }

  /** @see \Serializable::serialize() */
  public function serialize()
  {
      return serialize(array(
          $this->id,
          $this->username,
          $this->password,
          // see section on salt below
          // $this->salt,
      ));
  }

  /** @see \Serializable::unserialize() */
  public function unserialize($serialized)
  {
      list (
          $this->id,
          $this->username,
          $this->password,
          // see section on salt below
          // $this->salt
      ) = unserialize($serialized);
  }

}
