<?php

namespace IspManager\Methods\Auth;

use \IspManager\Interfaces\Server;

/**
 * Class Auth
 *
 * @package IspManager\Methods\Auth
 */
class Auth extends \IspManager\AbstractHandler {

  /**
   * @var string
   */
  protected string $method = 'auth';

  /**
   * Auth constructor.
   *
   * @param string $username
   * @param string $password
   */
  public function __construct(string $username, string $password)
  {
    parent::__construct();
    parent::setAdditional([
      'username' => $username,
      'password' => $password,
    ]);
  }

  /**
   * @param $result
   * @param $object
   *
   * @return mixed
   */
  public function parseResult($result, $object) {
    return $object->setAuth($result);
  }
}