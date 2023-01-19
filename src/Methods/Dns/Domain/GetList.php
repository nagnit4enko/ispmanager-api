<?php

namespace IspManager\Methods\Dns\Domain;

/**
 * Class GetList
 *
 * @package IspManager\Methods\Dns\Domain
 */
class GetList extends \IspManager\AbstractHandler {

  /**
   * @var string
   */
  protected string $method = 'domain.record';

  /**
   * GetList constructor.
   *
   * @param null|string $domain
   */
  public function __construct(string $domain = null)
  {
    parent::__construct($domain);
  }

  /**
   * @param string[] $result
   *
   * @return string[]
   */
  public function parseResult(array $result): array
  {
    if (!isset($result['doc']['elem'])) return [];

    return $result['doc']['elem'];
  }
}