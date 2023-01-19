<?php

namespace IspManager;

/**
 * Class AbstractHandler
 *
 * @package IspManager
 */
abstract class AbstractHandler {

  /**
   * @var bool
   */
  protected bool $isSaveAction = false;

  /**
   * @var
   */
  protected string $method;

  /**
   * @var string[]
   */
  protected array $queryParams = [
    'sok' => 'ok',
    'out' => 'json'
  ];

  /**
   * AbstractHandler constructor.
   *
   * @param null|string $elid
   * @param null|string $plid
   */
  public function __construct(string $elid = null, string $plid = null)
  {
    if ($elid) {
      $this->queryParams['elid'] = $elid;
    }

    if ($plid) {
      $this->queryParams['plid'] = $plid;
    }
  }

  /**
   * @param string[] $queryString
   *
   * @return $this
   */
  public function setAdditional(array $queryString): self
  {
    $this->queryParams = array_merge($this->queryParams, $queryString);
    return $this;
  }

  /**
   * @return $this
   */
  final public function flushAdditional(): self
  {
    $this->queryParams = [];
    return $this;
  }

  /**
   * @param $function
   * @param $args
   *
   * @return mixed|string
   */
  public function __call($function, $args){
    if (strpos($function, 'set') !== false) {
      $this->queryParams[lcfirst(str_replace('set', '', $function))] = $args[0];
    }

    if (strpos($function, 'get') !== false) {
      return $this->queryParams[lcfirst(str_replace('get', '', $function))];
    }

    return $this;
  }

  /**
   * @return null|bool
   */
  final public function isPost(): ?bool {
    return $this->isSaveAction;
  }

  /**
   * @return null|string
   */
  final public function getMethod(): ?string {
    return $this->method;
  }

  /**
   * @return string[]
   */
  final public function getQueryParams(): array
  {
    return $this->queryParams;
  }
}