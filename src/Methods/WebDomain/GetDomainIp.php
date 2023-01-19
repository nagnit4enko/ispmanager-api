<?php

namespace IspManager\Methods\WebDomain;

use IspManager\AbstractHandler;

/**
 * Class GetDomainIp
 *
 * @package IspManager\Methods\WebDomain
 */
class GetDomainIp extends AbstractHandler {

  /**
   * @var string
   */
  protected string $method = 'domain.edit';

  /**
   * GetDomainIp constructor.
   *
   * @param string $domain
   */
  public function __construct(string $domain)
  {
    parent::__construct($domain);
  }

  /**
   * @param string[] $result
   *
   * @return string[]|force(string[])
   */
  public function parseResult(array $result): array
  {
    if (!isset($result['doc']['doc']['ip']['$'])) return [];
    $dataIp = [];
    foreach (explode(' ', $result['doc']['doc']['ip']['$']) as $ip) {
      $dataIp[strpos($ip, ':') !== false ? 'ipv6' : 'ipv4'] = $ip;
    }
    return $dataIp;
  }
}