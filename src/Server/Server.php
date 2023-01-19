<?php

namespace IspManager\Server;

/**
 * Class Server
 *
 * @package IspManager\Server
 */
class Server implements \IspManager\Interfaces\Server {

  /**
   * @const string
   */
  const SCHEMA_HTTP = 'http';

  /**
   * @const string
   */
  const SCHEMA_HTTPS = 'https';

  /**
   * @var string
   */
  private string $host;

  /**
   * @var string
   */
  private string $isAuth = '';

  /**
   * @var string
   */
  private string $scheme;

  /**
   * @var int
   */
  private int $port;

  /**
   * Server constructor.
   *
   * @param string $host
   * @param int    $port
   * @param string $scheme
   */
  public function __construct(string $host, int $port = 1500, string $scheme = self::SCHEMA_HTTPS)
  {
    $this->host = $host;
    $this->port = $port;
    $this->scheme = $scheme;
  }

  /**
   * @return string
   */
  public function getStringUri(): string
  {
    $url = $this->getScheme().'://'.$this->getHost().($this->getPort() ? ':'.$this->getPort() : '').'/ispmgr?';
    if (($token = $this->getAuth())) {
      $url .= 'auth='.$token;
    }
    return $url;
  }

  /**
   * @return string
   */
  public function getScheme(): string
  {
    return $this->scheme;
  }

  /**
   * @return string
   */
  public function getHost(): string
  {
    return $this->host;
  }

  /**
   * @return string
   */
  public function getAuth(): string
  {
    return $this->isAuth;
  }

  /**
   * @param string[] $result
   *
   * @return string[]|bool[]
   */
  public function setAuth(array $result): array
  {
    $this->isAuth = $result['doc']['auth']['$'];
    return ['success' => true];
  }

  /**
   * @return int
   */
  public function getPort(): int
  {
    return $this->port;
  }
}