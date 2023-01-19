<?php

namespace IspManager\Credentials;

/**
 * Class Credentials
 *
 * @package IspManager\Credentials
 */
class Credentials implements \IspManager\Interfaces\Credentials {

  /**
   * @var string
   */
  private string $login;

  /**
   * @var string
   */
  private string $password;

  /**
   * Credentials constructor.
   *
   * @param string $login
   * @param string $password
   */
  public function __construct(string $login, string $password)
  {
    $this->login = $login;
    $this->password = $password;
  }

  /**
   * @return string
   */
  public function getPartUri(): string
  {
    return $this->getLogin().':'.$this->getPassword();
  }

  /**
   * @return string
   */
  public function getLogin(): string
  {
    return $this->login;
  }

  /**
   * @return string
   */
  public function getPassword(): string
  {
    return $this->password;
  }
}