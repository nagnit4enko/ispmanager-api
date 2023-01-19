<?php

namespace IspManager;

use \IspManager\Interfaces\Server;
use \IspManager\Interfaces\Credentials;
use IspManager\Methods\WebDomain\Add;

/**
 * Class IspManager
 *
 * @package IspManager
 */
class IspManager {

  /**
   * @var Server
   */
  private Server $server;

  /**
   * @var Credentials
   */
  private Credentials $credentials;

  /**
   * @var AbstractHandler
   */
  private AbstractHandler $abstractHandler;

  /**
   * @var string[]
   */
  private array $options;

  /**
   * @param Server $server
   *
   * @return $this
   */
  public function connectToServer(Server $server): self
  {
    $this->server = $server;
    return $this;
  }

  /**
   * @param string $lang
   *
   * @return $this
   */
  public function setLang(string $lang): self
  {
    $this->options['lang'] = $lang;
    return $this;
  }

  /**
   * @param Credentials $credentials
   *
   * @return $this
   */
  public function credentials(Credentials $credentials): self
  {
    $this->credentials = $credentials;
    return $this;
  }

  /**
   * @param AbstractHandler $abstractHandler
   *
   * @return $this
   */
  public function addNewEvent(AbstractHandler $abstractHandler): self
  {
    $this->abstractHandler = $abstractHandler;
    return $this;
  }

  /**
   * @return string[]|force(kmixed)
   */
  public function execute(): array
  {

    $result = \App::common()->curl(
      $this->constructUrl(),
      array_merge($this->options, $this->abstractHandler->getQueryParams()),
      $this->abstractHandler->isPost() ? 'POST' : 'GET',
      ["Content-type: application/x-www-form-urlencoded\r\n"]
    );

    $result = json_decode($result, true);

    // returned error data
    if (isset($result['doc']['error'])) {
      return ['error' => true, 'detail' => $result['doc']['error']['msg']['$']];
    }

    // Если есть функция для обработки результата то вызываем ее
    if (method_exists($this->abstractHandler, 'parseResult')) {
      return $this->abstractHandler->parseResult($result, $this);
    }

    return $result;
  }

  /**
   * @param string[] $result
   *
   * @return string[]
   */
  public function setAuth(array $result): array
  {
    return $this->server->setAuth($result);
  }

  /**
   * @return string
   */
  private function constructUrl(): string
  {
    $url = $this->server->getStringUri();
    $url .= '&func='.$this->abstractHandler->getMethod();
    if (!empty($this->credentials) && $this->credentials instanceof \IspManager\Credentials\Credentials) {
      $url .= '&authinfo='.$this->credentials->getPartUri();
    }
    return $url;
  }
}