<?php

namespace IspManager\Methods\Dns\Domain;

/**
 * Class Add
 *
 * @package IspManager\Methods\Dns\Domain
 */
class Add extends Edit {

  /**
   * @var string
   */
  protected string $method = 'domain.record.edit';

  /**
   * Add constructor.
   *
   * @param string $domain
   */
  public function __construct(string $domain)
  {
    parent::__construct(null, $domain);
  }

  /**
   * @param string[] $result
   *
   * @return string[]
   */
  public function parseResult(array $result): array
  {
    return [
      'id' => $result['doc']['id']['$']
    ];
  }
}