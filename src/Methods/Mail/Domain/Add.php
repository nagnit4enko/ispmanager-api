<?php

namespace IspManager\Methods\Mail\Domain;

/**
 * Class Add
 *
 * @package IspManager\Methods\Mail\Domain
 */
class Add extends \IspManager\AbstractHandler {

  /**
   * @var string
   */
  protected string $method = 'emaildomain.edit';

  /**
   * Add constructor.
   *
   * @param string $domain
   */
  public function __construct(string $domain)
  {
    parent::__construct(null, $domain);
    parent::setAdditional([
      'name' => $domain,
      'limit_ssl' => '',
      'ipsrc' => '',
      'defaction' => 'error',
      'redirval' => '',
      'spamassassin' => 'on',
      'dkim' => 'on',
      'dkim_selector' => 'dkim',
      'dkim_keylen' => '1024',
      'dmarc' => 'on',
      'secure' => 'off',
      'secure_alias' => 'mail.'.$domain,
      'ssl_name' => 'selfsigned',
      'email' => ''
    ]);
  }
}